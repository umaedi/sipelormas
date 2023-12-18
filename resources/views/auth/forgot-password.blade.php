@extends('layouts.auth')
@section('content')
<section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="card card-primary mt-5">
            <div class="card-header"><h4>Lupa Password</h4></div>
            <div class="card-body">
              @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
              @endif
              <p class="text-muted">Sistem akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
              <form action="#" method="POST">
                @csrf
                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                </div>

                <div class="form-group">
                  @include('layouts._loading')
                  <button id="btn_submit" onclick="loading()" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Lupa Password
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="mt-4 text-muted text-center">
            Ingat password? <a href="/login">Login</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
