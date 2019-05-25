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
            Galeri
          </h1>
          <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>
            <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('galeri') }}"> Galeri</a></p>
        </div>
      </div>
    </div>
  </section>
<!-- End banner Area -->
@endsection


@section('content')
<!-- Start Align Area -->
<div class="whole-wrap">
	<div class="container">

    <div class="section-top-border">
      <h3 class="mb-30">Table</h3>
        <hr>
      <div class="progress-table-wrap">
        <div class="progress-table">
          <div class="table-head">
            <div class="serial">#</div>
            <div class="country">Countries</div>
            <div class="visit">Visits</div>
            <div class="percentage">Percentages</div>
          </div>
          <div class="table-row">
            <div class="serial">01</div>
            <div class="country"> <img src="img/elements/f1.jpg" alt="flag">Canada</div>
            <div class="visit">645032</div>
            <div class="percentage">
              <div class="progress">
                <div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-top-border">
      	<h3>Image Gallery</h3>
        <hr>
      	<div class="row gallery-item">
          @for($i=0; $i < count($getGaleri); $i++)
            <div class="col-md-4">
              <a href="{{ url('images/galeri/') }}/{{$getGaleri[$i]->url_gambar}}" class="img-gal"><div class="single-gallery-image"
                style="background: url({{ url('images/galeri/') }}/{{$getGaleri[$i]->url_gambar}});"></div></a>
            </div>
          @endfor
          <nav class="blog-pagination justify-content-center d-flex">
              {{ $getGaleri->links() }}
          </nav>
      	</div>
      </div>
	</div>
</div>
<!-- End Align Area -->

@endsection

@section('footscript')

@endsection
