@extends('layouts.admin')


@section('title')
    Departments roles
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Roles</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Role Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Role Name</th>
                    </tr>
                    </tfoot>
                  </table>
                  <br>

                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
