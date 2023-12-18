@extends('layouts.superadmin')
@section('content')
      <!-- App Header -->
      <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Tanda Tangan Elektronik
        </div>
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        <!-- Transactions -->
        <div class="section mt-2">
            <div class="section-title">Detail Permohonan</div>
            <div class="transactions">
                <!-- item -->
                <a href="/super_admin/user/show/{{ $permohonan->user->id }}" class="item">
                    <div class="detail">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->user->photo) }}" alt="img" class="image-block imaged w48">
                        <div>
                            <strong>{{ $permohonan->user->nama }}</strong>
                            <p>{{ $permohonan->kategori }}</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger">lihat</div>
                    </div>
                </a>
                <!-- * item -->
            </div>
        </div>
        <div class="section inset mt-1">
            <div class="section-title">Lampiran</div>
            <div class="accordion" id="accordionExample1">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion01">
                            SK Mutasi Atau Surat Persetujuan Bupati
                        </button>
                    </h2>
                    <div id="accordion01" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="https://psbt-inspektorat.tulangbawangkab.go.id/umaedi_sk_mutasi_surat_persetujuan_dari_bupati_pvnwpsrpiblz2ywq.pdf" frameborder="0" width="100%"  height="1000px"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion02">
                            Pengantar Dari Kepala OPD
                        </button>
                    </h2>
                    <div id="accordion02" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion03">
                            SK Pangkat Atau Jabatan Terakhir
                        </button>
                    </h2>
                    <div id="accordion03" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion04">
                            SKP 1 Tahun Terakhir
                        </button>
                    </h2>
                    <div id="accordion04" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#accordion05">
                            Daftar Hadir 3 Bulan Terakhir
                        </button>
                    </h2>
                    <div id="accordion05" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            <iframe src="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" frameborder="0" width="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- * Transactions -->

        <div class="section mt-2 mb-2">
            <button class="btn btn-primary btn-block btn-lg" data-bs-toggle="modal" data-bs-target="#DialogForm">Tanda Tangan Elektronik</button>
        </div>
    </div>
    <!-- * App Capsule -->

           <!-- Dialog Form -->
           <div class="modal fade dialogbox" id="DialogForm" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Masukan Passphrase Anda</h5>
                    </div>
                    <form id="sign">
                        <div class="modal-body text-start mb-2">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <input type="text" class="form-control" id="text1" placeholder="***">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="btn-inline">
                                <button type="button" class="btn btn-text-secondary"
                                    data-bs-dismiss="modal">BATAL</button>
                                <button type="submit" class="btn btn-text-primary">LANJUTKAN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- * Dialog Form -->
@endsection
@push('js')
    <script type="text/javascript">
        $('#sign').submit(async function sign(e) {
            e.preventDefault();

    // const userId = '1805020112800005';
    // const apiUrl = 'http://localhost:8000/api/status/user';

    // $.ajax({
    //   url: apiUrl,
    //   method: 'GET',
    //   dataType: 'json',
    //   headers: {
    //     // Atur header CORS di sini
    //     'Access-Control-Allow-Origin': '*',
    //     'Access-Control-Allow-Methods': 'GET, POST, PUT, DELETE, OPTIONS',
    //     'Access-Control-Allow-Headers': 'X-Requested-With, Content-Type, Accept, Origin, Authorization'
    //   },
    //   success: function (data) {
    //     console.log('Data dari server:', data);
    //   },
    //   error: function (xhr, status, error) {
    //     console.error('Error:', status, error);
    //   }
    });
     // });
    </script>
@endpush