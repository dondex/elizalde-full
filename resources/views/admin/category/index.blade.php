@extends('layouts.master')

@section('title', 'View Category')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Category
                <a href="{{ url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $categitem)
                        <tr>
                            <td>{{$categitem->id}}</td>
                            <td>{{$categitem->name}}</td>
                            <td>
                                <img src="{{ asset('upload/category/'.$categitem->image)}}" width="50px" height="50px" alt="image">
                            </td>
                            <td>{{$categitem->status == '1' ? 'Hidden' : 'Shown'}}</td>
                            <td>
                                <a href="{{ url('admin/edit-category/'.$categitem->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{ url('admin/delete-category/'.$categitem->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
