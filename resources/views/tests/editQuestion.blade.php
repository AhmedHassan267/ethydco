@extends('layouts.admin')


@section('title')
    Edit Question
@endsection

@section('links')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Competency Test</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('test.level.question.update', $question->id)}}" method="post">
            @csrf
            <input type="text" name="role_specific_id" value="{{ $question->role_specific->id }}" hidden>
            <input type="text" name="level" value="{{ $question->level }}" hidden>
            <div class="form-group">
                <label style="margin-left: 16.5%;" for="inputName2" class="col-sm-2 col-form-label">CU</label>
                <label style="color: rgb(82, 236, 89)" for="" class="col-sm-2 col-form-label">{{$question->role_specific->name ?? ''}}</label>
                <label for="inputName2" class="col-sm-2 col-form-label">Question Level</label>
                <label style="color: rgb(82, 236, 89)" for="" class="col-sm-2 col-form-label">{{$question->level}}</label>
            </div>

            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Question Text</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="question" id="" cols="114" rows="5">{{$question->text}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">First Answer</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="answer1" id="" cols="114" rows="1">{{ DB::table('answer')
                        ->where('question_id',$question->id)->pluck('answer_text')->toArray()[0] }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Second Answer</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="answer2" id="" cols="114" rows="1">{{ DB::table('answer')
                        ->where('question_id',$question->id)->pluck('answer_text')->toArray()[1] }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Third Answer</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="answer3" id="" cols="114" rows="1">{{ DB::table('answer')
                        ->where('question_id',$question->id)->pluck('answer_text')->toArray()[2] }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Forth Answer</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="answer4" id="" cols="114" rows="1">{{ DB::table('answer')
                        ->where('question_id',$question->id)->pluck('answer_text')->toArray()[3] }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Right Answer</label>
                <div class="col-sm-9">
                    <select name="rightAnswer" style="width:200px;">
                        @if(DB::table('answer')
                        ->where('question_id',$question->id)->pluck('right_answer')->toArray()[0] == '1')
                        <option selected value="1">1</option>
                        @else
                        <option value="1">1</option>
                        @endif

                        @if(DB::table('answer')
                        ->where('question_id',$question->id)->pluck('right_answer')->toArray()[1] == '1')
                        <option selected value="2">2</option>
                        @else
                        <option value="2">2</option>
                        @endif

                        @if(DB::table('answer')
                        ->where('question_id',$question->id)->pluck('right_answer')->toArray()[2] == '1')
                        <option selected value="3">3</option>
                        @else
                        <option value="3">3</option>
                        @endif

                        @if(DB::table('answer')
                        ->where('question_id',$question->id)->pluck('right_answer')->toArray()[3] == '1')
                        <option selected value="4">4</option>
                        @else
                        <option value="4">4</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group row">
                    <button type="submit" class="btn btn-success" style="margin-left: 40%">Edit Question</button>
            </div>
        </form>
    </div>
@endsection
