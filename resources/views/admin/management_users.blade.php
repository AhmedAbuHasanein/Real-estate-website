@extends('admin.layout.app')
@section('title')
    <title>إدارة الزبائن </title>
@stop
@section('page padding')
   <div class="content-wrapper" style="direction: rtl">
       <div class="page-header">
                    <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px">
                  <i class="mdi mdi-table-large"></i>
                </span> إدارة الزبائن
                    </h3>
                </div>
       <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title" style="text-align:right">إدارة الزبائن</h4>
                                <div class="card-header border-0 " >
                                    <form method="get" action="{{route('admin_search_user')}}">
                                        @csrf
                                        <div class=" row">
                                            <input class="form-control mb-4 col-lg-3 col-md-4 col-sm-4 mr-3" name="value_search"  id="tableSearch" type="text" placeholder="بحث" required>
                                            <select class="form-control mb-4 col-lg-3 col-md-4 col-sm-4 mr-4" name="search_admin" required>
                                                <option  disabled selected>إختر</option>
                                                <option value="user_name" >اسم المستخدم</option>
                                                <option value="email">البريد الالكتروني</option>
                                            </select>
                                            <button class="btn btn-primary  mr-4" style="height: 45px" type="submit">بحث</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body table-responsive p-0">
                                        <table class="table table-striped" style="direction: rtl">
                                            <thead>
                                            <tr>
                                                <th  style="text-align: center">#</th>
                                                <th  style="text-align: center"></th>
                                                <th  style="text-align: center">الإسم بالكامل</th>
                                                <th  style="text-align: center">البريد الإلكتروني</th>
                                                <th  style="text-align: center">اسم المستخدم</th>
                                                <th  style="text-align: center">الحالة	</th>
                                                <th  style="text-align: center" >المزيد</th>
                                            </tr>
                                            </thead>
                                            <tbody  id="myTable">
                                            <?php
                                            $count =1;
                                            ?>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$count++}}</td>
                                                    <td><img src="{{asset($user->account->profile->profile_image)}}" alt="Product1" class="img-circle img-size-32 mr-2"></td>
                                                     <td style="text-align: center">{{$user->account->profile->first_name.' '.$user->account->profile->last_name}}</td>
                                                    <td style="text-align: center"> <a href="mailto:{{$user->account->email}}"> {{$user->account->email}}</a></td>
                                                    <td style="text-align: center">{{$user->account->user_name}}</td>
                                                    <td style="text-align: center">
                                                        @if($user->account->status =='غير نشط')
                                                            <span class="float-right badge badge-danger " >{{$user->account->status}}</span>
                                                        @else
                                                            <span class="float-right badge badge-success ">{{$user->account->status}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="btn" href="{{route('admin_show_user',['id'=>$user->id])}}"> <i class="nav-item mdi mdi-account"></i></a>
                                                            <a class="btn" data-toggle="modal" data-target="#myModal{{$count}}" > <i class="nav-item mdi mdi-account-remove"></i></a>
                                                        </div>
                                                    </td>
                                                    <div class="modal" id="myModal{{$count}}" style="direction :rtl">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">حذف حساب </h4>
                                                                    <button type="button" class="close" style="margin-right:70%" data-dismiss="modal">&times;</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body" style="margin-left:60%">
                                                                    هل تريد حذف حساب مستخدم؟
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <a href="{{route('admin_delete_user',['id'=>$user->id])}}"><button type="button" class="btn btn-primary"  >نعم</button></a>

                                                                    <button type="button" class="btn btn-danger" style="margin-left:55%" data-dismiss="modal">لا</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </tr>
                                            @endforeach
                                            @if($users->isEmpty())
                                                <tr>
                                                   <td colspan="7">
                                                      <div class="p-3">
                                                          <p  style="text-align: center"> <b>الجدول لا يحتوي على بيانات</b></p>
                                                      </div>
                                                   </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>

                                    </div>
                                <br/>
                                <div class="row justify-content-center"  >   {{$users->links()}} </div>

                                <br/>
                            </div>
                        </div>
                    </div>
                </div>

   </div>
@stop
