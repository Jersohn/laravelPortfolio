<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserAcountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ChangePassword()
    {

        return view('Admin.Partials.changepassword');
    }
    public function UpdatePassword(Request $request)
    {

        $validateData = $request->validate([
            'cur_password' => 'required',
            'new_password' => 'required|confirmed',


        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->cur_password, $hashedPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password successfully Updated!',
                'alert_type' => 'warning'
            );

            return redirect()->route('login')->with($notification);
        } else {
            $notification = array(
                'message' => ' the Current password is incorrect!',
                'alert_type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function ShowProfile()
    {
        return view('Admin.Partials.userprofile');
    }
    public function UpdateProfile(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:25',
                'email' => 'required',


            ],
            [
                'name.required' => 'user name should not be empty!',
                'name.max' => 'Slider name should be less than 25 characters!',
                'email.required' => 'email should not be empty!',

            ],

        );
        $Old_image = $request->old_image;

        $profile_pic = $request->file('image');

        if ($profile_pic) {

            // create an unique id for eache image
            $name_generate = hexdec(uniqid());
            //get image extension
            $image_extention = strtolower($profile_pic->getClientOriginalExtension());
            //concatinate both (name generated and extention)
            $image_name = $name_generate . '.' . $image_extention;
            $upload_Location = 'storage/profile-photos/';
            $last_img = $upload_Location . $image_name;
            $profile_pic->move($upload_Location, $image_name);

            if (file_exists($Old_image)) {
                // Supprimez l'ancienne image
                unlink($Old_image);
            }



            $user = User::find(Auth::user()->id);
            if ($user) {
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->profile_photo_path = 'profile-photos/' . $image_name;
                $user->save();

                $notification = array(
                    'message' => 'Profile successfully updated',
                    'alert_type' => 'warning'
                );

                return redirect()->back()->with($notification);
            } else {

                $notification = array(
                    'message' => 'User not Found',
                    'alert_type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        } else {

            $update = User::find(Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,


            ]);

            $notification = array(
                'message' => 'Profile Updated Sucessfully',
                'alert_type' => 'warning'
            );

            return Redirect()->back()->with($notification);

        }
    }
}