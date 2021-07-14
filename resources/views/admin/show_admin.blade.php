@extends('admin.layout.app')
@section('title')
    <title>عرض مشرف </title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px" >
                  <i class="mdi mdi-account"></i>
                </span> عرض مشرف
            </h3>
        </div>
        <div class="row "  >
            <div class="col-12 grid-margin">
                <div class="card " >
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:right"> عرض مشرف </h4>
                        <div class="nav-profile-image " style="justify-content: center; display: flex" >
                            <img src="{{asset($admin->account->profile->profile_image)}}"  style="border-radius: 50%;" alt="profile">

                        </div>
                        <div class="card-body table-responsive p-0">
                            <div class="card" style="text-align: right">
                                <div class="card-body " style="text-align: right">
                                    <form id="forms" class="form-sample" method="post" action="{{route('admin_update_admin',['id'=>$admin->id])}}">
                                        @csrf
                                        <p class="card-description"> معلومات شخصية </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">الاسم الأول</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" disabled value="{{$admin->account->profile->first_name}}"  />
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">الاسم الأخير</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control " disabled value="{{$admin->account->profile->last_name}}"   />
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
                                                            <option @if($admin->account->profile->gender=='ذكر') selected  disabled @endif>ذكر</option>
                                                            <option @if($admin->account->profile->gender=='أنثى') selected disabled @endif>أنثى</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">تاريخ الميلاد</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="date"  value="{{$admin->account->profile->dob}}" disabled/>
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
                                                        <input type="text" class="form-control" disabled value="{{$admin->account->profile->address_1}}"  />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">العنوان الثاني (إختياري)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" disabled value="{{$admin->account->profile->address_2}}"/>
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
                                                            <option selected  >{{$admin->account->profile->country}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">رقم الهاتف</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control "    disabled value="{{$admin->account->profile->phone_number}}"/>
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
                                                        <input type="email" class="form-control "  disabled value="{{$admin->account->email}}" />
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
                                                            <input type="text" class="form-control" disabled  value="{{$admin->account->user_name}}"  id="inlineFormInputGroupUsername2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">الدرجة</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control @error('grade') is-invalid @enderror " name="grade" required>
                                                            <option value="" disabled selected>إختر</option>
                                                            @for($i=\Illuminate\Support\Facades\Auth::user()->admin->grade+1; $i<=5;$i++)
                                                                <option @if($admin->grade==$i) selected @endif>{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                        @error('grade')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-description"> صلاحيات الحساب </p>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="form-check"  >

                                                        <label class="form-check-label"   >
                                                            <input type="checkbox" class="form-check-input " value="true" name="add_admin" @if($admin->add_admin) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">اضافة مشرف</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="update_admin" @if($admin->update_admin) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">تعديل مشرف</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="show_admin" @if($admin->show_admin) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">عرض مشرف</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="delete_admin" @if($admin->delete_admin) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">حذف مشرف</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="form-check"  >

                                                        <label class="form-check-label"   >
                                                            <input type="checkbox" class="form-check-input " value="true" name="add_realestate_type" @if($admin->add_realestate_type) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">اضافة نوع عقار </span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="update_realestate_type" @if($admin->update_realestate_type) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">تعديل نوع عقار</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="show_realestate_type" @if($admin->show_realestate_type) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">عرض نوع عقار</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="delete_realestate_type" @if($admin->delete_realestate_type) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">حذف نوع عقار</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="show_company" @if($admin->show_company) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">عرض شركة</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="delete_company" @if($admin->delete_company) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">حذف شركة</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="show_realestate" @if($admin->show_realestate) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">عرض عقار</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="delete_realestate" @if($admin->delete_realestate) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">حذف عقار</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="show_user" @if($admin->show_user) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">عرض مستخدم</span>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" value="true" name="delete_user" @if($admin->delete_user) checked @endif>
                                                        </label>
                                                    </div>
                                                    <span style="margin-right: 15px; margin-top: 13px">حذف مستخدم</span>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <button class="btn btn-success" type="submit">حفظ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
