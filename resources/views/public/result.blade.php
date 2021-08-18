@extends('public.layout.app')
@section('title','results')
@section('body')

    <div class="row gy-5">
        <div class="col-12">
        @if($result != null)
                <div class="row">
                    @foreach($result as $post)
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
            @else
                <div class="row">
                        <h1>
                            no results
                        </h1>
                </div>>
            @endif
        </div>
    </div>
@stop
