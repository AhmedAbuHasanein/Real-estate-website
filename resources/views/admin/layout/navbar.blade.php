<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row ">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('admin_index')}}"><h1><b>RESAR</b></h1></a>
        <a class="navbar-brand brand-logo-mini" href="{{route('admin_index')}}"><h1><b>RESAR</b></h1></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch" style="">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{asset($account->profile->profile_image)}}" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text" style="margin-right: 10px">
                        <p class="mb-1 text-black">{{$account->profile->first_name.' '.$account->profile->last_name }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="nav-link" href="{{route('admin_myProfile')}}">
                        <i class="mdi mdi-account text-primary " style="margin-left:10px "></i>
                       الصفحة الشخصية

                    </a>
                    <a class="dropdown-item" href="{{route('logout')}}" >
                        <i class="mdi mdi-logout mr-2 text-primary" style="padding-left: 10px" ></i> تسجيل الخروج </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>


            <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="{{route('logout')}}">
                    <i class="mdi mdi-power"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
