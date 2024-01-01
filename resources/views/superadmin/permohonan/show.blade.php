@extends('layouts.superadmin')
@section('content')
      <!-- App Header -->
      <div class="appHeader">
        <div class="left">
            <a href="/super_admin/dashboard" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Tanda Tangan Elektronik
        </div>
        <div class="right">
            <a href="app-notifications.html" class="headerButton">
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
        <!-- Transactions -->
        <div class="section mt-2">
            <div class="alert alert-success mb-2">Detail {{ $permohonan->keterangan }}</div>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Nama</label>
                                <input type="text" class="form-control" id="text4b" placeholder="{{ $permohonan->user->nama }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="email4b">Nama ORMAS</label>
                                <input type="text" class="form-control" id="email4b" placeholder="{{ $permohonan->user->nama_ormas }}">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="email4b">Alamat sekretariat</label>
                                <textarea type="text" class="form-control" id="email4b">{{ $permohonan->user->alamat_sekretariat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="email4b">Jabatan</label>
                                <input type="text" class="form-control" id="email4b" placeholder="{{ $permohonan->user->jabatan }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="email4b">Email</label>
                                <input type="text" class="form-control" id="email4b" placeholder="{{ $permohonan->user->email }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="phone4b">No Tlp/WhstaApp</label>
                                <input type="tel" class="form-control" id="phone4b" placeholder="{{ $permohonan->user->no_tlp }}">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="section inset mt-1 mb-3">
            <div class="section-title">Lampiran permohonan</div>
            @if ($permohonan->status == 'diproses')
            <div class="alert alert-info mb-2">Lampiran ini telah di verifikasi oleh Admin</div>
            @elseif($permohonan->status == 'ditolak')
            <div class="alert alert-danger mb-2">Lampiran ini telah di verifikasi oleh Admin</div>
            @else
            <div class="alert alert-success mb-2">Permohonan telah di TTE</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="accordion" id="accordionExample1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accordion01">
                                    Tampilkan semua lampiran
                                </button>
                            </h2>
                            <div id="accordion01" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                <table class="table table-responsive">
                                    <tbody>
                                      <tr>
                                        <th>1</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran1) }}" target="_blank"> Surat Permohonan SKT yang ditandatangani pendiri dan pengurus ormas</a></td>
                                      </tr>
                                      <tr>
                                        <th>2</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran2) }}" target="_blank"> Salinan/ fotocopy Akte Pendirian ormas (dari Notaris) yang membuat anggaran dasar
                                            (AD)  atau Anggaran dasar dan Anggaran rumah Tangga (ART)</a></td>
                                      </tr>
                                      <tr>
                                        <th>3</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran3) }}" target="_blank"> Anggaran dasar (AD) Anggaran rumah tangga (ART) (memuat   paling sedikit nama dan lambang, tempat kedudukan, asas dan tujuan, dan fungsi, kepengurusan, hak dan kewajiban anggota, pengelolaan keuangan, mekanisme penyelsaian sengketa, dan pengawasan internal, dan pembubaran organisasi).</a></td>
                                      </tr>
                                      <tr>
                                        <th>4</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran4) }}" target="_blank"> Cek dan scan Kemenkumham / Kemendagri</a></td>
                                      </tr>
                                      <tr>
                                        <th>5</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran5) }}" target="_blank"> Program Kerja</a></td>
                                      </tr>
                                      <tr>
                                        <th>6</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran6) }}" target="_blank"> Susunan pengurus yang dibuktikan dengan surat keputusan tentang susunan pengurus Ormas secara lengkap yang sah sesuai dengan AD/ART ormas yang memuat paling sedikit ketua sekretaris dan bendahara atau sebutan lain dan pengurus dan anggota kesemuannya berkewarganegaraan tanpa  terkecuali</a></td>
                                      </tr>
                                      <tr>
                                        <th>7</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran7) }}" target="_blank"> Biodata pengurus organisasi (Ketua, Sekretaris, dan Bendahara atau sebutan lainnya)</a></td>
                                      </tr>
                                      <tr>
                                        <th>8</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran8) }}" target="_blank"> Pas foto pengurus organisasi berwarna  ukuran 4 x 6 terbaru  dalam tiga bulan terakhir ( ketua, sekretaris, bendahara atau sebutan lainnya)</a></td>
                                      </tr>
                                      <tr>
                                        <th>9</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran9) }}" target="_blank"> Foto copy kartu  tanda  penduduk  elektronik  pengurus  orgtanisasi (ketua, sekretaris, dan bendahara,  dan lainnya.)</a></td>
                                      </tr>
                                      <tr>
                                        <th>10</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran10) }}" target="_blank"> Nomor wajib pajak atas nama ormas</a></td>
                                      </tr>
                                      <tr>
                                        <th>11</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran11) }}" target="_blank"> Surat   keterangan   domisili   sekretariat   yang   diterbitkan   oleh   lurah/kepala   desa setempat atau sebutan lainnya.</a></td>
                                      </tr>
                                      <tr>
                                        <th>12</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran12) }}" target="_blank"> Bukti kepemilikan, atau surat perjanjian kontrak atau ijin pemilik/pengelola</a></td>
                                      </tr>
                                      <tr>
                                        <th>13</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran13) }}" target="_blank"> Foto kantor atau sekretariat ormas, tampak depan yang memuat papan nam</a></td>
                                      </tr>
                                      <tr>
                                        <th>14</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran14) }}" target="_blank"> Surat pernyataan tidak dalam sengketa kepengurusan atau tidak perkara di pengadilan</a></td>
                                      </tr>
                                      <tr>
                                        <th>15</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran15) }}" target="_blank"> Surat pernyataan kesanggupan melaporkan kegiatan</a></td>
                                      </tr>
                                      <tr>
                                        <th>16</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran16) }}" target="_blank"> Formulir isian data ormas</a></td>
                                      </tr>
                                      <tr>
                                        <th>17</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran17) }}" target="_blank"> Surat pernyataan bahwa tidak berafiliasi secara kelembagaan   dengan partai politik yang ditandatangani oleh ketua dan sekretaris</a></td>
                                      </tr>
                                      @if ($permohonan->lampiran18)
                                    <tr>
                                        <th>18</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran18) }}" target="_blank"> Surat  pernyataan bahwa nama, lambang, bendera, tanda gamba, simbol, atribut, dan cap stempel yang digunakan belum menjadi hak paten dan/atau hak cipta pihak dan serta  bukan  merupakan  milik  pemerintah,  yang  ditandatangani  oleh  ketua  dan sekretaris.</a></td>
                                    </tr> 
                                    @endif
                                    @if ($permohonan->lampiran19)
                                    <tr>
                                        <th>19</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran19) }}" target="_blank"> Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang keagamaan</a></td>
                                    </tr>
                                    @endif
                                    @if ($permohonan->lampiran20)
                                    <tr>
                                        <th>20</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran20) }}" target="_blank"> Rekomendasi  dari  kementrian  yang  melaksanakan  urusan  di  bidang  agama  untuk ormas  yang memiliki khusus bidang kepercayaan kepada tuhan yang maha esa</a></td>
                                    </tr>
                                    @endif
                                    @if ($permohonan->lampiran21)
                                    <tr>
                                        <th>21</th>
                                        <td><a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->lampiran21) }}" target="_blank"> Surat  persetujuan kesediaan atau persetujuan dari pejabat negara, pejabat pemerintah dan atau tokohnya masyarakat yang bersangkutan, yang namanya dicantumkan kepengurusan ormas</a></td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($permohonan->status == 'diterima')
            <div class="section-title mt-2">SKT</div>
            <div class="card">
                <div class="card-body">
                    @if (isset($permohonan->skt))
                    <a href="{{ \Illuminate\Support\Facades\Storage::url($permohonan->skt) }}" class="btn btn-primary btn-block">Lihat SKT</a>
                    @else
                        <p>SKT Belum di unggah oleh Admin</p>
                    @endif
                </div>
            </div>
            @endif
        </div>
        @if ($permohonan->status == 'diproses' )
        <div class="section">
            <button class="btn btn-primary btn-block btn-lg mb-2" data-bs-toggle="modal" data-bs-target="#DialogSign">Tanda Tangan Elektronik</button>
        </div>
        <div class="section">
            <button class="btn btn-warning btn-block btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#DialogReject">Tolak Permohonan</button>
        </div>
        @endif
    </div>

    <!-- Dialog Form -->
    <div class="modal fade dialogbox" id="DialogSign" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masukan Passphrase Anda</h5>
                </div>
                <form id="sign">
                    <div class="modal-body text-start mb-2">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <input type="hidden" name="status" value="diterima">
                                <input type="password" name="password" class="form-control" id="text1" placeholder="***">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <button type="button" class="btn btn-text-secondary" data-bs-dismiss="modal">BATAL</button>
                            <button type="submit" id="btn_submit_approve" class="btn btn-text-primary">LANJUTKAN</button>
                            <button id="btn_loading_approve" class="btn btn-primary d-none" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade dialogbox" id="DialogReject" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-icon text-danger">
                    <ion-icon name="close-circle"></ion-icon>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">Tolak!</h5>
                </div>
                <div class="modal-body">
                    Yakin tolak permohonan ini?
                </div>
                <form id="reject">
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <button type="submit" id="btn_submit_reject" class="btn btn-text-primary">YA</button>
                            <button id="btn_loading_reject" class="btn btn-primary d-none" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@include('layouts._notofication')
@endsection
@push('js')
    <script type="text/javascript">
        $('#sign').submit(async function sign(e) {
            e.preventDefault();
 
            var form = $(this)[0];
            var data = new FormData(form);

            var param = {
                url: '/super_admin/sign/{{ $permohonan->id }}',
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false
            }
            
            loading(true, 'btn_submit_approve', 'btn_loading_approve');
            await transAjax(param).then((result) => {
                loading(false, 'btn_submit_approve', 'btn_loading_approve');
                $('#DialogSign').modal('hide');
                $('#suceess').html(result.data);
                $('#notificationSuccess').modal('show');
                setTimeout(() => {
                    window.location.href ="/super_admin/permohonan/waiting_sign"
                }, 3000);
            }).catch((err) => {
                loading(false, 'btn_submit_approve', 'btn_loading_approve');
                $('#DialogSign').modal('hide');
                $('#error').html(err.responseJSON.message);
                $('#notificationDanger').modal('show');
            });
        });

        $('#reject').submit(async function sign(e) {
            e.preventDefault();
 
            var form = $(this)[0];
            var data = new FormData(form);

            var param = {
                url: '/super_admin/sign/reject/{{ $permohonan->id }}',
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                cache: false
            }
            
            loading(true, 'btn_submit_reject', 'btn_loading_reject');
            await transAjax(param).then((result) => {
                loading(false, 'btn_submit_reject', 'btn_loading_reject');
                $('#DialogReject').modal('hide');
                $('#suceess').html(result.data);
                $('#notificationSuccess').modal('show');
            }).catch((err) => {
                loading(false, 'btn_submit_reject', 'btn_loading_reject');
                $('#DialogReject').modal('hide');
                $('#error').html(err.responseJSON.message);
                $('#notificationDanger').modal('show');
            });
        });

        function loading(state, btn_submit, btn_loading) {
            if(state) {
                $('#'+btn_submit).addClass('d-none');
                $('#'+btn_loading).removeClass('d-none');
            }else {
                $('#'+btn_submit).removeClass('d-none');
                $('#'+btn_loading).addClass('d-none');
            }
        }
    </script>
@endpush