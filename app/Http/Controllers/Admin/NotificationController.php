<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function AllNotification(){

        $notifications =Notification::All();
        return view('backend.notification.notification_view',compact('notifications'));
    }
    public function AddNotification(){
        return view('backend.notification.notification_add');
    }

    public function StoreNotification(Request $request){
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'date' => 'required',
        ]);
        Notification::insert([
            'title' => $request->title,
            'message' => $request->message,
            'date' => $request->date,
        ]);
        $notification = array(
            'message' => 'Notification Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.notification')->with($notification);
    }


    public function DeleteNotification($id)
    {
        Notification::find($id)->delete();
        $notification = array(
            'message' => 'Notification Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.notification')->with($notification);
    }


    public function UpdateNotification(Request $request){

        $notify_id = $request->id;

        Notification::findOrFail($notify_id)->update([
            'title' => $request->title,
            'message' => $request->message,
            'date' => $request->date,

        ]);

        $notification = array(
            'message' => 'Notification Updated  Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.notification')->with($notification);





    }



}
