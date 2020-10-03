@extends('index')

@section('content')
    <section class="site-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 class="p-2">Recent Posts</h4>
                </div>

                @foreach($posts as $post)

                <div class="col-lg-4 col-sm-12 col-xs-12">
                    <div class="flex-container">
                    <div class="card">
                        <div class="circle">
                            <img src="{{asset('images/'.$post->image)}}">
                        </div>
                        <div class="content">
                            <h5>
                                @if(strlen($post->title) > 20)
                                    {{substr($post->title, 0, 20)}}
                                    ...
                                @else
                                    {{$post->title}}
                                @endif
                            </h5>
                            <p>
                                @if(strlen($post->content) > 50)
                                {{substr($post->content, 0, 40)}}
                                    ...
                                    @else
                                {{$post->content}}
                                    @endif
                            </p>
                            <a href="{{route('view.post', [$post->id])}}">Read More</a>
                        </div>
                    </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>


    @endsection