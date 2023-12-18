@extends('layouts.superadmin')
@section('content')
    
    <!-- loader -->
    {{-- <div id="loader">
        <img src="{{ asset('superadmin') }}/img/logo-icon.png" alt="icon" class="loading-icon">
    </div> --}}
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="right">
            <a href="/super_admin/permohonan/waiting_sign" class="headerButton">
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

        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Anda login sebagai:</span>
                        <h1 class="total">{{ auth()->user()->nama }}</h1>
                    </div>
                    <div class="right">
                        <span class="title">{{ \Carbon\Carbon::now()->format('d/m/Y') }} </span><h4><span class="clock">Loading...</span></h4>
                    </div>
                </div>
                <!-- * Balance -->
            </div>
        </div>
        <!-- Wallet Card -->

        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                <a href="/super_admin/permohonan">
                    <div class="stat-box">
                        <div class="title">Permohonan</div>
                        <div class="value text-warning">{{ $permohonan }}</div>
                    </div>
                </a>
                </div>
                <div class="col-6">
                <a href="/super_admin/permohonan/waiting_sign">
                    <div class="stat-box">
                        <div class="title">Menunggu TTE</div>
                        <div class="value text-danger">{{ $waiting_sign }}</div>
                    </div>
                </a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-6">
                <a href="/super_admin/permohonan/signed">
                    <div class="stat-box">
                        <div class="title">Diterima</div>
                        <div class="value text-success">{{ $signed }}</div>
                    </div>
                </a>
                </div>
                <div class="col-6">
                <a href="/super_admin/permohonan/rejected">
                    <div class="stat-box">
                        <div class="title">Ditolak</div>
                        <div class="value">{{ $sign_rejected }}</div>
                    </div>
                </a>
                </div>
            </div>
        </div>
        <!-- * Stats -->

        <!-- Transactions -->
        <div class="section my-4">
            <div class="section-heading">
                <h3 class="title">Menunggu TTE</h3>
                <a href="/super_admin/permohonan/waiting_sign" class="link">Lihat semua</a>
            </div>
            <div class="transactions" id="dataTable">
                <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Tunggu sebentar yah...
                </button>
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

    jQuery(function($) {
        setInterval(function() {
            var date = new Date(),
                time = date.toLocaleTimeString();
            $(".clock").html(time);
        }, 1000);
    });
    </script>
@endpush