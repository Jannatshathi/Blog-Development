@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="{{route('user.index')}}">User list</a></li>
                    <li class="breadcrumb-item active">Create User</li>

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
                            <h3 class="card-title">Create User</h3>
                            <a href="{{route('user.index')}}" class="btn btn-primary">Go Back To User List</a>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <div class="card-body">
                                        @include('includes.validation')
                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input type="name" class="form-control" id="name" name="name"
                                                placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">User email</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">User password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Enter password">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                placeholder="Enter description"></textarea>
                                        </div>


                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
