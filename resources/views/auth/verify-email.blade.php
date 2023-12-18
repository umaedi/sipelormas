@extends('layouts.auth')
@section('content')
<section class="section">
  <div class="container mt-5">
    <div class="page-error">
      <div class="page-inner">
        <img data-src="{{ asset('img/email_verification.png') }}" width="350" class="lazyload img-fluid" alt="Closing">
        <div class="page-description mt-3">
          We've just sent an activation link to your email.<br>
          If you do not receive the email, please click the button below<br>
          to resend the activation link
        </div>
        <div class="page-search">
          <form action="/email/verification-notification" method="POST">
            @csrf
            <div class="form-group floating-addon floating-addon-not-append">
              @if (session('status') == 'verification-link-sent')
              <div class="mb-4 alert alert-success">
                  A new email verification link has been emailed to you!
              </div>
              @endif
              <div class="input-group">
                <div class="input-group-prepend">
                </div>
                <button type="submit" class="btn btn-success btn-block">Resending Email Verification</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="simple-footer">
        Developed by <a href="https://api.whatsapp.com/send?phone={{ env('NO_DEV') }}" target="_blank">Yoru</a>. Copyright &copy; 2023
    </div>
  </div>
</section>
@endsection