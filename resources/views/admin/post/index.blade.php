@extends('layouts.master')

@section('title', 'View Posts')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Posts
                <a href="{{ url('admin/add-post')}}" class="btn btn-primary btn-sm float-end">Add Post</a>
            </h4>
        </div>
        <div class="card-body">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif

            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Post Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $postitem)
                        <tr>
                            <td>{{$postitem->id}}</td>
                            <td>{{ $postitem->category->name }}</td>
                            <td>{{$postitem->name}}</td>
                            <td>
                                <img src="{{ asset('upload/posts/'.$postitem->image)}}" width="50px" height="50px" alt="image">
                            </td>
                            <td>{{$postitem->status == '1' ? 'Hidden' : 'Visible'}}</td>
                            <td>
                                <a href="{{ url('admin/post/'.$postitem->id )}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-post/'.$postitem->id )}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
