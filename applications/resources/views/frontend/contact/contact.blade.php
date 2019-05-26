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
            Contact Us
          </h1>
          <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>
            <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('contact') }}"> Contact Us</a></p>
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
		<div class="row">
			<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
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
			<div class="col-lg-4 d-flex flex-column address-wrap">
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-home"></span>
					</div>
					<div class="contact-details">
						<h5>Binghamton, New York</h5>
						<p>
							4343 Hinkle Deegan Lake Road
						</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-phone-handset"></span>
					</div>
					<div class="contact-details">
						<h5>00 (958) 9865 562</h5>
						<p>Mon to Fri 9am to 6 pm</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="lnr lnr-envelope"></span>
					</div>
					<div class="contact-details">
						<h5>support@colorlib.com</h5>
						<p>Send us your query anytime!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<form class="form-area " action="{{route('contact.store')}}" method="post" enctype="multipart/form-data" class="contact-form text-right">
            {{csrf_field()}}
					<div class="row">
						<div class="col-lg-6 form-group">
              @if ($errors->has('nama'))
                <small style="color:red">* {{$errors->first('nama')}}</small>
              @endif
              <input name="nama" placeholder="Enter your name" onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Enter your name'"
                     class="common-input mb-20 form-control" value="{{ old('nama') }}" type="text">
             @if ($errors->has('email'))
               <small style="color:red">* {{$errors->first('email')}}</small>
             @endif
						  <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                     onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                     class="common-input mb-20 form-control" value="{{ old('email') }}" type="email">
            </div>
            <div class="col-lg-6 form-group">
              @if ($errors->has('subject'))
                <small style="color:red">* {{$errors->first('subject')}}</small>
              @endif
              <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''"
                     onblur="this.placeholder = 'Enter subject'"
                     class="common-input mb-20 form-control" value="{{ old('subject') }}" type="text">
             @if ($errors->has('telephone'))
               <small style="color:red">* {{$errors->first('telephone')}}</small>
             @endif
              <input name="telephone" placeholder="Enter telephone number" onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Enter telephone number'"
                      class="common-input mb-20 form-control" value="{{ old('telephone') }}" type="number">
            </div>
					</div>
          <div class="row">
						<div class="col-lg-12 form-group">
              @if ($errors->has('message'))
                <small style="color:red">* {{$errors->first('message')}}</small>
              @endif
							<textarea class="common-textarea form-control" name="message"
                        placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'"
                        >{{ old('message') }}</textarea>
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
