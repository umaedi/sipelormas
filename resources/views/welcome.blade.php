@extends('layouts.app')
@section('content')
<main role="main" class="container">
  <div class="d-flex align-items-center p-3 mt-3 text-white-50 bg-primary rounded box-shadow">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100 mb-3">Sistem Pelaporan Organisasi Kemasyarakatan</h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="border-bottom border-gray pb-2 mb-3">
          <h6 class="">Persyaratan SKT/ORMAS</h6>
          <p class="text-small text-muted">Sesuai Undang-Undang No. 17 Tahun 2013 dan PP No. 58 tahun 2016 tentang pelaksanaan UU No.17 Tahun 2013, serta Permendagri No. 57 Tahun 2017 dan PERBUB No 66 Tahun 2011, Permendagri NO 77 Tahun 2020, PERBUB NO 38 Tahun 2020</p>
        </div>
        <div id="accordion">
           <div class="card mb-3">
             <div class="card-header" id="lampiran_1">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran1" aria-expanded="false" aria-controls="lampiran1">
                  Lampiran 1 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran1" class="collapse show" aria-labelledby="lampiran_1" data-parent="#accordion">
               <div class="card-body">
                Surat Permohonan SKT yang ditandatangani pendiri dan pengurus ORMAS
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_2">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran2" aria-expanded="false" aria-controls="lampiran2">
                  Lampiran 2 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran2" class="collapse" aria-labelledby="lampiran_2" data-parent="#accordion">
               <div class="card-body">
                Salinan/ fotocopy Akte Pendirian ormas (dari Notaris) yang membuat anggaran dasar
                (AD)  atau Anggaran dasar dan Anggaran rumah Tangga (ART)
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_3">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran3" aria-expanded="false" aria-controls="lampiran3">
                  Lampiran 3 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran3" class="collapse" aria-labelledby="lampiran_3" data-parent="#accordion">
               <div class="card-body">
                Anggaran dasar (AD) Anggaran rumah tangga (ART) (memuat   paling sedikit nama dan lambang, tempat kedudukan, asas dan tujuan, dan fungsi, kepengurusan, hak dan kewajiban anggota, pengelolaan keuangan, mekanisme penyelsaian sengketa, dan pengawasan internal, dan pembubaran organisasi).
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_4">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran4" aria-expanded="false" aria-controls="lampiran4">
                  Lampiran 4 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran4" class="collapse" aria-labelledby="lampiran_4" data-parent="#accordion">
               <div class="card-body">
                {{-- Cek dan scan Kemenkumham / Kemendagri --}}
                Lampiran yang berisi tentang Pengesahan Pendirian Badan Hukum dari Kemenkumham/Kemendagri (pastikan bagian qrcode jelas dan tidak terpotong)
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_5">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran5" aria-expanded="false" aria-controls="lampiran5">
                  Lampiran 5 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran5" class="collapse" aria-labelledby="lampiran_5" data-parent="#accordion">
               <div class="card-body">
                Program Kerja
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_6">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran6" aria-expanded="false" aria-controls="lampiran6">
                  Lampiran 6 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran6" class="collapse" aria-labelledby="lampiran_6" data-parent="#accordion">
               <div class="card-body">
                Susunan pengurus yang dibuktikan dengan surat keputusan tentang susunan pengurus ORMAS secara lengkap yang sah sesuai dengan AD/ART ORMAS yang memuat paling sedikit ketua sekretaris dan bendahara atau sebutan lain dan pengurus dan anggota kesemuannya berkewarganegaraan tanpa  terkecuali;
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_7">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran7" aria-expanded="false" aria-controls="lampiran7">
                  Lampiran 7 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran7" class="collapse" aria-labelledby="lampiran_7" data-parent="#accordion">
               <div class="card-body">
                Biodata pengurus organisasi (Ketua, Sekretaris, dan Bendahara atau sebutan lainnya)
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_8">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran8" aria-expanded="false" aria-controls="lampiran8">
                  Lampiran 8 (wajib diisi, format jpeg, jpg, png, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran8" class="collapse" aria-labelledby="lampiran_8" data-parent="#accordion">
               <div class="card-body">
                Pas foto pengurus organisasi berwarna  ukuran 4 x 6 terbaru  dalam tiga bulan terakhir
                ( ketua, sekretaris, bendahara atau sebutan lainnya);
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_9">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran9" aria-expanded="false" aria-controls="lampiran9">
                  Lampiran 9 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran9" class="collapse" aria-labelledby="lampiran_9" data-parent="#accordion">
               <div class="card-body">
                Foto copy kartu  tanda  penduduk  elektronik  pengurus  organisasi (ketua, sekretaris, dan bendahara,  dan lainnya.)
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_10">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran10" aria-expanded="false" aria-controls="lampiran10">
                  Lampiran 10 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran10" class="collapse" aria-labelledby="lampiran_10" data-parent="#accordion">
               <div class="card-body">
                Nomor wajib pajak atas nama ORMAS
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_11">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran11" aria-expanded="false" aria-controls="lampiran11">
                  Lampiran 11 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran11" class="collapse" aria-labelledby="lampiran_11" data-parent="#accordion">
               <div class="card-body">
                Surat   keterangan   domisili   sekretariat   yang   diterbitkan   oleh   lurah/kepala   desa setempat atau sebutan lainnya.
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_12">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran12" aria-expanded="false" aria-controls="lampiran12">
                  Lampiran 12 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran12" class="collapse" aria-labelledby="lampiran_12" data-parent="#accordion">
               <div class="card-body">
                Bukti kepemilikan, atau surat perjanjian kontrak atau izin pemilik/pengelola
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_13">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran13" aria-expanded="false" aria-controls="lampiran13">
                  Lampiran 13 (wajib diisi, format jpeg, jpg, png, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran13" class="collapse" aria-labelledby="lampiran_13" data-parent="#accordion">
               <div class="card-body">
                Foto kantor atau sekretariat ormas, tampak depan yang memuat papan nama
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_14">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran14" aria-expanded="false" aria-controls="lampiran14">
                  Lampiran 14 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran14" class="collapse" aria-labelledby="lampiran_14" data-parent="#accordion">
               <div class="card-body">
                Surat pernyataan tidak dalam sengketa kepengurusan atau tidak perkara di pengadilan
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_15">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran15" aria-expanded="false" aria-controls="lampiran15">
                  Lampiran 15 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran15" class="collapse" aria-labelledby="lampiran_15" data-parent="#accordion">
               <div class="card-body">
                Surat pernyataan kesanggupan melaporkan kegiatan
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_16">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran16" aria-expanded="false" aria-controls="lampiran16">
                  Lampiran 16 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran16" class="collapse" aria-labelledby="lampiran_16" data-parent="#accordion">
               <div class="card-body">
                Formulir isian data ORMAS
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_17">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran17" aria-expanded="false" aria-controls="lampiran17">
                  Lampiran 17 (wajib diisi, format pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran17" class="collapse" aria-labelledby="lampiran_17" data-parent="#accordion">
               <div class="card-body">
                Surat pernyataan bahwa tidak berafiliasi secara kelembagaan   dengan partai politik yang ditandatangani oleh ketua dan sekretaris
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_18">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran18" aria-expanded="false" aria-controls="lampiran18">
                  Lampiran 18 (Opsional, fomat pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran18" class="collapse" aria-labelledby="lampiran_18" data-parent="#accordion">
               <div class="card-body">
                Surat  pernyataan bahwa nama, lambang, bendera, tanda gamba, simbol, atribut, dan cap stempel yang digunakan belum menjadi hak paten dan/atau hak cipta pihak dan serta  bukan  merupakan  milik  pemerintah,  yang  ditandatangani  oleh  ketua  dan sekretaris.
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_19">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran19" aria-expanded="false" aria-controls="lampiran19">
                  Lampiran 19 (Opsional, fomat pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran19" class="collapse" aria-labelledby="lampiran_19" data-parent="#accordion">
               <div class="card-body">
                Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang keagamaan
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_20">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran20" aria-expanded="false" aria-controls="lampiran20">
                  Lampiran 20 (Opsional, fomat pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran20" class="collapse" aria-labelledby="lampiran_20" data-parent="#accordion">
               <div class="card-body">
                Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ORMAS  yang memiliki khusus bidang kepercayaan kepada tuhan yang maha esa
               </div>
             </div>
           </div>
           <div class="card mb-3">
             <div class="card-header" id="lampiran_21">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lampiran21" aria-expanded="false" aria-controls="lampiran21">
                  Lampiran 21 (Opsional, fomat pdf, maksimal 2MB)
                 </button>
               </h5>
             </div>
             <div id="lampiran21" class="collapse" aria-labelledby="lampiran_21" data-parent="#accordion">
               <div class="card-body">
                Surat  persetujuan kesediaan atau persetujuan dari pejabat negara, pejabat pemerintah dan atau tokohnya masyarakat yang bersangkutan, yang namanya dicantumkan kepengurusan ormas
               </div>
             </div>
           </div>
         </div>
      </div>
    </div>

  <div class="col-md-4">
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6>ALUR PERMOHONAN</h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">1. Pemohon melakukan pembuatan akun</li>
          <li class="list-group-item">2. Pemohon mengajukan permohonan</li>
          <li class="list-group-item">3. Permohonan diverifikasi oleh admin</li>
          <li class="list-group-item">4. Permohonan dikonfirmasi</li>
          <li class="list-group-item">5. SKT diterbitkan</li>
        </ul>
    </div>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6>LAMPIRAN LAINNYA</h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">1. <a href="{{ asset('dokumen/formulir_isian_data_ormas.docx') }}">Formulir Isian Data Ormas</a></li>
          <li class="list-group-item">2. <a href="{{ asset('dokumen/surat_pernyataan.docx') }}">Surat Pernyataan</a></li>
        </ul>
    </div>
    <a href="/register" class="btn btn-primary">BUAT AKUN</a>
    <a href="/login" class="btn btn-primary">LOGIN</a>
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6>KONTAK KAMI</h6>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Alya Zhara: <span class="font-weight-bold"><a href="https://api.whatsapp.com/send?phone=6281532337623" target="_blank">081532337623</a></span></li>
        </ul>
    </div>
      <div class="my-3 p-3 bg-white rounded box-shadow text-center">
        <h6>CEK DOKUMEN</h6>
        <img src="{{ asset('img/qrcode.png') }}" alt="">
        <button class="btn btn-primary btn-block" id="scanQR" aria-label="Scan QRCode">SCAN DOKUMEN</button>
      </div>
      <div class="my-3 p-3 bg-white rounded box-shadow text-center">
        <h6>CEK NO SKT</h6>
          <input type="text" id="no_skt" class="form-control mb-3" name="no_skt" required>
          <button id="btn_cek" class="btn btn-primary btn-block">CEK SKT</button>
          <button id="btn_loading" class="btn btn-primary" style="display: none" type="button" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
          </button>
      </div>
    </div>

  <!-- Modal -->
<div class="modal fade" id="modal-full-width" tabindex="-1" role="dialog" aria-labelledby="modal-full-widthTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">SCAN DOKUMEN</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="modal-body text-center">
          <p>Arahkan qrcode pada kamera</p>
          <canvas class="w-50" id="qr-canvas"></canvas>
          <span id="outputData"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary me-auto" id="reScan">Scan Ulang</button>
        <a href="#" class="btn btn-primary" id="openLink" style="display: none">Kunjungi Link</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="sktModal" tabindex="-1" role="dialog" aria-labelledby="sktModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sktModalLabel">Status SKT</h5>
      </div>
      <div class="modal-body" id="response">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
</main>
@endsection
@push('js')
<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
    <script type="text/javascript">
        // const qrcode = window.qrcode;
        const video = document.createElement("video");
        const canvasElement = document.getElementById("qr-canvas");
        const canvas = canvasElement.getContext("2d");

        let scanning = false;
        qrcode.callback = (res) => {
            if (res) {
                scanning = false;
                $('#openLink').prop('href', res);
                $('#openLink').show()

                video.srcObject.getTracks().forEach(track => {
                  track.stop();
                });
              }
            };

            $(document).ready(function() {
            $('#modal-full-width').on('hide.bs.modal', function () {
                scanning = false;
                video.srcObject.getTracks().forEach(track => {
                    track.stop();
                });
            })
            $('#reScan').click(function () {
                startCamera()
                $('#openLink').hide()
            })
            $('#scanQR').click(function () {
                startCamera()
            })
        });

        function startCamera() {
        $('#modal-full-width').modal('show')
        navigator.mediaDevices
            .getUserMedia({ video: { facingMode: "environment" } })
            .then(function(stream) {
                scanning = true;
                $('#qr-canvas').show()
                video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
                video.srcObject = stream;
                video.play();
                tick();
                scan();
          });
        }

        function tick() {
        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);

        scanning && requestAnimationFrame(tick);
        }

        function scan() {
            try {
                qrcode.decode();
            } catch (e) {
                setTimeout(scan, 300);
            }
        }

        //cek no surat
        $('#btn_cek').click(function(){
          var no_skt = $('#no_skt').val();
          $('#btn_cek').hide();
          $('#btn_loading').show();
          $.ajax({
                type: 'GET',
                url: '/user/cek_no_skt/'+ no_skt,
                dataType: 'json',
                success: function(data) {
                  $('#btn_loading').hide();
                  $('#btn_cek').show();
                  if (data.metadata) {
                    var html = 
                    `
                    <div class="form-group mb-2">
                      <label for="">No SKT</label>
                      <input type="text" value="${data.metadata.no_skt}" class="form-control" disabled>
                    </div>
                    <div class="form-group mb-2">
                      <label for="">Status</label>
                      <textarea type="text" rows="3" class="form-control" disabled>${data.metadata.pesan}</textarea>
                    </div>
                    <div class="form-group mb-2">
                      <label for="">Lampiran SKT</label>
                      <a href="{{ \Illuminate\Support\Facades\Storage::url('${data.metadata.skt}') }}" class="form-control btn btn-primary">Lihat lampiran</a>
                    </div>
                    `;
                    $('#response').html(html);
                    $('#sktModal').modal('show');
                  }
                },
                error: function(xhr, textStatus, errorThrown) {
                  $('#btn_loading').hide();
                  $('#btn_cek').show();
                  var html = 
                    `
                    <picture>
                      <source srcset="{{ asset('img/not_found.jpg') }}" type="image/svg+xml">
                      <img src="{{ asset('img/not_found.jpg') }}" class="img-fluid img-thumbnail" alt="...">
                    </picture>
                    <div class=text-center>Mohon maaf no SKT yang Anda masukan tidak ditemukan di database kami</div>
                    `;
                  $('#response').html(html);
                  $('#sktModal').modal('show');
                }
            });
        });
    </script>
@endpush