@extends('index')

@section('content')
    <section class="site-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="p-2">Add Post</h4>
                    <div class="form-wrapper shadow-sm">
                        <form action="{{ route('add.post') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="_token" value="{{csrf_token()}}">


                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-left">{{ __('Title:') }}</label>

                                <div class="col-md-12">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-md-3 col-form-label text-md-left">{{ __('Content:') }}</label>

                                <div class="col-md-12">
                                    <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" required></textarea>

                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label text-md-left">{{ __('Image:') }}</label>

                                <div class="col-md-12">
                                    <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" required>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Publish') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('success')

                </div>

                <div class="col-lg-8">
                    <h4 class="p-2">Manage Posts</h4>
                    <div class="table-wrapper table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>
                                    @if(strlen($post->content) > 50)
                                        {{ substr($post->content, 0, 50) }}
                                        ....
                                     @else
                                        {{$post->content}}
                                        @endif
                                </td>
                                <td>
                                    <img class="post-img" src="{{ asset('images/'.$post->image) }}">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#postModal-{{$post->id}}">Edit</a>
                                    <form action="{{ route('delete.post',[$post->id]) }}" method="post">
                                        @method('post')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @include('modal')
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection