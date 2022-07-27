@extends('layouts.admin')


@section('title')
    {{ $role->name }} - CU : {{ $role_specific->name }}
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
                        <p style="display: inline-block;font-size:120%;font-weight:600 ">General Description : </p> <p style="font-size:120%;color: rgb(209, 162, 255);display: inline;">{{ $role->description }}</p>
                        <br><br>
                        @if(DB::table('user_test')->where('user_id',Auth::user()->id)->where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','1')->where('go_next','1')->first() != null)
                        <form action="{{ route('user.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="1" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-success"
                                style="width: 50%; margin-left: 25%">Level 1
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','1')->count()}}</span></button>
                        </form>
                        @else
                        <form action="{{ route('user.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="1" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary"
                                style="width: 50%; margin-left: 25%">Level 1
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','1')->count()}}</span></button>
                        </form>
                        @endif

                        <br>
                        @if(DB::table('user_test')->where('user_id',Auth::user()->id)->where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','1')->where('go_next','1')->first() != null)
                        @if(DB::table('user_test')->where('user_id',Auth::user()->id)->where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','2')->where('go_next','1')->first() != null)
                        <form action="{{ route('user.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="2" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-success"
                                style="width: 50%; margin-left: 25%">Level 2
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','2')->count()}}</span></button>
                        </form>
                        @else
                        <form action="{{ route('user.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="2" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary"
                                style="width: 50%; margin-left: 25%">Level 2
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','2')->count()}}</span></button>
                        </form>
                        @endif
                        @else
                        <form action="#">
                            @csrf
                            <button type="button" class="btn btn-block bg-gradient-secondary disabled"
                                style="width: 50%; margin-left: 25%">Level 2
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','2')->count()}}</span></button>
                        </form>
                        @endif

                        <br>



                        @if(DB::table('user_test')->where('user_id',Auth::user()->id)->where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','2')->where('go_next','1')->first() != null)
                        @if(DB::table('user_test')->where('user_id',Auth::user()->id)->where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','3')->where('go_next','1')->first() != null)
                        <form action="{{ route('user.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="3" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-success"
                                style="width: 50%; margin-left: 25%">Level 3
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','3')->count()}}</span></button>
                        </form>
                        @else
                        <form action="{{ route('user.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="3" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary"
                                style="width: 50%; margin-left: 25%">Level 3
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','3')->count()}}</span></button>
                        </form>
                        @endif

                        @else
                        <form action="#">
                            <button type="button" class="btn btn-block bg-gradient-secondary disabled"
                                style="width: 50%; margin-left: 25%">Level 3
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','3')->count()}}</span></button>
                        </form>
                        @endif

                        <br>
                        @if(DB::table('user_test')->where('user_id',Auth::user()->id)->where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','3')->where('go_next','1')->first() != null)
                        <form action="{{ route('user.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="4" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="submit" class="btn btn-block bg-gradient-secondary disabled"
                                style="width: 50%; margin-left: 25%">Level 4
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','4')->count()}}</span></button>
                        </form>
                        @else
                        <form action="">
                            @csrf
                            <input type="text" name="level" value="4" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="button" class="btn btn-block bg-gradient-secondary disabled"
                                style="width: 50%; margin-left: 25%">Level 4
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','4')->count()}}</span></button>
                        </form>
                        @endif
                        <br>
                        <form action="{{ route('user.level.questions', $role->id) }}">
                            @csrf
                            <input type="text" name="level" value="5" hidden>
                            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                            <button type="button" class="btn btn-block bg-gradient-secondary disabled"
                                style="width: 50%; margin-left: 25%">Level 5
                                <span class="badge bg-danger" style="float:right;">{{App\Models\Question::where('role_id',$role->id)->where('role_specific_id',$role_specific->id)->where('level','5')->count()}}</span></button>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
@endsection
