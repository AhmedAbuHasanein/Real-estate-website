
@if(Session::has('success'))

        <div class="card bg-success" style="text-align: right">
            <!-- /.card-header -->
            <div class="card-body">
                <h3 class="card-title">
                {{Session::get('success')}}
                </h3>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endif
@if($errors->any())

<div class="alert alert-danger " role="alert" >
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
</div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('error')}}
    </div>
@endif
