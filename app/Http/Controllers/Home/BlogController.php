<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class BlogController extends Controller
{
    public function allBlog()
    {
        $blog = Blog::latest()->get();
        return view('admin.blog.all_blog', compact('blog'));
    } //end method
    public function addBlog()
    {
        $categoris = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.add_blog', compact('categoris'));
    } //end method
    public function storeBlog(Request $request)
    {
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(403, 327)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $save_url,
            'created_at'=>Carbon::now()
        ]);

        $notification=array(
            'message'=>'Blog Added Successfully!',
            'alert-type'=>'success'
        );

      return redirect()->route('all.blog')->with($notification);

    } //end method
    public function editBlog($id)
    {
        $categoris = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogs=Blog::findOrFail($id);
        return view('admin.blog.edit_blog',compact('blogs','categoris'));
    } //end method
    public function updateBlog(Request $request)
    {
        $slide_id = $request->id;
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(403, 327)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

            Blog::findOrFail($slide_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at'=>Carbon::now()
            ]);

            $notification = array(
                'message' => 'Blog Updated with Image!',
                'alert-type' => 'success',
            );
            return redirect()->route('all.blog')->with($notification);
        } else {
            Blog::findOrFail($slide_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'created_at'=>Carbon::now()
            ]);

            $notification = array(
                'message' => 'Blog Updated without Image!',
                'alert-type' => 'success',
            );
            return redirect()->route('all.blog')->with($notification);
        }
    } //end method
    public function deleteBlog($id)
    {} //end method

    public function detailsBlog($id){
        $allBlogs=Blog::latest()->take(5)->get();
        $blog=Blog::findOrFail($id);
        $categoris = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog_details',compact('blog','allBlogs','categoris'));
    } // end method

    public function categoryPost($id){
        $blogpost=Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allBlogs=Blog::latest()->take(5)->get();
        $categoris = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $categoryName=BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details',compact('blogpost','allBlogs','categoris','categoryName'));
    } // end method

    public function homeBlog(){
        $allblogs=Blog::latest()->get();
        $categoris = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog',compact('allblogs','categoris'));
    }

}
