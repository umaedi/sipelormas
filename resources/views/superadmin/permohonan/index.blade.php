@extends('layouts.superadmin')
@section('content')
    <!-- App Header -->
    <div class="appHeader">
    <div class="left">
        <a href="/super_admin/dashboard" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
       List Permohonan
    </div>
    <div class="right">
        <a href="app-notifications.html" class="headerButton">
            <ion-icon class="icon" name="notifications-outline"></ion-icon>
            <span class="badge badge-danger" id="notif"></span>
        </a>
        <a href="/super_admin/profile" class="headerButton">
            <img src="{{ asset('img') }}/saut.png" alt="image" class="imaged w32">
        </a>
    </div>
</div>
<!-- * App Header -->

<!-- App Capsule -->
<div id="appCapsule">
    <!-- Transactions -->
    <div class="section mt-2">
        <div class="section-title">List Permohonan</div>
        <div class="transactions" id="dataTable">
            <!-- item -->
            <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Tunggu sebentar yah...
            </button>
            <!-- * item -->
        </div>
    </div>
</div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(async function loadTable() {
            var param = {
                url: '{{ url()->current() }}',
                method: 'GET',
                data: {
                    load: 'table'
                }
            }
            
            await transAjax(param).then((result) => {
                $('#dataTable').html(result);
            });
        });
    </script>
@endpush