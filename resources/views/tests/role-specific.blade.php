@extends('layouts.admin')


@section('title')
    {{ $role->name }}
@endsection

@section('links')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Competency Test</li>
        <li class="breadcrumb-item"><a href="{{ route('test') }}">Roles</a></li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card card-default color-palette-box">
            <div class="card-body">
                <div class="row">
                    @foreach ($roleSpecifics as $roleSpecific)
                        @if ($loop->iteration % 2 == 0)
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <form action="{{ route('test.role.specific.levels', $roleSpecific->role_id) }}">
                                        <input name="role_specific_id" type="text" value="{{ $roleSpecific->id }}"
                                            hidden>
                                        <button class="btn btn-secondary">{{ $roleSpecific->name }}</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <form action="{{ route('test.role.specific.levels', $roleSpecific->role_id) }}">
                                        <input name="role_specific_id" type="text" value="{{ $roleSpecific->id }}"
                                            hidden>
                                        <button class="btn btn-secondary">{{ $roleSpecific->name }}</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <br><br><br>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $roleSpecifics->links() }}
    </div>
@endsection
