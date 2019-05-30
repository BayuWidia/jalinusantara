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
            {{$getArticle[0]->nama_kategori}}
          </h1>
          <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>
            <span class="lnr lnr-arrow-right"></span>  <a href="{{$getArticle[0]->id_kategori}}"> {{$getArticle[0]->nama_kategori}}</a></p>
        </div>
      </div>
    </div>
  </section>
<!-- End banner Area -->
@endsection


@section('content')
<!-- Start top-category-widget Area -->
<section class="top-category-widget-area pt-90 pb-90 ">
	<div class="container">
		<div class="row">
      @for($i=0; $i < 3; $i++)
			<div class="col-lg-4">
				<div class="single-cat-widget">
					<div class="content relative">
						<div class="overlay overlay-bg"></div>
					    <a href="{{ route('article', $getJumlahKategori[$i]->id_kategori) }}">
					      <div class="thumb">
					  		 <img class="content-image img-fluid d-block mx-auto"
                 src="{{asset('themeuser/img/blog/cat-widget1.jpg')}}" alt="">
					  	  </div>
					      <div class="content-details">
					        <h4 class="content-title mx-auto text-uppercase">{{$getJumlahKategori[$i]->nama_kategori}}</h4>
					        <span></span>
					        <p>Enjoy your social life together</p>
					      </div>
					    </a>
					</div>
				</div>
			</div>
      @endfor

		</div>
	</div>
</section>
<!-- End top-category-widget Area -->

<!-- Start post-content Area -->
<section class="post-content-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
        @foreach($getArticle as $key)
				<div class="single-post row">
					<div class="col-lg-3 col-md-3 meta-details">
            <ul class="tags">
              <?php $isiTags = explode(",", $key->tags);?>
              @for($i=0; $i < count($isiTags); $i++)
                  <span class="badge badge-warning">
                    <h6 style="color:white"><?php echo $isiTags[$i] ?></h6>
                  </span>
              @endfor
						</ul>
						<div class="user-details row">
              <?php $date = explode(' ', $key->created_at) ?>
							<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{$key->name}}</a> <span class="lnr lnr-user"></span></p>
							<p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ \Carbon\Carbon::parse($key->created_at)->format('d-M-y')}}</a> <span class="lnr lnr-calendar-full"></span></p>
              <p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ $date[1]}}</a> <span class="lnr lnr-clock"></span></p>
							<p class="view col-lg-12 col-md-12 col-6"><a href="#">{{$key->view_counter}} Views</a> <span class="lnr lnr-eye"></span></p>

            </div>
					</div>

					<div class="col-lg-9 col-md-9 ">
						<div class="feature-img">
              <img src="{{ url('images/article/') }}/{{$key->url_foto}}" class="img-fluid">
						</div>
						<a class="posts-title" href="#"><h3>{{$key->judul_informasi}}</h3></a>
						<p class="excert">
                <?php $isiArticle = explode(" ", $key->isi_informasi); ?>
                @if(count($isiArticle)<=35)
                  <span><?php echo $key->isi_informasi ?></span>
                @else
                  @for($i=0; $i < 35; $i++)
                    <span><?php echo $isiArticle[$i] ?></span>
                  @endfor
                  [.....]
                @endif
						</p>
						<a href="{{url('articleById')}}/{{$key->id}}/{{$key->id_kategori}}" class="genric-btn info"
              style="background:black; color:white">
              Selengkapnya&nbsp;&nbsp;<span class="lnr lnr-pointer-right"></span></a>
					</div>
				</div>
        <hr>
        @endforeach

        <nav class="blog-pagination justify-content-center d-flex">
            {{ $getArticle->links() }}
        </nav>
			</div>
			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap" style="background:white">
					<div class="single-sidebar-widget ads-widget">
						<a href="#"><img class="img-fluid" src="{{asset('themeuser/img/iklan.jpg')}}" alt=""></a>
					</div>
          <div class="single-sidebar-widget popular-post-widget">
						<h4 class="popular-title">Article's Popular</h4>
						<div class="popular-post-list">
              @foreach($getArticlePopuler as $key)
							<div class="single-post-list d-flex flex-row align-items-center">
								<div class="thumb">
                  <img src="{{ url('images/article/') }}/{{$key->url_foto}}" class="img-fluid">
								</div>
								<div class="details">
									<a href="{{url('articleById')}}/{{$key->id}}/{{$key->id_kategori}}"><h6>{{$key->judul_informasi}}</h6></a>
									<p><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($key->created_at))->diffForHumans() ?></p>
								</div>
							</div>
              @endforeach

						</div>
					</div>
					<div class="single-sidebar-widget post-category-widget">
						<h4 class="category-title">Post Catgories</h4>
						<ul class="cat-list">
              @foreach($getJumlahKategori as $key)
  							<li>
  								<a href="{{ route('article', $key->id_kategori) }}" class="d-flex justify-content-between">
  									<p>{{$key->nama_kategori}}</p>
  									<p>{{$key->jumlah}}</p>
  								</a>
  							</li>
              @endforeach
						</ul>
					</div>
					<div class="single-sidebar-widget tag-cloud-widget">
						<h4 class="tagcloud-title">Tag Clouds</h4>
						<ul>
              @foreach($getArticle as $key)
              <?php $isiTags = explode(",", $key->tags);?>
              @for($i=0; $i < count($getArticle); $i++)
    							<li><a href="#"><?php echo $isiTags[$i] ?></a></li>
              @endfor
              @endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End post-content Area -->

@endsection

@section('footscript')

@endsection
