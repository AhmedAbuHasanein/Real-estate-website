@extends('admin.layout.app')
@section('title')
    <title>عرض مستخدم </title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px" >
                  <i class="mdi mdi-account"></i>
                </span> عرض مستخدم
            </h3>
        </div>
        <div class="row "  >
            <div class="col-12 grid-margin">
                <div class="card " >
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:right"> عرض مستخدم </h4>
                        <div class="nav-profile-image " style="justify-content: center; display: flex" >
                            <img src="{{asset($user->account->profile->profile_image)}}"  style="border-radius: 50%;" alt="profile">

                        </div>
                        <div class="card-body ">
                            <div class="card" style="text-align: right">
                                <div class="card-body " style="text-align: right">
                                        <p class="card-description"> معلومات شخصية </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">الاسم الأول</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" disabled value="{{$user->account->profile->first_name}}"  />
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">الاسم الأخير</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control " disabled value="{{$user->account->profile->last_name}}"   />
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
                                                            <option @if($user->account->profile->gender=='ذكر') selected  disabled @endif>ذكر</option>
                                                            <option @if($user->account->profile->gender=='أنثى') selected disabled @endif>أنثى</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">تاريخ الميلاد</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="date"  value="{{$user->account->profile->dob}}" disabled/>
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
                                                        <input type="text" class="form-control" disabled value="{{$user->account->profile->address_1}}"  />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">العنوان الثاني (إختياري)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" disabled value="{{$user->account->profile->address_2}}"/>
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
                                                            <option selected  >{{$user->account->profile->country}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">رقم الهاتف</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control "    disabled value="{{$user->account->profile->phone_number}}"/>
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
                                                        <input type="email" class="form-control "  disabled value="{{$user->account->email}}" />
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
                                                            <input type="text" class="form-control" disabled  value="{{$user->account->user_name}}"  id="inlineFormInputGroupUsername2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
