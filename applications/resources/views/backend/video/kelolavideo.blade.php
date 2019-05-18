@extends('backend.master.layouts.master')

@section('title')
    <title>Jalinusantara</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>FORM KELOLA VIDEO</h2>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-orange">
                    <h2>
                        <a href="#" class="btn bg-blue"
                           data-toggle="modal" data-target="#modalinsert"
                           data-backdrop="static" data-keyboard="false"><i class="material-icons">playlist_add</i></a>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tabelinfo">
                            <thead>
                                <tr>
                                    <th style="text-align:center">No</th>
                                    <th style="text-align:center">Judul Video</th>
                                    <th style="text-align:center">Url Video</th>
                                    <th style="text-align:center">Status</th>
                                    <th style="text-align:center">Video Utama</th>
                                    <th style="text-align:center">Status Publish</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php $i=1; @endphp
                              @foreach($getVideo as $key)
                                <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$key->judul}}</td>
                                  <td>
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo substr($key->url_video,-11,23)?>" allowfullscreen></iframe>
                                  </td>
                                  <td style="text-align:center">
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
                                    @if($key->flag_important_video=="1")
                                      <a href="#" class="btn bg-deep-purple btn-circle waves-effect waves-circle waves-float flagutama"
                                      data-toggle="modal" data-target="#modalflagutama"
                                      data-value="{{$key->id}}" data-backdrop="static"
                                      data-keyboard="false"><i class="material-icons">favorite</i></a>
                                    @else
                                      <a href="#" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float flagutama"
                                      data-toggle="modal" data-target="#modalflagutama" data-value="{{$key->id}}"
                                      data-backdrop="static" data-keyboard="false"><i class="material-icons">favorite_border</i></a>
                                    @endif
                                  </td>
                                  <td>
                                    @if($key->flag_video=="1")
                                      <a href="#" class="btn btn-warning btn-circle waves-effect waves-circle waves-float flagpublish"
                                      data-toggle="modal" data-target="#modalflagedit"
                                      data-value="{{$key->id}}" data-backdrop="static"
                                      data-keyboard="false"><i class="material-icons">star</i></a>
                                    @else
                                      <a href="#" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float flagpublish"
                                      data-toggle="modal" data-target="#modalflagedit" data-value="{{$key->id}}"
                                      data-backdrop="static" data-keyboard="false"><i class="material-icons">star_border</i></a>
                                    @endif
                                  </td>
                                  <td>
                                    <a href="#" class="btn btn-success btn-circle waves-effect waves-circle waves-float edit"
                                       data-toggle="modal" data-target="#modaledit" data-value="{{$key->id}}"
                                       data-backdrop="static" data-keyboard="false"><i class="material-icons">open_in_new</i></a>
                                    @if($key->activated=="1")
                                      <a href="#" class="btn btn-danger btn-circle waves-effect waves-circle waves-float hapus"
                                      data-toggle="modal" data-target="#modaldelete"
                                      data-value="{{$key->id}}" data-backdrop="static"
                                      data-keyboard="false"><i class="material-icons">lock_outline</i></a>
                                    @else
                                      <a href="#" class="btn btn-danger btn-circle waves-effect waves-circle waves-float aktifkan"
                                      data-toggle="modal" data-target="#modalAktifkan"
                                      data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false"><i class="material-icons">lock_open</i></a>
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

    <!-- Modal Insert-->
    <div class="modal fade" id="modalinsert" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bounceInRight">
                  <div class="modal-header">
                      <h4 class="modal-title">Tambah Konten Video</h4>
                  </div>
                  <div class="modal-body">
                      <form action="{{route('video.store')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group mandatory">
                                    <div class="form-line">
                                        <label>Judul Video</label>
                                        @if ($errors->has('judul'))
                                          <small style="color:red">* {{$errors->first('judul')}}</small>
                                        @endif
                                        <input type="text" class="form-control" value="{{ old('judul') }}"  placeholder="Ketikkan Judul Video..." name="judul" id="judul"/>
                                    </div>
                                </div>
                                <div class="form-group mandatory">
                                    <div class="form-line">
                                        <label>Url Video</label>
                                        @if ($errors->has('urlVideo'))
                                          <small style="color:red">* {{$errors->first('urlVideo')}}</small>
                                        @endif
                                        <input type="text" class="form-control" value="{{ old('urlVideo') }}" placeholder="Ketikkan Url Video..." name="urlVideo" id="urlVideo"/>
                                    </div>
                                </div>
                                <div class="form-group mandatory">
                                    <div class="form-line">
                                        <label>Video Utama</label>
                                        <br>
                                        <input type="checkbox" id="md_checkbox_21" name="flagImportantVideo" class="filled-in chk-col-red" value="1" />
                                        <label for="md_checkbox_21">* Ya, tampilkan video ini pada halaman utama.</label>
                                    </div>
                                </div>
                                <div class="form-group mandatory">
                                    <div class="form-line">
                                        <label>Status</label>
                                        <select class="form-control show-tick" name="activated" id="activated">
                                            <option value="1" {{old('activated')=="1"? 'selected':''}}>Active</option>
                                            <option value="0" {{old('activated')=="0"? 'selected':''}}>Non Active</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn pull-right btn-primary">Simpan Data</button>
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset Formulir</button>
                            </div>
                        </div>
                      </form>
                  </div>
              </div>
        </div>
    </div>

    <!-- Modal Update-->
    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bounceInRight">
                  <div class="modal-header">
                      <h4 class="modal-title">Edit Konten Video</h4>
                  </div>
                  <div class="modal-body">
                      <form action="{{route('video.update')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group mandatory">
                                    <div class="form-line">
                                        <label>Judul Video</label>
                                        @if ($errors->has('judulEdit'))
                                          <small style="color:red">* {{$errors->first('judulEdit')}}</small>
                                        @endif
                                        <input type="hidden" name="id" id="id" value="{{ old('id') }}">
                                        <input type="text" class="form-control" value="{{ old('judulEdit') }}"  placeholder="Ketikkan Judul Video..." name="judulEdit" id="judulEdit"/>
                                    </div>
                                </div>
                                <div class="form-group mandatory">
                                    <div class="form-line">
                                        <label>Url Video</label>
                                        @if ($errors->has('urlVideoEdit'))
                                          <small style="color:red">* {{$errors->first('urlVideoEdit')}}</small>
                                        @endif
                                        <input type="text" class="form-control" value="{{ old('urlVideoEdit') }}" placeholder="Ketikkan Url Video..." name="urlVideoEdit" id="urlVideoEdit"/>
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

    <!-- Modal Utama-->
    <div class="modal fade" id="modalflagutama" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bounceInRight">
                  <div class="modal-header">
                      <h4 class="modal-title">Video Utama Data Slider</h4>
                  </div>
                  <div class="modal-body">
                        <p>Apakah anda yakin untuk mengubah status video ini?</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal"  onclick="resetPage()">Tidak</button>
                      <a href="" class="btn btn-primary" id="setFlagUtama">Ya, saya yakin</a>
                  </div>
              </div>
        </div>
    </div>

    <!-- Modal Publish-->
    <div class="modal fade" id="modalflagedit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content bounceInRight">
                  <div class="modal-header">
                      <h4 class="modal-title">Publish Data Video</h4>
                  </div>
                  <div class="modal-body">
                        <p>Apakah anda yakin untuk mengubah status video ini?</p>
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
                      <h4 class="modal-title">Non Aktifkan Data Video</h4>
                  </div>
                  <div class="modal-body">
                      <p>Apakah anda yakin untuk mengnonaktifkan data video ini?</p>
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
                  <h4 class="modal-title">Aktifkan Data Video</h4>
              </div>
              <div class="modal-body">
                  <p>Apakah anda yakin untuk mengaktifkan data video ini?</p>
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
  @if ($errors->has('judul') || $errors->has('urlVideo') || $errors->has('activated'))
  $('#modalinsert').modal('show');
  @endif

  @if ($errors->has('judulEdit') || $errors->has('urlVideoEdit'))
  $('#modaledit').modal('show');
  @endif

  $("#tabelinfo").on("click", "a.flagutama", function(){
    var a = $(this).data('value');
    $('#setFlagUtama').attr('href', '{{url('admin/edit-important-video/')}}/'+a);
  });

  $("#tabelinfo").on("click", "a.flagpublish", function(){
    var a = $(this).data('value');
    $('#setFlagPublish').attr('href', '{{url('admin/publish-video/')}}/'+a);
  });

  $("#tabelinfo").on("click", "a.hapus", function(){
    var a = $(this).data('value');
    var b = "hapus";
    $('#setYaHapus').attr('href', '{{url('admin/delete-video/')}}/'+a+'/'+b);
  });

  $("#tabelinfo").on("click", "a.aktifkan", function(){
    var a = $(this).data('value');
    var b = "aktifkan";
    $('#setYaAktifkan').attr('href', '{{url('admin/delete-video/')}}/'+a+'/'+b);
  });

  $("#tabelinfo").on("click", "a.edit", function(){
    var a = $(this).data('value');
    $.ajax({
      url: "{{url('/')}}/admin/bind-video/"+a,
      dataType: 'json',
      success: function(data){
        var id = data.id;
        var judul = data.judul;
        var url_video = data.url_video;
        var flag_important_video = data.flag_important_video;

        $('#id').attr('value', id);
        $('#judulEdit').val(judul);
        $('#urlVideoEdit').val(url_video);
      }
    })
  });

</script>
@endsection
