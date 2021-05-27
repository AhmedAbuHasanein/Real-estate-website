<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>انشاء حساب</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>

        body {
            background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url({{asset("asset/auth/image_site/realestate.jpg")}});
            background-position: center;
            background-size: cover;

            width: 100%;
            overflow:scroll;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-group{
            margin-top: 10px;
            font-weight:bold;
        }


    </style>
</head>

<body>
<div class="container mt-4" style="text-align: right">
    <div class="row">
        <!-- Register area -->
        <div class="col-5" style="margin: auto">
            <div class="card">
                <div class="card-header">انشاء حساب</div>
                <div class="card-body">
                    <form  id = 'forms' >
                        <div class="form-group">
                            <label for="type">اختار واحدة </label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="account" id="type" value="user" checked
                                       @if(old('account')=='user') checked @endif>
                                <label class="form-check-label" for="type2">زبون</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="account" id="type1" value="company"
                                @if(old('account')=='company') checked @endif>
                                <label class="form-check-label" for="type1">بائع</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="lname">اسم العائلة</label>
                                    <input type="text" class="form-control" id="lname" name="last_name" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="fname">الاسم الاول</label>
                                    <input type="text" class="form-control" id="fname" name="first_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sex">الجنس </label>
                            <br/>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female">انثى</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male">ذكر</label>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="dob">تاريخ الميلاد</label>
                            <div class="input-group mb-2">
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ftitle">العنوان الاول </label>
                            <input type="text" class="form-control" id="ftitle" name="address_1" required>
                        </div>
                        <div class="form-group">
                            <label for="stitle">العنوان الثاني (اختياري)</label>
                            <input type="text" class="form-control" id="stitle" name="address_2">
                        </div>
                        <div class="form-group">
                            <label for="phone_number">رقم الهاتف</label>
                            <div class="input-group mb-2">
                                <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">البريد الالكتروني</label>
                            <div class="input-group mb-2">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">اسم المستخدم</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">كلمة السر</label>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <label for="verify_password"> تأكيد كلمة السر</label>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control" id="verify_password" name="verify_password" onkeyup="verify()" required>
                            </div>
                            <label id="verify" style="color:red"></label>
                        </div>
                          <br />
                        <button type="submit" class="btn btn-primary">انشئ الحساب</button>
                    </form>
                </div>
            </div>
        </div>

    </div
    ><script>
        function verify() {
            var x = document.forms['forms'];
            var password = x.elements[4].value;
            var verify_password = x.elements[5].value;
            if(verify_password != password){
                document.getElementById("verify").innerHTML = '<b>'+'كلمة المرور غير متطابقة'+'</b>';
            }else {
                document.getElementById("verify").innerHTML =  '<b>'+'كلمة المرور متطابقة'+'</b>';

            }
        }
    </script>
</div>
</body>

</html>

