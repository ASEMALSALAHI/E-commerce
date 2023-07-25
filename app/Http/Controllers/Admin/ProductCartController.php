<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartOrder;
use Illuminate\Http\Request;

class ProductCartController extends Controller
{
    //
    public function PendingOrder()
    {
        $orders=cartOrder::where('order_status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public function ProcessingOrder()
    {
        $orders=cartOrder::where('order_status','Processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function CompleteOrder()
    {
        $orders=cartOrder::where('order_status','Complete')->orderBy('id','DESC')->get();
        return view('backend.orders.complete_orders',compact('orders'));
    }

    public function OrderDetails($id)
    {
        $order=cartOrder::findOrfail($id);
        return view('backend.orders.order_details',compact('order'));
    }

    public function PendingToProcessing($id)
    {
        CartOrder::findOrfail($id)->update(['order_status'=>'Processing']);
        $notification=array(
            'message'=>'Order Processing Successfully',
              'alert-type'=>'success'
        );
        return redirect()->route('pending.order')->with($notification);

    }

    public function ProcessingToComplete($id)
    {
        CartOrder::findOrfail($id)->update(['order_status'=>'Complete']);
        $notification=array(
            'message'=>'Order Complete Successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('processing.order')->with($notification);

    }

    public function OrderDelete($id)
    {
        CartOrder::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Order Deleteed Successfully',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
    }
}

