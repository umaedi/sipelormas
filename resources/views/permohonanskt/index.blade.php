@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permohonan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Permohonan</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            @if ($permohonan !== 1)
            <a href="/user/permohonan_skt/create" class="btn btn-primary mb-3">BUAT PERMOHONAN</a>
            @endif
            <div class="card">
              @if (session('msg_delete'))
              <div class="alert alert-success">{{ session('msg_delete') }}</div>
              @endif
              <div class="card-header">
                <h4>Permohonan Surat keterangan terdaftar</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive" id="dataTable">
                <button class="btn btn-primary btn-lg btn-block" type="button" disabled>
                  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Mohon tunggu sebentar...
                </button>
              </div>
            </div>
            </div>
          </div>
          </div>
      </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
<script src="{{ asset('js') }}/sweetalert.min.js"></script>
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
          console.log(result);
            $('#dataTable').html(result);
        });
    });
</script>
@endpush