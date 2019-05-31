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
				<form class="form-area " action="{{route('registrasi.events.store')}}" method="post" enctype="multipart/form-data" class="contact-form text-right">
            {{csrf_field()}}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#drivertab" id="tab_driver">DRIVER</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#drivercotab" id="tab_codriver">CO DRIVER</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#mekanik1tab" id="tab_mekanik1">CREW / MEKANIK 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#mekanik2tab" id="tab_mekanik2">CREW / MEKANIK 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kendaraantab" id="tab_kendaraan">KENDARAAN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#contacttab" id="tab_contact">EMERGENCY CONTACT</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              {{-- START Data Driver --}}
              <div class="tab-pane container active" id="drivertab">..DRIVER
                <br>
                <a href="#drivercotab" data-toggle="tab" id="btnkecodriver">
                  <label class="genric-btn info">Selanjutnya</label>
                </a>
              </div>
              {{-- END Data Driver --}}


              {{-- START Data CO Driver --}}
              <div class="tab-pane container fade" id="drivercotab">..CO DRIVER

                <br>
                <a href="#drivertab" data-toggle="tab" id="btndaridriver">
                  <label class="genric-btn info">Sebelumnya</label>
                </a>
                <a href="#mekanik1tab" data-toggle="tab" id="btnkemekanik1">
                  <label class="genric-btn info">Selanjutnya</label>
                </a>
              </div>
              {{-- END Data CO Driver --}}


              {{-- START Data Menanik1 --}}
              <div class="tab-pane container fade" id="mekanik1tab">..mekanik1

                <br>
                <a href="#drivercotab" data-toggle="tab" id="btndaricodriver">
                  <label class="genric-btn info">Sebelumnya</label>
                </a>
                <a href="#mekanik2tab" data-toggle="tab" id="btnkemekanik2">
                  <label class="genric-btn info">Selanjutnya</label>
                </a>
              </div>
              {{-- END Data Menanik1 --}}


              {{-- START Data Menanik2 --}}
              <div class="tab-pane container fade" id="mekanik2tab">..mekanik2

                <br>
                <a href="#mekanik1tab" data-toggle="tab" id="btndarimekanik1">
                  <label class="genric-btn info">Sebelumnya</label>
                </a>
                <a href="#kendaraantab" data-toggle="tab" id="btnkekendaraan">
                  <label class="genric-btn info">Selanjutnya</label>
                </a>
              </div>
              {{-- END Data Menanik2 --}}

              {{-- START Data Kendaraan --}}
              <div class="tab-pane container fade" id="kendaraantab">..kendaraan

                <br>
                <a href="#mekanik2tab" data-toggle="tab" id="btndarimekanik2">
                  <label class="genric-btn info">Sebelumnya</label>
                </a>
                <a href="#contacttab" data-toggle="tab" id="btnkecontact">
                  <label class="genric-btn info">Selanjutnya</label>
                </a>
              </div>
              {{-- END Data Kendaraan --}}

              {{-- START Data Contact --}}
              <div class="tab-pane container fade" id="contacttab">..contact
                <br>
                <a href="#kendaraantab" data-toggle="tab" id="btndarikendaraan">
                  <label class="genric-btn info">Sebelumnya</label>
                </a>
              </div>
              {{-- END Data Contact --}}
            </div>

				</form>
			</div>
		</div>
	</div>
</section>
<!-- End contact-page Area -->

@endsection

@section('footscript')

<script language="javascript">
  var numA=1;
  function addPengalamanDriver(tableID) {
    numA++;
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var cell1 = row.insertCell(0);
    cell1.innerHTML = '<input type="checkbox" name="chk[]"/>';
    var cell2 = row.insertCell(1);
    cell2.innerHTML = '<input type="text" name="dataPengalaman['+numA+'][namaEventDriver]" class="form-control" placeholder="Ketikkan Nama Events...">';
    var cell3 = row.insertCell(2);
    cell3.innerHTML = '<input type="number" name=dataPengalaman['+numA+'][tahunEventDriver]" class="form-control" value="" placeholder="Ketikkan Tahun...">';
  }

  function delPengalamanDriver(tableID) {
      try {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;

      for(var i=0; i<rowCount; i++) {
          var row = table.rows[i];
          var chkbox = row.cells[0].childNodes[0];
          if(null != chkbox && true == chkbox.checked) {
              table.deleteRow(i);
              rowCount--;
              i--;
              numA--;
          }
      }
      }catch(e) {
          alert(e);
      }
  }
</script>

<script language="javascript">
    // START ONCLICK BUTTON KE TAB SELANJUTNYA
    $('#btnkecodriver').click(function(){
      $('a#tab_codriver').attr('class','nav-link active');
      $('a#tab_driver').attr('class','nav-link');
      $('div#drivercotab').attr('class','tab-pane container active');
      $('div#drivertab').attr('class','tab-pane container fade');
    });

    $('#btnkemekanik1').click(function(){
      $('a#tab_mekanik1').attr('class','nav-link active');
      $('a#tab_codriver').attr('class','nav-link');
      $('div#mekanik1tab').attr('class','tab-pane container active');
      $('div#drivercotab').attr('class','tab-pane container fade');
    });

    $('#btnkemekanik2').click(function(){
      $('a#tab_mekanik2').attr('class','nav-link active');
      $('a#tab_mekanik1').attr('class','nav-link');
      $('div#mekanik2tab').attr('class','tab-pane container active');
      $('div#mekanik1tab').attr('class','tab-pane container fade');
    });

    $('#btnkekendaraan').click(function(){
      $('a#tab_kendaraan').attr('class','nav-link active');
      $('a#tab_mekanik2').attr('class','nav-link');
      $('div#kendaraantab').attr('class','tab-pane container active');
      $('div#mekanik2tab').attr('class','tab-pane container fade');
    });

    $('#btnkecontact').click(function(){
      $('a#tab_contact').attr('class','nav-link active');
      $('a#tab_kendaraan').attr('class','nav-link');
      $('div#contacttab').attr('class','tab-pane container active');
      $('div#kendaraantab').attr('class','tab-pane container fade');
    });
    // END ONCLICK BUTTON KE TAB SELANJUTNYA


    // START ONCLICK BUTTON KE TAB SEBELUMNYA
    $('#btndaridriver').click(function(){
      $('a#tab_codriver').attr('class','nav-link');
      $('a#tab_driver').attr('class','nav-link active');
      $('div#drivercotab').attr('class','tab-pane container fade');
      $('div#drivertab').attr('class','tab-pane container active');
    });

    $('#btndaricodriver').click(function(){
      $('a#tab_mekanik1').attr('class','nav-link');
      $('a#tab_codriver').attr('class','nav-link active');
      $('div#mekanik1tab').attr('class','tab-pane container fade');
      $('div#drivercotab').attr('class','tab-pane container active');
    });

    $('#btndarimekanik1').click(function(){
      $('a#tab_mekanik2').attr('class','nav-link');
      $('a#tab_mekanik1').attr('class','nav-link active');
      $('div#mekanik2tab').attr('class','tab-pane container fade');
      $('div#mekanik1tab').attr('class','tab-pane container active');
    });

    $('#btndarimekanik2').click(function(){
      $('a#tab_kendaraan').attr('class','nav-link');
      $('a#tab_mekanik2').attr('class','nav-link active');
      $('div#kendaraantab').attr('class','tab-pane container fade');
      $('div#mekanik2tab').attr('class','tab-pane container active');
    });

    $('#btndarikendaraan').click(function(){
      $('a#tab_contact').attr('class','nav-link');
      $('a#tab_kendaraan').attr('class','nav-link active');
      $('div#contacttab').attr('class','tab-pane container fade');
      $('div#kendaraantab').attr('class','tab-pane container active');
    });
    // END ONCLICK BUTTON KE TAB SEBELUMNYA


</script>


@endsection
