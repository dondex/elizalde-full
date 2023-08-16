@extends('layouts.master')

@section('title', 'Edit Posts')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Edit Post
                    <a href="{{ url('admin/posts')}}" class="btn btn-danger btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif


                <form action="{{ url('admin/update-post/'.$post->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" required class="form-control" >
                            <option value=""> -- Select Category -- </option>

                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id}}" {{$post->category_id == $cateitem->id ? 'selected' :'' }}>{{ $cateitem->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" name="name" value="{{$post->name}}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea  name="description" id="mySummernote" rows="4" class="form-control">{!! $post->description !!}</textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" {{$post->status == '1' ? 'checked' : ''}} />
                        </div>

                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary float-end">Update Post</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
