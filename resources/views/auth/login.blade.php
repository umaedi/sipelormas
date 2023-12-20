@extends('layouts.auth')
@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      @if ($errors->any())
      <div class="alert alert-warning">Email atau Password salah!</div>
      @endif
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="#" class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bolder">SIPELORMAS</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Selmat datang! 👋</h4>
          <p class="mb-4">Silakan login menggunakan email dan password</p>

          <form id="formAuthentication" class="mb-3" action="/login" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                placeholder="Masukan email"
                autofocus
              />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="/forgot-password">
                  <small>Lupa password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <div class="mb-3">
              <button id="btn_login" onclick="loading('btn_login', 'btn_loading_login')" class="btn btn-primary d-grid w-100" type="submit">Login</button>
              <button id="btn_loading_login" class="btn btn-primary w-100" style="display: none" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
              </button>
            </div>
          </form>

          <p class="text-center">
            <span>Belum punya akun?</span>
            <a href="/register">
              <span>Buat akun</span>
            </a>
          </p>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection