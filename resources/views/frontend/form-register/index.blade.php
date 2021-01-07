@extends('frontend.includes.default')
@section('title', 'Form register')
@section('content')
<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
  <div class="container-contact2">
    <div class="wrap-contact2">
      <form class="contact2-form validate-form" action="" method="POST" enctype="multipart/form-data">
        <span class="contact2-form-title">
          Register Event Huntbazaar
        </span>
        @csrf
        <div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <input class="input2" type="text" name="email" value="{{ $decrypted }}" readonly>
        </div>

        <div class="wrap-input2 validate-input" data-validate="Name is required">
          <input class="input2" type="text" name="nama">
          <span class="focus-input2" data-placeholder="NAME"></span>
          @if(!empty($errors->first('nama')))
          <p class="text-danger"><i class="icon fa fa-ban"></i> {{ $errors->first('nama') }}</p>
          @endif
        </div>
        
        <div class="wrap-input2 validate-input" data-validate="Tanggal Lahir is required">
          <input class="input2" type="text" name="tgl">
          <span class="focus-input2" data-placeholder="TANGGAL LAHIR"></span>
          @if(!empty($errors->first('tgl')))
          <p class="text-danger"><i class="icon fa fa-ban"></i> {{ $errors->first('tgl') }}</p>
          @endif
        </div> 

        <div class="wrap-input2 validate-input" data-validate="Jenis Kelamin is required">
          <input class="input2" type="text" name="jenkel">
          <span class="focus-input2" data-placeholder="JENIS KELAMIN"></span>
          @if(!empty($errors->first('jenkel')))
          <p class="text-danger"><i class="icon fa fa-ban"></i> {{ $errors->first('jenkel') }}</p>
          @endif
        </div>
        
        <div class="wrap-input2 validate-input" data-validate="Jenis Kelamin is required">
          <input class="input2" type="text" name="design_favorite">
          <span class="focus-input2" data-placeholder="Design Favorite"></span>
          @if(!empty($errors->first('design_favorite')))
          <p class="text-danger"><i class="icon fa fa-ban"></i> {{ $errors->first('design_favorite') }}</p>
          @endif
        </div>         
        
        <div class="container-contact2-form-btn">
          <div class="wrap-contact2-form-btn">
            <div class="contact2-form-bgbtn"></div>
            <button class="contact2-form-btn">
              Register
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection