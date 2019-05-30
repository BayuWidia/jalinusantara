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
            {{$getEvents[0]->nama_kategori}}
          </h1>
          <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>
            <span class="lnr lnr-arrow-right"></span>  <a href="{{$getEvents[0]->id_kategori}}"> {{$getEvents[0]->nama_kategori}}</a></p>
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
					<h1 class="mb-10">Events {{$getEvents[0]->nama_kategori}}</h1>
				</div>
			</div>
		</div>
    @foreach($getEvents as $key)
      <div class="single-menu-list row justify-content-between align-items-center">
        <div class="col-lg-9">
          <a href="#"><h4>{{$key->judul_event}}</h4></a>
          <p>
              <?php $isiEvents = explode(" ", $key->isi_event); ?>
              @if(count($isiEvents)<=15)
                <span><?php echo $key->isi_event ?></span>
              @else
                @for($i=0; $i < 15; $i++)
                  <span><?php echo $isiEvents[$i] ?></span>
                @endfor
                [.....]
              @endif
          </p>
          <p>
            <b><span class="lnr lnr-calendar-full"></span>&nbsp;{{ \Carbon\Carbon::parse($key->tanggal_mulai)->format('d-M-y')}}
            &nbsp;s/d&nbsp;&nbsp;
            <span class="lnr lnr-calendar-full"></span>&nbsp;{{ \Carbon\Carbon::parse($key->tanggal_akhir)->format('d-M-y')}}</b>
          </p>
          <br>
          <p>
            <a href="{{url('eventsById')}}/{{$key->id}}/{{$key->id_kategori}}" class="genric-btn info" style="background:black; color:white">
              Selengkapnya&nbsp;&nbsp;<span class="lnr lnr-pointer-right"></span></a>
          </p>
        </div>
        <div class="col-lg-3 flex-row d-flex price-size">
          <div class="s-price col">
            <h5>Lokasi</h5>
            <span>{{$key->lokasi}}</span>
          </div>
          <div class="s-price col">
            <h5>Peserta</h4>
            <span>{{$key->jumlah_peserta}}</span>
          </div>
        </div>
      </div>
    @endforeach
    <nav class="blog-pagination justify-content-center d-flex">
        {{ $getEvents->links() }}
    </nav>

	</div>
</section>
  <!-- End menu-list Area -->

@endsection

@section('footscript')

@endsection
