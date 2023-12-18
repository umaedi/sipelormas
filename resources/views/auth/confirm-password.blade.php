<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Inspektorat</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/main.css">
</head>

<body>
  <div id="app">
    <section class="section">
        <div class="container mt-5">
          <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
              <div class="login-brand">
                <img src="{{ asset('img') }}/logo/logo-tuba.png" alt="logo" width="80">
              </div>
    
              @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
              @endif
              <div class="card card-primary">
                <div class="card-header">
                    <h4>KONFIRMASI PASSWORD</h4>
                  </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('email') }}" tabindex="1" required autofocus>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" id="btn" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        KONFIRMASI PASSWORD
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
  </div>
</body>
</html>
