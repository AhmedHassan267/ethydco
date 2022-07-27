@extends('layouts.admin')


@section('title')
    {{ $role->name }} - CU : {{ $role_specific->name }} - Level {{ $level }}

@endsection

@section('links')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Competency Test</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
            <div class="card-body">
                <form action="{{ route('test.level.add.question', $role->id) }}">
                    @csrf
                    <input type="text" name="level" value="{{ $level }}" hidden>
                    <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
                    <button type="submit" class="btn btn-info">Add New Question</button>
                </form>
                <br><br>
                <!-- /.col-12 -->
                <div class="row">
                    <table id="example2" class="table table-hover">
                        <thead>
                            <th>CU</th>
                            <th>Level</th>
                            <th>Question</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{ $question->role_specific->name }}</td>
                                    <td>{{ $question->level }}</td>
                                    <td>{{ $question->text }}</td>
                                    <td>
                                        <form action="{{ route("test.level.question.edit",$question->id) }}">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route("test.level.question.delete",$question->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->
@endsection
