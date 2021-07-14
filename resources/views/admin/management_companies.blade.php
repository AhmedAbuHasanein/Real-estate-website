@extends('admin.layout.app')
@section('title')
    <title> إدارة الشركات </title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">

        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px" >
                  <i class="mdi mdi-table-large"></i>
                </span> إدارة الشركات
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title" style="text-align:right"> إدارة الشركات</h4>
                        <div class="card-header border-0 " >

                            <input class="form-control mb-4 col-lg-3 col-md-5 col-sm-6 "  id="tableSearch" type="text" placeholder="بحث">

                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped" style="direction: rtl">
                                <thead>
                                <tr>
                                    <th  style="text-align: center">#</th>
                                    <th  style="text-align: center"></th>
                                    <th  style="text-align: center">اسم الشركة </th>
                                    <th  style="text-align: center">الرقم الوطني</th>
                                    <th  style="text-align: center">التقييم</th>
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
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td><img src="{{asset($company->logo_image)}}" alt="Product1" class="img-circle img-size-32 mr-2"></td>
                                        <td style="text-align: center">{{$company->company_name}}</td>
                                        <td style="text-align: center">{{$company->ssid}}</td>
                                        <td style="text-align: center">{{$company->score}}</td>
                                        <td style="text-align: center"> <a href="mailto:{{$company->account->email}}"> {{$company->account->email}}</a></td>
                                        <td style="text-align: center">{{$company->account->user_name}}</td>
                                        <td style="text-align: center">
                                            @if($company->account->status =='غير نشط')
                                                <span class="float-right badge badge-danger " >{{$company->account->status}}</span>
                                            @else
                                                <span class="float-right badge badge-success ">{{$company->account->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn" href="{{route('admin_show_company',['id'=>$company->id])}}"> <i class="nav-item mdi mdi-bank"></i></a>
                                                <a class="btn" data-toggle="modal" data-target="#myModal{{$count}}"> <i class="nav-item mdi mdi-close"></i></a>
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
                                                        هل تريد حذف حساب الشركة؟
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <a href="{{route('admin_delete_company',['id'=>$company->id])}}"><button type="button" class="btn btn-primary"  >نعم</button></a>

                                                        <button type="button" class="btn btn-danger" style="margin-left:55%" data-dismiss="modal">لا</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                                @if($companies->isEmpty())
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
                        <div class="row justify-content-center"  >   {{$companies->links()}} </div>

                        <br/>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
