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

<div class="container mt-4" style="text-align: right;">

        <div class="row">
            <div class="col-lg-3 "></div>
            <!-- login area -->
            <div class="col-lg-5  " style="margin-bottom: 20px;">
                <div class="card">
                    <div class="card-header">تسجيل الدخول</div>
                    <div class="card-body">
                        <form action="{{route('authenticate')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">البريد الالكتروني أو اسم المستخدم</label>
                                <input type="text" class="form-control" id="name" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة السر </label>
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
            <div class="col-lg-4 ">
                <div class="card">
                    <div class="card-header">انشاء حساب</div>
                    <div class="card-body">
                        <a href="{{route('form_user')}}" style="margin-right: 20%">
                            <button class="btn btn-primary col-8">حساب زبون</button>
                        </a>
                        <br/>
                        <br/>
                        <a href="{{route('form_company')}}" style="margin-right: 20%">
                            <button class="btn btn-primary col-8" >حساب شركة</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>


</div>

</body>

</html>
