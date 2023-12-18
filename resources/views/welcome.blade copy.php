@extends('layouts.app')
@section('content')
<main>
   <!-- hero area start -->
   <section class="hero__area hero__height-4 grey-bg-9 p-relative d-flex align-items-center">
      <div class="hero__shape-4">
         <img class="smile-2" src="{{ asset('img') }}/icon/hero/home-4/smile-2.png" alt="">
         <img class="cross-1" src="{{ asset('img') }}/icon/hero/home-4/cross-1.png" alt="">
      </div>
      <div class="container">
         <div class="row align-items-center">
            <div class="col-xxl-7 col-xl-7 col-lg-6">
               <div class="hero__content-4 pr-70">
                  <h3 class="hero__title-4 wow fadeInUp" data-wow-delay=".3s"> <span>Permohonan</span> Surat Bebas Temuan</h3>
                  <p class="wow fadeInUp" data-wow-delay=".5s">Sebuah inovasi yang dirancang untuk mempermudah pelayanan ASN serta untuk mempermudah proses administrasi di inspektorat Kabupaten Tulang Bawang</p>

                  <div class="hero__btn-4">
                     <a href="/register" class="w-btn-round mr-25 wow fadeInUp" data-wow-delay=".9s">Daftar</a>
                     <a href="/login" class="w-btn-round w-btn-round-2 wow fadeInUp" data-wow-delay="1.2s" data-toggle="modal" data-target="#exampleModalCenter">
                        Login
                      </a>
                  </div>

               </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-6">
               <div class="hero__thumb-4-wrapper">
                  <div class="hero__thumb-4 p-relative">
                     <img class="girl lazyload" data-src="{{ asset('img') }}/hero/inspektur.png" alt="" width="50">
                     {{-- <img class="flower lazyload" data-src="{{ asset('img') }}/hero/home-4/flower.png" alt=""> --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- hero area end -->
</main> 
@endsection


