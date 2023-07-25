<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductDetails;
use App\Models\ProductList;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    //
    public function AllProductList()
    {
        $products = ProductList::latest()->paginate(6);
        return view('backend.product.product_all', compact('products'));
    }

    public function AddProductList()
    {
        $category = Category::orderBy('category_name', 'ASC')->get();
        return view('backend.product.product_add', compact('category'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function StoreProduct(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'special_price' => 'required',
            'category' => 'required',

        ]);

        $file = $request->file('image');
        // $file=avatar-1.png
        $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();

        //$filename=26.3.2022.png

        $file->move(public_path('upload/product'), $filename);

        $save_url = 'http://127.0.0.1:8000/upload/product/' . $filename;

        $product_id = ProductList::insertGetId([
            'title' => $request->title,
            'price' => $request->price,
            'special_price' => $request->special_price,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'remark' => $request->remark,
            'brand' => $request->brand,
            'product_code' => $request->product_code,
            'image' => $save_url,
            'star' => '5'

        ]);

        $file1 = $request->file('image_one');
        // $file=avatar-1.png
        $filename1 = hexdec(uniqid()) . '.' . $file1->getClientOriginalExtension();

        //$filename=26.3.2022.png

        $file1->move(public_path('upload/productdetails'), $filename1);

        $save_url1 = 'http://127.0.0.1:8000/upload/productdetails/' . $filename1;


        $file2 = $request->file('image_two');
        // $file=avatar-1.png
        $filename2 = hexdec(uniqid()) . '.' . $file2->getClientOriginalExtension();

        //$filename=26.3.2022.png

        $file2->move(public_path('upload/productdetails'), $filename2);

        $save_url2 = 'http://127.0.0.1:8000/upload/productdetails/' . $filename2;


        $file3 = $request->file('image_three');
        $filename3 = hexdec(uniqid()) . '.' . $file3->getClientOriginalExtension();
        $file3->move(public_path('upload/productdetails'), $filename3);
        $save_url3 = 'http://127.0.0.1:8000/upload/productdetails/' . $filename3;


        $file4 = $request->file('image_four');
        $filename4 = hexdec(uniqid()) . '.' . $file4->getClientOriginalExtension();
        $file4->move(public_path('upload/productdetails'), $filename4);
        $save_url4 = 'http://127.0.0.1:8000/upload/productdetails/' . $filename4;


        ProductDetails::insert([
            'product_id' => $product_id,
            'image_one' => $save_url1,
            'image_two' => $save_url2,
            'image_three' => $save_url3,
            'image_four' => $save_url4,
            'short_description' => $request->short_description,
            'color' => $request->color,
            'size' => $request->size,
            'long_description' => $request->long_description,

        ]);


        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.products')->with($notification);


    }

    public function DeleteProduct($id)
    {
        ProductList::findorFail($id)->delete();
        ProductDetails::where('product_id', $id)->delete();


        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function EditProduct($id)
    {
        $category = Category::orderBy('category_name', 'ASC')->get();
        $product = ProductList::findorFail($id);
        $details = ProductDetails::where('product_id', $id)->first();
        return view('backend.product.product_edit', compact('category', 'product', 'details'));

    }


    public function updateProduct(Request $request, $id)
    {

        if ($request->file('image') != null) {
            $file = $request->file('image');

            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('upload/product'), $filename);

            $save_url = 'http://127.0.0.1:8000/upload/product/' . $filename;

            ProductList::findOrFail($id)->update([

                'title' => $request->title,
                'price' => $request->price,
                'special_price' => $request->special_price,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'remark' => $request->remark,
                'brand' => $request->brand,
                'product_code' => $request->product_code,
                'image' => $save_url,

            ]);
            $file1 = $request->file('image_one');
            // $file=avatar-1.png
            $filename1 = hexdec(uniqid()) . '.' . $file1->getClientOriginalExtension();

            //$filename=26.3.2022.png

            $file1->move(public_path('upload/productdetails'), $filename1);

            $save_url1 = 'http://127.0.0.1:8000/upload/productdetails/' . $filename1;


            $file2 = $request->file('image_two');
            // $file=avatar-1.png
            $filename2 = hexdec(uniqid()) . '.' . $file2->getClientOriginalExtension();

            //$filename=26.3.2022.png

            $file2->move(public_path('upload/productdetails'), $filename2);

            $save_url2 = 'http://127.0.0.1:8000/upload/productdetails/' . $filename2;


            $file3 = $request->file('image_three');
            $filename3 = hexdec(uniqid()) . '.' . $file3->getClientOriginalExtension();
            $file3->move(public_path('upload/productdetails'), $filename3);
            $save_url3 = 'http://127.0.0.1:8000/upload/productdetails/' . $filename3;


            $file4 = $request->file('image_four');
            $filename4 = hexdec(uniqid()) . '.' . $file4->getClientOriginalExtension();
            $file4->move(public_path('upload/productdetails'), $filename4);
            $save_url4 = 'http://127.0.0.1:8000/upload/productdetails/' . $filename4;


            ProductDetails::where('product_id', $id)->update([
                'image_one' => $save_url1,
                'image_two' => $save_url2,
                'image_three' => $save_url3,
                'image_four' => $save_url4,
                'short_description' => $request->short_description,
                'color' => $request->color,
                'size' => $request->size,
                'long_description' => $request->long_description,

            ]);

            $notification = array(
                'message' => 'Product updated Successfully  with images',
                'alert-type' => 'info'
            );
            return redirect()->route('all.products')->with($notification);
        } else {

            ProductList::findOrFail($id)->update([

                'title' => $request->title,
                'price' => $request->price,
                'special_price' => $request->special_price,
                'category' => $request->category,
                'subcategory' => $request->subcategory,
                'remark' => $request->remark,
                'brand' => $request->brand,
                'product_code' => $request->product_code,


            ]);

            ProductDetails::where('product_id', $id)->update([

                'short_description' => $request->short_description,
                'color' => $request->color,
                'size' => $request->size,
                'long_description' => $request->long_description,

            ]);

            $notification = array(
                'message' => 'Product updated Successfully  without images',
                'alert-type' => 'info'
            );
            return redirect()->route('all.products')->with($notification);


        }


    }
}
