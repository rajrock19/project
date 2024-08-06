<div class="header headerbg">

    <div class="header-left headercenter"style="margin-top:10px;">
        <a href="{{url('/')}}" class="logo" >
            <img src="{{ asset('assets/img/random.jpg')}}" alt="Logo" style="width:150px;height:250px;">
        </a>
        <a href="{{url('/')}}" class="logo headerright logo-small">
            <img src="{{ asset('assets/img/random.jpg')}}" alt="Logo" width="30" height="30">
        </a>
        <a  href="javascript:void(0);" id="toggle_btn">
            <i class="feather-chevrons-left"></i>
        </a>
    </div>
    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>
    <ul class="nav nav-tabs headerright user-menu">
        <li class="nav-item dropdown main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">

                <span class="user-img">
                    @if(auth()->user()->image)
                    <img   style="height:55px;width:50px;" src="{{ asset(auth()->user()->image) }}" alt="{{ auth()->user()->name }}">
                    @else
                        <img  style="height:55px;width:50px;" src="{{ asset('assets/img/user.jpg') }}" alt="{{ auth()->user()->name }}">
                    @endif
              
                </span>
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        @if(auth()->user()->image)
                       <img   class="avatar-img rounded-circle" src="{{ asset(auth()->user()->image) }}" alt="{{ auth()->user()->name }}"> {{auth()->user()->name}}
                      @else
                       <img  class="avatar-img rounded-circle" src="{{ asset('assets/img/user.jpg') }}" alt="{{ auth()->user()->name }}"> {{auth()->user()->name}}
                       @endif

             
                    </div>
                </div>
                <a class="dropdown-item" href="{{route('signout')}}"><i class="feather-log-out me-1"></i> Logout</a>
            </div>
        </li>
    </ul>
</div>

