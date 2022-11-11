@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-2">Edit Tag</h1>
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
                        Add Tags
                    </h6>
                    <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Name Tags" value="{{$tag->title}}">
                        </div>
                        @error('title')
                            <div class="text-danger">Field empty. {{$message}}</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="Edit Tags">
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
