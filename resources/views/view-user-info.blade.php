@extends('layouts.admin')


@section('title')
    {{ $user->name }}
@endsection

@section('links')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Users</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ol>
@endsection

@section('content')
    <div class="card card-solid" style="height: 490px">
        <div class="card-body pb-0">
            <div class="row">
                    <div class="col-20 d-flex align-items-stretch flex-column" style="height: 470px;width:1000px;margin: auto;">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">

                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $user->role->name }} - {{ $user->name }}</b></h2>
                                        <hr>
                                        <h2 class="lead"><b>About: {{ $user->education }}</p></h2>
                                            <hr>
                                            <ul class="ml-4 mb-0 fa-ul">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Address:
                                                {{ $user->location }}</li>
                                            <hr>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span> Phone #: {{ $user->phone }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="/storage/{{ $user->profile_pic }}" alt="user-avatar"
                                            class="img-circle img-fluid" style="width: 330px;height:150px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer" style="margin: auto;width: 100%">
                                <div style=" text-align: center;">
                                    <form action="{{ route('view.user.info.table') }}">
                                        <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                                        <button class="btn btn-sm btn-primary" style="width: 200px"><i class="fas fa-chart-pie"></i> View
                                            Progress</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
