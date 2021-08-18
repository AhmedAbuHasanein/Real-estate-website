@extends('public.layout.app')

@section('title','home page')

@section('body')
<div class="eee">
<div class="logo-center" >

   <img src="{{asset('asset/img/logo.png')}}" class="header-logo">
</div>
</div>
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
@stop

