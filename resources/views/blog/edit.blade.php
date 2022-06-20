@extends('layouts.app')

@section('title') Blog Create @endsection

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">

            <div class="col-8">
                <div class="card mt-5 border-warning border-5 shadow-lg p-5 bg-dark">
                    <div class="card-header animate__animated animate__bounce">
                        <h3 class=" m-0 text-warning">Create New Post</h3>
                    </div>
                    <div class="card-body animate__animated animate__bounce">
                        @if($errors->any())
                            <div class="alert alert-danger mt-5">
                                <ul class="m-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('blog.update',$blog->id)}}" method="post" class="">

                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label for="" class="form-label text-warning">Title</label>
                                <input type="text" class="form-control-lg form-control @error('title') is-invalid @enderror "  name="title" value="{{old('title',$blog->title)}}">
                                @error('title')
                                <small class="text-danger fw-bold invalid-feedback"> {{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label text-warning">Description</label>
                                <textarea name="description" class="form-control-lg form-control @error('description') is-invalid @enderror " id="" cols="30" rows="10">{{old('description',$blog->description)}}</textarea>
                                @error('description')
                                <small class="text-danger fw-bold invalid-feedback"> {{$message}}</small>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button class="btn  btn-lg btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
