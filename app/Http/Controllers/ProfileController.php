<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    public function profile()
    {
        return view('profile');
    }
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->location = $request->post('location');
        if ($request->file('profile_pic') != null) {
            $user_pic = $request->file('profile_pic');
            $image_path = $user_pic->storeAs('uploads', time() . "-" . $user_pic->getClientOriginalName(), [
                'disk' => 'public',
            ]);
            $request->merge([
                'image_path' => $image_path,
            ]);
            $user->profile_pic = $image_path;
        }
        $user->save();
        Alert::success('Success','User Information Updated Successfully');
        return redirect()->route('view.profile',$id);
    }
    public function aboutMe(Request $request)
    {
        $about = User::find(Auth::user()->id);
        $about->education = $request->input('education');
        $about->skills = $request->input('skills');
        $about->notes = $request->input('notes');
        $about->save();
        Alert::success('Success','Status Updated Successfully');
        return redirect()->back();

    }
    public function changePW(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $oldpw = $request->post('old_password');
        if(Hash::check($oldpw, auth()->user()->password))
        {
            $new_password = $request->input('new_password');
            $confirm_password = $request->input('confirm_password');
            if($new_password == $confirm_password)
            {

                $user->fill([
                    'password' => Hash::make($request->post('new_password'))
                    ])->save();
                Alert::success('Success','Password Changed Successfully');
                return redirect()->back();
            }
            else{
                Alert::error('Error','Please Confirm The Right Password');
                return redirect()->back();
            }
        }
        else{
            Alert::error('Error','The Password Is Not Correct');
            return redirect()->back();
        }


    }

}
