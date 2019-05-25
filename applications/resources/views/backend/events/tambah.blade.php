@extends('backend.master.layouts.master')

@section('title')
    <title>Jalinusantara</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>FORM KELOLA EVENTS</h2>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
          @if(Session::has('messagefail'))
          <div class="alert bg-pink alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4><i class="icon fa fa-ban"></i> Oops, terjadi kesalahan!</h4>
              <p>{{ Session::get('messagefail') }}</p>
            </div>
          @endif
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-orange">
                  <h2>
                      Tambah Events Jalinusantara
                  </h2>
                </div>
                <div class="body">
                  <form action="{{route('events.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group mandatory">
                                <div class="form-line">
                                    <label>Judul</label>
                                    @if ($errors->has('judul'))
                                      <small style="color:red">* {{$errors->first('judul')}}</small>
                                    @endif
                                    <input type="text" class="form-control" value="{{ old('judul') }}" placeholder="Ketikkan Judul..." name="judul" id="judul"/>
                                </div>
                            </div>
                            <div class="form-group mandatory">
                              <div class="form-line">
                                  <label>Kategori</label>
                                  @if ($errors->has('kategoriId'))
                                    <small style="color:red">* {{$errors->first('kategoriId')}}</small>
                                  @endif
                                  <select class="form-control show-tick" name="kategoriId" id="kategoriId">
                                      <option value="-- Pilih --">-- Pilih --</option>
                                      @foreach($getKategori as $key)
                                        <option value="{{ $key->id }}" {{ old('kategoriId') == $key->id ? 'selected=""' : ''}}>{{ $key->nama_kategori }}</option>
                                      @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="form-group mandatory">
                                <div class="form-line">
                                    <label>Fasilitator</label>
                                    @if ($errors->has('fasilitator'))
                                      <small style="color:red">* {{$errors->first('fasilitator')}}</small>
                                    @endif
                                    <input type="text" class="form-control" value="{{ old('fasilitator') }}" placeholder="Ketikkan Fasilitator..." name="fasilitator" id="fasilitator"/>
                                </div>
                            </div>
                            <div class="form-group mandatory">
                                <div class="form-line">
                                    <label>Jumlah Peserta</label>
                                    @if ($errors->has('jmlPeserta'))
                                      <small style="color:red">* {{$errors->first('jmlPeserta')}}</small>
                                    @endif
                                    <input type="number" class="form-control" value="{{ old('jmlPeserta') }}" placeholder="Ketikkan Jumlah Peserta..." name="jmlPeserta" id="jmlPeserta"/>
                                </div>
                            </div>
                            <div class="form-group mandatory">
                                <div class="form-line">
                                    <label>Lokasi</label>
                                    @if ($errors->has('lokasi'))
                                      <small style="color:red">* {{$errors->first('lokasi')}}</small>
                                    @endif
                                    <input type="text" class="form-control" value="{{ old('lokasi') }}" placeholder="Ketikkan Lokasi..." name="lokasi" id="lokasi"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Maps</label>
                                    @if ($errors->has('maps'))
                                      <small style="color:red">* {{$errors->first('maps')}}</small>
                                    @endif
                                    <input type="text" class="form-control" value="{{ old('maps') }}" placeholder="Ketikkan Maps..." name="maps" id="maps"/>
                                </div>
                                <div>
                                  <span class="text-muted"><i>* Isikan dengan titik koordinat dari google.</i></span>
                                </div>
                            </div>
                            <div class="form-group mandatory">
                                <label>Tanggal</label>
                                @if ($errors->has('tglAwal'))
                                  <small style="color:red">* {{$errors->first('tglAwal')}}</small>
                                @endif
                                <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="{{ old('tglAwal') }}" placeholder="Ketikkan Tanggal awal..." name="tglAwal" id="tglAwal">
                                    </div>
                                    <span class="input-group-addon">sampai</span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" value="{{ old('tglAkhir') }}" placeholder="Ketikkan Tanggal Akhir..." name="tglAkhir" id="tglAkhir">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mandatory">
                                <div class="form-line">
                                    <label>Gambar Events</label>
                                    @if ($errors->has('urlFoto'))
                                      <small style="color:red">* {{$errors->first('urlFoto')}}</small>
                                    @endif
                                    <input type="file" name="urlFoto" class="form-control" value="{{ old('urlFoto') }}" >
                                </div>
                                <div>
                                  <span class="text-muted"><i>* Max Size: 4MB.</i></span><br>
                                  <span class="text-muted"><i>* Rekomendasi ukuran terbaik: 555 x 280 px.</i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Tags</label>
                                    @if ($errors->has('tags'))
                                      <small style="color:red">* {{$errors->first('tags')}}</small>
                                    @endif
                                    <br>
                                    <input type="text" class="form-control" value="{{ old('tags') }}" name="tags" data-role="tagsinput" id="tagsinput"/>
                                </div>
                                <div>
                                  <span class="text-muted"><i>* Pisahkan isi tags dengan koma.</i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label>Headline</label>
                                    <br>
                                    <input type="checkbox" id="md_checkbox_21" name="flagHeadline" class="filled-in chk-col-red" value="1" />
                                    <label for="md_checkbox_21">* Ya, tampilkan events ini sebagai headline.</label>
                                </div>
                            </div>
                            <div class="form-group mandatory">
                              <div class="form-line">
                                  <label>Isi Konten</label>
                                  @if ($errors->has('isiKonten'))
                                    <small style="color:red">* {{$errors->first('isiKonten')}}</small>
                                  @endif
                                    <textarea id="ckeditor" name="isiKonten">{{old('isiKonten')}}</textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn pull-right btn-primary">Simpan Data</button>
                            <button type="reset" class="btn btn-danger">Reset Formulir</button>
                        </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
    </div>
    <!-- #END# Input -->

</div>
@endsection

@section('footscript')
<script src="{{asset('theme/js/pages/forms/basic-form-elements.js')}}"></script>

<!-- Ckeditor -->
<script src="{{asset('theme/plugins/ckeditor/ckeditor.js')}}"></script>

<!-- TinyMCE -->
<script src="{{asset('theme/plugins/tinymce/tinymce.js')}}"></script>

<script src="{{asset('theme/js/pages/forms/editors.js')}}"></script>

<script>
  $(document).ready(function() {

  });
</script>

<script>
    $(function(){
        $('#tagsinput').tagsinput();
    })
</script>
@endsection
