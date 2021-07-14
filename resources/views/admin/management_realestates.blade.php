@extends('admin.layout.app')
@section('title')
    <title>إدارة العقارات </title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px">
                  <i class="mdi mdi-table-large"></i>
                </span> إدارة العقارات
            </h3>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title" style="text-align:right">إدارة العقارات</h4>
                        <div class="card-header border-0 " >

                            <input class="form-control mb-4 col-lg-3 col-md-5 col-sm-6 "  id="tableSearch" type="text" placeholder="بحث">

                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped" style="direction: rtl">
                                <thead>
                                <tr>
                                    <th  style="text-align: center">#</th>
                                    <th  style="text-align: center"></th>
                                    <th  style="text-align: center"> اسم الشركة</th>
                                    <th  style="text-align: center">وصف العقار</th>
                                    <th  style="text-align: center">السعر</th>
                                    <th  style="text-align: center">المساحة</th>
                                    <th  style="text-align: center">الحالة</th>
                                    <th  style="text-align: center" >المزيد</th>
                                </tr>
                                </thead>
                                <tbody  id="myTable">
                                <?php
                                $count =1;
                                ?>
                                @foreach($realestates as $realestate)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>
                                            <img src="{{asset($realestate->main_image)}}" alt="Product1" class="img-circle img-size-32 mr-2">
                                        </td>
                                        <td style="text-align: center"> {{$realestate->company->company_name}}</td>
                                        <td style="text-align: center">{{$realestate->description}}</td>
                                        <td style="text-align: center">${{$realestate->price}}</td>
                                        <td style="text-align: center">{{$realestate->space}}</td>
                                        <td style="text-align: center">
                                            @if($realestate->status =='غير متاح')
                                                <span class="float-right badge badge-danger " >{{$realestate->status}}</span>
                                            @else
                                                <span class="float-right badge badge-success ">{{$realestate->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn" href="{{route('admin_show_company',['id'=>$realestate->company->id])}}"> <i class="nav-item mdi mdi-account-circle"></i></a>
                                                <a class="btn" href="{{route('admin_show_realestate',['id'=>$realestate->id])}}"> <i class="nav-item mdi mdi-account-circle"></i></a>
                                                <a class="btn" data-toggle="modal" data-target="#myModal{{$count}}" > <i class="nav-item mdi mdi-account-remove"></i></a>
                                            </div>
                                        </td>
                                        <div class="modal" id="myModal{{$count}}" style="direction :rtl">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">حذف عقار </h4>
                                                        <button type="button" class="close" style="margin-right:70%" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body" style="margin-left:60%">
                                                        هل تريد حذف العقار؟
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <a href="{{route('admin_delete_realestate',['id'=>$realestate->id])}}"><button type="button" class="btn btn-primary"  >نعم</button></a>

                                                        <button type="button" class="btn btn-danger" style="margin-left:55%" data-dismiss="modal">لا</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                @endforeach
                                @if($realestates->isEmpty())
                                    <tr>
                                        <td colspan="8">
                                            <div class="p-3">
                                                <p  style="text-align: center"> <b>الجدول لا يحتوي على بيانات</b></p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <br/>
                            <div class="row justify-content-center"  >   {{$realestates->links()}} </div>

                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
