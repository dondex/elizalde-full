@extends('layouts.master')

@section('title', 'Create Posts')

@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Add Post</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif


                <form action="{{ url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" >
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id}}">{{ $cateitem->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea  name="description" rows="4" class="form-control"></textarea>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" />
                        </div>

                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary float-end">Save Post</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
