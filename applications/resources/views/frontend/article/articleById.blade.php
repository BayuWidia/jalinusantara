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
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-12">
						<div class="feature-img">
              <img src="{{ url('images/article/') }}/{{$getArticle[0]->url_foto}}" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-3  col-md-3 meta-details">
						<div class="user-details row">
              <?php $date = explode(' ', $getArticle[0]->created_at) ?>
							<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">{{$getArticle[0]->name}}</a> <span class="lnr lnr-user"></span></p>
							<p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ \Carbon\Carbon::parse($getArticle[0]->created_at)->format('d-M-y')}}</a> <span class="lnr lnr-calendar-full"></span></p>
              <p class="date col-lg-12 col-md-12 col-6"><a href="#">{{ $date[1]}}</a> <span class="lnr lnr-clock"></span></p>
							<p class="view col-lg-12 col-md-12 col-6"><a href="#">{{$getArticle[0]->view_counter}}</a> <span class="lnr lnr-eye"></span></p>
							<ul class="social-links col-lg-12 col-md-12 col-6">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-9 col-md-9">
						<a class="posts-title" href="#"><h3>{{$getArticle[0]->judul_informasi}}</h3></a>
						<p class="excert">
							<?php echo $getArticle[0]->isi_informasi ?>
						</p>
					</div>
				</div>

        <div class="comments-area">
					<h4>05 Comments</h4>
					<div class="comment-list">
                              <div class="single-comment justify-content-between d-flex">
                                  <div class="user justify-content-between d-flex">
                                      <div class="thumb">
                                          <img src="{{asset('themeuser/img/blog/c1.jpg')}}" alt="">
                                      </div>
                                      <div class="desc">
                                          <h5><a href="#">Emilly Blunt</a></h5>
                                          <p class="date">December 4, 2017 at 3:12 pm </p>
                                          <p class="comment">
                                              Never say goodbye till the end comes!
                                          </p>
                                      </div>
                                  </div>
                                  <div class="reply-btn">
                                         <a href="" class="btn-reply text-uppercase">reply</a>
                                  </div>
                              </div>
                          </div>
					<div class="comment-list left-padding">
                              <div class="single-comment justify-content-between d-flex">
                                  <div class="user justify-content-between d-flex">
                                      <div class="thumb">
                                          <img src="{{asset('themeuser/img/blog/c2.jpg')}}" alt="">
                                      </div>
                                      <div class="desc">
                                          <h5><a href="#">Elsie Cunningham</a></h5>
                                          <p class="date">December 4, 2017 at 3:12 pm </p>
                                          <p class="comment">
                                              Never say goodbye till the end comes!
                                          </p>
                                      </div>
                                  </div>
                                  <div class="reply-btn">
                                         <a href="" class="btn-reply text-uppercase">reply</a>
                                  </div>
                              </div>
                          </div>
					<div class="comment-list left-padding">
                              <div class="single-comment justify-content-between d-flex">
                                  <div class="user justify-content-between d-flex">
                                      <div class="thumb">
                                          <img src="{{asset('themeuser/img/blog/c3.jpg')}}" alt="">
                                      </div>
                                      <div class="desc">
                                          <h5><a href="#">Annie Stephens</a></h5>
                                          <p class="date">December 4, 2017 at 3:12 pm </p>
                                          <p class="comment">
                                              Never say goodbye till the end comes!
                                          </p>
                                      </div>
                                  </div>
                                  <div class="reply-btn">
                                         <a href="" class="btn-reply text-uppercase">reply</a>
                                  </div>
                              </div>
                          </div>
					<div class="comment-list">
                              <div class="single-comment justify-content-between d-flex">
                                  <div class="user justify-content-between d-flex">
                                      <div class="thumb">
                                          <img src="{{asset('themeuser/img/blog/c4.jpg')}}" alt="">
                                      </div>
                                      <div class="desc">
                                          <h5><a href="#">Maria Luna</a></h5>
                                          <p class="date">December 4, 2017 at 3:12 pm </p>
                                          <p class="comment">
                                              Never say goodbye till the end comes!
                                          </p>
                                      </div>
                                  </div>
                                  <div class="reply-btn">
                                         <a href="" class="btn-reply text-uppercase">reply</a>
                                  </div>
                              </div>
                          </div>
					<div class="comment-list">
                              <div class="single-comment justify-content-between d-flex">
                                  <div class="user justify-content-between d-flex">
                                      <div class="thumb">
                                          <img src="{{asset('themeuser/img/blog/c5.jpg')}}" alt="">
                                      </div>
                                      <div class="desc">
                                          <h5><a href="#">Ina Hayes</a></h5>
                                          <p class="date">December 4, 2017 at 3:12 pm </p>
                                          <p class="comment">
                                              Never say goodbye till the end comes!
                                          </p>
                                      </div>
                                  </div>
                                  <div class="reply-btn">
                                         <a href="" class="btn-reply text-uppercase">reply</a>
                                  </div>
                              </div>
                          </div>
				</div>
				<div class="comment-form">
					<h4>Leave a Comment</h4>
					<form>
						<div class="form-group form-inline">
						  <div class="form-group col-lg-6 col-md-12 name">
						    <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
						  </div>
						  <div class="form-group col-lg-6 col-md-12 email">
						    <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
						  </div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
						</div>
						<div class="form-group">
							<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
						</div>
						<a href="#" class="primary-btn text-uppercase">Post Comment</a>
					</form>
				</div>


			</div>
      <div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">
          <div class="single-sidebar-widget popular-post-widget">
						<h4 class="popular-title">Article Terkait</h4>
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
						<a href="#"><img class="img-fluid" src="{{asset('themeuser/img/blog/ads-banner.jpg')}}" alt=""></a>
					</div>
          <div class="single-sidebar-widget popular-post-widget">
						<h4 class="popular-title">Popular Posts</h4>
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
