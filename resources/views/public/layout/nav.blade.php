<?php $account = \Illuminate\Support\Facades\Auth::user(); ?>

<header class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start slider">

            <ul class="nav   col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <div class="newly-added">
                    <li style="margin-left: 0"><a href="
                        @if( $account == null)
                        {{route('login')}}
                        @else
                        {{route('user_index',$account->id)}}
                        @endif" class="nav-link px-2 text-white ss" ><i class="fa fa-user" aria-hidden="true"></i></a></li>

                </div>
            </ul>

            <ul class="mb-2 mb-md-0 department_logo" style="list-style-type: none">
                <li> <a href="{{route('home')}}"> <img src="{{asset('asset/img/logo.png')}}" class="logo" width="120px"> </a></li>
            </ul>

        </div>
    </div>
</header>


