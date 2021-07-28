@extends('admin.layout.app')
@section('title')
    <title>عرض شركة </title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px" >
                  <i class="mdi mdi-bank"></i>
                </span> عرض شركة
            </h3>
        </div>
        <div class="row "  >
            <div class="col-12 grid-margin">
                <div class="card " >
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:right"> عرض شركة </h4>
                        <div class="nav-profile-image " style="justify-content: center; display: flex" >
                            <img src="{{asset($company->logo_image)}}"  style="border-radius: 50%;" alt="profile">

                        </div>

                        <div class="row" style="margin-top: 40px; justify-content: center">
                            <div class="col-lg-4 col-sm-4 col-12 main-box-layout">
                                <div class="instagram-box rounded">
                                    <i class="mdi mdi-home" aria-hidden="true"></i>
                                </div>
                                <div class="box-layout-text text-right" style="padding-right: 10px">
                                    <h1>{{count($company->realestates)}}</h1>
                                    <h3>عقارات</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-12 main-box-layout">
                                <div class="pinterest-box rounded">
                                    <i class="mdi mdi-pinterest " aria-hidden="true"></i>
                                </div>
                                <div class="box-layout-text text-right" style="padding-right: 10px">
                                    <h1>{{count($company->followers)}}</h1>
                                    <h3>متابعون</h3>
                                </div>
                            </div>

                        </div>
                        <div class="card-body ">
                            <div class="card" style="text-align: right">
                                <div class="card-body " style="text-align: right">
                                    <p class="card-description"> معلومات الشركة </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">اسم الشركة</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" disabled value="{{$company->company_name}}" />
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">الرقم الوطني</label>
                                                <div class="col-sm-9">

                                                    <input type="number" class="form-control " disabled value="{{$company->ssid}}" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">التقيم العام </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" disabled value="{{$company->score}}" />
                                                </div>

                                            </div>


                                        </div>
                                        <div class="col-md-5">
                                            <div style="margin-right: 100px; margin-bottom: 20px">
                                                <img class="img card-img" height="200"  src="{{asset($company->account->profile->profile_image)}}" alt="profile">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> معلومات شخصية </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">الاسم الأول</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" disabled value="{{$company->account->profile->first_name}}"  />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">الاسم الأخير</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control " disabled value="{{$company->account->profile->last_name}}"   />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">الجنس</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" disabled>
                                                        <option @if($company->account->profile->gender=='ذكر') selected  disabled @endif>ذكر</option>
                                                        <option @if($company->account->profile->gender=='أنثى') selected disabled @endif>أنثى</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">تاريخ الميلاد</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date"  value="{{$company->account->profile->dob}}" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> العنوان </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">العنوان الأول</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" disabled value="{{$company->account->profile->address_1}}"  />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">العنوان الثاني (إختياري)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" disabled value="{{$company->account->profile->address_2}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">الدولة</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" disabled>
                                                        <option selected  >{{$company->account->profile->country}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">رقم الهاتف</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control "    disabled value="{{$company->account->profile->phone_number}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> معلومات الحساب </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">البريد الإلكتروني</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control "  disabled value="{{$company->account->email}}" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">اسم المستخدم</label>
                                                <div class="col-sm-9" style="direction: ltr">
                                                    <div class="input-group mb-2 mr-sm-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">@</div>
                                                        </div>
                                                        <input type="text" class="form-control" disabled  value="{{$company->account->user_name}}"  id="inlineFormInputGroupUsername2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> الوثائق الرسمية  </p>
                                    <div class="row">
                                        @foreach($company->company_documents as $company_document)
                                            <div class="card col-lg-6 col-md-12 col-sm-12" >
                                                <img class="card-img-top" src="{{asset($company_document->url)}}" alt="Card image" style="width:100%">
                                                <div class="card-body">
                                                    <h4 class="card-title">

                                                        <span class="badge badge-success " >{{$company_document->type}}</span>

                                                    </h4>
                                                   </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p class="card-description"> العقارات </p>
                                    <div class="row">
                                       @foreach($company->realestates as $realestate)
                                            <div class="card col-lg-6 col-md-12 col-sm-12" >
                                                <img class="card-img-top" src="{{asset($realestate->main_image)}}" alt="Card image" style="width:100%">
                                                <div class="card-body">
                                                    <h4 class="card-title">
                                                        @if($realestate->status =='غير متاح')
                                                            <span class=" badge badge-danger " >{{$realestate->status}}</span>
                                                        @else
                                                            <span class="badge badge-success ">{{$realestate->status}}</span>
                                                        @endif
                                                            <span class="badge badge-success " >{{$realestate->type}}</span>

                                                    </h4>
                                                    <p class="card-text">{{$realestate->description}}</p>
                                                    <a href="{{route('admin_show_realestate',['id'=>$realestate->id])}}" class="btn btn-primary stretched-link">المزيد</a>
                                                </div>
                                            </div>
                                       @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <style>
        .main-box-layout{
            position: relative;
            margin-bottom: 10px;
        }
        .instagram-box,.pinterest-box{
            color:#4E69A2;
            background-color: #3B5998;
            font-size:95px;
            height:100px;
            overflow: hidden;
            padding-left:3px;
        }
        .instagram-box{
            background-color: #B7378B;
            color:#BE4A96;
        }
        .pinterest-box{
            background-color: #BC081C;
            color:#C32032;
        }
        .box-layout-text{
            position: absolute;
            top:15px;
            color:#fff;
            right:25px;
            height: 100px;
            overflow: hidden;
        }
        .box-layout-text h1{
            font-size:30px;
            margin: 0px;
        }
    </style>
    @stop
