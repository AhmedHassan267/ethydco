@extends('layouts.admin')


@section('title')
    {{ $role->name }} - CU : {{ $role_specific->name }} - Level {{ $level }}
@endsection

@section('links')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Competency Test</li>
        <li class="breadcrumb-item"><a href="{{ route('test') }}">Roles</a></li>
    </ol>
@endsection

@section('content')
<div style="margin-top: -8%">
    <form id="regForm" action="{{ route('user.level.save.test') }}" method="POST">
        @csrf

        @foreach ($questions as $question)
            @php
                $i = 0;
            @endphp
            <div class="tab">
                <h1 style="color: rgb(212, 208, 208);">Question {{ $loop->index+1 }}/{{ $loop->count }}</h1>
                <p style="color: rgb(255, 255, 255);font-weight: 500;font-size: 150%">{{ $question->text }}</p>
                <input type="hidden" name="question_id[]" value="{{ $question->id }}">
                @foreach (App\Models\Answer::where('question_id', $question->id)->get() as $answer)
                    @php
                        $i = $i + 1;
                    @endphp
                    <p style="color: rgb(155, 255, 197)">{{ $i }}-{{ $answer->answer_text }}</p>
                @endforeach
                <div class="form-group row">
                    <label for="inputEmail" class="col-form-label" style="color: rgb(140, 193, 209)">Select The Right
                        Answer</label>
                    <div class="col-sm-9" style="margin-top: 5px;">
                        <select name="rightAnswer[]" style="width:200px;">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>

            </div>
        @endforeach

        <div style="overflow:auto;">
            <div >
                <button style="float: left" type="button" class="btn btn-success" id="prevBtn"
                    onclick="nextPrev(-1)">Previous</button>
                <button style="float: right" type="button" class="btn btn-primary" id="nextBtn"
                    onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <div style="text-align:center;margin-top:40px;">
            @foreach ($questions as $question)
                <span class="step"></span>
            @endforeach
        </div>
        <input type="text" name="level" value="{{ $level }}" hidden>
        <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
    </form>
</div>

@endsection
