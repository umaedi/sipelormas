@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Pengajuan</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Pengajuan</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="alert alert-warning" role="alert">
              <h4 class="alert-heading">Penting!</h4>
              <ol>
                <li>SKT Yang dikeluarkan oleh kesbangpol Kabupaten Tulang Bawang</li>
                <li>Sesuaikan format lampiran dengan format yang diminta (PDF, PNG, JPEG, JPG)</li>
                <li>Maksimal ukuran file 2 MB</li>
                <li>Pastikan jaringan atau sinyal memadai</li>
              </ol>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Formulir Pengajuan Dana Hibah</h4>
            </div>
            <div class="card-body">
                <form id="form_skt">
                  @csrf
                    <div class="form-group">
                      <label for="no_skt">No SKT Yang Dikeluarkan Oleh Kesbangpol Kabupaten Tulang Bawang</label>
                      <input type="number" class="file-input form-control" id="no_skt" name="no_skt" placeholder="Masukan angka">
                    </div>
                    <div class="form-group">
                      <label for="rencana_anggaran">Rencana Anggaran Biaya</label>
                      <input type="number" class="file-input form-control" id="rencana_anggaran" name="rencana_anggaran" placeholder="Masukan angka">
                    </div>
                    <div class="form-group">
                      <label for="surat_permohonan_hibah">Surat Permohonan hibah</label>
                      <input type="file" class="file-input form-control" id="surat_permohonan_hibah" name="surat_permohonan_hibah">
                    </div>
                    <div class="form-group">
                      <label for="fc_norek">Poto Copy Rekening ORMAS/LSM</label>
                      <input type="file" class="file-input form-control" id="fc_norek" name="fc_norek">
                    </div>
                    @include('layouts._loading')
                    <button id="btn_submit" type="submit" class="btn btn-primary">KIRIM PENGAJUAN</button>
                </form>
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
$('#form_skt').submit(async function uploadFile(e) {
    e.preventDefault();
    
    var form = $(this)[0];
    var data = new FormData(form);

    var param = {
        url: '/user/hibah/store',
        method: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
    }

    loading(true);
    await transAjax(param).then((result) => {
      loading(false);
      console.log(result);
      swal({text: result.message, icon: 'success', timer: 3000,}).then(() => {
          window.location.href = '/user/hibah';
      });
    }).catch((error) => {
        loading(false);
        swal({text: error.responseJSON.message, icon: 'warning', timer: 5000,});
    });

    function loading(state) {
        if(state) {
            $('#btn_submit').addClass('d-none');
            $('#btn_loading').removeClass('d-none');
        }else {
            $('#btn_submit').removeClass('d-none');
            $('#btn_loading').addClass('d-none');
        }
    }
});

</script>
@endpush