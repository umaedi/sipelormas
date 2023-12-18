@extends('layouts.superadmin')
@section('content')
    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="right">
            <a href="/super_admin/permohonan/waiting_sign" class="headerButton">
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

        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#">
                    <img src="/img/saut.png" alt="avatar" class="imaged w100 rounded">
                    <span class="button">
                        <ion-icon name="camera-outline"></ion-icon>
                    </span>
                </a>
            </div>
        </div>
        <div class="section mt-2 mb-2">
            <div class="section-title">Profile</div>
            <div class="card">
                @if (session('status')=='profile-information-updated')
                <div class="alert alert-success">Profil berhasil diperbaharui.</div>
                @endif
                @if (session('status')=='password-updated')
                <div class="alert alert-success">Password berhasil diperbaharui</div>
                @endif
                <div class="card-body">
                    <form action="/user/profile-information" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Nama</label>
                                <input type="text" class="form-control" id="text4b" name="nama" value="{{ auth()->user()->nama }}">
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="text4b">Nama</label>
                                <input type="text" class="form-control" id="text4b" name="jabatan" value="{{ auth()->user()->jabatan }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="email4b">E-mail</label>
                                <input type="email" class="form-control" id="email4b" name="email" value="{{ auth()->user()->email }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="phone4b">Phone</label>
                                <input type="tel" class="form-control" id="phone4b" name="no_tlp" value="{{ auth()->user()->no_tlp }}">
                            </div>
                        </div>
                        <button id="btn_update_profile" type="submit" onclick="loading('btn_update_profile', 'btn_profile_animation')" class="btn btn-primary btn-lg btn-block">UPDATE PROFILE</button>
                        <button id="btn_profile_animation" class="btn btn-primary btn-lg btn-block d-none" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="section mt-2 mb-2">
            <div class="section-title">Update password</div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('user-password.update') }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="current_password">Password saat ini</label>
                                <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" tabindex="3">
                                @error('current_password')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="gender">Password Baru</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="3">
                                @error('password')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label" for="email4b">Konfirmasi password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="email4b" name="password_confirmation">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <button id="btn_update_password" type="submit" onclick="loading('btn_update_password', 'btn_password_animation')" class="btn btn-primary btn-lg btn-block">UBAH PASSWORD</button>
                        <button id="btn_password_animation" class="btn btn-primary btn-lg btn-block d-none" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </form>
                    <form action="/logout" method="POST">
                        @csrf
                        <button id="btn_logout" type="submit" onclick="loading('btn_logout', 'btn_logout_animation')" class="btn btn-primary btn-lg btn-block mt-2">LOGOUT</button>
                        <button id="btn_logout_animation" class="btn btn-primary btn-lg btn-block d-none mt-2" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        function loading(btn_loading, btn_animation)
        {
            $('#'+btn_loading).addClass('d-none');
            $('#'+btn_animation).removeClass('d-none');
        }
    </script>
@endpush