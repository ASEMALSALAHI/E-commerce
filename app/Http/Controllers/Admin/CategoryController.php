<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function AllCategory()
    {
        $Category = Category::all();

        return view('backend.category.allcategory', compact('Category'));
    }

    public function AddCategory()
    {


        return view('backend.category.addcategory');

    }
    public function StoreCategory(Request $request)
    {
       $request->validate([
           'category_name' => 'required|unique:categories',
               'category_image' => 'required'
         ]);


        $file = $request->file('category_image');
        // $file=avatar-1.png
        $originalName = $file->getClientOriginalName();
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $timestamp = date('YmdHis');
        $filename = $timestamp . '_' . $originalName;
        $file->move(public_path('upload/category'),$filename);
        $save_url ='http://127.0.0.1:8000/upload/category/'.$filename;
        category::insert([
            'category_name' => $request->category_name,
            'category_image' => $save_url,
            'created_at' => now()

        ]);
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.categories')->with($notification);
    }
    public function EditCategory($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));


    }


    public function UpdateCategory(Request $request,$id){


        if($request->file('category_image')){

            $file = $request->file('category_image');
            // $file=avatar-1.png
            $originalName = $file->getClientOriginalName();
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $timestamp = date('YmdHis');
            $filename = $timestamp . '_' . $originalName;

// Concatenate the extension only if it's not already present
            if (strpos($filename, '.' . $extension) === false) {
                $filename .= '.' . $extension;
            }

            //$filename=26.3.2022.png

            $file->move(public_path('upload/category'), $filename);

            $save_url = 'http://127.0.0.1:8000/upload/category/'.$filename ;



            Category::findOrFail($id)->update([
                'category_name' => $request->category_name,
                'category_image' =>  $save_url,
                'updated_at'=>Now()
            ]);

            $notification = array(
                'message' => 'Category updated Successfully with image',
                'alert-type' => 'success'
            );
            return redirect()->route('all.categories')->with($notification);


        }else{

            Category::findOrFail($id)->update([
                'category_name' => $request->category_name,

                'updated_at'=>Now()
            ]);

            $notification = array(
                'message' => 'Category updated Successfully without image',
                'alert-type' => 'info'
            );
            return redirect()->route('all.categories')->with($notification);


        }






    }


    public function DeleteCategory($id){
            Category::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
    }
}
