@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-2">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
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
                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name Users" value="{{ $user->name }}">
                        </div>
                        @error('name')
                            <div class="text-danger">Field empty. {{$message}}</div>
                        @enderror

                        <div class="form-group">
                            <input value ="{{ $user->email }}"type="text" class="form-control" name="email" placeholder="User email">
                        </div>
                        @error('email')
                        <div class="text-danger">Field empty. {{$message}}</div>
                        @enderror

                        <div class="form-group w-50">
                            <label>Select Role</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ $id == $user->role ? ' selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div><div class="form-group w-50">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Edit User">
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
