@extends('company.layout.app')
@section('title')
    <title>عقار</title>
@stop
@section('body')
    onload="intiMap({{$realestate->location}}),openTab(event, 'image_Gallery')"
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px" >
                  <i class="mdi mdi-home"></i>
                </span>  عقار
            </h3>
        </div>
        <div class="row "  >
            <div class="col-12 grid-margin">
                <div class="card " >
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:right">  عقار </h4>
                        <div class="card-body " >
                            <div class="row" >
                                <div class="card col-lg-12" style="width:400px">
                                    <div class="slideshow-container">
                                        <div class="mySlides">
                                            <img class="card-img-top" src="{{asset($realestate->main_image)}}" alt="Card image" style="width:100%">
                                        </div>
                                        @foreach($realestate->image_realestates as $image)
                                            <div class="mySlides" hidden>
                                                <img class="card-img-top" src="{{asset($image->url)}}" alt="Card image" style="width:100%">
                                            </div>
                                        @endforeach
                                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                                    </div>
                                    <div class="row card-body" style="text-align: right">

                                        <div class="col-lg-5">
                                            <h4 class="card-title">اسم الشركة : <a href="{{route('admin_show_company',['id' => $realestate->company->id])}}">{{$realestate->company->company_name}}</a>  </h4>
                                            <h4 class="card-title">نوع العقار : {{$realestate->realestate_type->type}}  </h4>
                                            <h4 class="card-title">الوصف : {{$realestate->description}} </h4>
                                            <h4 class="card-title"> السعر :{{$realestate->price}} $</h4>
                                            <h4 class="card-title">المساحة :{{$realestate->space}}م<sup>2</sup></h4>
                                            <h4 class="card-title">العنوان :{{$realestate->address}}</h4>
                                            <h4 class="card-title"> الحالة :
                                                @if($realestate->status =='غير متاح')
                                                    <span class=" badge badge-danger " >{{$realestate->status}}</span>
                                                @else

                                                    <span class="badge badge-success ">{{$realestate->status}}</span>
                                                @endif
                                                <span class="badge badge-success " >{{$realestate->type}}</span>

                                            </h4>
                                        </div>
                                        <div class="col-lg-7 ">
                                            <div id="Map"  style="width: 100%; height: 400px">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div >
                                <div class="tab "  style="direction: rtl">
                                    <button class="tablinks" onclick="openTab(event, 'image_Gallery')"  id="defaultOpen" >معرض الصور</button>
                                    <button class="tablinks" onclick="openTab(event, 'document')"  >مستندات الملكية</button>
                                </div>
                                <div id="image_Gallery" class="tabcontent" style="text-align: right;">

                                    <div class="row" style="padding-right: 10px; padding-left: 10px" >
                                        <div class="column">
                                            <img class="card-img-top" src="{{asset($realestate->main_image)}}" alt="Card image" style="width:100%">
                                        </div>
                                        @foreach($realestate->image_realestates as $image)
                                            <div class="column">
                                                <img class="card-img-top" src="{{asset($image->url)}}" alt="Card image" style="width:100%">
                                            </div>
                                        @endforeach
                                        @if($realestate->image_realestates->isEmpty())
                                            <p style="margin: auto">لا يوجد صور </p>
                                        @endif
                                    </div>

                                </div>
                                <div id="document" class="tabcontent" style="text-align: right;" >
                                    <div class="row" style="padding-right: 10px; padding-left: 10px" >
                                        @foreach($realestate->real_estate_documents as $document)
                                            <div class="column">
                                                <img class="card-img-top" src="{{asset($document->url)}}" alt="Card image" style="width:100%">
                                            </div>
                                        @endforeach
                                        @if($realestate->real_estate_documents->isEmpty())
                                            <p style="margin: auto">لا يوجد مستندات</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <style>

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: right;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
        * {
            box-sizing: border-box;
        }
        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            padding: 0 4px;
        }

        /* Create four equal columns that sits next to each other */
        .column {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
            max-width: 25%;
            padding: 0 4px;
        }

        .column img {
            margin-top: 8px;
            vertical-align: middle;
            width: 100%;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
            }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
        }
        .slideshow-container {
            position: relative;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            left: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev {
            right: 0;
        }

    </style>
@stop
@section('js')
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                slides[i].hidden = true;
            }
            slides[slideIndex-1].style.display = "block";
            slides[slideIndex-1].hidden= false;
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=&v=weekly"></script>
    <script type="text/javascript">

        function intiMap (lat ,lng) {
            //Determine the location where the user has clicked.
            const location = { lat: lat, lng: lng };

            var mapOptions = {
                center: location,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP,

            };
            var map = new google.maps.Map(document.getElementById("Map"), mapOptions);


            //Create a marker and placed it on the map.
            var marker = new google.maps.Marker({
                position: location,
                map: map,
            });



        }

    </script>
@stop
