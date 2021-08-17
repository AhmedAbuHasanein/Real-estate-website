@extends('company.layout.app')
@section('title')
    <title>إضافة عقار</title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px" >
                  <i class="mdi mdi-home"></i>
                </span> <a href="{{route('company_index')}}">الصفحة الرئيسية</a>  &#10095; إضافة عقار
            </h3>
        </div>
        <div class="row "  >
            <div class="col-12 grid-margin">
                <div class="card " >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-9">
                                <h4 class="card-title" style="text-align:right"> إضافة عقار </h4>
                            </div>
                        </div>
                        <div class="card-body " >
                            <form id="forms" enctype="multipart/form-data" method="post"  action="{{route('company_add_realestate')}}">
                                @csrf
                                <div class="row" >
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"  style="text-align: right"><b>الحالة</b></label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control @error('status') is-invalid @enderror "   name="status" required>
                                                            <option @if(old('status')== null) selected @endif disabled="">إختر</option>
                                                            <option @if(old('status')== 'متاح') selected @endif value="متاح">متاح</option>
                                                            <option @if(old('status')== 'غير متاح') selected @endif value="غير متاح">غير متاح</option>
                                                        </select>
                                                        @error('status')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"  style="text-align: right">نوع العقار</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control @error('realestate_type') is-invalid @enderror"   name="realestate_type" required>
                                                            <option @if(old('realestate_type')== null) selected @endif disabled="">إختر</option>
                                                            @foreach($realestate_types as $realestate_type)
                                                                <option @if(old('realestate_type') == $realestate_type->type) selected @endif value="{{$realestate_type->type}}">{{$realestate_type->type}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('realestate_type')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"  style="text-align: right">عرض العقار ك   </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control @error('type') is-invalid @enderror "   name="type" required>
                                                            <option @if(old('type')== null) selected @endif disabled="">إختر</option>
                                                            <option @if(old('type')== 'بيع') selected @endif value="بيع">بيع</option>
                                                            <option @if(old('type')== 'إيجار') selected @endif value="إيجار">إيجار</option>
                                                        </select>
                                                        @error('type')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"  style="text-align: right"> السعر</label>
                                                    <div class="col-sm-9" style="direction: ltr">
                                                        <div class="input-group mb-2 mr-sm-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">$</div>
                                                            </div>
                                                            <input class="form-control @error('price') is-invalid @enderror" type="number"  name="price" value="{{old('price')}}" required>
                                                        </div>
                                                        @error('price')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"  style="text-align: right">المساحة  </label>
                                                    <div class="col-sm-9" style="direction: ltr">
                                                        <div class="input-group mb-2 mr-sm-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">م<sup>2</sup></div>
                                                            </div>
                                                            <input class="form-control @error('space') is-invalid @enderror" type="number"  name="space" value="{{old('space')}}" required>
                                                        </div>
                                                        @error('space')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"  style="text-align: right">عنوان العقار</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control @error('address') is-invalid @enderror"   name="address" value="{{old('address')}}" required>
                                                        @error('address')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" style="text-align: right">الوصف </label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control @error('description') is-invalid @enderror "  style="text-align: right" cols="20" rows="10" name="description" required>{{old('description')}}</textarea>
                                                        @error('description')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="form-group row " style="justify-content: center; display: flex; margin-top: 20px;">
                                                <div class="col-sm-4 col-lg-10 col-md-12" style="direction: ltr; text-align: right">
                                                    <label>تحميل الصورة الرئيسة للعقار</label>
                                                    <input type="file" class="file-upload-default @error('main_image') is-invalid @enderror" name="main_image"  required  />
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled="">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-gradient-primary" type="button"><b>تحميل</b></button>
                                                        </span>
                                                    </div>
                                                    @error('main_image')
                                                    <div class="badge badge-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row " style="justify-content: center; display: flex; margin-top: 20px;">
                                                <div class="col-sm-4 col-lg-10 col-md-12" style="direction: ltr; text-align: right">
                                                    <label>تحميل فيديو العقار</label>
                                                    <input type="file" class="file-upload-default @error('video_url') is-invalid @enderror" name="video_url"  required  />
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled="">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-gradient-primary" type="button"><b>تحميل</b></button>
                                                        </span>
                                                    </div>
                                                    @error('video_url')
                                                    <div class="badge badge-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row " style="justify-content: center; display: flex; margin-top: 20px;">
                                                <div class="col-sm-4 col-lg-10 col-md-12" style="direction: ltr; text-align: right">
                                                    <label>(mp4) تحميل صور العقار</label>
                                                    <input type="file" class="file-upload-default @error('realestate_images') is-invalid @enderror" multiple  name="realestate_images[]"   />
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled="">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-gradient-primary" type="button"><b>تحميل</b></button>
                                                        </span>
                                                    </div>
                                                    @error('realestate_images')
                                                    <div class="badge badge-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row " style="justify-content: center; display: flex; margin-top: 20px;">
                                                <div class="col-sm-4 col-lg-10 col-md-12" style="direction: ltr; text-align: right">
                                                    <label>تحميل مستندات إثبات ملكية العقار</label>
                                                    <input type="file" class="file-upload-default @error('realestate_documents') is-invalid @enderror" multiple  name="realestate_documents[]" />
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled="">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-gradient-primary" type="button"><b>تحميل</b></button>
                                                        </span>
                                                    </div>
                                                    @error('realestate_documents')
                                                    <div class="badge badge-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input class="@error('location') is-invalid @enderror" type="text" hidden  id="location" name="location" required>
                                            @error('location')
                                            <div class="badge badge-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px">
                                    <label>أضف موقع العقار على الخريطة :</label>
                                    <div id="map" style="width: 90%; height: 400px">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px" >
                                    <button type="submit" class="btn btn-primary" > حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?libraries=&v=weekly"></script>
    <script type="text/javascript">
        let str = '31.52457156720051,34.463430660924594';
        const myArr = str.split(",");
        var lat = Number(myArr[0]);
        var lng =  Number(myArr[1]);
        var latLng = {lat:lat, lng:lng};
        var markers = [];
        window.onload = function () {
            var mapOptions = {
                center: latLng,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            //Create a marker and placed it on the map.
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
            });
            markers.push(marker);
            document.getElementById('location').value= latLng['lat']+','+latLng['lng'];
            //Attach click event handler to the map.
            google.maps.event.addListener(map, 'click', function (e) {

                //Determine the location where the user has clicked.
                var location = e.latLng;

                //Create a marker and placed it on the map.
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });

                //Attach click event handler to the marker.
                google.maps.event.addListener(marker, "click", function (e) {
                    var infoWindow = new google.maps.InfoWindow({
                        content: 'Latitude: ' + location.lat() + '<br />Longitude: ' + location.lng()
                    });

                    infoWindow.open(map, marker);
                });
                DeleteMarkers(null);
                //Add marker to the array.
                markers.push(marker);
                document.getElementById('location').value= location.lat()+','+location.lng();

            });

        };
        function DeleteMarkers() {
            //Loop through all the markers and remove
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }
    </script>
@stop

