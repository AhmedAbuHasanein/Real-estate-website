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
    </style>
</head>
<body>
<div class="page-content">
    <div class="form-v1-content">
        <div class="wizard-form">
            <form id="forms" class="form-register" action="#" method="post">
                <div id="form-total">
                    <!-- SECTION 1 -->
                    <h2>
                        <p class="step-icon"><span>01</span></p>
                        <span class="step-text">Account Infomation</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <div class="wizard-header">
                                <h3 class="heading">Account Infomation</h3>
                                <p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
                            </div>
                            <div class="form-row">

                                <label class="container" style="margin: 5px">زبون
                                    <input type="radio" checked="checked" name="account_type" value="user"
                                           @if(old('account_type')=='user') checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                                <label class="container" style="margin: 5px">شركة
                                    <input type="radio" name="account_type" value="company"
                                           @if(old('account_type')=='company') checked @endif>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <fieldset>
                                        <legend>البريد الالكتروني</legend>
                                        <input type="text" name="email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
                                    </fieldset>
                                </div>
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
                    <!-- SECTION 1 -->
                    <h2>
                        <p class="step-icon"><span>02</span></p>
                        <span class="step-text">Peronal Infomation</span>
                    </h2>
                    <section>
                        <div class="inner">
                            <div class="wizard-header">
                                <h3 class="heading">Peronal Infomation</h3>
                                <p>Please enter your infomation and proceed to the next step so we can build your accounts.  </p>
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
        var verify_password =document.forms['forms']['verify_password'].value;
        if(verify_password != password){
            document.getElementById("verify").innerHTML = '<b>'+'كلمة المرور غير متطابقة'+'</b>';
        }else {
            document.getElementById("verify").innerHTML =  '<b>'+'كلمة المرور متطابقة'+'</b>';

        }
    }
</script>
<script src="{{asset("asset/auth/register/js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("asset/auth/register/js/jquery.steps.js")}}"></script>
<script src="{{asset("asset/auth/register/js/main.js")}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
