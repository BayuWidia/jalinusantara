@extends('frontend.master.layouts.master')

<style>
.about-banner{background:url({{url('images/slider')}}/{{$getSlider[0]->url_slider}}) center;background-size:cover;background-attachment:fixed}
  @media (max-width: 767.98px){.banner-area .fullscreen{height:700px !important}}
</style>

@section('banner')
<!-- start banner Area -->
  <section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="about-content col-lg-12">
          <h1 class="text-white">
            Formulir Pendaftaran
          </h1>
          <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>
            <span class="lnr lnr-arrow-right"></span>  <a href="#"> Formulir Pendaftaran</a></p>
        </div>
      </div>
    </div>
  </section>
<!-- End banner Area -->
@endsection


@section('content')
<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
	<div class="container">
    <div class="row d-flex justify-content-center">
  		<div class="menu-content pb-70 col-lg-8">
  			<div class="title text-center">
  				<h1 class="mb-10">{{$getEvents[0]->judul_event}}</h1>
  				<p>
            {{ \Carbon\Carbon::parse($getEvents[0]->tanggal_mulai)->format('d-M-y')}} s/d
            {{ \Carbon\Carbon::parse($getEvents[0]->tanggal_akhir)->format('d-M-y')}}
          </p>
  			</div>
  		</div>
  	</div>
		<div class="row">
			<!-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> -->
      <div class="col-md-12">
        @if(Session::has('message'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
            <p>{{ Session::get('message') }}</p>
          </div>
        @endif
        @if(Session::has('messagefail'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4><i class="icon fa fa-ban"></i> Oops, terjadi kesalahan!</h4>
          <p>{{ Session::get('messagefail') }}</p>
        </div>
        @endif
      </div>
			<div class="col-lg-12">
				<form class="form-area " action="{{route('contact.store')}}" method="post" enctype="multipart/form-data" class="contact-form text-right">
            {{csrf_field()}}
					<div class="row">
						<div class="col-lg-6 form-group">
              <h3><b>DRIVER</b></h3>
              <hr>
              @if ($errors->has('namaDriver'))
                <small style="color:red">* {{$errors->first('namaDriver')}}</small>
              @endif
              <input name="nama" placeholder="Ketikkan Nama..." onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Ketikkan Nama...'"
                     class="common-input mb-20 form-control" value="{{ old('namaDriver') }}" type="text">
             @if ($errors->has('golonganDarahDriver'))
               <small style="color:red">* {{$errors->first('golonganDarahDriver')}}</small>
             @endif
               <input name="nama" placeholder="Ketikkan Golongan Darah..." onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Ketikkan Golongan Darah...'"
                      class="common-input mb-20 form-control" value="{{ old('golonganDarahDriver') }}" type="text">
             @if ($errors->has('noTelpDriver'))
               <small style="color:red">* {{$errors->first('noTelpDriver')}}</small>
             @endif
               <input name="nama" placeholder="Ketikkan No Telepone..." onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Ketikkan No Telepone...'"
                      class="common-input mb-20 form-control" value="{{ old('noTelpDriver') }}" type="text">
            @if ($errors->has('ukuranKemejaDriver'))
              <small style="color:red">* {{$errors->first('ukuranKemejaDriver')}}</small>
            @endif
              <input name="nama" placeholder="Ketikkan Ukuran Kemeja..." onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Ketikkan Ukuran Kemeja...'"
                     class="common-input mb-20 form-control" value="{{ old('ukuranKemejaDriver') }}" type="text">
            </div>
            <div class="col-lg-6 form-group">
              <h3><b>CO DRIVER</b></h3>
              <hr>
              @if ($errors->has('namaCoDriver'))
                <small style="color:red">* {{$errors->first('namaCoDriver')}}</small>
              @endif
              <input name="namaCoDriver" placeholder="Ketikkan Nama..." onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Ketikkan Nama...'"
                     class="common-input mb-20 form-control" value="{{ old('namaCoDriver') }}" type="text">
             @if ($errors->has('golonganDarahCoDriver'))
               <small style="color:red">* {{$errors->first('golonganDarahCoDriver')}}</small>
             @endif
               <input name="golonganDarahCoDriver" placeholder="Ketikkan Golongan Darah..." onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Ketikkan Golongan Darah...'"
                      class="common-input mb-20 form-control" value="{{ old('golonganDarahCoDriver') }}" type="text">
             @if ($errors->has('noTelpCoDriver'))
               <small style="color:red">* {{$errors->first('noTelpCoDriver')}}</small>
             @endif
               <input name="noTelpCoDriver" placeholder="Ketikkan No Telepone..." onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Ketikkan No Telepone...'"
                      class="common-input mb-20 form-control" value="{{ old('noTelpCoDriver') }}" type="text">
            @if ($errors->has('ukuranKemejaCoDriver'))
              <small style="color:red">* {{$errors->first('ukuranKemejaCoDriver')}}</small>
            @endif
              <input name="ukuranKemejaCoDriver" placeholder="Ketikkan Ukuran Kemeja..." onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Ketikkan Ukuran Kemeja...'"
                     class="common-input mb-20 form-control" value="{{ old('ukuranKemejaCoDriver') }}" type="text">
            </div>
					</div>
          <div class="row">
						<div class="col-lg-12 form-group">
              @if ($errors->has('mobil'))
                <small style="color:red">* {{$errors->first('mobil')}}</small>
              @endif
              <input name="mobil" placeholder="Ketikkan Mobil..." onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Ketikkan Mobil...'"
                     class="common-input mb-20 form-control" value="{{ old('mobil') }}" type="text">

             @if ($errors->has('noPolisi'))
               <small style="color:red">* {{$errors->first('noPolisi')}}</small>
             @endif
             <input name="noPolisi" placeholder="Ketikkan No Polisi..." onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Ketikkan No Polisi...'"
                    class="common-input mb-20 form-control" value="{{ old('noPolisi') }}" type="text">

              @if ($errors->has('bahanBakar'))
                <small style="color:red">* {{$errors->first('bahanBakar')}}</small>
              @endif
              <input name="bahanBakar" placeholder="Ketikkan Bahan Bakar..." onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Ketikkan Bahan Bakar...'"
                     class="common-input mb-20 form-control" value="{{ old('bahanBakar') }}" type="text">

              @if ($errors->has('pax'))
                <small style="color:red">* {{$errors->first('pax')}}</small>
              @endif
              <input name="pax" placeholder="Ketikkan PAX..." onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Ketikkan PAX...'"
                     class="common-input mb-20 form-control" value="{{ old('pax') }}" type="text">

               @if ($errors->has('penumpang1'))
                 <small style="color:red">* {{$errors->first('penumpang1')}}</small>
               @endif
               <input name="penumpang1" placeholder="Ketikkan Penumpang 1..." onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Ketikkan Penumpang 1...'"
                      class="common-input mb-20 form-control" value="{{ old('penumpang1') }}" type="text">

               @if ($errors->has('penumpang2'))
                 <small style="color:red">* {{$errors->first('penumpang2')}}</small>
               @endif
               <input name="penumpang2" placeholder="Ketikkan Penumpang 2..." onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Ketikkan Penumpang 2...'"
                      class="common-input mb-20 form-control" value="{{ old('penumpang2') }}" type="text">
						</div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left;"></div>
							<button class="genric-btn primary" style="float: right;" type="submit">Send Message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- End contact-page Area -->

@endsection

@section('footscript')

@endsection
