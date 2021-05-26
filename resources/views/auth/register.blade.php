<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
        body {
            background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url({{asset("image_site/realestate.jpg")}});
            background-position: center;
            background-size: cover;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
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
                            <label for="type">اختار واحدة *</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="account" id="type1" value="company"
                                @if(old('account')=='company') checked @endif>
                                <label class="form-check-label" for="type1">بائع</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="account" id="type" value="user"
                                       @if(old('account')=='user') checked @endif>
                                <label class="form-check-label" for="type2">زبون</label>
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

    </div><script>
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

