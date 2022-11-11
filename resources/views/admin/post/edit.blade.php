@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-2">Edit Post</h1>
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
                        Edit Post
                    </h6>
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group w-25">
                            <input type="text" class="form-control" name="title" placeholder="Name Post"
                                   value="{{ $post->title }}">
                        </div>
                        @error('title')
                        <div class="text-danger">Field empty. {{$message}}</div>
                        @enderror
                        <div class="form-group" >
                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                        </div>
                        @error('content')
                        <div class="text-danger">Field empty. {{$message}}</div>
                        @enderror
                        <div class="form-group w-50">
                            <label>Edit main image</label>
                            <div class="w-50">
                                <img src="{{ asset('storage/'.$post->main_image) }}" class="w-100">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Select Image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Download</span>
                                </div>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group w-50">
                            <label>Edit preview</label>
                            <div class="w-50">
                                <img src="{{ asset('storage/'.$post->preview_image) }}" class="w-100">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Select Image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Download</span>
                                </div>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <div class="form-group w-50">
                            <label>Select Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? ' selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Tags</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }} style="color:deepskyblue" value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Edit Post">
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
