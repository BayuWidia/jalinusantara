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
      <h3 class="mb-30">Video Gallery</h3>
        <hr>
      <div class="progress-table-wrap">
        <div class="progress-table">
          <div class="table-head">
            <div class="serial">#</div>
            <div class="country" style="width:40%">Judul</div>
            <div class="visit">Video</div>
          </div>
          @php $i=1; @endphp
          @foreach($getVideo as $key)
            <div class="table-row">
              <div class="serial">{{$i++}}</div>
              <div class="country" style="width:40%">{{$key->judul}}</div>
              <div class="visit">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo substr($key->url_video,-11,23)?>" allowfullscreen></iframe>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="section-top-border">
      	<h3>Image Gallery</h3>
        <hr>
      	<div class="row gallery-item">
          @for($i=0; $i < count($getGaleri); $i++)
            <div class="col-md-4">
              <a href="{{ url('images/galeri/asli/') }}/{{$getGaleri[$i]->url_gambar}}" class="img-gal"><div class="single-gallery-image"
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
