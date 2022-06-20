@extends('layouts.app')

@section('title') Home  @endsection

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card bg-dark shadow-lg border-5 border-warning p-3">
                    <div class="card-header">
                        <h3 class="m-0 text-warning"><i class="fa fa-list-check text-primary"></i> Blog Lists</h3>
                    </div>
                    <div class="card-body">

                        @if(session('status'))
                            <h6 class="d-none" id="alertSuccess">{{session
                            ('status')
                            }}</h6>
                        @endif

                        <div class="row d-flex justify-content-end">
                            <div class="mb-2 col-4">
                                <form action="{{ route('blog.index') }}" method="get" class="d-flex" role="search">
                                    <input class="form-control me-2" value="{{request('keyword')}}" type="search" placeholder="Search Post ...." name="keyword" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit"><i class="fa
                                    fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered table-responsive rounded table-hover text-white">
                            <thead>
                            <tr class="text-center">
                                <th class="text-center">#</th>
                                <th>Title</th>
                                <th>Controller</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody class="m-0">
                            @foreach($blogs as $blog)
                                <tr class="align-middle headline">
                                    <td class="text-center">{{$blog->id}}</td>
                                    <td>
                                        <h6 class="text-capitalize fw-bold"> {{Str::words($blog->title,5)}}</h6>
                                        <p>{{Str::words($blog->description,15)}}</p>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('blog.show',$blog->id)}}" class="btn btn-outline-primary
                                        btn-sm headline"><i class="fa fa-info-circle"></i></a>
                                        <div class="d-inline-block">
                                            <form id="deleteSubmit" action="{{route('blog.destroy',$blog->id)}}"
                                                  method="post"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                            </form>
                                            <div id="btnSwitch">
                                                <button class="btn btn-outline-danger btn-sm headline"
                                                        id="delete"
                                                ><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-outline-info
                                        btn-sm headline"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td class="text-center">{{$blog->created_at->format('d/m/y')}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <div>
                            {{ $blogs->Links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
