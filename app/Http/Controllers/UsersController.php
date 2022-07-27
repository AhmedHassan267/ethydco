<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RoleSpecific;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function profile()
    {
        $users = User::Paginate(3);
        $roles = Role::get();
        return view('users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
    public function usersSearch(Request $request)
    {
        $search = $request->post('search');
        $users = User::where('name', 'LIKE', "%$search%")
            ->orWhere('gender', 'LIKE', "%$search%")
            ->orWhere('phone', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('location', 'LIKE', "%$search%")
            ->orWhere('education', 'LIKE', "%$search%")
            ->paginate(3);
        $roles = Role::get();
        return view('users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
    public function usersSearchRole(Request $request)
    {
        $search = $request->post('role');
        $roles = Role::get();
        $users = User::where('role_id', $search)
            ->paginate();
        return view('users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function test()
    {
        return view('test');
    }
    public function switchToTable()
    {

        $users = User::Paginate(6);
        return view('users-table', [
            'users' => $users
        ]);
    }

    public function profileInfo(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        return view(
            'view-user-info',
            [
                'user' => $user
            ]
        );
    }
    public function profileInfoTable(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $role_specifics = RoleSpecific::where('role_id',$user->role_id)->get();
        return view(
            'view-user-info-table',
            [
                'user' => $user,
                'role_specifics' => $role_specifics
            ]
        );
    }
    public function profileInfoCuProgress(Request $request)
    {
        $user_id = $request->input('user_id');
        $role_specific_id = $request->input('role_specific_id');
        $user = User::find($user_id);
        $role = Role::where('id',$user->role_id)->first();
        $role_specific = RoleSpecific::where('id',$role_specific_id)->first();
        return view(
            'user-chart-view-admin',
            [
                'user' => $user,
                'role_specific' => $role_specific,
                'role' => $role
            ]
        );
    }
}
