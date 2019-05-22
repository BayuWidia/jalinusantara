@extends('backend.master.layouts.master')

@section('title')
    <title>Jalinusantara</title>
@endsection

@section('content')
<div class="container-fluid">
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
      <div class="panel-group" id="accordion_4">
          <div class="panel panel-warning">
              <div class="panel-heading" role="tab" id="headingOne_4">
                  <h4 class="panel-title">
                      <a role="button">
                        Silahkan cari data user sesuai dengan pencarian anda...
                      </a>
                  </h4>
              </div>
              <div id="collapseOne_4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_4">
                  <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('user.search') }}"  method="get">
                        <div class="input-group">
                            <input type="text" placeholder="Ketikkan Username atau Fullname..." name="search" class="form-control input-lg">
                            <div class="input-group-btn">
                                <button class="btn btn-xs btn-warning" type="submit">
                                    <i class="material-icons">search</i>
                                </button>
                            </div>&nbsp;
                            <div class="input-group-btn">
                                 <a href="" class="btn btn-xs btn-primary edit" data-toggle="modal"
                                   data-target="#modalInsert" data-value="" data-backdrop="static" data-keyboard="false"
                                   style="color:white"><i class="material-icons">playlist_add</i></a>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
       </div>

       @foreach($getDataUser as $key)
          <div class="col-xs-12 col-sm-4">
              <div class="card profile-card">
                  <div class="profile-header">&nbsp;</div>
                  <div class="profile-body">
                      <div class="image-area">
                          @if($key->url_photo!="")
                            <img src="{{url('images/user')}}/{{$key->url_photo}}">
                          @else
                            <img alt="image" src="{{asset('images/user/default.png')}}">
                          @endif
                      </div>
                      <div class="content-area">
                          <h3>{{$key->name}}</h3>
                          <p>{{$key->email}}</p>
                          <p>{{$key->nama_role}}</p>
                      </div>
                  </div>
                  <div class="profile-footer">
                      <ul>
                          <li>
                              <span>Full Name</span>
                              <span>{{$key->fullname}}</span>
                          </li>
                          <li>
                              <span>Status</span>
                                @if ($key->activated =="1")
                                <span class="badge bg-green">Active</span>
                                @elseif ($key->activated =="0")
                                <span class="badge bg-red">Non Active</span>
                                @endif
                          </li>
                          <li>
                              <span>Login Count</span>
                              <span class="badge bg-orange">{{$key->login_count}}</span>
                          </li>
                      </ul>
                      <hr>
                      <a href="" class="btn btn-xs btn-success edit" data-toggle="modal"
                        data-target="#modalUpdate" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false"
                        style="color:white"><i class="material-icons">open_in_new</i></a>
                      @if ($key->activated=="1")
                        <a href="" class="btn btn-xs btn-danger hapus" data-toggle="modal"
                          data-target="#modalDelete" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false"
                          style="color:white"><i class="material-icons">delete_forever</i></a>
                      @elseif ($key->activated=="0")
                        <a href="" class="btn btn-xs bg-blue-grey aktifkan" data-toggle="modal"
                          data-target="#modalAktifkan" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false"
                          style="color:white"><i class="material-icons">thumb_down</i></a>
                      @endif
                      <a href="" class="btn btn-xs btn-primary editPassword" data-toggle="modal"
                        data-target="#modalUpPassword" data-value="{{$key->id}}" data-backdrop="static" data-keyboard="false"
                        style="color:white"><i class="material-icons">vpn_key</i></a>
                  </div>
              </div>
          </div>
       @endforeach
    </div>
</div>
@endsection

@section('footscript')
<script src="{{asset('theme/js/pages/examples/profile.js')}}"></script>
<script>
  $(document).ready(function() {
      $('#tabelinfo').DataTable({
      });
  });
</script>
@endsection
