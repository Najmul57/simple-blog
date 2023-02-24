<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function allBlogCategory()
    {
        $blog_category = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blog_category'));
    } // end method
    public function addBlogCategory()
    {
        return view('admin.blog_category.blog_category_add');
    } //end method
    public function storeBlogCategory(Request $request)
    {

        BlogCategory::insert([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Blog Category Added !',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog.category')->with($notification);

    } //end method
    public function editBlogCategory($id)
    {
        $editBlogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('editBlogCategory'));
    } //end method
    public function updateBlogCategory(Request $request, $id)
    {
        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,
        ]);

        $notification = array(
            'message' => 'Blog Category Updated !',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog.category')->with($notification);

    } //end method
    public function deleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Category Deleted !',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog.category')->with($notification);


    } //end method
}
