@extends('frontend.includes.default')
@section('title', 'Register Event Huntbazaar')
@section('content')
<input type="hidden" id="date-expired" value="{{ $date_expired }}">
<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
  <div class="container-contact2">
    <div class="wrap-contact2">
      @if($cek->status == 1)
        <div class="card">
          <div class="card-body">
            Kode Registrasi Event Huntbazaar Anda <br><b>{{ $cek->kode_registrasi }}</b>
          </div>
        </div>
        
      @else
      <form class="contact2-form validate-form" action="" method="POST" enctype="multipart/form-data">
        <h1 id="rtime" class="text-center"></h1>
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
          <input class="input2" type="text" name="tgl" id='datetimepicker1'>
          <span class="focus-input2" data-placeholder="TANGGAL LAHIR"></span>
          @if(!empty($errors->first('tgl')))
          <p class="text-danger"><i class="icon fa fa-ban"></i> {{ $errors->first('tgl') }}</p>
          @endif
        </div> 

        <div class="wrap-input2 validate-input" data-validate="Jenis Kelamin is required">
          <div class="row">
            <div class="col-lg-6 text-right">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenkel" value="Pria">
                <label class="form-check-label" for="exampleRadios1">
                  Pria
                </label>
              </div>
            </div>
            <div class="col-lg-6 text-left">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenkel" value="Wanita">
                <label class="form-check-label" for="exampleRadios1">
                  Wanita
                </label>
              </div>
            </div>
          </div>
          <span class="focus-input2" data-placeholder="JENIS KELAMIN"></span>
          @if(!empty($errors->first('jenkel')))
          <p class="text-danger"><i class="icon fa fa-ban"></i> {{ $errors->first('jenkel') }}</p>
          @endif
        </div>
        
        <div class="wrap-input2 validate-input" data-validate="Jenis Kelamin is required">
          <div class="row">
            <div class="col-lg-4 text-right">
            </div>
            <div class="col-lg-8 text-left">
              <div class="input-group mb-3">
                <select multiple data-live-search="true" name="design_favorite[]">
                  <option value="A Bathing Ape">A Bathing Ape</option>
                  <option value="Bapy by Bathing Ape">Bapy by Bathing Ape</option>
                  <option value="Benedetta Bruzziches">Benedetta Bruzziches</option>
                  <option value="Dover Street Market">Dover Street Market</option>
                  <option value="JOOP!">JOOP!</option>
                  <option value="Lauren Moffatt">Lauren Moffatt</option>
                  <option value="Lulu Guinness">Lulu Guinness</option>
                  <option value="Melissa x Vivienne Westwood">Melissa x Vivienne Westwood</option>
                  <option value="Pringle of Scotland">Pringle of Scotland</option>
                  <option value="Roger Vivier">Roger Vivier</option>
                </select>
              </div>
            </div>
          </div>
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
      @endif
    </div>
  </div>
</div>
@endsection