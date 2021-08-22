
@extends('public.layout.app')
@section('title','search')

@section('body')

    <div class="widget-2 widget mb-4">
        <div class="widget-body row">
            <div class="col-lg-8 mx-auto">

                <form class="form d-flex no-gutters mb-20"  method="get" action="{{route('userSearch')}}">
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
                                <a href="{{route('showByTypeUser',$type->id)}}" class="item d-block text-center text-white py-3 h-100">
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
    <br>
    <div>
        <div id="map" style="width: 100%; height: 500px"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=&v=weekly"></script>
    <script >


        let map;
        var markers = [
                @foreach($realestates as $realestate)
            ['عقار', {{$realestate->location}} , '{{route("user_show_realestate",["id"=>$realestate->id])}}'],
            @endforeach
        ];

        let myMarkers = [];

        function addMarker(lat,lng,title, url){
            return  new google.maps.Marker({
                position:{lat : lat ,lng: lng},
                map:map,
                title:title,
                url : url,
                animation:google.maps.Animation.DROP,
                draggable:true,
            });

        }

        function initMap() {

            map = new google.maps.Map(document.getElementById("map"), {
                center: {lat : 30.033333 , lng :31.233334},
                zoom: 2,
            });


            const infoWindow = new google.maps.InfoWindow();

            for(let i=0; i < markers.length;i++){

                var marker = addMarker(markers[i][1],markers[i][2],markers[i][0],markers[i][3]);

                myMarkers.push(marker);

                myMarkers[i].addListener('click',function(){
                    infoWindow.close();
                    window.location.href = myMarkers[i].url;
                });


            }
        }
        initMap();
    </script>
@stop
@section('css')
    <style>
        [aria-current] .page-link {
            background-color: orange !important;
        }

        [rel='prev'], [rel='next'] {
            background-color: #202326 !important;
        }

        .pagination > li :not([rel='prev'],[rel='next'],[aria-current] .page-link) {
            background-color: #202326 !important;
        }
        .pagination > li > a,
        .pagination > li > span {
            color: orange ;
        }
    </style>
@stop

