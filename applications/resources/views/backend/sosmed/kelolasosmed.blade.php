@extends('backend.master.layouts.master')

@section('title')
    <title>Jalinusantara</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>FORM KELOLA FOTO</h2>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
          @if(Session::has('message'))
            <div class="alert bg-teal alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
              <p>{{ Session::get('message') }}</p>
            </div>
          @endif

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
      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header bg-orange">
                  <h2>
                      Formulir Tambah Foto
                  </h2>
              </div>
              <div class="body">
                <form action="{{route('galeri.store')}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="row clearfix">
                      <div class="col-sm-12">
                          <div class="form-group">
                              <div class="form-line">
                                  <label>Gambar Foto</label>
                                  @if ($errors->has('urlSlider'))
                                    <small style="color:red">* {{$errors->first('urlGaleri')}}</small>
                                  @endif
                                  <input type="file" name="urlGaleri" class="form-control">
                              </div>
                              <div>
                                <span class="text-muted"><i>* Max Size: 2MB.</i></span><br>
                                <span class="text-muted"><i>* Rekomendasi ukuran terbaik: 570 x 325 px.</i></span>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-line">
                                  <label>Judul Foto</label>
                                  @if ($errors->has('judul'))
                                    <small style="color:red">* {{$errors->first('judul')}}</small>
                                  @endif
                                  <input type="text" class="form-control" placeholder="Ketikkan Judul Foto..." name="judul" id="judul"/>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-line">
                                  <label>Keterangan Foto</label>
                                  @if ($errors->has('keteranganGaleri'))
                                    <small style="color:red">* {{$errors->first('keteranganGaleri')}}</small>
                                  @endif
                                  <textarea rows="4" class="form-control no-resize" placeholder="Ketikkan Keterangan Foto..." name="keteranganGaleri" id="keteranganGaleri"></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="form-line">
                                  <label>Status</label>
                                  <select class="form-control show-tick" name="activated" id="activated">
                                      <option value="1">Active</option>
                                      <option value="0">Non Active</option>
                                  </select>
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

        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-orange">
                    <h2>
                        List Data Foto
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="tabelinfo">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php $i=1; @endphp
                              @foreach($getGaleri as $key)
                                <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$key->judul}}</td>
                                  <td>
                                    @if($key->url_gambar!="")
                                      <img src="{{url('_thumbs/Galeri')}}/{{$key->url_gambar}}">
                                    @else
                                      <img src="{{url('images/')}}/no_image.jpg">
                                    @endif
                                  </td>
                                  <td>
                                    @if($key->activated=="1")
                                      <span class="label label-success">
                                        Active
                                      </span>
                                    @else
                                      <span class="label label-danger">
                                        Non Active
                                      </span>
                                    @endif
                                  </td>
                                  <td>
                                    <a href="#" class="btn btn-warning btn-xs edit" data-toggle="modal" data-target="#modaledit" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false">Update</a>
                                    @if($key->flag_gambar=="1")
                                        <a href="#" class="btn btn-success btn-xs flagpublish" data-toggle="modal" data-target="#modalflagedit" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false">Publish</a>
                                    @else
                                        <a href="#" class="btn bg-indigo btn-xs flagpublish" data-toggle="modal" data-target="#modalflagedit" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false">Un Publish</a>
                                    @endif
                                    @if($key->activated=="1")
                                      <a href="#" class="btn btn-danger btn-xs hapus" data-toggle="modal" data-target="#modaldelete" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false">Non Aktifkan?</a>
                                    @else
                                      <a href="#" class="btn btn-danger btn-xs aktifkan" data-toggle="modal" data-target="#modalAktifkan" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false">Aktifkan?</a>
                                    @endif

                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
    </div>
    <!-- #END# Input -->

    <!-- Modal Update-->
    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bounceInRight">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Konten Foto</h4>
                  </div>
                  <div class="modal-body">
                      <form action="{{route('galeri.update')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Gambar Foto</label>
                                        @if ($errors->has('urlGaleri'))
                                          <small style="color:red">* {{$errors->first('urlGaleri')}}</small>
                                        @endif
                                        <div style="margin-bottom:10px;">
                                          <img src="" id="gambarSlider">
                                        </div>
                                        <input type="file" name="urlGaleri" class="form-control" id="urlGaleriEdit">
                                        <input type="hidden" name="id" id="id">
                                    </div>
                                    <div>
                                      <span style="color:red;">* Biarkan kosong jika tidak ingin diganti.</span><br>
                                      <span class="text-muted"><i>* Max Size: 2MB.</i></span><br>
                                      <span class="text-muted"><i>* Rekomendasi ukuran terbaik: 1144 x 550 px.</i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Judul Foto</label>
                                        @if ($errors->has('judul'))
                                          <small style="color:red">* {{$errors->first('judul')}}</small>
                                        @endif
                                        <input type="text" class="form-control" placeholder="Ketikkan Judul Foto..." name="judul" id="judulEdit"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Keterangan Foto</label>
                                        @if ($errors->has('keteranganGaleri'))
                                          <small style="color:red">* {{$errors->first('keteranganGaleri')}}</small>
                                        @endif
                                        <textarea rows="4" class="form-control no-resize" placeholder="Ketikkan Keterangan Foto..." name="keteranganGaleri" id="keteranganGaleriEdit"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Status</label>
                                        <select class="form-control show-tick" name="activated" id="activated">
                                            <option value="1" id="flag_aktif">Active</option>
                                            <option value="0" id="flag_nonaktif">Non Active</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn pull-right btn-primary">Simpan Perubahan</button>
                                <button type="reset" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                      </form>
                  </div>
              </div>
        </div>
    </div>

    <!-- Modal Publish-->
    <div class="modal fade" id="modalflagedit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bounceInRight">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Status Foto</h4>
                  </div>
                  <div class="modal-body">
                        <p>Apakah anda yakin untuk mengubah status foto ini?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal"  onclick="resetPage()">Tidak</button>
                      <a href="" class="btn btn-primary" id="setFlagPublish">Ya, saya yakin</a>
                  </div>
              </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="modaldelete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bounceInRight">
                  <div class="modal-header">
                      <h4 class="modal-title">Non Aktifkan Data Foto</h4>
                  </div>
                  <div class="modal-body">
                      <p>Apakah anda yakin untuk mengnonaktifkan data foto ini?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal"  onclick="resetPage()">Tidak</button>
                      <a href="" class="btn btn-primary" id="setYaHapus">Ya, saya yakin</a>
                  </div>
              </div>
        </div>
    </div>

    <!-- Modal Aktikan-->
    <div class="modal inmodal fade" id="modalAktifkan" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content bounceInRight">
              <div class="modal-header">
                  <h4 class="modal-title">Aktifkan Data Foto</h4>
              </div>
              <div class="modal-body">
                  <p>Apakah anda yakin untuk mengaktifkan data foto ini?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-white" data-dismiss="modal"  onclick="resetPage()">Tidak</button>
                  <a href="" class="btn btn-primary" id="setYaAktifkan">Ya, saya yakin</a>
              </div>
          </div>
      </div>
    </div>

</div>
@endsection

@section('footscript')
<script src="{{asset('theme/js/pages/forms/basic-form-elements.js')}}"></script>

<script>
  $("#tabelinfo").on("click", "a.flagpublish", function(){
    var a = $(this).data('value');
    $('#setFlagPublish').attr('href', '{{url('admin/publish-galeri/')}}/'+a);
  });

  $("#tabelinfo").on("click", "a.hapus", function(){
    var a = $(this).data('value');
    var b = "hapus";
    $('#setYaHapus').attr('href', '{{url('admin/delete-galeri/')}}/'+a+'/'+b);
  });

  $("#tabelinfo").on("click", "a.aktifkan", function(){
    var a = $(this).data('value');
    var b = "aktifkan";
    $('#setYaAktifkan').attr('href', '{{url('admin/delete-galeri/')}}/'+a+'/'+b);
  });

  $("#tabelinfo").on("click", "a.edit", function(){
    var a = $(this).data('value');
    $.ajax({
      url: "{{url('/')}}/admin/bind-galeri/"+a,
      dataType: 'json',
      success: function(data){
        var id = data.id;
        var judul = data.judul;
        var keterangan_gambar = data.keterangan_gambar;
        var flag_gambar = data.flag_gambar;
        var url_gambar = data.url_gambar;

        $('#id').attr('value', id);
        $('#gambarSlider').attr('src', "{{url('_thumbs/galeri')}}/"+url_gambar);
        $('#judulEdit').val(judul);
        $('#keteranganGaleriEdit').val(keterangan_gambar);
        if(flag_gambar=="1") {
          $('#flag_aktif').attr('selected', true);
        } else {
          $('#flag_nonaktif').attr('selected', true);
        }
      }
    })
  });

</script>
@endsection
