<?php $account = \Illuminate\Support\Facades\Auth::user(); ?>
@extends('public.layout.app')
@section('title',$realestate['company_name'])

@section('body')

<div class="clearfix"></div>
<div class="movie-cover">

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="button">
                    <a href="#ad" ><button type="button" class="btn btn-light btn-button"><i class="fab fa-youtube fa-youtube-1"></i>شاهد الفيديو</button></a>
                    <a href="#des"> <button type="button" class="btn  btn-button btn-primary">  <i class="fas fa-arrow-circle-down"></i>أقرأ صندوق الوصف   </button></a>
                    <a href="#comment"><button type="button" class="btn  btn-button btn-danger Share-button">  <i class="fas fa-share-alt"></i><span style="color: white">شارك بتعليق</span>   </button></a>

                </div>
            </div>
            <div  class="col-5"  >
                <div class="home-inform">
                    <h3 class="owner-name">

                    </h3>
                    <div class="sp">
                        <span style="margin-top: 61px">اسم المعلن : {{$realestate['company_name']}}</span>
                        <span> السعر{{$realestate['price']}} $</span>
                        <span> نوع العقار :{{$type['type']}}  </span>
                        <span>عنوان العقار : {{$realestate['address']}}</span>
                        <span>الحالة :{{$realestate['status']}} </span>
                        <span>مساحة العقار : {{$realestate['space']}} متر </span>
                        <div class="home-btn">
                            <button type="button" class="btn btn-light "> {{$type['type']}}</button>

                        </div>
                        <div class="clearfix"></div>
                        <p>تاريخ الإضافة : {{$realestate['created_at']}}</p>
                        <p>تاريخ اخر تحديث : {{$realestate['updated_at']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-3"  >
                 <img src="{{asset($realestate['main_image'])}}" class="pictures ">
            </div>
        </div>
    </div>
</div>




<!--start body-->
<div class="container" id="des">
    <div class="Describe" >
        <h5>صندوق الوصف</h5>
        <p>{{$realestate['description']}}</p>
        <div class="house-photos">
            <a href="#"> <img src="{{asset('asset/img/home.png')}}" width="170px" height="100px"></a>
            <a href="#"><img src="{{asset('asset/img/home.png')}}" width="170px" height="100px"></a>
            <a href="#"> <img src="{{asset('asset/img/home.png')}}" width="170px" height="100px"></a>
        </div>
    </div>
    <div class="clearfix"></div>
    <h5 class="watch-ved" id="ad">الاعلان</h5>
    <div class="clearfix"></div>
    <div class="container About-property">
        <div class="clearfix"></div>
        <div class="embed-responsive embed-responsive-16by9 videoall ">
            <iframe  class="video" src="https://www.youtube.com/embed/LIaRF3wsm2s?list=PLDoPjvoNmBAw24EjNUp_88S1VeaNK8Cts" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
    </div>
@if(($account->id) == null)
    <div class="comment" id="comment">
        <h5 class="comment-ved">التعليقات</h5>
        <div class="clearfix"></div>
        <p class="comment-ved">.لكي تتمكن من التعليق<a href="{{route('login')}}" class="text-white "> تسجيل الدخول</a> يجب عليك</p>
    </div>

    @else
        <div class="comment" id="comment">
            <h5 class="comment-ved">التعليقات</h5>
            <div class="row">
                <div>
                    name
                </div>
                <div>
                    jkjkoafjsopaojg
                </div>

            </div>

            <form class="form-group" action="" method="GET">
                <input type="text" class="form-control" name="comment" placeholder="اضف تعليقاً">
                <input type="submit" class="btn btn-primary col-4 mg-r-0" value="ارسل" name="submit">

            </form>
            @endif

        </div>


</div>

<div class="clearfix"></div>

@stop




