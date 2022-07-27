@extends('layouts.admin')


@section('title')
    {{ $user->name }} - {{ $user->role->name }}
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
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>CU</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($role_specifics as $role_specific)
                                <tr>
                                    <td>{{ $role_specific->name }}</td>
                                    <td>
                                        <form action="{{ route('view.user.cu.progress') }}">
                                            <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-chart-pie"></i> View Progress</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>

                </div>
            </div>
        </div>
    </div>
@endsection
