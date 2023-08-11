<?php

namespace App\Http\Controllers;

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllCat()
    {
        $categories = category::latest()->paginate(5);
        // trashCat to store category to delete into a trash
        $trashCat = category::onlyTrashed()->latest()->paginate(3);

        return view('Admin.Category.index', compact('categories', 'trashCat'));
    }
    public function AddCat(Request $request)
    {
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:25',

            ],
            [
                'category_name.required' => 'Category name should not be empty!',
                'category_name.max' => 'Category name should be less than 25 characters!',

            ],

        );

        // insertion with eloquent ORM method 1
        // category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()

        // ]);

        // insertion with eloquent ORM method 2

        $category = new category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        $notification = array(
            'message' => 'Category Inserted Sucessfully',
            'alert_type' => 'success'
        );

        return Redirect()->back()->with($notification);


    }


    public function EditCat($id)
    {
        $categories = category::find($id);
        return view('Admin.Category.Edit', compact('categories'));

    }

    public function UpdateCat(Request $request, $id)
    {
        $update = category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        $notification = array(
            'message' => 'Category Updated Sucessfully',
            'alert_type' => 'warning'
        );


        return Redirect()->route('all.categories')->with($notification);


    }

    public function SoftDeleteCat($id)
    {
        $delete = category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category soft deleted Sucessfully');
    }

    public function RestoreCat($id)
    {
        $restore = category::withTrashed()->find($id)->restore();


        $notification = array(
            'message' => 'Category restored Sucessfully',
            'alert_type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }
    public function ForceDeleteCat($id)
    {
        $delete = category::onlyTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Category Deleted Sucessfully',
            'alert_type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}