<?php

namespace App\Http\Controllers;

use App\Models\MultiPics;
use Illuminate\Http\Request;

class MultiPicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllPics()
    {
        $pictures = MultiPics::All();
        return view('Admin.Multipics.index', compact('pictures'));
    }

    public function AddPics(Request $request)
    {
        $validated = $request->validate(
            [

                'images' => 'required',

            ],


        );
        $mutiple_Pics = $request->file('images');

        foreach ($mutiple_Pics as $pictures) {

            $name_generate = hexdec(uniqid());
            //get image extension
            $image_extention = strtolower($pictures->getClientOriginalExtension());
            //concatinate both (name generated and extention)
            $image_name = $name_generate . '.' . $image_extention;
            $upload_Location = 'image/multipics/';
            $last_img = $upload_Location . $image_name;
            $pictures->move($upload_Location, $image_name);

            //insertion request
            $multipics = new MultiPics;

            $multipics->image = $last_img;

            $multipics->save();

        }
        return Redirect()->back();

    }
}