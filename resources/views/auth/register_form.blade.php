<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>form-v1 by Colorlib</title>
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
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 16px 32px;
            border-radius: 50px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="page-content">
    <div class="form-v1-content">
        <div class="wizard-form">
            <form id="forms" class="form-register" method="post" action="{{route('register_account')}}">
                @csrf
                <div id="form-total">
                    <!-- SECTION 1 -->
                    <h2>
                        <p class="step-icon"><span>01</span></p>
                        <span class="step-text">بيانات الحساب</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <div class="wizard-header">
                                <h3 class="heading">معلومات الحساب</h3>
                                <p>يرجى إدخال معلوماتك والانتقال إلى الخطوة التالية حتى نتمكن من إنشاء حساباتك. </p>
                            </div>
                            <div class="form-row">

                                <label class="container"  style="margin: 5px">زبون
                                    <input type="radio" checked name="account_type" value="user"
                                           @if(old('account_type')=='user') checked @endif onclick="check()">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container" style="margin: 5px">شركة
                                    <input type="radio" name="account_type" value="company"
                                           @if(old('account_type')=='company') checked @endif   onclick="check()" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-row" id="append_company_name">

                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>اسم المستخدم</legend>
                                        <input type="text" class="form-control" id="username" name="username"  required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>البريد الالكتروني</legend>
                                        <input type="email" name="email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>كلمة المرور</legend>
                                        <input type="password" class="form-control" id="password" name="password"  required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>تأكيد كلمة المرور</legend>
                                        <input type="password" class="form-control" id="verify_password" name="verify_password" onkeyup="verify()" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <label id="verify" style="color:red"></label>
                            </div>
                        </div>
                    </section>
                    <!-- SECTION 2 -->
                    <h2>
                        <p class="step-icon"><span>02</span></p>
                        <span class="step-text">معلومات شخصية</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <div class="wizard-header">
                                <h3 class="heading">معلومات شخصية</h3>
                                <p>يرجى إدخال معلوماتك والانتقال إلى الخطوة التالية حتى نتمكن من إنشاء حساباتك. </p>
                            </div>
                            <div class="form-row">

                                <div class="form-holder">
                                    <fieldset>
                                        <legend>اسم العائلة</legend>
                                        <input type="text" class="form-control" id="last-name" name="last_name" placeholder="الاسم الأخير" required>
                                    </fieldset>
                                </div>
                                <div class="form-holder">
                                    <fieldset>
                                        <legend>الاسم الأول</legend>
                                        <input type="text" class="form-control" id="first-name" name="first_name" placeholder="الاسم الأول" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="container" style="margin: 5px">ذكر
                                    <input type="radio" checked="checked" name="gender" value="male"
                                    @if(old('gender')=='male') checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container" style="margin: 5px">أنثى
                                    <input type="radio" name="gender" value="female"
                                           @if(old('gender')=='female') checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                                </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>تاريخ الميلاد</legend>
                                        <input type="date" class="form-control" id="dob" name="dob"  required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>العنوان الأول</legend>
                                        <input type="text" class="form-control" id="address_1" name="address_1"  required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>العنوان الثاني (اختياري)</legend>
                                        <input type="text" class="form-control" id="address_2" name="address_2"  >
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>رقم الهاتف</legend>
                                        <input type="text" class="form-control" id="phone" name="phone_number" placeholder="+1 888-999-7777" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-row">
                                    <input  type="submit">
                            </div>
                        </div>
                    </section>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    function verify() {

        var password = document.forms['forms']['password'].value;
        var verify_password = document.forms['forms']['verify_password'].value;
        if (verify_password != password) {
            document.getElementById("verify").innerHTML = '<b>' + 'كلمة المرور غير متطابقة' + '</b>';
        } else {
            document.getElementById("verify").innerHTML = '<b>' + 'كلمة المرور متطابقة' + '</b>';

        }
    }
    function check() {
           var value = document.forms['forms']['account_type'].value;
           if(value =='company'){
               var company_name =' <div class="form-holder form-holder-2">\n' +
                   '                     <fieldset >\n' +
                   '                           <legend>اسم الشركة</legend>\n' +
                   '                           <input type="text"  name="company_name" id="company_name" class="form-control"   required>\n' +
                   '                     </fieldset>\n' +
                   '               </div>';
               var ssid =' <div class="form-holder form-holder-2">\n' +
                   '                     <fieldset >\n' +
                   '                           <legend>الرقم الوطني</legend>\n' +
                   '                           <input type="number"  name="ssid" id="ssid" class="form-control"   required>\n' +
                   '                     </fieldset>\n' +
                   '               </div>';
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
