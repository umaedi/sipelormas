@extends('layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="/user/dashboard">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        @if (session('status'))
        <div class="alert alert-success">
          @if (session('status')=='profile-information-updated')
          Profil berhasil diperbaharui.
          @endif
          @if (session('status')=='password-updated')
          Password berhasil diperbaharui.
          @endif
          @if (session('status')=='two-factor-authentication-disabled')
          Two factor authentication disabled.
          @endif
          @if (session('status')=='two-factor-authentication-enabled')
          Two factor authentication enabled.
          @endif
          @if (session('status')=='recovery-codes-generated')
          Recovery codes generated.
          @endif
        </div>
        @endif
        <div class="row">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>UPDATE PROFILE</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="/user/profile-information" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @method('PUT')
                      @csrf
                    <div class="form-group">
                      <label for="img">Photo</label>
                      <img id="imgPreview" src="{{ \Illuminate\Support\Facades\Storage::url(auth()->user()->photo) }}" loading="lazy" alt="photo" width="100%" >
                      <input id="image" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" tabindex="1" value="" onchange="previewImage()" accept=".jpg, .jpeg, .png">
                      @error('photo')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input id="name" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" tabindex="1" value="{{ auth()->user()->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" tabindex="2" value="{{ auth()->user()->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ormas</label>
                        <input type="text" class="form-control @error('nama_ormas') is-invalid @enderror" name="nama_ormas" tabindex="2" value="{{ auth()->user()->nama_ormas }}">
                    </div>
                    <div class="form-group">
                      <label for="">Alamat Sekretariat</label>
                      <textarea type="text" class="form-control @error('alamat_sekretariat') is-invalid @enderror" name="alamat_sekretariat" tabindex="2">{{ auth()->user()->alamat_sekretariat }}</textarea>
                  </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="2" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-group">
                      <label for="no_tlp">No Tlp/WhatsApp</label>
                      <input id="no_tlp" type="number" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" tabindex="6" value="{{ auth()->user()->no_tlp }}">
                    </div>
                      <div class="form-group">
                        <button  id="loading_update_profile" class="btn btn-primary btn-lg btn-block d-none" type="button" disabled>
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                          Tunggu sebentar yah...
                        </button>
                        <button id="btn_update_profile" type="submit" onclick="loading('btn_update_profile', 'loading_update_profile')" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          SIMPAN PERUBAHAN
                        </button>
                      </div>
                  </form>
                </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h4>UPDATE PASSWORD</h4>
              </div>
              <form method="POST" action="{{ route('user-password.update') }}">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="current_password">Password saat ini</label>
                  <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" tabindex="3">
                  @error('current_password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="gender">Password Baru</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="3">
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <button  id="loading_update_password" class="btn btn-primary btn-lg btn-block d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Tunggu sebentar yah...
                  </button>
                  <button id="btn_update_password" type="submit" onclick="loading('btn_update_password', 'loading_update_password')" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    UPDATE PASSWORD
                  </button>
                </div>
              </div>
            </form>
            </div>
          </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h4>TWO-FACTOR AUTHENTICATION</h4>
                </div>
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::twoFactorAuthentication()))  
                <div class="card-body">
                  @if(! auth()->user()->two_factor_secret)
                    {{-- Enable 2FA --}}
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Enable Two-Factor</button>
                    </form>
                    @else
                    {{-- Disable 2FA --}}
                    <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">
                            Disable Two-Factor
                        </button>
                    </form>
                    @if(session('status') == 'two-factor-authentication-enabled')
                    {{-- Show SVG QR Code, After Enabling 2FA --}}
                    <div class="mt-4">
                      Two-factor authentication is now enabled. Scan the following QR code using your phone's authenticator app. We recommend using <a class="text-bold" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US" target="_blank"> Google Authenticator </a>
                    </div>

                    <div class="mb-3 mt-4">
                        {!! auth()->user()->twoFactorQrCodeSvg() !!}
                    </div>
                    @endif

                    {{-- Show 2FA Recovery Codes --}}
                    <div class="mt-4">
                      Store this recovery code safely. It can be used to restore access to your account if your two-factor authentication device is lost.
                    </div>

                    <div style="background: rgb(44, 44, 44);color:white" class="rounded p-3 mb-2 mt-4">
                        @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                        @endforeach
                    </div>

                    {{-- Regenerate 2FA Recovery Codes --}}
                    <form method="POST" action="{{ url('user/two-factor-recovery-codes') }}">
                        @csrf

                        <button type="submit"
                            class="mt-4 btn btn-primary">
                            Regenerate Recovery Codes
                        </button>
                    </form>
                @endif
                </div>
                @endif
              </div>
            </div>
          </div>
      </div>
      </div>
    </section>
  </div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
<script type="text/javascript">
    function previewImage()
    {
        const imgPreview = document.querySelector('#imgPreview');
        const image = document.querySelector('#image');
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
    }
</script>
@endpush