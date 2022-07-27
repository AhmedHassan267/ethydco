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
    <div style="float: left;">
        <form action="{{ route('search.users') }}">
            <input style="width:300px;height: 40px;" name="search" type="search" class="rounded" placeholder="Search User"
                aria-label="Search" aria-describedby="search-addon" />
            <button style="height: 42px;margin-bottom: 3px;" type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>
    <br><br><br>
    <div style="display: inline-block">
        <form action="{{ route('search.users.by.role') }}">
            <label>Search Certain Role</label>
            <br>
            <select name="role" class="select2" style="width:300px;">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <button style="height: 42px;margin-bottom: 3px;" type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </form>


    </div>
    <div style="display: inline;float: right;">
        <form action="{{ route('switch.to.table') }}">
            <button type="submit" class="btn btn-primary">Switch To Table</button>
        </form>
    </div>



    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                {{ $user->role->name }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $user->name }}</b></h2>
                                        <p class="text-muted text-sm"><b>About: </b>{{ $user->education }}</p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Address:
                                                {{ $user->location }}</li>
                                            <br>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span> Phone #: {{ $user->phone }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="/storage/{{ $user->profile_pic }}" alt="user-avatar"
                                            class="img-circle img-fluid" style="width: 120px;height:120px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="{{ route('view.user.info') }}">
                                        <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-user"></i> View
                                            Profile</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- /.card-body -->
        {{ $users->links() }}
    </div>
@endsection
