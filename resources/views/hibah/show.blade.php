@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Pengajuan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="/user/hibah">Pengajuan</a></div>
          <div class="breadcrumb-item">Detail Pengajuan</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>Status pengajuan dana hibah</h4>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Tgl Pengajuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Surat izin</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ \Carbon\Carbon::parse($hibah->created_at)->isoFormat('D MMMM Y') }}</td>
                    @if ($hibah->status == 'ditolak')
                    <td><span class="badge badge-danger">{{ $hibah->status }}</span></td>
                    @elseif($hibah->status == 'diterima' && $hibah->skt !='')
                    <td><span class="badge badge-primary">{{ $hibah->status }}</span></td>
                    @else
                    <td><span class="badge badge-primary">{{ $hibah->status }}</span></td>
                    @endif
                    @if ($hibah->status == 'dalam antrian')
                    <td><button onclick="return confirm('Permohonan masih dalam antrian')" class="btn btn-info btn-sm">Download</button></td>
                    @elseif($hibah->status == 'diproses')
                    <td><button onclick="return confirm('Permohonan sedang diproses')" class="btn btn-info btn-sm">Download</button></td>
                    @elseif($hibah->status == 'diterima' && $hibah->skt !='')
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->skt) }}" download="{{ $hibah->skt }}" class="btn btn-info btn-sm">Download</a></td>
                    @elseif($hibah->status == 'diterima' && $hibah->skt =='')
                    <td><button onclick="return confirm('Permohonan sedang diproses')" class="btn btn-info btn-sm">Download</button></td>
                    @else
                    <td><button onclick="return confirm('Permohonan ditolak!')" class="btn btn-info btn-sm">Download</button></td>
                    @endif
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
            @if ($hibah->status == 'ditolak')
            <div class="card mt-3">
              <div class="card-header">
                <h4>Alasan Penolakan</h4>
              </div>
              <div class="card-body">
                <textarea class="form-control">{{ $hibah->keterangan }}</textarea>
                <a href="/user/hibah/edit/{{ $hibah->id }}" class="btn btn-primary mt-3">PERBAIKI</a>
              </div>
            </div>
            @endif
          </div>
          <div class="col-md-6 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>Lampiran pengajuan dana hibah</h4>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <tbody>
                  <div class="form-group">
                    <label for="">Nominal dana hibah yang diajukan</label>
                    <input type="text" class="form-control" name="" id="" value="Rp. {{ format_angka_indo($hibah->rencana_anggaran) }}">
                  </div>
                  <tr>
                    <th>1</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->surat_permohonan_hibah) }}" target="_blank"> Surat Permohonan Hibah</a></td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->fc_norek) }}" target="_blank"> Foto Copy Nomor Rekening</a></td>
                  </tr>
                </tbody>
            </table>
            <form method="POST" onsubmit="return confirm('Yakin hapus data ini?')" action="/user/hibah/destroy/{{ $hibah->id }}">
              @method('DELETE')
              @csrf
              <button type="submit" value="delete" class="btn btn-danger">HAPUS PENGAJUAN</button>
            </form>
            </div>
            </div>
          </div>
        </div>
    </div>
  </section>
</div>
@endsection