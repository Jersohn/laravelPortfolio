<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\User;
use BaconQrCode\Renderer\Path\Move;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Unique;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllBrand()
    {
        $brands = brand::latest()->get();
        return view('Admin.Brand.index', compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:25',
                'brand_image' => 'required|mimes:jpg,jpeg,png',

            ],
            [
                'brand_name.required' => 'Brand name should not be empty!',
                'brand_name.max' => 'Brand name should be less than 25 characters!',

            ],

        );

        $Brand_Image = $request->file('brand_image');
        // create an unique id for eache image
        $name_generate = hexdec(uniqid());
        //get image extension
        $image_extention = strtolower($Brand_Image->getClientOriginalExtension());
        //concatinate both (name generated and extention)
        $image_name = $name_generate . '.' . $image_extention;
        $upload_Location = 'image/brand/';
        $last_img = $upload_Location . $image_name;
        $Brand_Image->move($upload_Location, $image_name);

        //insertion request
        $brand = new brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $last_img;
        $brand->user_id = Auth::user()->id;
        $brand->save();

        $notification = array(
            'message' => 'Brand Inserted Sucessfully',
            'alert_type' => 'success'
        );

        return Redirect()->back()->with($notification);




    }

    public function EditBrand($id)
    {
        $brands = brand::find($id);
        return view('Admin.Brand.Edit', compact('brands'));

    }

    public function UpdateBrand(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|max:25',


            ],
            [
                'brand_name.required' => 'Brand name should not be empty!',
                'brand_name.max' => 'Brand name should be less than 25 characters!',

            ],

        );

        $Old_image = $request->old_image;

        $Brand_Image = $request->file('brand_image');

        if ($Brand_Image) {

            // create an unique id for eache image
            $name_generate = hexdec(uniqid());
            //get image extension
            $image_extention = strtolower($Brand_Image->getClientOriginalExtension());
            //concatinate both (name generated and extention)
            $image_name = $name_generate . '.' . $image_extention;
            $upload_Location = 'image/brand/';
            $last_img = $upload_Location . $image_name;
            $Brand_Image->move($upload_Location, $image_name);
            unlink($Old_image);

            $update = brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'user_id' => Auth::user()->id
            ]);

            $notification = array(
                'message' => 'Brand Updated Sucessfully',
                'alert_type' => 'warning'
            );

            return Redirect()->back()->with($notification);

        } else {
            $update = brand::find($id)->update([
                'brand_name' => $request->brand_name,

                'user_id' => Auth::user()->id
            ]);

            $notification = array(
                'message' => 'Brand Updated Sucessfully',
                'alert_type' => 'warning'
            );

            return Redirect()->back()->with($notification);

        }

    }



    public function DeleteBrand($id)
    {

        //delete image
        $image = brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        //delete others contents
        brand::find($id)->delete();


        $notification = array(
            'message' => 'Brand Deleted Sucessfully',
            'alert_type' => 'error'
        );

        return Redirect()->back()->with($notification);





    }
    //Users
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
    public function AllUsers()
    {
        $users = User::all(); //eloquant ORM syntaxe
        return view('dashboard', compact('users'));
    }
    public function DeleteUser($id)
    {
        User::find($id)->delete();

        $notification = array(
            'message' => 'User Deleted Sucessfully',
            'alert_type' => 'error'
        );

        return Redirect()->back()->with($notification);


    }


}