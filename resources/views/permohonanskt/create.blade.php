@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permohonan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Permohonan</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="alert alert-warning" role="alert">
              <h4 class="alert-heading">Penting!</h4>
              <ol>
                <li>Lampiran 1-17 wajib diisi (18-21 opsional)</li>
                <li>Sesuaikan format lampiran dengan format yang diminta (PDF, PNG, JPEG, JPG)</li>
                <li>Maksimal ukuran file 2 MB</li>
                <li>Pastikan jaringan atau sinyal memadai</li>
              </ol>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Formulir Permohonan SKT/ORMAS</h4>
            </div>
            <div class="card-body">
                <form id="form_skt">
                  @csrf
                    <div class="form-group">
                      <label for="lampiran1">Surat Permohonan SKT yang ditandatangani pendiri dan pengurus ormas</label>
                      <input type="file" class="file-input form-control @error('lampiran1') is-invalid @enderror" id="lampiran1" name="lampiran1">
                      @error('lampiran1')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran2">Salinan/ fotocopy Akte Pendirian ormas (dari Notaris) yang membuat anggaran dasar
                        (AD)  atau Anggaran dasar dan Anggaran rumah Tangga (ART)</label>
                      <input type="file" class="file-input form-control @error('lampiran2') is-invalid @enderror" id="lampiran2" name="lampiran2">
                      @error('lampiran2')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran3"> Anggaran dasar (AD) Anggaran rumah tangga (ART) (memuat   paling sedikit nama dan lambang, tempat kedudukan, asas dan tujuan, dan fungsi, kepengurusan, hak dan kewajiban anggota, pengelolaan keuangan, mekanisme penyelsaian sengketa, dan pengawasan internal, dan pembubaran organisasi).</label>
                      <input type="file" class="file-input form-control @error('lampiran3') is-invalid @enderror" id="lampiran3" name="lampiran3">
                      @error('lampiran3')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran4">Lampiran yang berisi tentang Pengesahan Pendirian Badan Hukum dari Kemenkumham/Kemendagri (pastikan bagian qrcode jelas dan tidak terpotong)</label>
                      <input type="file" class="file-input form-control @error('lampiran4') is-invalid @enderror" id="lampiran4" name="lampiran4">
                      @error('lampiran4')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran5">Program Kerja</label>
                      <input type="file" class="file-input form-control @error('lampiran4') is-invalid @enderror" id="lampiran5" name="lampiran5">
                      @error('lampiran5')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran6">Susunan pengurus yang dibuktikan dengan surat keputusan tentang susunan pengurus Ormas secara lengkap yang sah sesuai dengan AD/ART ormas yang memuat paling sedikit ketua sekretaris dan bendahara atau sebutan lain dan pengurus dan anggota kesemuannya berkewarganegaraan tanpa  terkecuali;</label>
                      <input type="file" class="file-input form-control @error('lampiran6') is-invalid @enderror" id="lampiran1" name="lampiran6">
                      @error('lampiran6')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran7">Biodata pengurus organisasi (Ketua, Sekretaris, dan Bendahara atau sebutan lainnya)</label>
                      <input type="file" class="file-input form-control @error('lampiran7') is-invalid @enderror" id="lampiran1" name="lampiran7">
                      @error('lampiran7')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran8">Pas foto pengurus organisasi berwarna  ukuran 4 x 6 terbaru  dalam tiga bulan terakhir
                        ( ketua, sekretaris, bendahara atau sebutan lainnya, format jpeg, jpg, png, maksimal 2MB) </label>
                      <input type="file" class="file-input form-control @error('lampiran8') is-invalid @enderror" id="lampiran1" name="lampiran8">
                      @error('lampiran8')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran9">Foto copy kartu  tanda  penduduk  elektronik  pengurus  orgtanisasi (ketua, sekretaris, dan bendahara,  dan lainnya.)</label>
                      <input type="file" class="file-input form-control @error('lampiran9') is-invalid @enderror" id="lampiran1" name="lampiran9">
                      @error('lampiran9')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran10"> Nomor wajib pajak atas nama ormas</label>
                      <input type="file" class="file-input form-control @error('lampiran10') is-invalid @enderror" id="lampiran1" name="lampiran10">
                      @error('lampiran10')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran11">Surat   keterangan   domisili   sekretariat   yang   diterbitkan   oleh   lurah/kepala   desa setempat atau sebutan lainnya.</label>
                      <input type="file" class="file-input form-control @error('lampiran11') is-invalid @enderror" id="lampiran1" name="lampiran11">
                      @error('lampiran11')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran12">Bukti kepemilikan, atau surat perjanjian kontrak atau ijin pemilik/pengelola</label>
                      <input type="file" class="file-input form-control @error('lampiran12') is-invalid @enderror" id="lampiran1" name="lampiran12">
                      @error('lampiran12')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran13">Foto kantor atau sekretariat ormas, tampak depan yang memuat papan nama, format jpeg, jpg, png, maksimal 2MB</label>
                      <input type="file" class="file-input form-control @error('lampiran13') is-invalid @enderror" id="lampiran1" name="lampiran13">
                      @error('lampiran13')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran14"> Surat pernyataan tidak dalam sengketa kepengurusan atau tidak perkara di pengadilan</label>
                      <input type="file" class="file-input form-control @error('lampiran14') is-invalid @enderror" id="lampiran1" name="lampiran14">
                      @error('lampiran14')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran15"> Surat pernyataan kesanggupan melaporkan kegiatan</label>
                      <input type="file" class="file-input form-control @error('lampiran15') is-invalid @enderror" id="lampiran1" name="lampiran15">
                      @error('lampiran15')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran16">Formulir isian data ormas</label>
                      <input type="file" class="file-input form-control @error('lampiran16') is-invalid @enderror" id="lampiran1" name="lampiran16">
                      @error('lampiran16')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran17"> Surat pernyataan bahwa tidak berafiliasi secara kelembagaan   dengan partai politik yang ditandatangani oleh ketua dan sekretaris</label>
                      <input type="file" class="file-input form-control @error('lampiran17') is-invalid @enderror" id="lampiran1" name="lampiran17">
                      @error('lampiran17')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran18">Surat  pernyataan bahwa nama, lambang, bendera, tanda gamba, simbol, atribut, dan cap stempel yang digunakan belum menjadi hak paten dan/atau hak cipta pihak dan serta  bukan  merupakan  milik  pemerintah,  yang  ditandatangani  oleh  ketua  dan sekretaris.</label>
                      <input type="file" class="file-input form-control @error('lampiran18') is-invalid @enderror" id="lampiran1" name="lampiran18">
                      @error('lampiran18')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran19">Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang keagamaan</label>
                      <input type="file" class="file-input form-control @error('lampiran19') is-invalid @enderror" id="lampiran1" name="lampiran19">
                      @error('lampiran19')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran20">Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang kepercayaan kepada tuhan yang maha esa</label>
                      <input type="file" class="file-input form-control @error('lampiran20') is-invalid @enderror" id="lampiran1" name="lampiran20">
                      @error('lampiran20')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="lampiran21">Surat  persetujuan kesediaan atau persetujuan dari pejabat negara, pejabat pemerintah dan atau tokohnya masyarakat yang bersangkutan, yang namanya dicantumkan kepengurusan ormas</label>
                      <input type="file" class="file-input form-control @error('lampiran21') is-invalid @enderror" id="lampiran1" name="lampiran21">
                      @error('lampiran21')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    @include('layouts._loading')
                    <button id="btn_submit" type="submit" class="btn btn-primary">KIRIM PERMOHONAN</button>
                </form>
            </div>
            </div>
          </div>
          </div>
      </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
<script src="{{ asset('js') }}/sweetalert.min.js"></script>
<script type="text/javascript">
$('#form_skt').submit(async function uploadFile(e) {
    e.preventDefault();
    
    var form = $(this)[0];
    var data = new FormData(form);

    var param = {
        url: '/user/permohonan_skt/store',
        method: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
    }

    loading(true);
    await transAjax(param).then((result) => {
      loading(false);
      swal({text: result.data, icon: 'success', timer: 3000,}).then(() => {
          window.location.href = '/user/dashboard';
      });
    }).catch((error) => {
        loading(false);
        swal({text: error.responseJSON.message, icon: 'warning', timer: 5000,});
    });

    function loading(state) {
        if(state) {
            $('#btn_submit').addClass('d-none');
            $('#btn_loading').removeClass('d-none');
        }else {
            $('#btn_submit').removeClass('d-none');
            $('#btn_loading').addClass('d-none');
        }
    }
});

</script>
@endpush