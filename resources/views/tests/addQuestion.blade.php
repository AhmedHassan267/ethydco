@extends('layouts.admin')


@section('title')
    {{ $role->name }} - CU : {{ $role_specific->name }} - Level {{ $level }}
@endsection

@section('links')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Competency Test</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{route('save.level.new.question', $role->id)}}" method="post">
            @csrf

            <input type="text" name="role_specific_id" value="{{ $role_specific->id }}" hidden>
            <input type="text" name="level" value="{{ $level }}" hidden>

            <div class="form-group">
                <label style="margin-left: 16.5%;" for="inputName2" class="col-sm-2 col-form-label">CU</label>
                <label style="color: rgb(82, 236, 89)" for="" class="col-sm-2 col-form-label">{{$role_specific->name ?? ''}}</label>
                <label for="inputName2" class="col-sm-2 col-form-label">Question Level</label>
                <label style="color: rgb(82, 236, 89)" for="" class="col-sm-2 col-form-label">{{$level ?? ''}}</label>
            </div>

            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Question Text</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="question" id="" cols="114" rows="5"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">First Answer</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="answer1" id="" cols="114" rows="1"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Second Answer</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="answer2" id="" cols="114" rows="1"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Third Answer</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="answer3" id="" cols="114" rows="1"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Forth Answer</label>
                <div class="col-sm-9">
                    <textarea style="background: rgb(51, 48, 48);color: rgb(212, 189, 189);" name="answer4" id="" cols="114" rows="1"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Right Answer</label>
                <div class="col-sm-9">
                    <select name="rightAnswer" style="width:200px;">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                    <button type="submit" class="btn btn-success" style="margin-left: 40%">Save Question</button>
            </div>
        </form>
    </div>
@endsection
