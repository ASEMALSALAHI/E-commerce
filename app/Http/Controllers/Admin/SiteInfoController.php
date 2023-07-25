<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    //
    public function AllInformation(){

        $siteinfo = SiteInfo::find(1);
        return view('backend.siteinfo.siteinfo_update',compact('siteinfo'));


    }


    public function UpdateSiteInfo(Request $request){

        $row_id=$request->id;

        SiteInfo::findOrFail($row_id)->update([
            'about' => $request->about,
            'address' => $request->address,
            'youtub_link'=>$request->youtub_link,
            'linkedin_link'=>$request->linkedin_link,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instegram_link' => $request->instegram_link,
            'copyright' => $request->copyright,

        ]);


        $notification = array(
            'message' => 'SiteInfo Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }
}
