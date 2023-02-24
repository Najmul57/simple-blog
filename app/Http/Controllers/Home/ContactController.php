<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function contactMe()
    {
        return view('frontend.contact');
    } // end method

    public function storeMessage(Request $request)
    {
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Thank your for Contact !',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    } //end method

    public function contactPage(){
        $contact=Contact::latest()->get();
        return view('admin.contact.contact',compact('contact'));
    } // end method

    public function messageDelete($id){
        $contact=Contact::findOrFail($id)->delete();

        $notification=array(
            'message'=>'Message Delete Success!',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
