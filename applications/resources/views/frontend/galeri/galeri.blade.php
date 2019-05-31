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
            <span class="lnr lnr-arrow-right"></span>  <a href="#"> Galeri</a></p>
        </div>
      </div>
    </div>
  </section>
<!-- End banner Area -->
@endsection


@section('content')

<!-- Start menu-list Area -->
<section class="menu-list-area section-gap">
	<div class="container">
    <div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">{{$getEvents[0]->judul_event}}</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="menu-cat mx-auto">
				<ul class="nav nav-pills" id="pills-tab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="foto-tab" data-toggle="pill" href="#foto" role="tab" aria-controls="foto" aria-selected="true">Gallery Foto</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="video-tab" data-toggle="pill" href="#video" role="tab" aria-controls="video" aria-selected="false">Gallery Video</a>
				  </li>
				</ul>
			</div>

		</div>
		<div id="pills-tabContent" class="tab-content absolute">
			<div class="tab-pane fade show active" id="foto" role="tabpanel" aria-labelledby="foto-tab">
        <div class="row gallery-item">
          @for($i=0; $i < count($getGaleri); $i++)
            <div class="col-md-4">
              <a href="{{ url('images/galeri/asli/') }}/{{$getGaleri[$i]->url_gambar}}" class="img-gal"><div class="single-gallery-image"
                style="background: url({{ url('images/galeri/') }}/{{$getGaleri[$i]->url_gambar}});"></div></a>
            </div>
          @endfor
      	</div>
			</div>
			 <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
         <table class="table" id="">
           <thead>
             <tr style="background-color:#CC9E61;color:white">
               <th>#</th>
               <th>Judul Event's</th>
               <th>Video</th>
             </tr>
           </thead>
           <tbody>
             @if($getVideo->isEmpty())
               <tr>
                 <td colspan="3" class="text-muted" style="text-align:center;"><i>Data video tidak tersedia.</i></td>
               </tr>
             @else
               @php
                 $pageget = 1;
               @endphp

               @foreach($getVideo as $key)
                 <tr>
                   <td>{{ $pageget }}</td>
                   <td>{{$key->judul}}</td>
                   <td>
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo substr($key->url_video,-11,23)?>" allowfullscreen></iframe>
                   </td>
                 </tr>
                 @php
                     $pageget++;
                 @endphp
               @endforeach
            @endif
           </tbody>
         </table>
			 </div>
		</div>
	</div>
</section>
<!-- End menu-list Area -->

@endsection

@section('footscript')

@endsection
