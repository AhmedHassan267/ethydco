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
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-body">
                <!-- /.col-12 -->
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('test.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="1" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary"
                                style="width: 50%; margin-left: 25%">Level 1
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('level','1')->count()}}</span></button>
                        </form>
                        <br>
                        <form action="{{ route('test.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="2" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary"
                                style="width: 50%; margin-left: 25%">Level 2
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('level','2')->count()}}</span></button>
                        </form>
                        <br>
                        <form action="{{ route('test.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="3" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary"
                                style="width: 50%; margin-left: 25%">Level 3
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('level','3')->count()}}</span></button>
                        </form>
                        <br>
                        <form action="{{ route('test.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="4" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary"
                                style="width: 50%; margin-left: 25%">Level 4
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('level','4')->count()}}</span></button>
                        </form>
                        <br>
                        <form action="{{ route('test.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="5" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary"
                                style="width: 50%; margin-left: 25%">Level 5
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('level','5')->count()}}</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
@endsection
