  <!-- Nav -->
  <nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
      <span class="px-nav-toggle-arrow"></span>
      <span class="navbar-toggle-icon"></span>
      <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>
    <ul class="px-nav-content">
      @if (Auth::guest())
        <li @if($current == "login") class="px-nav-item active" @else class="px-nav-item" @endif>
          <a href="/login"><i class="px-nav-icon ion-log-in"></i><span class="px-nav-label">login</span></a>
        </li>
        <li @if($current == "register") class="px-nav-item active" @else class="px-nav-item" @endif>
          <a href="/register"><i class="px-nav-icon ion-android-add"></i><span class="px-nav-label">register</span></a>
        </li>
        <li @if($current == "map") class="px-nav-item active" @else class="px-nav-item" @endif>
          <a href="/"><i class="px-nav-icon ion-ios-location"></i><span class="px-nav-label">Map</span></a>
        </li>
      @else
        <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
          <img src="{{Auth::user()->getAvatar()}}" alt="" class="pull-xs-left m-r-2 border-round" 
            style="width: 54px; height: 54px;">
          <div class="font-size-16"><span class="font-weight-light">Welcome, <br></span>
            <strong>{{Auth::user()->getFirstName()}}</strong>
          </div>
        </li>


        <li @if($current == "map") class="px-nav-item active" @else class="px-nav-item" @endif>
          <a href="/"><i class="px-nav-icon ion-ios-location"></i><span class="px-nav-label">Map</span></a>
        </li>
        @if(Auth::user()->isInvitated())
          <li class="px-nav-item">
            <a href="/invitation/{{Auth::user()->getInvitation()->group_id}}">
              <i class="fa fa-users" aria-hidden="true"></i> 
              Group invitation 
              <i class="fa fa-exclamation-circle" aria-hidden="true" style="color:#f2dede!important;"></i>
            </a>
          </li>
        @endif
        <li @if($current == "new") class="px-nav-item active" @else class="px-nav-item" @endif>
          <a href="#"><i class="px-nav-icon ion-android-add"></i><span class="px-nav-label">New Thing</span></a>
        </li>
        <li @if($current == "settings") class="px-nav-item active" @else class="px-nav-item" @endif>
          <a href="/settings"><i class="px-nav-icon ion-ios-gear"></i><span class="px-nav-label">Settings</span></a>
        </li>        
        <li @if($current == "logout") class="px-nav-item active" @else class="px-nav-item" @endif>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" ><i class="px-nav-icon ion-android-exit"></i><span class="px-nav-label">Logout</span></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>

      @endif
      <li class="px-nav-item" style="text-align: center;">
            <br>Copyright © 2017<br>
            <a href="https://misterfoxweb.be/" data-toggle="tooltip" data-original-title="Mister Fox Web">
              <img src="/img/logo/misterfoxweb.png" alt="Mister Fox Web" >
            </a>
          </li>
      </ul>
  </nav>

<!-- ========= MODAL ========= -->
@include('design.home.components.registerAED')