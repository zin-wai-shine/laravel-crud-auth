@extends('layouts.app')

@section('title') Blog Create @endsection

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">

            <div class="col-8">

                <div class="card mt-5 border-warning border-5 shadow-lg p-5 bg-dark">

                    <div class="card-header d-flex align-items-center">
                        <h3 class="text-warning mb-0"><i class="fa fa-plus-circle text-primary"></i> Create New
                            Post</h3>
                    </div>

                    <div class="card-body animate__animated animate__zoomIn">
                        <form action="{{route('blog.store')}}" method="post" class="">
                            @csrf
                            <div class="mb-3">
                                <div class="text-white"><label for="" class="form-label @error('title')text-danger
@enderror ">Title</label></div>
                                <input type="text" class="form-control-lg form-control @error('title') is-invalid @enderror "  name="title" value="{{old('title')}}">
                                @error('title')
                                <small class="text-danger fw-bold invalid-feedback"> {{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="text-white"><label for="" class="form-label
                                @error('description') text-danger @enderror">Description</label></div>
                                <textarea name="description" class="form-control-lg form-control @error('description') is-invalid @enderror " id="" cols="30" rows="10">{{old('description')}}</textarea>
                                @error('description')
                                <small class="text-danger fw-bold invalid-feedback"> {{$message}}</small>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn  btn-lg btn-primary">Create Post</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
