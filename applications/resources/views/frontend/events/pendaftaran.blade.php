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
					<div class="row">
						<div class="col-lg-6 form-group">
              <h3><b>DRIVER</b></h3>
              <hr>
              @if ($errors->has('namaDriver'))
                <small style="color:red">* {{$errors->first('namaDriver')}}</small>
              @endif
              <input type="hidden" name="idEvents" id="idEvents" value="{{$getEvents[0]->id}}">
              <input name="namaDriver" placeholder="Ketikkan Nama..."
                     class="common-input mb-20 form-control" value="{{ old('namaDriver') }}" type="text">
             @if ($errors->has('golonganDarahDriver'))
               <small style="color:red">* {{$errors->first('golonganDarahDriver')}}</small>
             @endif
               <input name="golonganDarahDriver" placeholder="Ketikkan Golongan Darah..."
                      class="common-input mb-20 form-control" value="{{ old('golonganDarahDriver') }}" type="text">
             @if ($errors->has('noTelpDriver'))
               <small style="color:red">* {{$errors->first('noTelpDriver')}}</small>
             @endif
               <input name="noTelpDriver" placeholder="Ketikkan No Telepone..."
                      class="common-input mb-20 form-control" value="{{ old('noTelpDriver') }}" type="text">
            @if ($errors->has('ukuranKemejaDriver'))
              <small style="color:red">* {{$errors->first('ukuranKemejaDriver')}}</small>
            @endif
              <input name="ukuranKemejaDriver" placeholder="Ketikkan Ukuran Kemeja..."
                     class="common-input mb-20 form-control" value="{{ old('ukuranKemejaDriver') }}" type="text">
            </div>
            <div class="col-lg-6 form-group">
              <h3><b>CO DRIVER</b></h3>
              <hr>
              @if ($errors->has('namaCoDriver'))
                <small style="color:red">* {{$errors->first('namaCoDriver')}}</small>
              @endif
              <input name="namaCoDriver" placeholder="Ketikkan Nama..."
                     class="common-input mb-20 form-control" value="{{ old('namaCoDriver') }}" type="text">
             @if ($errors->has('golonganDarahCoDriver'))
               <small style="color:red">* {{$errors->first('golonganDarahCoDriver')}}</small>
             @endif
               <input name="golonganDarahCoDriver" placeholder="Ketikkan Golongan Darah..."
                      class="common-input mb-20 form-control" value="{{ old('golonganDarahCoDriver') }}" type="text">
             @if ($errors->has('noTelpCoDriver'))
               <small style="color:red">* {{$errors->first('noTelpCoDriver')}}</small>
             @endif
               <input name="noTelpCoDriver" placeholder="Ketikkan No Telepone..."
                      class="common-input mb-20 form-control" value="{{ old('noTelpCoDriver') }}" type="text">
            @if ($errors->has('ukuranKemejaCoDriver'))
              <small style="color:red">* {{$errors->first('ukuranKemejaCoDriver')}}</small>
            @endif
              <input name="ukuranKemejaCoDriver" placeholder="Ketikkan Ukuran Kemeja..."
                     class="common-input mb-20 form-control" value="{{ old('ukuranKemejaCoDriver') }}" type="text">
            </div>
					</div>
          <h3><b>DATA GLOBAL</b></h3>
          <hr>
          <div class="row">
						<div class="col-lg-12 form-group">
              @if ($errors->has('email'))
                <small style="color:red">* {{$errors->first('email')}}</small>
              @endif
              <label><b>Email</b></label>
              <input name="email" placeholder="Ketikkan Email..."
                     class="common-input mb-20 form-control" value="{{ old('email') }}" type="email">
             @if ($errors->has('mobil'))
               <small style="color:red">* {{$errors->first('mobil')}}</small>
             @endif
             <label><b>Mobil</b></label>
             <input name="mobil" placeholder="Ketikkan Mobil..."
                    class="common-input mb-20 form-control" value="{{ old('mobil') }}" type="text">

             @if ($errors->has('noPolisi'))
               <small style="color:red">* {{$errors->first('noPolisi')}}</small>
             @endif
             <label><b>No Polisi</b></label>
             <input name="noPolisi" placeholder="Ketikkan No Polisi..."
                    class="common-input mb-20 form-control" value="{{ old('noPolisi') }}" type="text">

              @if ($errors->has('bahanBakar'))
                <small style="color:red">* {{$errors->first('bahanBakar')}}</small>
              @endif
              <label><b>Bahan Bakar</b></label>
              <input name="bahanBakar" placeholder="Ketikkan Bahan Bakar..."
                     class="common-input mb-20 form-control" value="{{ old('bahanBakar') }}" type="text">

              @if ($errors->has('pax'))
                <small style="color:red">* {{$errors->first('pax')}}</small>
              @endif
              <label><b>PAX</b></label>
              <input name="pax" placeholder="Ketikkan PAX..."
                     class="common-input mb-20 form-control" value="{{ old('pax') }}" type="text">

               @if ($errors->has('penumpang1'))
                 <small style="color:red">* {{$errors->first('penumpang1')}}</small>
               @endif
               <label><b>Penumpang 1</b></label>
               <input name="penumpang1" placeholder="Ketikkan Penumpang 1..."
                      class="common-input mb-20 form-control" value="{{ old('penumpang1') }}" type="text">

               @if ($errors->has('penumpang2'))
                 <small style="color:red">* {{$errors->first('penumpang2')}}</small>
               @endif
               <label><b>Penumpang 2</b></label>
               <input name="penumpang2" placeholder="Ketikkan Penumpang 2..."
                      class="common-input mb-20 form-control" value="{{ old('penumpang2') }}" type="text">
  						</div>
            </div>
            <h3><b>DATA KELUARGA</b></h3>
            <br>
              <label class="genric-btn info" onclick="addKeluarga('tblKeluarga')">Tambah Keluarga</label>
                &nbsp;<label class="genric-btn danger" onclick="delKeluarga('tblKeluarga')">Hapus Keluarga</label>

            <table class="table" id="tblKeluarga">
              <tbody>
                <tr>
                  <th></th>
                  <th width="200px">Nama</th>
                  <th width="200px">Hubungan</th>
                  <th width="200px">No Telepone</th>
                </tr>
                <tr>
                  <td><input type="checkbox" name="chk"/></td>
                  <td>
                    <input name="dataKeluarga[0][namaKeluarga]" placeholder = "Ketikkan Nama Keluarga..."
                         class="form-control" value="" type="text" required>
                  </td>
                  <td>
                      <select style="height:50px;border-radius: 0" name="dataKeluarga[0][hubunganKeluarga]" class="form-control" >
                          <option value="" >-- Pilih --</option>
                          <option value="AYAH">AYAH</option>
                          <option value="IBU">IBU</option>
                          <option value="SUAMI">SUAMI</option>
                          <option value="ISTRI">ISTRI</option>
                          <option value="KAKAK">KAKAK</option>
                          <option value="ADIK">ADIK</option>
                          <option value="ANAK">ANAK</option>
                          <option value="LAINNYA">LAINNYA</option>
                      </select>
                  </td>
                  <td>
                    <input name="dataKeluarga[0][noTelpKeluarga]" placeholder="Ketikkan No Telp Keluarga..."
                                 class="form-control" value="" type="text" required>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="row">
  						<div class="col-lg-12 form-group">
              </div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left;"></div>
							<button class="genric-btn primary" style="float: right;" type="submit">Register</button>
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

<script language="javascript">
  var numA=1;
  function addKeluarga(tableID) {
    numA++;
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var cell1 = row.insertCell(0);
    cell1.innerHTML = '<input type="checkbox" name="chk[]"/>';
    var cell2 = row.insertCell(1);
    cell2.innerHTML = '<input type="text" name="dataKeluarga['+numA+'][namaKeluarga]" class="form-control" placeholder="Ketikkan Nama Keluarga...">';
    var cell3 = row.insertCell(2);
    cell3.innerHTML = '<select style="height:50px;border-radius: 0" name=dataKeluarga['+numA+'][hubunganKeluarga]" class="form-control"><option value="" >-- Pilih --</option><option value="AYAH">AYAH</option><option value="IBU">IBU</option><option value="SUAMI">SUAMI</option><option value="ISTRI">ISTRI</option><option value="KAKAK">KAKAK</option><option value="ADIK">ADIK</option><option value="ANAK">ANAK</option><option value="LAINNYA">LAINNYA</option></select>';
    var cell4 = row.insertCell(3);
    cell4.innerHTML = '<input type="text" name=dataKeluarga['+numA+'][noTelpKeluarga]" class="form-control" value="" placeholder="Ketikkan No Telp Keluarga...">';
  }

  function delKeluarga(tableID) {
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

@endsection
