@extends('public.layout.app')
@section('title','dept')

@section('body')


<div class="row">
    @foreach($type_id as $post)
        <div class="card col-4" style="width: 18rem;">
            <img src="{{asset($post['main_image'])}}" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title">{{$post['price']}}$</h5>
                <p class="card-text">{{$post['description']}}</p>
                <a href="{{route('product',$post['id'])}}" class="btn btn-primary">more details</a>
            </div>
        </div>
    @endforeach
</div>
@stop
