@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Pengajuan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="/admin/permohonan">Pengajuan</a></div>
          <div class="breadcrumb-item">Show</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-header">
                    <h4>DATA DIRI PEMOHON</h4>
                  </div>
                  <div class="card-body">
                      <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @method('PUT')
                          @csrf
                        <div class="form-group">
                          <label for="img">Photo</label>
                          <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url($hibah->user->photo) }}" loading="lazy" alt="photo" width="100%" >
                          @error('img')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="name">Nama</label>
                          <input id="name" type="text" class="form-control" name="name" tabindex="1" value="{{ $hibah->user->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" tabindex="2" value="{{ $hibah->user->jabatan }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ormas</label>
                            <input type="text" class="form-control" name="jabatan" tabindex="2" value="{{ $hibah->user->nama_ormas }}">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat sekretariat</label>
                            <textarea type="text" class="form-control" name="jabatan" tabindex="2" value="">{{ $hibah->user->alamat_sekretariat }}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" tabindex="2" value="{{ $hibah->user->email }}">
                        </div>
                        <div class="form-group">
                          <label for="no_tlp">No Tlp WhatsApp</label>
                          <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ $hibah->user->no_tlp }}">
                        </div>
                      </form>
                    </div>
                </div>
            </div>
          <div class="col-md-8 mb-3">
            <div class="card mb-3">
                @if ($hibah->pesan && $hibah->status == 'dalam antrian')
                <div class="alert alert-warning">Permohonan ini sebelumnya ditolak dengan alasan:</div>
                <div class="card-body">
                  <textarea class="form-control">{{ $hibah->pesan }}</textarea>
                </div>
                @elseif($hibah->pesan && $hibah->status == 'ditolak')
                <div class="alert alert-warning">Permohonan ini ditolak dengan alasan:</div>
                <div class="card-body">
                  <textarea class="form-control">{{ $hibah->pesan }}</textarea>
                </div>
                @endif
            </div>
            <div class="card mb-3">
                @if ($hibah->status == 'diproses')
                <div class="alert alert-primary">Permohonan ini telah diverifikasi & sedang menunggu untuk di TTE</div>
                @endif
                @if ($hibah->status == 'diterima')
                <div class="alert alert-primary">Permohonan ini telah di TTE. {{ $hibah->skt ? 'Anda dapat mengunduh SKT dibawah ini' : 'Silakan unggah SKT'}}</div>
                @endif
                @if (session('msg_success'))
                <div class="alert alert-primary">{{ session('msg_success') }}</div>
                @endif
                <div class="card-header">
                  <h4>Informasi Status Pengajuan Dana Hibah</h4>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th scope="col">Tgl Pengajuan</th>
                        <th scope="col">Status</th>
                        <th scope="col">SKT</th>
                    </tr>
                </thead>
                  <tbody>
                    @if ($hibah->status == 'dalam antrian')
                      <td>{{ \Carbon\Carbon::parse($hibah->created_at)->isoFormat('D MMMM Y') }}</td>
                      <td><span class="badge badge-warning">Perlu Diproses</span></td>
                      <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan perlu diproses')">X</button></td>
                    @elseif($hibah->status == 'diproses')
                      <td>{{ \Carbon\Carbon::parse($hibah->created_at)->isoFormat('D MMMM Y') }}</td>
                      <td><span class="badge badge-success">Diproses</span></td>
                      <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan sedang diproses!')">X</button></td>
                      @elseif($hibah->status == 'diterima')
                      <td>{{ \Carbon\Carbon::parse($hibah->created_at)->isoFormat('D MMMM Y') }}</td>
                      <td><span class="badge badge-success">Diterima</span></td>
                      <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#approve">Unggah SKT</button>
                        @if (isset($hibah->skt))
                        <a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->skt) }}" download="{{ $hibah->skt }}" class="btn btn-info btn-sm">Unduh SKT</a>
                        @endif
                      </td>
                    @else
                      <td>{{ \Carbon\Carbon::parse($hibah->created_at)->isoFormat('D MMMM Y') }}</td>
                      <td><span class="badge badge-danger">Ditolak</span></td>
                      <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan ditolak!')">x</button></td>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Lampiran Pengajuan Dana Hibah</h4>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <tbody>
                  <div class="form-group">
                    <label for="">Rencana Anggaran Biaya</label>
                    <input type="text" class="form-control" name="" id="" value="Rp. {{ format_angka_indo($hibah->rencana_anggaran) }}">
                  </div>
                  <tr>
                    <th>1</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->permohonan->lampiran9) }}" target="_blank"> Foto Copy KTP SKB</a></td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->surat_permohonan_hibah) }}" target="_blank"> Surat Permohonan Hibah</a></td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->fc_norek) }}" target="_blank"> Foto Copy Nomor Rekening</a></td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->permohonan->lampiran11) }}" target="_blank">Surat Keterangan Domisili</a></td>
                  </tr>
                  <tr>
                    <th>5</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->permohonan->skt) }}" target="_blank">Surat Keterangan Terdaftar dari Kesbangpol</a></td>
                  </tr>
                  <tr>
                    <th>6</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->permohonan->lampiran6) }}" target="_blank">SK Pengurus</a></td>
                  </tr>
                  <tr>
                    <th>7</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->permohonan->lampiran10) }}" target="_blank">Foto Copy NPWP</a></td>
                  </tr>
                </tbody>
            </table>
            <div class="row">
                @if ($hibah->status == 'dalam antrian')
                <form method="POST" onsubmit="return confirm('Yakin verifikasi data ini?')" action="/admin/hibah/update/{{ $hibah->id }}">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="status" value="diproses">
                  <button type="submit" class="btn btn-primary">VERIFIKASI BERKAS</button>
                </form>
                <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="ml-2 btn btn-primary">TOLAK PENGAJUAN</button>
                @endif
            </div>
            </div>
            </div>
          </div>
          </div>
      </div>
      </div>
    </section>
      <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action="/admin/hibah/update/{{ $hibah->id }}" method="POST">
      @method('PUT')
      @csrf
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Alasan Penolakan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="status" value="ditolak">
            <textarea name="pesan"  class="form-control"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
            <button type="submit" class="btn btn-primary">TOLAK</button>
          </div>
        </div>
    </form>  
  </div>
</div>
<div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="approveTitle" aria-hidden="true">
  <form action="/admin/hibah/update/{{ $hibah->id }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="approveLongTitle">Unggah SKT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">NO SKT</label>
            <input type="text" name="no_skt" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Lampiran SKT</label>
            <input type="file" name="skt" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
          <button type="submit" class="btn btn-primary">UNGGAH</button>
        </div>
      </div>
  </form>  
</div>
@endsection