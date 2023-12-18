@extends('layouts.page')
@section('content')
<section class="section">
    <div class="container mt-3">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="{{ asset('dist') }}/img/logo-icomesh.png" alt="logo" width="100%" class="shadow-light">
          </div>

          @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
          @endif
          <div class="card card-primary">
            <div class="card-header">
                <h4>TWO FACTOR CHALLANGE</h4>
              </div>
            <div class="card-body">
              <form method="POST" action="{{ url('/two-factor-challenge') }}">
                @csrf
                <div class="form-group">
                  <label for="password">Code</label>
                  <input id="password" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" tabindex="1" autofocus>
                    @error('code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="recovery_code">Recovery Code</label>
                  <input id="recovery_code" type="text" class="form-control @error('recovery_code') is-invalid @enderror" name="recovery_code" value="{{ old('recovery_code') }}" tabindex="1" required autofocus>
                    @error('recovery_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                  <button type="submit" id="btn" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    LOGIN
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
