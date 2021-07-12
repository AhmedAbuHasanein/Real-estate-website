<?php $account = \Illuminate\Support\Facades\Auth::user(); ?>
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar" >
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset($account->profile->profile_image)}}" alt="profile" >
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column" style="margin: 10px">
                    <span class="font-weight-bold mb-2">{{$account->profile->first_name.' '.$account->profile->last_name }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item" style="direction: rtl">
            <a class="nav-link" href="{{route('admin_management_users')}}">
                <i class="mdi mdi-table-large menu-icon" style="margin-left:25px "></i>
                <span class="menu-title ">إدارة الزبائن</span>

            </a>
        </li>
        <li class="nav-item" style="direction: rtl">
            <a class="nav-link" href="{{route('admin_management_companies')}}">
                <i class="mdi mdi-table-large menu-icon" style="margin-left:25px "></i>
                <span class="menu-title">إدارة الشركات</span>
            </a>
        </li>
        <li class="nav-item" style="direction: rtl">
            <a class="nav-link" href="{{route('admin_management_admins')}}">
                <i class="mdi mdi-table-large menu-icon" style="margin-left:25px "></i>
                <span class="menu-title">إدارة المشرفين</span>
            </a>
        </li>
        <li class="nav-item" style="direction: rtl">
            <a class="nav-link" href="{{route('admin_management_realestate_types')}}">
                <i class="mdi mdi-table-large menu-icon" style="margin-left:25px "></i>
                <span class="menu-title">إدارة أنواع العقارات</span>
            </a>
        </li>
        <li class="nav-item" style="direction: rtl">
            <a class="nav-link" href="{{route('admin_management_realestates')}}">
                <i class="mdi mdi-table-large menu-icon" style="margin-left:25px "></i>
                <span class="menu-title">إدارة العقارات</span>
            </a>
        </li>
        <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3" style="text-align: right">مشرفين</h6>
                </div>
                <a href="{{route('admin_add_admin_form')}}" style="text-decoration-line: none;"><button class="btn btn-block btn-lg btn-gradient-primary mt-4" > إضافة مشرف</button></a>
                <a href="{{route('admin_add_realestate_type_form')}}" style="text-decoration-line: none;"><button class="btn btn-block btn-lg btn-gradient-primary mt-4" > إضافة نوع عقار</button></a>
              </span>
        </li>
    </ul>
</nav>
