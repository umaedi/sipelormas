@extends('layouts.app')
@section('content')
<main role="main" class="container">
 <div class="d-flex align-items-center p-3 mt-3 text-white-50 bg-primary rounded box-shadow">
    <div class="lh-100">
      <h5 class="mb-0 text-white lh-100">Pembuatan Akun</h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-3">Silakan lengkapi data diri Anda</h6>
        <form action="/register" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
             <div class="col-md-3">
               <div class="card">
                 <div class="card-body">
                   <img id="imgPrev" src="{{ asset('img/avatar-1.png') }}" loading="lazy" alt="photo" width="100%">
                 </div>
               </div>
             </div>
             <div class="col-md-9">
               <div class="card">
                 <div class="card-body">
                   <div class="form-group mb-3">
                     <label for="photo">Photo</label>
                     <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" onchange="previewImg()" accept=".png, .jpg, .jpeg" id="image">
                     @error('photo')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                  </div>
                 <div class="form-group">
                     <label for="name">Nama Lengkap</label>
                     <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" name="nama" value="{{ old('nama') }}">
                     @error('nama')
                         <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                 </div>
                 </div>
               </div>
             </div>
           </div>
             <div class="form-group my-3">
               <label for="nama_ormas">Nama Ormas</label>
               <input type="text" class="form-control @error('nama_ormas') is-invalid @enderror" id="nama_ormas" name="nama_ormas" value="{{ old('nama_ormas') }}">
               @error('nama_ormas')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group my-3">
               <label for="alamat_sekretariat">Alamat Sekretariat</label>
               <textarea type="text" class="form-control @error('alamat_sekretariat') is-invalid @enderror" id="alamat_sekretariat" name="alamat_sekretariat"></textarea>
               @error('alamat_sekretariat')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="jabatan">Jabatan</label>
               <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
               @error('jabatan')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="email">Alamat Email</label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
               @error('email')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="no_tlp">No Tlp/WhatsApp</label>
               <input type="number" class="form-control @error('no_tlp') is-invalid @enderror" id="no_tlp" name="no_tlp" value="{{ old('no_tlp') }}">
               @error('no_tlp')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="password">Password (Minimal 6 karakter)</label>
               <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
               @error('password')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group mb-3">
               <label for="password">Konfirmasi Password</label>
               <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password" name="password_confirmation">
               @error('password_confirmation')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
             </div>
             @include('layouts._loading')
             <button id="btn_submit" type="submit" onclick="loading()" class="btn btn-primary mb-3">BUAT AKUN</button>
          </div>
       </form>
      </div>

      <div class="col-md-4">
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6>ALUR PERMOHONAN</h6>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">1. Pemohon melakukan pembuatan akun</li>
              <li class="list-group-item">2. Pemohon mengajukan permohonan</li>
              <li class="list-group-item">3. Permohonan diverifikasi oleh admin</li>
              <li class="list-group-item">4. Permohonan dikonfirmasi</li>
              <li class="list-group-item">5. Surat izin diterbitkan</li>
            </ul>
        </div>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6>LAMPIRAN LAINNYA</h6>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">1. <a href="#">Formulir Isian Data Ormas</a></li>
              <li class="list-group-item">2. <a href="#">Surat Pernyataan</a></li>
            </ul>
        </div>
        <a href="/login" class="btn btn-primary">LOGIN</a>
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <h6>KONTAK KAMI</h6>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Alya Zhara: <span class="font-weight-bold"><a href="https://api.whatsapp.com/send?phone=6281532337623" target="_blank">081532337623</a></span></li>
            </ul>
        </div>
      </div>
    </div>
</div>
</main>
@endsection
@push('js')
<script type="text/javascript">
  function loading()
  { 
    $('#btn_submit').addClass('d-none');
    $('#btn_loading').removeClass('d-none');
  }
  function previewImg(){
     const imgPreview = document.querySelector('#imgPrev');
     const image = document.querySelector('#image');
     const blob = URL.createObjectURL(image.files[0]);
     imgPreview.src = blob; 
  }
</script>
@endpush

      
    


