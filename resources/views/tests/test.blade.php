@extends('layouts.admin')


@section('title')
    Competency Assessment
@endsection

@section('links')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item active">Competency Test</li>
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
  </ol>
@endsection

@section('content')
<div class="container-fluid">
    <div>
        <form action="{{ route("search.role") }}">
            <label>Search Certain Role</label>
            <br>
            <select name="role" class="select2" style="width:300px;">
                @foreach ($allRoles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <button style="height: 42px;margin-bottom: 3px;" type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
        </form>
</div>
    <!-- COLOR PALETTE -->
    <div class="card card-default color-palette-box">
      <div class="card-body">
        <!-- /.col-12 -->
        <div class="row">
          <div class="col-md-12">
            @foreach ($roles as $role)
            <form action="{{route('test.role.specific', $role->id)}}">
                @csrf
                <button type="submit" class="btn btn-block bg-gradient-secondary" style="width: 50%; margin-left: 25%">{{$role->name}}</button>
            </form>
            <br>
            @endforeach
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    {{ $roles->links() }}
  </div><!-- /.container-fluid -->
@endsection
