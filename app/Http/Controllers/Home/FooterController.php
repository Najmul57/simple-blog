<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function footerPage()
    {
        $footer = Footer::find(1);
        return view('admin.footer.footer', compact('footer'));
    } // end method

    public function footerUpdate(Request $request)
    {
        $footer_id = $request->id;
        Footer::findOrFail($footer_id)->update([
            'number' => $request->number,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
        ]);

        $notification=array(
            'message'=>'Footer Updated !',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
