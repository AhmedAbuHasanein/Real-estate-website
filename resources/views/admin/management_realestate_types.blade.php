@extends('admin.layout.app')
@section('title')
    <title>إدارة أنواع العقارات </title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px">
                  <i class="mdi mdi-table-large"></i>
                </span>  إدارة أنواع العقارات
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title" style="text-align:right">إدارة أنواع العقارات</h4>
                        <div class="card-header border-0 " >
                            <form method="get" action="{{route('admin_search_realestate_type')}}">
                                @csrf
                                <div class=" row">
                                    <input class="form-control mb-4 col-lg-3 col-md-4 col-sm-4 mr-3" name="value_search"  id="tableSearch" type="text" placeholder="بحث" required>
                                    <select class="form-control mb-4 col-lg-3 col-md-4 col-sm-4 mr-4" name="search_admin" required>
                                        <option  disabled selected>إختر</option>
                                        <option value="type" >نوع العقار</option>
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
                                    <th  style="text-align: center">الرمز التعبيري</th>
                                    <th  style="text-align: center"> نوع العقار</th>
                                    <th  style="text-align: center">المشرف</th>
                                    <th  style="text-align: center">البريد الالكتروني</th>
                                    <th  style="text-align: center" >المزيد</th>
                                </tr>
                                </thead>
                                <tbody  id="myTable">
                                <?php
                                $count =1;
                                ?>
                                @foreach( $realestate_types as  $realestate_type)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td  style="text-align:right">
                                            <img src="{{asset($realestate_type->emoji)}}" alt="Product1" class="img-circle img-size-32 mr-2">
                                        </td>
                                        <td  style="text-align:right">
                                            {{$realestate_type->type}}
                                        </td>
                                        <td style="text-align:right">{{$realestate_type->admin->account->profile->first_name.''.$realestate_type->admin->account->profile->last_name}}</td>
                                        <td style="text-align: center"> <a href="mailto:{{$realestate_type->admin->account->email}}"> {{$realestate_type->admin->account->email}}</a></td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn" href="{{route('admin_show_admin',['id'=>$realestate_type->admin_id])}}"> <i class="nav-item mdi mdi-account"></i></a>
                                                <a class="btn" href="{{route('admin_show_realestate_type',['id'=>$realestate_type->id])}}"> <i class="nav-item mdi mdi-eye"></i></a>
                                                <a class="btn" data-toggle="modal" data-target="#myModal{{$count}}" > <i class="nav-item mdi mdi-close"></i></a>
                                            </div>
                                        </td>
                                        <div class="modal" id="myModal{{$count}}" style="direction :rtl">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">حذف نوع عقار </h4>
                                                        <button type="button" class="close" style="margin-right:70%" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body" style="margin-left:60%">
                                                        هل تريد حذف نوع العقار؟
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <a href="{{route('admin_delete_realestate_type',['id'=> $realestate_type->id])}}"><button type="button" class="btn btn-primary"  >نعم</button></a>

                                                        <button type="button" class="btn btn-danger" style="margin-left:55%" data-dismiss="modal">لا</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                @endforeach
                                @if($realestate_types->isEmpty())
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
                        <br/>
                        <div class="row justify-content-center"  >   {{$realestate_types->links()}} </div>

                        <br/>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
