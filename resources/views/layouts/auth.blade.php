<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>SIPERLORMAS | Sistem Informasi Pelaporan Ormas</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('css') }}/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('css') }}/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css') }}/page-auth.css" />
  </head>

  <body>
    <!-- Content -->
    @yield('content')
  </body>
  <script src="{{ asset('js') }}/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
      function loading(btn_submit, btn_loading)
      {
        $('#'+btn_submit).addClass('d-none');
        $('#'+btn_loading).show();
      }
  </script>
</html>
