@extends('admin.layout.app')
@section('title')
    <title>إضافة نوع عقار </title>
@stop
@section('page padding')
    <div class="content-wrapper" style="direction: rtl">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2" style="margin-left: 10px" >
                  <i class="mdi mdi-table-large"></i>
                </span> إضافة نوع عقار
            </h3>
        </div>
        <div class="row "  >
            <div class="col-12 grid-margin">
                <div class="card " >
                    <div class="card-body">
                        <h4 class="card-title" style="text-align:right"> إضافة نوع عقار </h4>
                        <div class="card-body table-responsive p-0">
                            <div class="card" style="text-align: right">
                                <div class="card-body " style="text-align: right">
                                    <form id="forms" enctype="multipart/form-data" class="form-sample" method="post" action="{{route('admin_add_realestate_type')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">اسم نوع العقار</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{old('type')}}" required />
                                                        @error('type')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">الرمز التعبيري</label>
                                                    <div class="col-sm-9" style="direction: ltr">
                                                        <input type="file" class="file-upload-default @error('emoji') is-invalid @enderror" name="emoji" value="{{old('emoji')}}" required  />
                                                        <div class="input-group col-xs-12">
                                                            <input type="text" class="form-control file-upload-info" disabled="">
                                                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button"><b>تحميل</b></button>
                          </span>
                                                        </div>
                                                        @error('emoji')
                                                        <div class="badge badge-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <button class="btn btn-gradient-primary" type="submit">حفظ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
