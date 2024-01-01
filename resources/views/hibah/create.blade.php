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
                <li>Lampiran 1-17 wajib diisi (18-21 opsional)</li>
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
                      <label for="jumlah_hibah">Nominal hibah yang diajukan</label>
                      <input type="number" class="file-input form-control" id="jumlah_hibah" name="jumlah_hibah" placeholder="Masukan angka">
                    </div>
                    <div class="form-group">
                      <label for="lampiran1">Surat Permohonan SKT yang ditandatangani pendiri dan pengurus ormas</label>
                      <input type="file" class="file-input form-control" id="lampiran1" name="lampiran1">
                    </div>
                    <div class="form-group">
                      <label for="lampiran2">Salinan/ fotocopy Akte Pendirian ormas (dari Notaris) yang membuat anggaran dasar
                        (AD)  atau Anggaran dasar dan Anggaran rumah Tangga (ART)</label>
                      <input type="file" class="file-input form-control" id="lampiran2" name="lampiran2">
                    </div>
                    <div class="form-group">
                      <label for="lampiran3"> Anggaran dasar (AD) Anggaran rumah tangga (ART) (memuat   paling sedikit nama dan lambang, tempat kedudukan, asas dan tujuan, dan fungsi, kepengurusan, hak dan kewajiban anggota, pengelolaan keuangan, mekanisme penyelsaian sengketa, dan pengawasan internal, dan pembubaran organisasi).</label>
                      <input type="file" class="file-input form-control" id="lampiran3" name="lampiran3">
                    </div>
                    @include('layouts._loading')
                    <button id="btn_submit" type="submit" class="btn btn-primary">KIRIM PERMOHONAN</button>
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