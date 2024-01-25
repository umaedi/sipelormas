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
                  <li>Ormas sudah terdaftar 3 tahun di kesbangpol tulang bawang</li>
                  <li>Semua lampiran terpenuhi</li>
                  <li>Maksimal ukuran file 2 MB</li>
                </ol>
              </div>
            <div class="card">
            <div class="card-body text-center">
                <h4>Saat ini Anda belum bisa mengajukan dana hibah sebelum</h4>
                <div id="countdown">

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

    var countDownDate = new Date("{{ $tgl_terdaftar }}").getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = 
        ` <h4><span class="badge badge-primary">${days} Hari</span> <span class="badge badge-primary">${hours} Jam</span> <span class="badge badge-primary">${minutes} Menit</span> <span class="badge badge-primary">${seconds} Detik</span></h4>`;

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
@endpush