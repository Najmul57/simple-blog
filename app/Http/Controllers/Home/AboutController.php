<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class AboutController extends Controller
{
    public function aboutPage()
    {
        $about = About::find(1);
        return view('admin.about.about_page_all', compact('about'));
    } // end method

    public function updateAbout(Request $request)
    {
        $about_id = $request->id;
        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/about_image/' . $name_gen);
            $save_url = 'upload/about_image/' . $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Updated with Image!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notification = array(
                'message' => 'About Updated without Image!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    } // end method

    public function homeAbout()
    {
        $about = About::find(1);
        return view('frontend.about_page', compact('about'));
    } // end method

    public function aboutMultiImage()
    {
        return view('admin.about.multi_image');
    } // end method

    public function storeMultiImage(Request $request)
    {
        $image = $request->file('multi_image');
        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(220, 220)->save('upload/multi-image/' . $name_gen);
            $save_url = 'upload/multi-image/' . $name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Multi Image Uploaded!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    } //end method

    public function allMultiImage()
    {
        $allimages = MultiImage::all();
        return view('admin.about.all_multiImage', compact('allimages'));
    } // end method

    public function editMultiImage($id)
    {
        $allMultiImage = MultiImage::findOrFail($id);
        return view('admin.about.edit_multi_image', compact('allMultiImage'));
    } // end method

    public function updateMultiImage(Request $request)
    {
        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(222, 222)->save('upload/multi-image/' . $name_gen);
            $save_url = 'upload/multi-image/' . $name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Home Slide Updated with Image!',
                'alert-type' => 'success',
            );
            return redirect()->route('all.multi.image')->with($notification);
        }
    } // end method

    public function deleteMultiImage($id)
    {
        $multi=MultiImage::findOrFail($id);
        $img=$multi->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'About Updated with Image!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
