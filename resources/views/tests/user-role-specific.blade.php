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
                    @foreach ($roleSpecifics as $roleSpecific)
                        @if ($loop->iteration % 2 == 0)
                            <div class="col-md-6">
                                    <div class="btn-group">
                                        <button type="button"
                                        @if($roleSpecific->state == '2')
                                        <button type="button" class="btn btn-info" style="cursor: default">{{ $roleSpecific->name }}</button>
                                        @else
                                        <button class="btn btn-secondary" style="cursor: default">{{ $roleSpecific->name }}</button>
                                        @endif

                                        @if ($roleSpecific->state != '2')
                                        <form action="{{ route('user.role.specific.levels',Auth::user()->role_id) }}">
                                            <input name="role_specific_id" type="text" value="{{ $roleSpecific->id }}" hidden>
                                            <button type="submit" class="btn btn-success">✓</button>
                                        </form>
                                        <form action="{{ route('user.role.specific.levels',Auth::user()->role_id) }}">
                                            <input name="zero" type="text" value="zero" hidden>
                                            <input name="role_specific_id" type="text" value="{{ $roleSpecific->id }}" hidden>
                                            <button type="submit" class="btn btn-danger">✕</button>
                                        </form>
                                        <form action="{{ route('user.role.specific.levels',Auth::user()->role_id) }}">
                                            <input name="progress" type="text" value="progress" hidden>
                                            <input name="role_specific_id" type="text" value="{{ $roleSpecific->id }}" hidden>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-chart-pie"></i></button>
                                        </form>
                                        @endif
                                        <input type="text" value="{{ $roleSpecific->id }}" hidden>
                                        {{-- 0->unclicked       1->pending       2->succeed     3->failed --}}
                                        @if (App\Models\UserCuStatus::select("*")
                                        ->where('role_specific_id',$roleSpecific->id)
                                        ->where('user_id',auth()->id())
                                        ->where('role_id',auth()->user()->role_id)->doesntExist())
                                            <span class="badge bg-warning"
                                                style="margin-left: 10px;height: 18px;margin-top: 10px;">Not Seen</span>
                                        @elseif(App\Models\UserCuStatus::select("*")
                                        ->where('role_specific_id',$roleSpecific->id)
                                        ->where('user_id',auth()->id())
                                        ->where('role_id',auth()->user()->role_id)
                                        ->pluck('status')->first() == '1')
                                            <span class="badge bg-info"
                                                style="margin-left: 10px;height: 18px;margin-top: 10px;">Penidng</span>
                                        @elseif(App\Models\UserCuStatus::select("*")
                                        ->where('role_specific_id',$roleSpecific->id)
                                        ->where('user_id',auth()->id())
                                        ->where('role_id',auth()->user()->role_id)
                                        ->pluck('status')->first() == '2')
                                            <span class="badge bg-success"
                                                style="margin-left: 10px;height: 18px;margin-top: 10px;">Succeed</span>
                                        @elseif(App\Models\UserCuStatus::select("*")
                                        ->where('role_specific_id',$roleSpecific->id)
                                        ->where('user_id',auth()->id())
                                        ->where('role_id',auth()->user()->role_id)
                                        ->pluck('status')->first() == '3')
                                            <span class="badge bg-danger"
                                                style="margin-left: 10px;height: 18px;margin-top: 10px;">Failed</span>
                                        @endif
                                    </div>
                            </div>
                        @else
                            <div class="col-md-6">

                                    <div class="btn-group">
                                        @if($roleSpecific->state == '2')
                                        <button type="button" class="btn btn-info" style="cursor: default">{{ $roleSpecific->name }}</button>
                                        @else
                                        <button class="btn btn-secondary" style="cursor: default">{{ $roleSpecific->name }}</button>
                                        @endif
                                        @if ($roleSpecific->state != '2')
                                        <form action="{{ route('user.role.specific.levels',Auth::user()->role_id) }}">
                                            <input name="role_specific_id" type="text" value="{{ $roleSpecific->id }}" hidden>
                                            <button type="submit" class="btn btn-success">✓</button>
                                        </form>
                                        <form action="{{ route('user.role.specific.levels',Auth::user()->role_id) }}">
                                            <input name="zero" type="text" value="zero" hidden>
                                            <input name="role_specific_id" type="text" value="{{ $roleSpecific->id }}" hidden>
                                            <button type="submit" class="btn btn-danger">✕</button>
                                        </form>
                                        <form action="{{ route('user.role.specific.levels',Auth::user()->role_id) }}">
                                            <input name="progress" type="text" value="progress" hidden>
                                            <input name="role_specific_id" type="text" value="{{ $roleSpecific->id }}" hidden>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-chart-pie"></i></button>
                                        </form>
                                        @endif
                                        <input type="text" value="{{ $roleSpecific->id }}" hidden>
                                        {{-- 0->unclicked       1->pending       2->succeed     3->failed --}}
                                        @if (App\Models\UserCuStatus::select("*")
                                        ->where('role_specific_id',$roleSpecific->id)
                                        ->where('user_id',auth()->id())
                                        ->where('role_id',auth()->user()->role_id)->doesntExist())
                                            <span class="badge bg-warning"
                                                style="margin-left: 10px;height: 18px;margin-top: 10px;">Not Seen</span>
                                        @elseif(App\Models\UserCuStatus::select("*")
                                        ->where('role_specific_id',$roleSpecific->id)
                                        ->where('user_id',auth()->id())
                                        ->where('role_id',auth()->user()->role_id)
                                        ->pluck('status')->first() == '1')
                                            <span class="badge bg-info"
                                                style="margin-left: 10px;height: 18px;margin-top: 10px;">Penidng</span>
                                        @elseif(App\Models\UserCuStatus::select("*")
                                        ->where('role_specific_id',$roleSpecific->id)
                                        ->where('user_id',auth()->id())
                                        ->where('role_id',auth()->user()->role_id)
                                        ->pluck('status')->first() == '2')
                                            <span class="badge bg-success"
                                                style="margin-left: 10px;height: 18px;margin-top: 10px;">Succeed</span>
                                        @elseif(App\Models\UserCuStatus::select("*")
                                        ->where('role_specific_id',$roleSpecific->id)
                                        ->where('user_id',auth()->id())
                                        ->where('role_id',auth()->user()->role_id)
                                        ->pluck('status')->first() == '3')
                                            <span class="badge bg-danger"
                                                style="margin-left: 10px;height: 18px;margin-top: 10px;">Failed</span>
                                        @endif
                                    </div>
                            </div>
                        @endif


                        <br><br><br>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        {{ $roleSpecifics->links() }}
    </div><!-- /.container-fluid -->
@endsection
