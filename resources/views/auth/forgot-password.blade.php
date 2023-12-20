@extends('layouts.auth')
@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Forgot Password -->
      <div class="card">
        @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="#" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bolder">SIPELORMAS</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Lupa Password? 🔒</h4>
          <p class="mb-4">Sistem akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
          <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="text"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                placeholder="Masukan email Anda"
                autofocus
              />
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
            </div>
            <button id="btn_reset" onclick="loading('btn_reset', 'btn_loading_reset')" class="btn btn-primary d-grid w-100">Kirim link reset password</button>
            <button id="btn_loading_reset" class="btn btn-primary w-100" style="display: none" type="button" disabled>
              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              Loading...
            </button>
          </form>
          <div class="text-center">
            <a href="/login" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Kembali login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection