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
<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
	<div class="container">
    <div class="row">
        <div class="col-lg-8">
        </div>
        <div class="col-lg-4">
        </div>
    </div>
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-12">
						<div class="feature-img">
              <img src="{{ url('images/article/') }}/{{$getArticle[0]->url_foto}}" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<a class="posts-title" href="#"><h3>{{$getArticle[0]->judul_informasi}}</h3></a>
            <b>
              <?php $date = explode(' ', $getArticle[0]->created_at) ?>
              <span class="lnr lnr-user"></span>&nbsp;{{$getArticle[0]->fullname}} ||
              <span class="lnr lnr-calendar-full"></span>&nbsp;{{ \Carbon\Carbon::parse($getArticle[0]->created_at)->format('d-M-y')}} -
              <span class="lnr lnr-clock"></span>&nbsp;{{$date[1]}} ||
              <span class="lnr lnr-eye"></span>&nbsp;{{$getArticle[0]->view_counter}}
            </b>
            <p>
              <ul class="tags">
                Tags: <?php $isiTags = explode(",", $getArticle[0]->tags);?>
                @for($i=0; $i < count($isiTags); $i++)
                    <span class="badge badge-warning">
                      <h6 style="color:white"><?php echo $isiTags[$i] ?></h6>
                    </span>
                @endfor
  						</ul>
            </p>
            <hr>
						<p class="excert">
							<?php echo $getArticle[0]->isi_informasi ?>
						</p>
					</div>
				</div>

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
        <hr>
				<div class="comment-form">
					<h4>Leave a Comment</h4>
          <form action="{{route('articleById.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
						<div class="form-group form-inline">
						  <div class="form-group col-lg-6 col-md-12 name">
                @if ($errors->has('nama'))
                  <small style="color:red">* {{$errors->first('nama')}}</small>
                @endif
                <input type="hidden" name="id" value="{{$getArticle[0]->id}}">
                <input type="hidden" name="idKategori" value="{{$getArticle[0]->id_kategori}}">
						    <input type="text" class="form-control" id="name" name="nama" value="{{ old('nama') }}" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
						  </div>
						  <div class="form-group col-lg-6 col-md-12 email">
                @if ($errors->has('email'))
                  <small style="color:red">* {{$errors->first('email')}}</small>
                @endif
						    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
						  </div>
						</div>
						<div class="form-group">
              @if ($errors->has('subject'))
                <small style="color:red">* {{$errors->first('subject')}}</small>
              @endif
							<input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
						</div>
						<div class="form-group">
              @if ($errors->has('message'))
                <small style="color:red">* {{$errors->first('message')}}</small>
              @endif
							<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'">{{ old('message') }}</textarea>
						</div>
						<button type="submit" class="primary-btn text-uppercase">Post Comment</button>
					</form>
				</div>

        @if($getCountComment != 0)
          <div class="comments-area" style="background:white">
  					<h4>{{$getCountComment}} Comments</h4>
            @foreach($getComment as $key)
  					<div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="{{asset('themeuser/img/blog/user2.png')}}" alt="">
                        </div>
                        <div class="desc">
                            <h5><a href="#">{{$key->nama}}</a></h5>
                            <p class="date">{{ \Carbon\Carbon::parse($key->created_at)}} </p>
                            <p class="comment">
                                {{$key->subject}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @if($key->id_tanggapan != null)
  					<div class="comment-list left-padding">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="{{asset('themeuser/img/blog/admin2.png')}}" alt="">
                        </div>
                        <div class="desc">
                            <h5><a href="#">Admin Jalinusantara</a></h5>
                            <p class="date">{{ \Carbon\Carbon::parse($key->created_at2)}} </p>
                            <p class="comment">
                                {{$key->tanggapan}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
  				</div>
        @endif

			</div>

      <div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap" style="background:white">
          <div class="single-sidebar-widget popular-post-widget">
						<h4 class="popular-title">Related Article's</h4>
						<div class="popular-post-list">
              @foreach($getArticleTerkait as $key)
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
						<h4 class="category-title">Catgories</h4>
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
              <?php $isiTags = explode(",", $getArticle[0]->tags);?>
              @for($i=0; $i < count($isiTags); $i++)
    							<li><a href="#"><?php echo $isiTags[$i] ?></a></li>
              @endfor
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
