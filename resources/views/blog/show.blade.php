@extends('layouts.app')

@section('title') Blog Create @endsection

@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8">
                <div class="card mt-5 border-warning border-5 shadow-lg p-5 bg-dark text-white">
                    <div class="card-header animate__animated animate__bounce d-flex align-items-center">
                        <i class="fa fa-info-circle text-info"></i>
                        <h4 class="text-capitalize mb-0 mx-3">Detail By : <span
                                class="text-warning">{{$blog->title}}</span></h4>
                    </div>
                    <div class="card-body ">
                        <h2 class="text-capitalize detail">{{$blog->title}}</h2>
                        <span class=" detail">{{$blog->description}}</span>
                        <div class="mt-5 detail">
                            <h6>Date by : >>> {{$blog->created_at->format('d / m / y ')}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
