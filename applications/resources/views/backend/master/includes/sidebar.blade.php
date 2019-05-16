<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('theme/images/user.png')}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::user())
                      {{ Auth::user()->fullname }}
                    @endif
                </div>
                <div class="email">
                    @if(Auth::user())
                      {{ Auth::user()->email }}
                    @endif
                </div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('backend.profile') }}"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">input</i>
                          Sign Out</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                          </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{ route('backend.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Home</span>
                    </a>
                </li>
                <?php
                $menuChildParent = \App\Models\Menu::menusParent();
                foreach ($menuChildParent as $key) {
                  getMenuChild($key->id);
                }
                function getMenuChild($parent=0){
                  $menuChild = \App\Models\Menu::menusChild($parent);
                  $getDataParent = \App\Models\Menu::getDataMenusById($parent);

                ?>
                <li>
                    @if(sizeof($menuChild)>0)
                      <a href="javascript:void(0);" class="menu-toggle">
                    @else
                      <a href="{{$getDataParent[0]->url}}">
                    @endif
                        <i class="material-icons">{{$getDataParent[0]->icon}}</i>
                        <span><b>{{$getDataParent[0]->nama_menu}}</b></span>
                    </a>
                    @if(sizeof($menuChild)>0)
                    <ul class="ml-menu">
                      <?php
                      foreach ($menuChild as $key) {
                        getMenuChild($key->id);
                      }
                      ?>
                    </ul>
                    @endif
                  </li>
                <?php } ?>
                <li class="header">DEVELOPER</li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons">code</i>
                        <span>Log Activity</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons">attach_file</i>
                        <span>Log Files</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- #Menu -->
        <!-- Footer
        <div class="legal">
            <div class="copyright">
                &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
