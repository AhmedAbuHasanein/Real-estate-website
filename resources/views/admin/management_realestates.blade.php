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
                            <form method="get" action="{{route('admin_search_realestate')}}">
                                @csrf
                                <div class=" row">
                                    <input class="form-control mb-4 col-lg-3 col-md-4 col-sm-4 mr-3" name="value_search"  id="tableSearch" type="text" placeholder="بحث" required>
                                    <select class="form-control mb-4 col-lg-3 col-md-4 col-sm-4 mr-4" name="search_admin" required>
                                        <option  disabled selected>إختر</option>
                                        <option value="space" >المساحة</option>
                                        <option value="price" >السعر</option>
                                        <option value="company_name" >اسم الشركة</option>
                                        <option value="email">البريد الالكتروني</option>
                                    </select>
                                    <button class="btn btn-primary  mr-4" style="height: 45px" type="submit">بحث</button>
                                </div>
                            </form>

                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th  style="text-align: center">#</th>
                                    <th  style="text-align: center"></th>
                                    <th  style="text-align: center"> اسم الشركة</th>
                                    <th  style="text-align: center"></th>
                                    <th  style="text-align: center">الحالة</th>
                                    <th  style="text-align: center">تاريخ الانشاء </th>
                                    <th  style="text-align: center">تاريخ اخر نعديل</th>
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
                                        <td style="text-align: right"> {{$realestate->company->company_name}}</td>
                                        <td style="text-align: right">
                                            <span class="float-right badge badge-success ">{{$realestate->type}}</span>
                                        </td>
                                        <td style="text-align: right">
                                            @if($realestate->status =='غير متاح')
                                                <span class="float-right badge badge-danger " >{{$realestate->status}}</span>
                                            @else
                                                <span class="float-right badge badge-success ">{{$realestate->status}}</span>
                                            @endif
                                        </td>
                                        <td style="text-align: right">{{$realestate->created_at}}</td>
                                        <td style="text-align: right">${{$realestate->updated_at}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn" href="{{route('admin_show_company',['id'=>$realestate->company->id])}}"> <i class="nav-item mdi mdi-bank"></i></a>
                                                <a class="btn" href="{{route('admin_show_realestate',['id'=>$realestate->id])}}"> <i class="nav-item mdi mdi-home"></i></a>
                                                <a class="btn" data-toggle="modal" data-target="#myModal{{$count}}" > <i class="nav-item mdi mdi-close"></i></a>
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

                        </div>
                        <br/>
                        <div class="row justify-content-center"  >   {{$realestates->links()}} </div>

                        <br/>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
