
@if(Session::has('success'))

        <div class="card bg-success">
            <div class="card-tools justify-content-end">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
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

<div class="alert alert-danger" role="alert"  >

    @foreach($errors->all() as $error)
        {{$error}}
        <br>
    @endforeach
</div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('error')}}
    </div>
@endif
