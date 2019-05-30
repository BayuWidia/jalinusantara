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
    <div class="single-menu-list row justify-content-between align-items-center">
      <div class="col-lg-9">
        <a href="#"><h3>{{$getEvents[0]->judul_event}}</h3></a>
        <hr>
        <p>
            <h4><span class="lnr lnr-user"></span>&nbsp;&nbsp;&nbsp;<span>Fasilitator</span>   :  <b>{{$getEvents[0]->fasilitator}}</b></h4>
        </p>
        <p>
            <h4><span class="lnr lnr-location"></span>&nbsp;&nbsp;<span>Alamat</span>   :  <b>{{$getEvents[0]->alamat}}</b></h4>
        </p>
        <p>
            <h5><span class="lnr lnr-calendar-full"></span>&nbsp;&nbsp;&nbsp;<span><span>Tanggal</span>   :
              <b>
                {{ \Carbon\Carbon::parse($getEvents[0]->tanggal_mulai)->format('d-M-Y')}}
                &nbsp;s/d&nbsp;&nbsp;
                {{ \Carbon\Carbon::parse($getEvents[0]->tanggal_akhir)->format('d-M-Y')}}

              </b></h5>
        </p>
        <br>
        <p>
          <ul class="tags">
            Tags: <?php $isiTags = explode(",", $getEvents[0]->tags);?>
            @for($i=0; $i < count($isiTags); $i++)
                <span class="badge badge-warning">
                  <h6 style="color:white"><?php echo $isiTags[$i] ?></h6>
                </span>
            @endfor
          </ul>
        </p>
        <br>
        <p>
          <a href="{{url('events.pendaftaran')}}/{{$getEvents[0]->id}}" class="genric-btn info" style="background:black; color:white">
            Formulir Pendaftaran</a>
        </p>
      </div>
      <div class="col-lg-3 flex-row d-flex price-size">
        <div class="s-price col">
          <h5>Lokasi</h5>
          <span>{{$getEvents[0]->lokasi}}</span>
        </div>
        <div class="s-price col">
          <h5>Peserta</h4>
          <span>{{$getEvents[0]->jumlah_peserta}}</span>
        </div>
      </div>
    </div>
    <p class="excert">
      <blockquote class="generic-blockquote">
        <?php echo $getEvents[0]->isi_event ?>
      </blockquote>
    </p>

    <div class="section-top-border">
      <h3 class="mb-30">List Data Pendaftar</h3>
        <table class="table" id="">
          <thead>
            <tr>
              <th>#</th>
              <th>No Registrasi</th>
              <th>Nama Driver</th>
              <th>Email</th>
              <th>No Mobil</th>
              <th>No Telp</th>
              <th>No Pintu</th>
            </tr>
          </thead>
          <tbody>
            @if($getRegistrasiEvents->isEmpty())
              <tr>
                <td colspan="7" class="text-muted" style="text-align:center;"><i>Data Pendaftar tidak tersedia.</i></td>
              </tr>
            @else
              @php
                $pageget;
                if($getRegistrasiEvents->currentPage()==1)
                  $pageget = 1;
                else
                  $pageget = (($getRegistrasiEvents->currentPage() - 1) * $getRegistrasiEvents->perPage())+1;
              @endphp

              @foreach($getRegistrasiEvents as $key)
                <tr>
                  <td>{{ $pageget }}</td>
                  <td>{{$key->no_registrasi}}</td>
                  <td>{{$key->nama_driver}}</td>
                  <td>{{$key->email}}</th>
                  <td>{{$key->no_polisi}}</td>
                  <td>{{$key->no_telp_driver}}</td>
                  <td>{{$key->nomor_pintu}}</td>
                </tr>
                @php
                    $pageget++;
                @endphp
              @endforeach
           @endif
          </tbody>
        </table>
        <nav class="blog-pagination justify-content-center d-flex">
            {{ $getRegistrasiEvents->links() }}
        </nav>
    </div>
	</div>
</section>
  <!-- End menu-list Area -->

@endsection

@section('footscript')

@endsection
