@extends('layouts.master')

@section('title', 'View Users')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Users
                <a href="{{ url('admin/add-user')}}" class="btn btn-primary btn-sm float-end">Add User</a>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $useritem)
                                <tr>
                                    <td>{{$useritem->id}}</td>
                                    <td>{{$useritem->name}}</td>
                                    <td>{{$useritem->email}}</td>

                                    <td>{{$useritem->role_as == '1' ? 'Admin' : 'User'}}</td>
                                    <td>
                                        <a href="{{ url('admin/user/'.$useritem->id)}}" class="btn btn-success">Edit</a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
