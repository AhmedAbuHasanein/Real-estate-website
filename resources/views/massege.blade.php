
@if(Session::has('success'))

        <div class="card bg-success" style="text-align: right; margin: 15px">
            <!-- /.card-header -->
            <div class="card-body" style="padding: 10px 20px 10px 10px; ">
                <h3  style="color: white">
                {{Session::get('success')}}
                </h3>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endif
@if($errors->any())

<div class="alert alert-danger bg-danger " role="alert" style="text-align: right; padding: 10px 20px 10px 10px;margin: 15px ;color: white" >
    @foreach($errors->all() as $error)
       {{$error}}
    @endforeach
</div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger bg-danger " role="alert" style="text-align: right; padding: 10px 20px 10px 10px;margin: 15px;color: white ">
        {{Session::get('error')}}
    </div>
@endif
