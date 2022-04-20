@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="{{route('category.index')}}">Category list</a></li>
                    <li class="breadcrumb-item active">Category Edit</li>

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
                            <h3 class="card-title">Category Edit - {{ $category->name}}</h3>
                            <a href="{{route('category.index')}}" class="btn btn-primary">Go Back To Category List</a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <form action="{{route('category.update', [$category->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                            <div class="card-body">
                                @include('includes.validation')
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="name" class="form-control" value="{{ $category->name}}" id="name" name="name"
                                        placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="4" class="form-control"  
                                    placeholder="Enter description"> {{ $category->description}} </textarea>
                                </div>
                                

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>

@endsection
