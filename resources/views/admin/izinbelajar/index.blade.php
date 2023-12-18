@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permohonan Izin Belajar</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item">Permohonan</div>
        </div>
      </div>
      @if (session('msg_success'))
      <div class="alert alert-success">{{ session('msg_success') }}</div>
      @endif
      <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" id="search" name="q" class="form-control" placeholder="Cari berdasarkan nama...">
                </div>
                <div class="col-md-2">
                    <select id="page" class="form-control" name="page">
                        <option value="">--Perpage--</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
          <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-3">
              <div class="card">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <button id="loading" class="btn btn-primary btn-block btn-lg" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Mohon tunggu sebentar...
                </button>
                <div class="card-body table-responsive" id="dataTable">
                    
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@endsection
@push('js')
    <script type="text/javascript">
        var page = 1;
        var search = '';
        var pagination = 10;
        $(document).ready(function() {
            loadData();

            $('#search').on('keypress', function(e) {
                if(e.which == 13) {
                    filterTable();
                }
            });

            $('#page').on('change', () => {
                filterTable();
            });
        });

        function filterTable()
        {
            pagination = $('#page').val();
            search     = $('#search').val();
            loadData();
        }

        async function loadData() {
            var param = {
                method: 'GET',
                url: '{{ url()->current() }}',
                data: {
                    load: 'table',
                    index: '{{ request('index') }}',
                    page: page,
                    pagination: pagination,
                    q: search,
                }
            }
            loading(true);
            await transAjax(param).then((result) => {
                loading(false);
                $('#dataTable').html(result)

            }).catch((err) => {
                $('#dataTable').html(`<button class="btn btn-warning btn-lg btn-block">${err.responseJSON.message}</button>`)
        });

        function loading(state) {
            if(state) {
                $('#loading').removeClass('d-none');
            } else {
                $('#loading').addClass('d-none');
            }
        }

      }

   //paginate
    function loadPaginate(to) {
        page = to
        filterTable()
    }
</script>
@endpush