@extends('index')

@section('content')
    <div class="site-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="p-2">Post</h4>
                    <div class="single-post shadow-sm">
                        <div class="post-img-section">
                            <img src="{{asset('images/'.$post->image)}}">
                        </div>
                        <div class="post-content">
                            <h5>{{$post->title}}:</h5>
                            <p>{{$post->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection