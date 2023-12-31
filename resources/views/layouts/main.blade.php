<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title ?? "SIPELORMAS" }}</title>
  <meta name="theme-color" content="#2691DB"/>
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
  <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.4.3.1.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/main.css">
  <link rel="stylesheet" href="{{ asset('css') }}/components.css">
  @stack('css')
</head>
<body>
  <div id="app">
    <div class="main-wrapper container">
      @include('layouts.navbar')
      @yield('content')
      @include('layouts.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
  <script src="{{ asset('js') }}/sweetalert.min.js"></script>
<script type="text/javascript">
async function transAjax(data) {
    html = null;
    data.headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    await $.ajax(data).done(function(res) {
        html = res;
    })
        .fail(function() {
            return false;
        })
    return html
}

  function loading(id_btn, id_loading)
  { 
    $('#'+id_btn).addClass('d-none');
    $('#'+id_loading).removeClass('d-none');
  }
</script>
@stack('js')
</body>
</html>
