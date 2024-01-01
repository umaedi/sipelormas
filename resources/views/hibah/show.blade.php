@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Pengajuan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="/user/permohonan_skt">Pengajuan</a></div>
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
                <textarea class="form-control">{{ $hibah->pesan }}</textarea>
                <a href="/user/permohonan_skt/edit/{{ $hibah->id }}" class="btn btn-primary mt-3">PERBAIKI</a>
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
                    <input type="text" class="form-control" name="" id="" value="Rp. {{ format_angka_indo(10000000) }}">
                  </div>
                  <tr>
                    <th>1</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran1) }}" target="_blank"> Surat Permohonan SKT yang ditandatangani pendiri dan pengurus ormas</a></td>
                  </tr>
                  <tr>
                    <th>2</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran2) }}" target="_blank"> Salinan/ fotocopy Akte Pendirian ormas (dari Notaris) yang membuat anggaran dasar
                        (AD)  atau Anggaran dasar dan Anggaran rumah Tangga (ART)</a></td>
                  </tr>
                  <tr>
                    <th>3</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran3) }}" target="_blank"> Anggaran dasar (AD) Anggaran rumah tangga (ART) (memuat   paling sedikit nama dan lambang, tempat kedudukan, asas dan tujuan, dan fungsi, kepengurusan, hak dan kewajiban anggota, pengelolaan keuangan, mekanisme penyelsaian sengketa, dan pengawasan internal, dan pembubaran organisasi).</a></td>
                  </tr>
                  <tr>
                    <th>4</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran4) }}" target="_blank"> Cek dan scan Kemenkumham / Kemendagri</a></td>
                  </tr>
                  <tr>
                    <th>5</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran5) }}" target="_blank"> Program Kerja</a></td>
                  </tr>
                  <tr>
                    <th>6</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran6) }}" target="_blank"> Susunan pengurus yang dibuktikan dengan surat keputusan tentang susunan pengurus Ormas secara lengkap yang sah sesuai dengan AD/ART ormas yang memuat paling sedikit ketua sekretaris dan bendahara atau sebutan lain dan pengurus dan anggota kesemuannya berkewarganegaraan tanpa  terkecuali</a></td>
                  </tr>
                  <tr>
                    <th>7</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran7) }}" target="_blank"> Biodata pengurus organisasi (Ketua, Sekretaris, dan Bendahara atau sebutan lainnya)</a></td>
                  </tr>
                  <tr>
                    <th>8</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran8) }}" target="_blank"> Pas foto pengurus organisasi berwarna  ukuran 4 x 6 terbaru  dalam tiga bulan terakhir ( ketua, sekretaris, bendahara atau sebutan lainnya)</a></td>
                  </tr>
                  <tr>
                    <th>9</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran9) }}" target="_blank"> Foto copy kartu  tanda  penduduk  elektronik  pengurus  orgtanisasi (ketua, sekretaris, dan bendahara,  dan lainnya.)</a></td>
                  </tr>
                  <tr>
                    <th>10</th>
                    <td>Nomor Wajib Pajak: {{ $hibah->lampiran10 }}</td>
                  </tr>
                  <tr>
                    <th>11</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran11) }}" target="_blank"> Surat   keterangan   domisili   sekretariat   yang   diterbitkan   oleh   lurah/kepala   desa setempat atau sebutan lainnya.</a></td>
                  </tr>
                  <tr>
                    <th>12</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran12) }}" target="_blank"> Bukti kepemilikan, atau surat perjanjian kontrak atau ijin pemilik/pengelola</a></td>
                  </tr>
                  <tr>
                    <th>13</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran13) }}" target="_blank"> Foto kantor atau sekretariat ormas, tampak depan yang memuat papan nam</a></td>
                  </tr>
                  <tr>
                    <th>14</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran14) }}" target="_blank"> Surat pernyataan tidak dalam sengketa kepengurusan atau tidak perkara di pengadilan</a></td>
                  </tr>
                  <tr>
                    <th>15</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran15) }}" target="_blank"> Surat pernyataan kesanggupan melaporkan kegiatan</a></td>
                  </tr>
                  <tr>
                    <th>16</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran16) }}" target="_blank"> Formulir isian data ormas</a></td>
                  </tr>
                  <tr>
                    <th>17</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran17) }}" target="_blank"> Surat pernyataan bahwa tidak berafiliasi secara kelembagaan   dengan partai politik yang ditandatangani oleh ketua dan sekretaris</a></td>
                  </tr>
                  @if ($hibah->lampiran18)
                  <tr>
                    <th>18</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran18) }}" target="_blank"> Surat  pernyataan bahwa nama, lambang, bendera, tanda gamba, simbol, atribut, dan cap stempel yang digunakan belum menjadi hak paten dan/atau hak cipta pihak dan serta  bukan  merupakan  milik  pemerintah,  yang  ditandatangani  oleh  ketua  dan sekretaris.</a></td>
                  </tr> 
                  @endif
                  @if ($hibah->lampiran19)
                  <tr>
                    <th>19</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran19) }}" target="_blank"> Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang keagamaan</a></td>
                  </tr>
                  @endif
                  @if ($hibah->lampiran20)
                  <tr>
                    <th>20</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran20) }}" target="_blank"> Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang kepercayaan kepada tuhan yang maha esa</a></td>
                  </tr>
                  @endif
                  @if ($hibah->lampiran21)
                  <tr>
                    <th>21</th>
                    <td><a href="{{ \Illuminate\Support\Facades\Storage::url($hibah->lampiran21) }}" target="_blank"> Surat  persetujuan kesediaan atau persetujuan dari pejabat negara, pejabat pemerintah dan atau tokohnya masyarakat yang bersangkutan, yang namanya dicantumkan kepengurusan ormas</a></td>
                  </tr>
                  @endif
                </tbody>
            </table>
            <form method="POST" onsubmit="return confirm('Yakin hapus data ini?')" action="/user/permohonan_skt/destroy/{{ $hibah->id }}">
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