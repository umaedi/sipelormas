@extends('layouts.main')
@section('content')
<div class="main-wrapper">
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col">
              <div class="alert alert-primary" role="alert">
                <h4 class="alert-heading">Selamat datang {{ $nama[0] }}👋</h4>
                <p>Ini adalah dashboard dimana Anda bisa mengajukan permohonan SKT dan dana HIBAH. Semoga hari Anda menyenangkan😊</p>
              </div>
              @if (session('msg_ditolak'))
              <div class="alert alert-warning">{{ session('msg_ditolak') }}</div>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-user fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/user/profile" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Data diri') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $nama[0] }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-user-clock fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/user/permohonan_skt" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan SKT') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $permohonan_skt }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                      <i class="fa fa-heart fa-2x" style="color: #fff"s></i>
                    </div>
                    <a href="/user/hibah" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Dana hibah') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">#</div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                    <h4>Riwayat Pencairan Dana Hibah</h4>
                </div>
                <div class="card-body table-responsive" id="dataTableUser">
                  <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Mohon tunggu sebentar...
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    var page = 1;
    $(document).ready(function() {
        loadPemohon();
        loadPermohonan();
    });

    async function loadPemohon() {
        var param = {
          url: '/admin/users',
          method: 'GET',
          data: {
            load: 'table',
            page: page,
          },
        }

        await transAjax(param).then((ress) => {
          $('#dataTableUser').html(ress);
        }).cath((err) => {
          $('#dataTableUser').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`);
        });
    }



    async function loadPermohonan() {
      var param = {
          url: '/admin/permohonan',
          method: 'GET',
          data: {
            load: 'table',
            page: page,
          },
        }

        await transAjax(param).then((ress) => {
          $('#dataTablePermohonan').html(ress);
        }).catch((err) => {
          $('#dataTablePermohonan').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
        });
    }
</script>
@endpush