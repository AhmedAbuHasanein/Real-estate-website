<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>إنشاء حساب</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="{{asset("asset/auth/register/css/opensans-font.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("asset/auth/register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css")}}">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset("asset/auth/register/css/style.css")}}"/>
    <link rel="stylesheet" href="{{asset("asset/auth/register/css/radio.css")}}"/>
    <style>
        body {
            background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url({{asset("asset/auth/image_site/realestate.jpg")}});
            background-position: center;
            background-size: cover;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        input[type=submit]{
            background-color: #ccc;
            border: none;
            color: white;
            padding: 16px 32px;
            border-radius: 50px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        .alert{
            color:red ;

        }
    </style>
</head>
<body >
<div class="page-content" >
    <div class="form-v1-content" >
        <div class="wizard-form" >
            <form id="forms"  class="form-register" method="post" action="{{route('register_account')}}">
                @csrf
                <div  id="form-total">
                    <!-- SECTION 1 -->
                    <h2>
                        <p class="step-icon" style="margin-left: 15px"><span>01</span></p>
                        <span class="step-text">بيانات الحساب</span>
                    </h2>
                    <section style="direction: rtl">
                        <div class="inner">
                            <div class="wizard-header">
                                <h3 class="heading">معلومات الحساب</h3>
                                <p>يرجى إدخال معلوماتك والانتقال إلى الخطوة التالية حتى نتمكن من إنشاء حساباتك. </p>
                            </div>
                            <div class="form-row">
                            <div class="form-holder form-holder-2">
                            <fieldset>
                                <legend>نوع الحساب</legend>
                                <div class="form-row">

                                    <label class="container"  style="margin: 5px">زبون
                                        <input type="radio" checked name="account_type" value="user" id="user" class=" @error('account_type') is-invalid @enderror"
                                               @if(old('account_type')=='user') checked @endif onclick="check()">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container" style="margin: 5px">شركة
                                        <input type="radio" name="account_type" value="company" id="company" class=" @error('account_type') is-invalid @enderror"
                                               @if(old('account_type')=='company') checked @endif   onclick="check()" >
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </fieldset>
                                @error('account_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>
                            <div class="form-row" id="append_company_name" >

                                 </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>اسم المستخدم</legend>
                                        <input type="text" class="form-control  @error('user_name') is-invalid @enderror" id="username" name="user_name" value="{{old('user_name')}}"  required>
                                    </fieldset>
                                  @error('user_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>البريد الالكتروني</legend>
                                        <input type="email" name="email" id="your_email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="example@email.com" required>
                                    </fieldset>
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>كلمة المرور</legend>
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" onkeyup="verify()"  required>
                                    </fieldset>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>تأكيد كلمة المرور</legend>
                                        <input type="password" class="form-control  @error('verify_password') is-invalid @enderror" id="verify_password" name="verify_password" onkeyup="verify()" required>
                                    </fieldset>
                                    @error('verify_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <label id="verify" style="color:red"></label>
                            </div>

                        </div>
                    </section>
                    <!-- SECTION 2 -->
                    <h2>
                        <p class="step-icon" style="margin-left: 15px"><span>02</span></p>
                        <span class="step-text">معلومات شخصية</span>
                    </h2>
                    <section style="direction: rtl">
                        <div class="inner">
                            <div class="wizard-header">
                                <h3 class="heading">معلومات شخصية</h3>
                                <p>يرجى إدخال معلوماتك والانتقال إلى الخطوة التالية حتى نتمكن من إنشاء حساباتك. </p>
                            </div>
                            <div class="form-row">

                                <div class="form-holder">
                                        <fieldset>
                                            <legend>الاسم الأول</legend>
                                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first-name" name="first_name" value="{{old('first_name')}}"  required>
                                        </fieldset>
                                    @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-holder">

                                    <fieldset>
                                        <legend>الاسم الأخير</legend>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last-name" name="last_name"  value="{{old('last_name')}}"  required>
                                    </fieldset>
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>الجنس</legend>
                                        <div class="form-row">
                                <label class="container" style="margin: 5px">ذكر
                                    <input type="radio" checked="checked" name="gender" value="ذكر" class="@error('gender') is-invalid @enderror"
                                    @if(old('gender')=='ذكر') checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container" style="margin: 5px">أنثى
                                    <input type="radio" name="gender" value="أنثى" class="@error('gender') is-invalid @enderror"
                                           @if(old('gender')=='أنثى') checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                                        </div>
                                    </fieldset>
                                </div>
                                @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>تاريخ الميلاد</legend>
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{old('dob')}}" required>
                                    </fieldset>
                                    @error('dob')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>العنوان الأول</legend>
                                        <input type="text" class="form-control @error('address_1') is-invalid @enderror" id="address_1" name="address_1" value="{{old('address_1')}}" required>
                                    </fieldset>
                                    @error('address_1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>العنوان الثاني (اختياري)</legend>
                                        <input type="text" class="form-control @error('address_2') is-invalid @enderror" id="address_2" value="{{old('address_2')}}" name="address_2"  >
                                    </fieldset>
                                    @error('address_2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder">
                                    @include('auth.drop_select_country')
                                    @error('country')

                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-holder">
                                    <fieldset>
                                        <legend>رقم الهاتف</legend>
                                        <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone" value="{{old('phone_number')}}"  name="phone_number" placeholder="+1 888-999-7777" required>
                                    </fieldset>
                                    @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                    <input disabled type="submit" id="submit">
                            </div>
                        </div>
                    </section>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    var error_company_name ='@error("company_name")\n' +
        '                                <div class="alert alert-danger">{{ $message }}</div>\n' +
        '                                @enderror\n';
    var error_ssid = '@error("ssid")\n' +
        '                                <div class="alert alert-danger">{{ $message }}</div>\n' +
        '                                @enderror';
    var company_name ='  <div class="form-holder ">\n' +
        '                                    <fieldset>\n' +
        '                                        <legend>اسم الشركة</legend>\n' +
        '                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company-name" name="company_name" value="{{old('company_name')}}"  required>\n' +
        '                                    </fieldset>\n' +error_company_name+
        '                                </div>';
    var ssid =' <div class="form-holder ">\n' +
        '                     <fieldset >\n' +
        '                           <legend>الرقم الوطني</legend>\n' +
        '                           <input type="number"  name="ssid" id="ssid" class="form-control @error('ssid') is-invalid @enderror"   value="{{old('ssid')}}" required>\n' +
        '                     </fieldset>\n' +error_ssid+
        '               </div>';

   if(document.getElementById("company").checked){

       document.getElementById('append_company_name').innerHTML =company_name +ssid;
   }
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
    function check() {
           var value = document.forms['forms']['account_type'].value;
           if(value =='company'){

                document.getElementById('append_company_name').innerHTML =company_name +ssid ;
            }else{
               document.getElementById('append_company_name').innerHTML = '';

            }
        }

</script>
<script src="{{asset("asset/auth/register/js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("asset/auth/register/js/jquery.steps.js")}}"></script>
<script src="{{asset("asset/auth/register/js/main.js")}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
