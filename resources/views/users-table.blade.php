@extends('layouts.admin')


@section('title')
    Users
@endsection

@section('links')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Users</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <form action="{{ route('view.users') }}">
                            <button type="submit" class="btn btn-success">Switch To Card</button>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role Name</th>
                                <th>Education</th>
                                <th>Location</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ $user->education }}</td>
                                    <td>{{ $user->location }}</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Role Name</th>
                            </tr>
                        </tfoot>
                    </table>
                    <br>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
