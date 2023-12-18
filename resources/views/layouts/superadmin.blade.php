<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#6236FF">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="TTE, Tanda Tangan Elekronik, Kabupaten Tulang Bawang" />
    <link rel="icon" type="image/png" href="{{ asset('superadmin') }}/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('superadmin') }}/img/icon/192x192.png">
    <link rel="stylesheet" href="{{ asset('superadmin') }}/css/style.css">
    {{-- <link rel="manifest" href="__manifest.json"> --}}
</head>
<body>
@yield('content')
@include('layouts.action_buttom')
<!-- ========= JS Files =========  -->
<!-- Bootstrap -->
<script src="{{ asset('superadmin') }}/js/lib/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js') }}/jquery-3.3.1.min.js"></script>
<!-- Ionicons -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="https://kit.fontawesome.com/0ccb04165b.js" crossorigin="anonymous"></script>
<!-- Splide -->
<script src="{{ asset('superadmin') }}/js/plugins/splide/splide.min.js"></script>
{{-- <script src="{{ asset('superadmin/js/toast.js') }}"></script> --}}
<script type="text/javascript">
    async function transAjax(data) {
    html = null;
    data.headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
    await $.ajax(data).done(function(res) {
        html = res;
    })
        .fail(function() {
            return false;
        })
    return html
}
    function initToast(title, message, status, time) {
        $.toast({
            type: status,
            title: title,
            subtitle: time,
            content: message,
            delay: 5000,
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(async function getNotif() {
        var param = {
            url: '/super_admin/notification',
            method: 'GET',
            data: {
                load: 'notif'
            }
        }

        await transAjax(param).then((result) => {
            $('#notif').html(result.data);
        });
    });
</script>
@stack('js')

</body>
</html>