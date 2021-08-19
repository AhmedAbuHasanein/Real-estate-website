<?php $account = \Illuminate\Support\Facades\Auth::user(); ?>
@extends('public.layout.app')
@section('title',$realestate['company_name'])

@section('body')

    <div class="widget-2 widget mb-4">
        <div class="widget-body row">
            <div class="col-lg-8 mx-auto">

                <form class="form d-flex no-gutters mb-20"  method="get" action="{{route('search')}}">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-orange search-button">بحث</button>
                    </div>
                    <div class="col pl-12">
                        <input type="text" class="form-control input-search" id="widget2SearchInput" name="search" placeholder="ابحث هنا عن ما ترغب به.....">
                    </div>

                </form>
                {{--list of realestate type--}}
                <div class="main-categories-list">
                    <div class="row">
                        @foreach($types as $type)
                            <div class="col-lg col-4">
                                <a href="{{route('showByType',$type->id)}}" class="item d-block text-center text-white py-3 h-100">
                                    <div class="icn">
                                        <img src="{{asset($type->emoji)}}" class="fas">
                                    </div>
                                    <div class="font-size-16">{{$type->type}}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{--end of realestate type--}}
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
<div class="movie-cover">

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="button">
                    <a href="#ad" ><button type="button" class="btn btn-light btn-button"><i class="fab fa-youtube fa-youtube-1"></i>شاهد الفيديو</button></a>
                    <a href="#des"> <button type="button" class="btn  btn-button btn-primary">  <i class="fas fa-arrow-circle-down"></i>أقرأ صندوق الوصف   </button></a>
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
<div class="container" id="des" style="margin-bottom: 60px">
    <div class="Describe" >
        <h5>صندوق الوصف</h5>
        <p>{{$realestate['description']}}</p>
        <div class="house-photos">
            @foreach($realestate->image_realestates as $image)
              <a href="#"> <img src="{{asset($image->url)}}" width="170px" height="100px"></a>
            @endforeach
        </div>
    </div>
    <div class="clearfix"></div>
    <h5 class="watch-ved" id="ad">فيديو من داخل العقار</h5>
    <div class="clearfix"></div>
    <div class="container About-property">
        <div class="clearfix"></div>
        <div class="embed-responsive embed-responsive-16by9 videoall ">
            <video class="card-img-top" controls autoplay>
                <source  src="{{asset($realestate['video_url'])}}" type="video/mp4">

            </video>
        </div>
    </div>

</div>




<div class="clearfix"></div>

@stop




