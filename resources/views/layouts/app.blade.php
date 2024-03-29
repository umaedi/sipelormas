<!doctype html>
<html class="no-js" lang="zxx">
   
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>SIPELORMAS | Sistem Pelaporan Organisasi Kemasyarakatan</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="Sistem Pelaporan Organisasi Kemasyarakatan">
      <meta name="keywords" content="Kesbangpol, Tulang Bawang, Sistem Pelaporan Organisasi Kemasyarakatan"/>
      <meta property="og:url" content="https://siperlormas.tulangbawangkab.go.id/"/>
      <meta property="og:title" content="Sistem Pelaporan Organisasi Kemasyarakatan"/>
      <meta property="og:description" content="Sistem Pelaporan Organisasi Kemasyarakatan" />
      <meta property="og:image" content="{{ asset('img/thumbnail.jpg') }}"/>
      <meta property="og:image:url" content="{{ asset('img/thumbnail.jpg') }}"/>
      <meta property="twitter:image" content="{{ asset('img/thumbnail.jpg') }}"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img') }}/favicon.png">
      <!-- CSS here -->
      <link href="{{ asset('css') }}/bootstrap.min.css" rel="stylesheet">
      <link href="{{ asset('css') }}/offcanvas.css" rel="stylesheet">
</head>
<body class="bg-light">
   @include('layouts._navbar')
   <img data-src="{{ asset('img') }}/hero/kesbangpol-min.png" class="img-fluid lazyload" alt="Responsive image">
   @yield('content')
   @include('layouts._footer')

   <!-- Modal Disclaimer-->
    <div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-labelledby="disclaimerTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="disclaimerTitle">Disclaimer</h5>
          </div>
          <div class="modal-body">
            <p>Aplikasi ini bukan untuk pendaftaran pendirian badan hukum perkumpulan masyarakat, melainkan sebagai pendataan keberadaan ORMAS yang berdomisili di Kabupaten Tulang Bawang</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

   <!-- Modal Tentang Kami-->
    <div class="modal fade" id="tentangKami" tabindex="-1" role="dialog" aria-labelledby="tentangKamiTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tentangKamiTitle">Tentang Kami</h5>
          </div>
          <div class="modal-body">
            <p><span class="fw-bold">Dalam konklusi atau pemikiran</span><br>

              Senjata adalah badan, pelor adalah pemikiran, pelatuk adalah hati. 
              Ketika pelor sudah meluncur maka halangan akan diterjang seakan tanpa beban menuju sebuah titik sasaran.<br><br> 
              
              Pelormas disini memiliki makna pemikiran kita akan kekuatan manusia untuk mengubah dunia melalui pengembangan diri, pemikiran kreatif, emosi positif, dan niat yg baik menjadi panggilan untuk menggunakan kemampuan secara bijaksana dan terarah, bertanggung jawab untuk mencapai tujuan yang baik dan lebih tepat sasaran. Sehingga pendataan keberadaan ormas dapat ter tata dengan rapi dan tertib.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

<script src="{{ asset('js') }}/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js') }}/bootstrap.min.js"></script>
<script src="{{ asset('js') }}/offcanvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
@stack('js')
</body>
</html>