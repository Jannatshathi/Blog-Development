@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Post List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item active">Post list</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">post List</h3>
                            <a href="{{route('post.create')}}" class="btn btn-primary">Create post</a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts->count())
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>
                                        <div style="max-width: 70px; max-height: 70px,over-flow:hidden">
                                            <img src="{{ asset($post->image)}}" class="img-fluid" alt="">
                                        </div>
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category_id }}</td>
                                    <td>{{ $post->user_id }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('post.edit', [$post->id])}}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i></a>
                                        <form action="{{ route('post.destroy', [$post->id]) }}" class="mr-1" method="POST">
                                            @method('DELETE')
                                            @csrf 
                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                        </form>
                                        {{-- <a href="{{ route('post.show', [$post->id])}}" class="btn btn-sm btn-success mr-1"> <i class="fas fa-eye"></i></a> --}}
                                    </td>
                                    </tr>
                                @endforeach
                               @else
                               <tr>
                                   <td colspan="6">
                                    <h5 class="text-center">No posts found.</h5>
                                   </td>
                               </tr>
                               @endif
                               
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>

@endsection