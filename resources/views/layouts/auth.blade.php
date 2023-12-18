<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SIPELORMAS | Sistem Pelaporan Organisasi Kemasyarakatan</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/main.css">
  <link rel="stylesheet" href="{{ asset('css') }}/components.css">
</head>

<body>
  <div id="app">
    @yield('content')
  </div>
  <script src="{{ asset('js') }}/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    function loading()
    { 
      $('#btn_submit').addClass('d-none');
      $('#btn_loading').removeClass('d-none');
    }
  </script>
  @stack('js')
</body>
</html>
