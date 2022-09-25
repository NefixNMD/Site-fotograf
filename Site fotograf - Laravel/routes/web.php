<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\AlbumController as ControllersAlbumController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\OrderProductsController;
use App\Http\Controllers\OrdersController;
use App\Models\Category;
use App\Models\Orders;
use App\Models\productCategories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('photo_app/index');
});

Route::get('/portofoliu', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/despre_noi', function () {
    return view('photo_app/despre_noi');
});




Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('/appointment', [AppointmentController::class, 'index']);
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/', function () {
    return view('photo_app/index');
})->name('/dashboard');

Route::get('/album-images/{id}',[AlbumController::class,'images'])->name('album.images');
Route::get('/product/{id}',[ProductsController::class,'show']);
Route::get('/cat-albumes/{id}',[CategoryController::class,'albumes'])->name('category.albumes');
Route::resource('carts', CartController::class);

Route::resource('product_categories', ProductCategoriesController::class);
Route::delete('/carts/{id}', 'CartController@destroy')->name('company.destroy');
Route::get('carts/show','CartController@show');
//Admin Categories Route
Route::middleware(['auth'])->group(function () {
    Route::resource('orders', OrdersController::class);
    Route::get('/orders',[OrdersController::class,'show']);
    Route::get('/servicii',[ProductCategoriesController::class,'shopCat'])->name('categories');
    Route::get('/checkout',[OrderProductsController::class,'show']);
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/appointments', [AppointmentController::class, 'view']);
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
    Route::get('/admin_orders',[OrdersController::class,'display']);
    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductsController::class);
    Route::get('product_categories/sort', 'ProductCategoriesController@sort');

    Route::resource('alb', AlbumController::class);

    Route::get('/create_category', function () {
        return view('photo_app/admin/category/create_category');
    });
    Route::get('/category', [CategoryController::class, 'test'])->name('categories.test');
    Route::get('/category_product', [ProductCategoriesController::class, 'index'])->name('productCategories');
    Route::get('/products', [ProductsController::class, 'index'])->name('products.categories');
    Route::get('/create_product_category', function () {
        return view('photo_app/admin/category-product/create_category');
    });

    Route::get('/create_product',[ProductCategoriesController::class,'createProduct'])->name('product.categories');
    Route::get('/create_album',[CategoryController::class,'createAlbum'])->name('categories');
    Route::post('/add_product',[ProductsController::class,'store']);

    Route::get('/albumes',[AlbumController::class,'index'])->name('albumes.categories');
    Route::post('/add_album',[AlbumController::class,'store']);

});

require __DIR__.'/auth.php';