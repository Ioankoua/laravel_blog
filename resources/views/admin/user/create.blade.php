@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h6>
                        Add Users
                    </h6>
                    <form action="{{ route('admin.user.store') }}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="User name">
                        </div>
                        @error('name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="User email">
                        </div>
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="form-group w-50">
                            <label>Select Role</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == old('role') ? ' selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add User">
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
