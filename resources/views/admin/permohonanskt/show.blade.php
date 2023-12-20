@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permohonan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="/admin/permohonan">Permohonan</a></div>
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
                          <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->user->photo) }}" loading="lazy" alt="photo" width="100%" >
                          @error('img')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="name">Nama</label>
                          <input id="name" type="text" class="form-control" name="name" tabindex="1" value="{{ $permohonan->user->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" tabindex="2" value="{{ $permohonan->user->jabatan }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ormas</label>
                            <input type="text" class="form-control" name="jabatan" tabindex="2" value="{{ $permohonan->user->nama_ormas }}">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat sekretariat</label>
                            <textarea type="text" class="form-control" name="jabatan" tabindex="2" value="">{{ $permohonan->user->alamat_sekretariat }}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" name="email" tabindex="2" value="{{ $permohonan->user->email }}">
                        </div>
                        <div class="form-group">
                          <label for="no_tlp">No Tlp WhatsApp</label>
                          <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ $permohonan->user->no_tlp }}">
                        </div>
                      </form>
                    </div>
                </div>
              </div>
          <div class="col-md-8 mb-3">
            <div class="card mb-3">
                @if ($permohonan->pesan && $permohonan->status == 'dalam antrian')
                <div class="alert alert-warning">Permohonan ini sebelumnya ditolak dengan alasan:</div>
                <div class="card-body">
                  <textarea class="form-control">{{ $permohonan->pesan }}</textarea>
                </div>
                @elseif($permohonan->pesan && $permohonan->status == 'ditolak')
                <div class="alert alert-warning">Permohonan ini ditolak dengan alasan:</div>
                <div class="card-body">
                  <textarea class="form-control">{{ $permohonan->pesan }}</textarea>
                </div>
                @endif
            </div>
            <div class="card mb-3">
                @if ($permohonan->status == 'diproses')
                <div class="alert alert-primary">Permohonan ini telah diverifikasi & sedang menunggu untuk di TTE</div>
                @endif
                @if ($permohonan->status == 'diterima')
                <div class="alert alert-primary">Permohonan ini telah di TTE. {{ $permohonan->skt ? 'Anda dapat mengunduh SKT dibawah ini' : 'Silakan unggah SKT'}}</div>
                @endif
                @if (session('msg_success'))
                <div class="alert alert-primary">{{ session('msg_success') }}</div>
                @endif
                <div class="card-header">
                  <h4>Informasi Status Permohonan SKT</h4>
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
                    @if ($permohonan->status == 'dalam antrian')
                      <td>{{ \Carbon\Carbon::parse($permohonan->created_at)->isoFormat('D MMMM Y') }}</td>
                      <td><span class="badge badge-warning">Perlu Diproses</span></td>
                      <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan perlu diproses')">X</button></td>
                    @elseif($permohonan->status == 'diproses')
                      <td>{{ \Carbon\Carbon::parse($permohonan->created_at)->isoFormat('D MMMM Y') }}</td>
                      <td><span class="badge badge-success">Diproses</span></td>
                      <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan sedang diproses!')">X</button></td>
                      @elseif($permohonan->status == 'diterima')
                      <td>{{ \Carbon\Carbon::parse($permohonan->created_at)->isoFormat('D MMMM Y') }}</td>
                      <td><span class="badge badge-success">Diterima</span></td>
                      <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#approve">Unggah SKT</button>
                        @if (isset($permohonan->skt))
                        <a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->skt) }}" download="{{ $permohonan->skt }}" class="btn btn-info btn-sm">Unduh SKT</a>
                        @endif
                      </td>
                    @else
                      <td>{{ \Carbon\Carbon::parse($permohonan->created_at)->isoFormat('D MMMM Y') }}</td>
                      <td><span class="badge badge-danger">Ditolak</span></td>
                      <td><button class="btn btn-info btn-sm" onclick="return confirm('Permohonan ditolak!')">x</button></td>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Lampiran Permohonan SKT</h4>
            </div>
            <div class="card-body">
              <table class="table table-responsive">
                <tbody>
                  <tr>
                    <th>1</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" target="_blank"> Surat Permohonan SKT yang ditandatangani pendiri dan pengurus ormas</a></td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran2) }}" target="_blank"> Salinan/ fotocopy Akte Pendirian ormas (dari Notaris) yang membuat anggaran dasar
                        (AD)  atau Anggaran dasar dan Anggaran rumah Tangga (ART)</a></td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran3) }}" target="_blank"> Anggaran dasar (AD) Anggaran rumah tangga (ART) (memuat   paling sedikit nama dan lambang, tempat kedudukan, asas dan tujuan, dan fungsi, kepengurusan, hak dan kewajiban anggota, pengelolaan keuangan, mekanisme penyelsaian sengketa, dan pengawasan internal, dan pembubaran organisasi).</a></td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran4) }}" target="_blank"> Cek dan scan Kemenkumham / Kemendagri</a></td>
                  </tr>
                  <tr>
                    <th>5</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran5) }}" target="_blank"> Program Kerja</a></td>
                  </tr>
                  <tr>
                    <th>6</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran6) }}" target="_blank"> Susunan pengurus yang dibuktikan dengan surat keputusan tentang susunan pengurus Ormas secara lengkap yang sah sesuai dengan AD/ART ormas yang memuat paling sedikit ketua sekretaris dan bendahara atau sebutan lain dan pengurus dan anggota kesemuannya berkewarganegaraan tanpa  terkecuali</a></td>
                  </tr>
                  <tr>
                    <th>7</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran7) }}" target="_blank"> Biodata pengurus organisasi (Ketua, Sekretaris, dan Bendahara atau sebutan lainnya)</a></td>
                  </tr>
                  <tr>
                    <th>8</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran8) }}" target="_blank"> Pas foto pengurus organisasi berwarna  ukuran 4 x 6 terbaru  dalam tiga bulan terakhir ( ketua, sekretaris, bendahara atau sebutan lainnya)</a></td>
                  </tr>
                  <tr>
                    <th>9</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran9) }}" target="_blank"> Foto copy kartu  tanda  penduduk  elektronik  pengurus  orgtanisasi (ketua, sekretaris, dan bendahara,  dan lainnya.)</a></td>
                  </tr>
                  <tr>
                    <th>10</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran10) }}" target="_blank"> Nomor wajib pajak atas nama ormas</a></td>
                  </tr>
                  <tr>
                    <th>11</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran11) }}" target="_blank"> Surat   keterangan   domisili   sekretariat   yang   diterbitkan   oleh   lurah/kepala   desa setempat atau sebutan lainnya.</a></td>
                  </tr>
                  <tr>
                    <th>12</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran12) }}" target="_blank"> Bukti kepemilikan, atau surat perjanjian kontrak atau ijin pemilik/pengelola</a></td>
                  </tr>
                  <tr>
                    <th>13</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran13) }}" target="_blank"> Foto kantor atau sekretariat ormas, tampak depan yang memuat papan nam</a></td>
                  </tr>
                  <tr>
                    <th>14</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran14) }}" target="_blank"> Surat pernyataan tidak dalam sengketa kepengurusan atau tidak perkara di pengadilan</a></td>
                  </tr>
                  <tr>
                    <th>15</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran15) }}" target="_blank"> Surat pernyataan kesanggupan melaporkan kegiatan</a></td>
                  </tr>
                  <tr>
                    <th>16</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran16) }}" target="_blank"> Formulir isian data ormas</a></td>
                  </tr>
                  @if ($permohonan->lampiran17)
                  <tr>
                    <th>17</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran17) }}" target="_blank"> Surat pernyataan bahwa tidak berafiliasi secara kelembagaan   dengan partai politik yang ditandatangani oleh ketua dan sekretaris</a></td>
                  </tr>
                  @endif
                  @if ($permohonan->lampiran18)
                  <tr>
                    <th>18</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran18) }}" target="_blank"> Surat  pernyataan bahwa nama, lambang, bendera, tanda gamba, simbol, atribut, dan cap stempel yang digunakan belum menjadi hak paten dan/atau hak cipta pihak dan serta  bukan  merupakan  milik  pemerintah,  yang  ditandatangani  oleh  ketua  dan sekretaris.</a></td>
                  </tr>
                  @endif
                  @if ($permohonan->lampiran19)
                  <tr>
                    <th>19</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran19) }}" target="_blank"> Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang keagamaan</a></td>
                  </tr>
                  @endif
                  @if ($permohonan->lampiran20)
                  <tr>
                    <th>20</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran20) }}" target="_blank"> Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang kepercayaan kepada tuhan yang maha esa</a></td>
                  </tr>
                  @endif
                  @if ($permohonan->lampiran21)
                  <tr>
                    <th>21</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran21) }}" target="_blank"> Surat  persetujuan kesediaan atau persetujuan dari pejabat negara, pejabat pemerintah dan atau tokohnya masyarakat yang bersangkutan, yang namanya dicantumkan kepengurusan ormas</a></td>
                  </tr>
                  @endif
                </tbody>
            </table>
            <div class="row">
                @if ($permohonan->status == 'dalam antrian')
                <form method="POST" onsubmit="return confirm('Yakin verifikasi data ini?')" action="/admin/permohonan/update/{{ $permohonan->id }}">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="status" value="diproses">
                  <button type="submit" class="btn btn-primary">VERIFIKASI BERKAS</button>
                </form>
                <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="ml-2 btn btn-primary">TOLAK PERMOHONAN</button>
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
    <form action="/admin/permohonan/update/{{ $permohonan->id }}" method="POST">
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
  <form action="/admin/permohonan/update/{{ $permohonan->id }}" method="POST" enctype="multipart/form-data">
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