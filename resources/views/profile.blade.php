@extends('layouts.admin')


@section('title')
    Profile
@endsection


@section('content')
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="/storage/{{ Auth::user()->profile_pic }}"
                            alt="User profile picture" style="width: 120px;height:120px;">
                    </div>

                    <h3 class="profile-username text-center">{{ Auth::user()->name ?? '' }}</h3>

                    <p class="text-muted text-center">{{ Auth::user()->role->name ?? '' }}</p>

                    <a href="#" class="btn btn-primary btn-block"><b>View Progress</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                        {{ Auth::user()->education ?? '' }}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">{{ Auth::user()->location ?? '' }}</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                    <p class="text-muted">{{ Auth::user()->skills ?? '' }}</p>
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">{{ Auth::user()->notes ?? '' }}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings"data-toggle="tab">Profile Info</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about" data-toggle="tab">About Me</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">
                            <form action="{{ route('profile.info.update', Auth::user()->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="inputName"
                                            placeholder="Name" value="{{ Auth::user()->name ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="inputEmail"
                                            placeholder="Email" value="{{ Auth::user()->email ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-3 col-form-label">Role</label>
                                    <label style="color: rgb(248, 97, 110)" for=""
                                        class="col-sm-2 col-form-label">{{ Auth::user()->role->name ?? '' }}</label>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-3 col-form-label">Location</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="location" id="inputName2"
                                            placeholder="Location" value="{{ Auth::user()->location ?? '' }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-3 col-form-label">Profile Picture</label>
                                    <input type="file" class="btn btn-primary" name="profile_pic"
                                        style="width: 30%;border: 1px solid #ccc;
                                            display: inline-block;
                                            padding: 8px 12px;
                                            cursor: pointer;">
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <form method="POST" action="{{ route('changePW') }}">
                                @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="old_password" class="form-control"
                                                id="inputName" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="new_password" class="form-control"
                                                placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-3 col-form-label">Confirm New
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="confirm_password" class="form-control"
                                                id="inputName2" placeholder="Confirm New Password" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3">
                                            <button type="submit" class="btn btn-success">Change Password</button>
                                        </div>
                                    </div>
                                </form>

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="about">
                            <form method="POST" action="{{ route('aboutme') }}">
                                @csrf

                                    <div class="form-group row">

                                        <label for="inputName" class="col-sm-3 col-form-label">Education</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="education" class="form-control" id="inputName"
                                                placeholder="Education" value="{{ Auth::user()->education ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Skills</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="skills" class="form-control"
                                                placeholder="Skills" value="{{ Auth::user()->skills ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-3 col-form-label">Notes</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="notes" class="form-control" id="inputName2"
                                                placeholder="Notes" value="{{ Auth::user()->notes ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </form>


                        </div>
                        <!-- /.tab-pane -->


                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
