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
                <h4 class="alert-heading">Selamat datang {{ auth()->user()->nama }}👋</h4>
                <p>Ini adalah dashboard dimana Anda bisa mengelola semua permohonan SKT dan dana HIBAH yang diajukan melalui sistem SIPELORMAS. <br> Semoga hari Anda menyenangkan😊</p>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-6 col-md-4 col-sm-6 col-12">
              <div class="alert alert-warning">Permohonan Surat Keterangan Terdaftar (SKT)</div>
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-user fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan perlu diproses') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $permohonan }}</div>
                    </div>
                    </a>
                </div>
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-info">
                        <i class="fa fa-user-clock fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan/diproses" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan sedang diproses') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $permohonan_diproses }}</div>
                    </div>
                    </a>
                </div>
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-success">
                        <i class="fa fa-user-check fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan/diterima" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan diterima') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $permohonan_diterima }}</div>
                    </div>
                    </a>
                </div>
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-user-slash fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan/ditolak" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Permohonan ditolak') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $permohonan_ditolak }}</div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-6 col-12">
              <div class="alert alert-warning">Pengajuan dana hibah</div>
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-user fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/hibah" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Pengajuan perlu diproses') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $hibah }}</div>
                    </div>
                    </a>
                </div>
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-info">
                        <i class="fa fa-user-clock fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/hibah/diproses" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Pengajuan sedang diproses') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $hibah_diproses }}</div>
                    </div>
                    </a>
                </div>
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-success">
                        <i class="fa fa-user-check fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan/diterima" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Pengajuan diterima') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $hibah_diterima }}</div>
                    </div>
                    </a>
                </div>
                <div class="card card-statistic-1 mb-3">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-user-slash fa-2x" style="color: #fff"></i>
                    </div>
                    <a href="/admin/permohonan/ditolak" style="text-decoration: none">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ __('Pengajuan ditolak') }}</h4>
                        </div>
                        <div class="card-body text-uppercase">{{ $hibah_ditolak }}</div>
                    </div>
                    </a>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                    <h4>Permohonan SKT Perlu Diproses</h4>
                </div>
                <div class="card-body table-responsive" id="dataTableUser">
                  <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Mohon tunggu sebentar...
                  </button>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                    <h4>Pengajuan Perlu Diproses</h4>
                </div>
                <div class="card-body table-responsive" id="dataTablePermohonan">
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
          url: '/admin/hibah',
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