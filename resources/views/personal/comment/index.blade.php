@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->message }}</td>
                                    <td><a href="{{ route('personal.comment.edit', $comment->id) }}"><i class="text-success fas fa-pencil-alt"></i></a></td>
                                    <td>
                                        <form action="{{ route('personal.comment.delete', $comment->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="text-danger fas fa-trash" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
