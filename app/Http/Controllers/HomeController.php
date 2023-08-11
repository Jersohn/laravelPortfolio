<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Message;
use App\Models\MultiPics;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllSliders()
    {
        $sliders = Slider::latest()->get();
        return view('Admin.Slider.index', compact('sliders'));
    }

    public function AddSlider()
    {
        return view('Admin.Slider.addslider');
    }
    public function StoreSlider(Request $request)
    {

        $validated = $request->validate(
            [
                'title' => 'required|unique:sliders|max:25',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',

            ],
            [
                'title.required' => 'Slider title  should not be empty!',
                'title.max' => 'title length should be less than 25 characters!',

            ],

        );

        $slider_image = $request->file('image');
        // create an unique id for eache image
        $name_generate = hexdec(uniqid());
        //get image extension
        $image_extention = strtolower($slider_image->getClientOriginalExtension());
        //concatinate both (name generated and extention)
        $image_name = $name_generate . '.' . $image_extention;
        $upload_Location = 'image/slider/';
        $last_img = $upload_Location . $image_name;
        $slider_image->move($upload_Location, $image_name);

        //insertion request
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $last_img;

        $slider->save();

        $notification = array(
            'message' => 'Slider Inserted Sucessfully',
            'alert_type' => 'success'
        );

        return Redirect()->route('all.sliders')->with($notification);







    }

    public function EditSlider($id)
    {
        $sliders = Slider::find($id);
        return view('Admin.Slider.editslider', compact('sliders'));



    }

    public function UpdateSlider(Request $request, $id)
    {

        $validated = $request->validate(
            [
                'title' => 'required|max:25',
                'description' => 'required',


            ],
            [
                'title.required' => 'Brand name should not be empty!',
                'title.max' => 'Slider name should be less than 25 characters!',
                'description.required' => 'Slider description should not be empty!',

            ],

        );

        $Old_image = $request->old_image;

        $Slider_image = $request->file('image');

        if ($Slider_image) {

            // create an unique id for eache image
            $name_generate = hexdec(uniqid());
            //get image extension
            $image_extention = strtolower($Slider_image->getClientOriginalExtension());
            //concatinate both (name generated and extention)
            $image_name = $name_generate . '.' . $image_extention;
            $upload_Location = 'image/slider/';
            $last_img = $upload_Location . $image_name;
            $Slider_image->move($upload_Location, $image_name);
            unlink($Old_image);

            $update = Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,

            ]);

            $notification = array(
                'message' => 'Slider Updated Sucessfully',
                'alert_type' => 'warning'
            );

            return Redirect()->back()->with($notification);

        } else {
            $update = Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,


            ]);

            $notification = array(
                'message' => 'Slider Updated Sucessfully',
                'alert_type' => 'warning'
            );

            return Redirect()->back()->with($notification);

        }



    }

    public function DeleteSlider($id)
    {

        //delete image
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        //delete others contents
        Slider::find($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Sucessfully',
            'alert_type' => 'error'
        );

        return Redirect()->back()->with($notification);


    }

    //About functions

    public function AllAbout()
    {

        $abouts = About::latest()->get();
        return view('Admin.About.index', compact('abouts'));



    }
    public function AddAbout()
    {
        return view('Admin.About.addAbout');

    }
    public function StoreAbout(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|unique:abouts|max:50',
                'description' => 'required',
                'long_desc' => 'required',

            ],
            [
                'title.required' => 'About title  should not be empty!',
                'title.max' => 'About length should be less than 50 characters!',

            ],

        );
        $about = new About;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->long_desc = $request->long_desc;


        $about->save();

        $notification = array(
            'message' => 'About Inserted Sucessfully',
            'alert_type' => 'success'
        );

        return Redirect()->route('all.about')->with($notification);


    }

    public function EditAbout($id)
    {
        $abouts = About::find($id);
        return view('Admin.About.edit', compact('abouts'));



    }
    public function UpdateAbout(Request $request, $id)
    {


        $update = About::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'long_desc' => $request->long_desc,


        ]);


        $notification = array(
            'message' => 'About Updated Sucessfully',
            'alert_type' => 'warning'
        );

        return Redirect()->back()->with($notification);


    }

    public function AllPortfolio()
    {
        $images = MultiPics::All();
        return view('Pages.portfolio', compact('images'));


    }

    //Contact

    //
    public function ShowContactPage()
    {

        return view('Pages.contact');
    }
    public function SendMessage(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:50',
                'email' => 'required',
                'subject' => 'required|max:70',
                'message' => 'required',

            ],

        );
        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;


        $message->save();

        return Redirect()->back()->with('success', 'Message successfully sent');

    }

    public function AllMessage()
    {

        $messages = Message::All();
        return view('Admin.Message.index', compact('messages'));

    }
    public function DeleteMessage($id)
    {

        Message::find($id)->delete();

        $notification = array(
            'message' => 'Message Deleted Sucessfully',
            'alert_type' => 'error'
        );

        return Redirect()->back()->with($notification);

    }



}