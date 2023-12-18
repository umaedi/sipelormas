@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>DATA DIRI</h4>
              </div>
              <div class="card-body">
                  <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                      @csrf
                    <div class="form-group">
                      <label for="img">Photo</label>
                      <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->photo) }}" loading="lazy" alt="photo" width="100%" >
                      @error('img')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input id="name" type="text" class="form-control" name="name" tabindex="1" value="{{ auth()->user()->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" tabindex="2" value="{{ auth()->user()->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ormas</label>
                        <input type="text" class="form-control" name="instansi" tabindex="2" value="{{ auth()->user()->nama_ormas }}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Sekretariat</label>
                        <textarea type="text" class="form-control" name="instansi" tabindex="2">{{ auth()->user()->alamat_sekretariat }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" tabindex="2" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">No Tlp/WhatsApp</label>
                      <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ auth()->user()->no_tlp }}">
                    </div>
                  </form>
                </div>
            </div>
          </div>
          <div class="col-md-8 mb-3">
            <a href="/user/permohonan_skt/create" class="btn btn-primary mb-3">AJUKAN PERMOHONAN</a>
            <div class="card">
              <div class="card-header">
                <h4>PERMOHONAN SKT/ORMAS</h4>
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
<script>
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