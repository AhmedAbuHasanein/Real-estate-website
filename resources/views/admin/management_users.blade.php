@extends('admin.layout.app')
@section('title')
    <title>الصفحة الرئيسية</title>
@stop
@section('page padding')
   <div class="content-wrapper">
       <div class="page-header">
                    <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> الصفحة الرئيسية
                    </h3>
                </div>
       <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">

                            <div class="card-body">
                                @include('massege')
                                <h4 class="card-title"></h4>
                                <div class="card-header border-0 justify-content-end">

                                    <input class="form-control mb-4 col-lg-3 col-md-5 col-sm-6" id="tableSearch" type="text" placeholder="Search">

                                </div>
                                <div class="card-body table-responsive p-0">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th  style="text-align: center">#</th>
                                                <th  style="text-align: center">Full Name</th>
                                                <th  style="text-align: center">Email</th>
                                                <th  style="text-align: center">Username</th>
                                                <th  style="text-align: center">Status	</th>
                                                <th  style="text-align: center" >More</th>
                                            </tr>
                                            </thead>
                                            <tbody  id="myTable">
                                            <?php
                                            $count =1;
                                            ?>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$count++}}</td>
                                                    <td>
                                                        <img src="{{asset($user->account->profile->profile_image)}}" alt="Product1" class="img-circle img-size-32 mr-2">
                                                        {{$user->account->profile->first_name.' '.$user->account->profile->last_name}}
                                                    </td>
                                                    <td style="text-align: center"> <a href="mailto:{{$user->account->email}}"> {{$user->account->email}}</a></td>
                                                    <td style="text-align: center">{{$user->account->user_name}}</td>
                                                    <td style="text-align: center">
                                                        @if($user->account->status =='InActive')
                                                            <span class="float-right badge badge-danger " >{{$user->account->status}}</span>
                                                        @else
                                                            <span class="float-right badge badge-success " style="background-color: red">{{$user->account->status}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn" href="{{route('show_user',['id'=>$user->account_id])}}"> <i class="nav-item mdi mdi-account-circle"></i></a>
                                                            <a class="btn" href="{{route('delete_user',['id'=>$user->id])}}"> <i class="nav-item mdi mdi-account-remove"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if($users->isEmpty())
                                                <tr>
                                                   <td colspan="6">
                                                      <div class="p-3">
                                                          <p  style="text-align: center"> <b>الجدول لا يحتوي على بيانات</b></p>
                                                      </div>
                                                   </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

   </div>
@stop
