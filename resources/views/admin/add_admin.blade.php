@extends('admin.layout.app')
@section('title')
    <title>إضافة مشرف </title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px" >
                  <i class="mdi mdi-table-large"></i>
                </span> إضافة مشرف
            </h3>
        </div>
        <div class="row "  >
            <div class="col-12 grid-margin">
                <div class="card " >
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:right"> إضافة مشرف </h4>
                        <div class="card-body table-responsive p-0">
                        <div class="card" style="text-align: right">
        <div class="card-body " style="text-align: right">
            <form id="forms" class="form-sample" method="post" action="{{route('admin_add_admin')}}">
                @csrf
                <p class="card-description"> معلومات شخصية </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">الاسم الأول</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name')}}" required />
                                @error('first_name')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">الاسم الأخير</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name')}}" required  />
                                @error('last_name')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">الجنس</label>
                            <div class="col-sm-9">
                                <select class="form-control @error('gender') is-invalid @enderror " name="gender" required>
                                    <option value="" disabled selected>إختر</option>
                                    <option @if(old('gender')=='ذكر') selected @endif>ذكر</option>
                                    <option @if(old('gender')=='أنثى') selected @endif>أنثى</option>
                                </select>
                                @error('gender')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">تاريخ الميلاد</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('dob') is-invalid @enderror " type="date" name="dob" value="{{old('dob')}}" required/>
                                @error('dob')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
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
                                <input type="text" class="form-control @error('address_1') is-invalid @enderror" name="address_1" value="{{old('address_1')}}" required />
                                @error('address_1')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">العنوان الثاني (إختياري)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control  @error('address_2') is-invalid @enderror" name="address_2"  value="{{old('address_2')}}"/>
                                @error('address_2')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">الدولة</label>
                            <div class="col-sm-9">
                                @include('auth.drop_select_country')
                                @error('country')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">رقم الهاتف</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required  placeholder="720597485406"/>
                                @error('phone_number')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
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
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required />
                                @error('email')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">اسم المستخدم</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{old('user_name')}}" required id="inlineFormInputGroupUsername2">
                                </div>
                                @error('user_name')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> كلمة السر</label>
                            <div class="col-sm-9">
                                <input type="password" onkeyup="verify()" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" required />
                                @error('password')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">تأكيد كلمة المرور</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="password" onkeyup="verify()" class="form-control @error('verify_password') is-invalid @enderror" name="verify_password" value="{{old('verify_password')}}" required id="inlineFormInputGroupUsername2">

                                </div>
                                <label id="verify" style="color:red"></label>
                                @error('verify_password')
                                <div class="badge badge-danger">{{ $message }}</div>
                                @enderror
                            </div>
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
<script>
    function verify() {

        var password = document.forms['forms']['password'].value;
        var verify_password = document.forms['forms']['verify_password'].value;
        if(password.length <8){
            document.getElementById("verify").innerHTML = '<b>' + 'كلمة السر قصيرة يجب أن تكون أكثر من 8 حروف' + '</b>';
            document.getElementById("submit").disabled =true;
            document.getElementById("submit").style = 'background: #ccc';
        }else {
            if (verify_password != password) {
                document.getElementById("verify").innerHTML = '<b>' + 'كلمة المرور غير متطابقة' + '</b>';
                document.getElementById("submit").disabled = true;
                document.getElementById("submit").style = 'background: #ccc';
            } else {
                document.getElementById("verify").innerHTML = '<b style="color:green; ">' + 'كلمة المرور متطابقة' + '</b>';
                document.getElementById("submit").disabled = false;
                document.getElementById("submit").style = 'background:#4CAF50';
            }
        }
    }
</script>
@stop
