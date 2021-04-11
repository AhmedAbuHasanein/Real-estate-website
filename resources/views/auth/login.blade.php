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
<div class="container mt-4">
    <div class="row">
        <!-- login area -->
        <div class="col">
            <div class="card">
                <div class="card-header">تسجيل الدخول</div>
                <div class="card-body">
                    <form action="{{route('authenticate')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">الاسم الكامل او اسم الشركة *</label>
                            <input type="text" class="form-control" id="name" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">كلمة السر *</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me">
                            <label class="form-check-label" for="remember-me">تذكرني</label>
                        </div>
                        <input type="submit" class="btn btn-primary" value="تسجيل الدخول">
                    </form>
                </div>
            </div>
        </div>

        <!-- Register area -->
        <div class="col">
            <div class="card">
                <div class="card-header">انشاء حساب</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="type">اختار واحدة *</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Buyer" id="type1" value="option1">
                                <label class="form-check-label" for="type1">بائع</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Customer" id="type" value="option2">
                                <label class="form-check-label" for="type2">زبون</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fname">الاسم الاول</label>
                                    <input type="text" class="form-control" id="fname">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lname">اسم العائلة</label>
                                    <input type="text" class="form-control" id="lname">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="company">اسم الشركة *</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" id="company">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ftitle">العنوان الاول *</label>
                            <input type="text" class="form-control" id="ftitle">
                        </div>

                        <div class="form-group">
                            <label for="stitle">العنوان الثاني (اختياري)</label>
                            <input type="text" class="form-control" id="stitle">
                        </div>

                        <div class="form-group">
                            <label for="sex">الجنس *</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Buyer" id="male" value="male">
                                <label class="form-check-label" for="male">ذكر</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Customer" id="female" value="female">
                                <label class="form-check-label" for="female">انثى</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">انشئ الحساب</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
