@extends('backend.master.layouts.master')

@section('title')
    <title>Jalinusantara</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>FORM KELOLA REGISTRASI</h2>
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
                      Edit Registrasi Events Jalinusantara
                  </h2>
                </div>
                <div class="body">
                  <form action="{{route('registrasi.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="media-heading">Nama Events : {{$dataEvents[0]->judul_event}}</h4>
                                    <hr>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <h4 class="media-heading">Nomor Registrasi : {{$editRegistrasi->no_registrasi}} -
                                          @if($editRegistrasi->flag_approve == 1)
                                            <span class="badge bg-success">
                                              Sudah Diapprove
                                            </span>
                                          @else
                                            <span class="badge bg-red">
                                              Belum Diapprove
                                            </span>
                                          @endif
                                        </h4>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <p><b>DRIVER</b></p>
                                        <p>Nama : <b>{{$editRegistrasi->nama_driver}}</b></p>
                                        <p>Nama Golongan Darah : <b>{{$editRegistrasi->golongan_darah_driver}}</b></p>
                                        <p>Nama No Telp : <b>{{$editRegistrasi->no_telp_driver}}</b></p>
                                        <p>Ukuran Kemeja : <b>{{$editRegistrasi->ukuran_kemeja_driver}}</b></p>
                                      </div>
                                      <div class="col-sm-6">
                                        <p><b>CO DRIVER</b></p>
                                        <p>Nama : <b>{{$editRegistrasi->nama_co_driver}}</b></p>
                                        <p>Nama Golongan Darah : <b>{{$editRegistrasi->golongan_darah_co_driver}}</b></p>
                                        <p>Nama No Telp : <b>{{$editRegistrasi->no_telp_co_driver}}</b></p>
                                        <p>Ukuran Kemeja : <b>{{$editRegistrasi->ukuran_kemeja_co_driver}}</b></p>
                                      </div>
                                    </div>
                                    <hr>
                                    <p><b>DATA GLOBAL</b></p>
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <p>Email : <b>{{$editRegistrasi->email}}</b></p>
                                        <p>Mobil : <b>{{$editRegistrasi->mobil}}</b></p>
                                        <p>No Polisi : <b>{{$editRegistrasi->no_polisi}}</b></p>
                                        <p>Bahan Bakar : <b>{{$editRegistrasi->bahan_bakar}}</b></p>
                                      </div>
                                      <div class="col-sm-6">
                                        <p>PAX : <b>{{$editRegistrasi->pax}}</b></p>
                                        <p>Penumpang 1 : <b>{{$editRegistrasi->penumpang_1}}</b></p>
                                        <p>Penumpang 2 : <b>{{$editRegistrasi->penumpang_2}}</b></p>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mandatory">
                                <div class="form-line">
                                    <label>Nomor Pintu</label>
                                    @if ($errors->has('nomorPintu'))
                                      <small style="color:red">* {{$errors->first('nomorPintu')}}</small>
                                    @endif
                                    <input type="hidden" class="form-control" value="{{$editRegistrasi->id}}" name="id" id="id"/>
                                    <input type="text" class="form-control" value="{{$editRegistrasi->nomor_pintu}}" placeholder="Ketikkan Nomor Pintu..." name="nomorPintu" id="nomorPintu"/>
                                </div>
                            </div>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Keluarga</th>
                                        <th>Hubungan Keluarga</th>
                                        <th>No Telp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php $i=1; @endphp
                                  @foreach($getDataKeluarga as $key)
                                    <tr>
                                      <td>{{$i++}}</td>
                                      <td>{{$key->nama_keluarga}}</td>
                                      <td>{{$key->hubungan_keluarga}}</td>
                                      <td>{{$key->no_telp_keluarga}}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn pull-right btn-primary">Simpan Perubahan</button>
                            <a href="{{ URL::previous() }}" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</a>
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
