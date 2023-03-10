<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
});

// home controller
Route::controller(HomeSlideController::class)->group(function () {
    Route::get('home/slide', 'HomeSlide')->name('home.slide');
    Route::post('update/slide', 'updateSlide')->name('update.slide');
});

//about controller
Route::controller(AboutController::class)->group(function () {
    Route::get('about/page', 'aboutPage')->name('about.page');
    Route::post('update/about', 'updateAbout')->name('update.about');
    Route::get('about', 'homeAbout')->name('home.about');
    Route::get('about/multi/image', 'aboutMultiImage')->name('about.multi.image');
    Route::post('store/multi/image', 'storeMultiImage')->name('store.multi.image');
    Route::get('all/multi/image', 'allMultiImage')->name('all.multi.image');

    Route::get('edit/multi/image/{id}', 'editMultiImage')->name('edit.multi.image');
    Route::post('update/multi/image/', 'updateMultiImage')->name('update.multi.image');
    Route::get('delete/multi/image/{id}', 'deleteMultiImage')->name('delete.multi.image');
});

// Portfolio controller
Route::controller(PortfolioController::class)->group(function () {
    Route::get('all/portfolio', 'allPortfolio')->name('all.portfolio');
    Route::get('add/portfolio', 'addPortfolio')->name('add.portfolio');
    Route::post('store/portfolio', 'storePortfolio')->name('store.portfolio');
    Route::get('edit/portfolio/{id}', 'editPortfolio')->name('edit.portfolio');
    Route::post('update/portfolio/{id}', 'updatePortfolio')->name('update.portfolio');
    Route::get('delete/portfolio/{id}', 'deletePortfolio')->name('delete.portfolio');
    Route::get('details/portfolio/{id}', 'detailsPortfolio')->name('portfolio.details');

    Route::get('/portfolio','portfolio')->name('home.portfolio');
});
// blog controller
Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('all/blog/category', 'allBlogCategory')->name('all.blog.category');
    Route::get('add/blog/category', 'addBlogCategory')->name('add.blog.category');
    Route::post('store/blog/category', 'storeBlogCategory')->name('store.blog.category');
    Route::get('edit/blog/category/{id}', 'editBlogCategory')->name('edit.blog.category');
    Route::post('update/blog/category/{id}', 'updateBlogCategory')->name('update.blog.category');
    Route::get('delete/blog/category/{id}', 'deleteBlogCategory')->name('delete.blog.category');
});
// blog controller
Route::controller(FooterController::class)->group(function () {
    Route::get('footer/page', 'footerPage')->name('footer.page');
    Route::post('footer/update', 'footerUpdate')->name('update.footer');
});
// contact controller
Route::controller(ContactController::class)->group(function () {
    Route::get('contact', 'contactMe')->name('contact.me');
    Route::post('store/message', 'storeMessage')->name('store.message');
    Route::get('contact/page', 'contactPage')->name('contact.page');
    Route::get('message/delete/{id}', 'messageDelete')->name('message.delete');
});
// Portfolio controller
Route::controller(BlogController::class)->group(function () {
    Route::get('all/blog', 'allBlog')->name('all.blog');
    Route::get('add/blog', 'addBlog')->name('add.blog');
    Route::post('store/blog', 'storeBlog')->name('store.blog');
    Route::get('edit/blog/{id}', 'editBlog')->name('edit.blog');
    Route::post('update/blog/{id}', 'updateBlog')->name('update.blog');
    Route::get('delete/blog/{id}', 'deleteBlog')->name('delete.blog');
    Route::get('details/blog/{id}', 'detailsBlog')->name('details.blog');
    Route::get('category/post/{id}', 'categoryPost')->name('category.post');
    Route::get('/blog','homeBlog')->name('home.blog');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::get('edit/profile', 'editProfile')->name('edit.profile');
    Route::post('store/profile', 'storeProfile')->name('store.profile');

    Route::get('change/password', 'changePassword')->name('change.password');
    Route::post('update/password', 'updatePassword')->name('update.password');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
