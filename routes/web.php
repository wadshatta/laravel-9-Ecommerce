<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', App\Http\Livewire\HomeComponent::class)->name('home.index');

Route::get('/shop', App\Http\Livewire\ShopComponent::class)->name('shop');
Route::get('/product/{slug}',App\Http\Livewire\DetailsComponent::class)->name('product.details');

Route::get('/cart', App\Http\Livewire\CartComponent::class)->name('shop.cart');

Route::get('/checkout', App\Http\Livewire\CheckoutComponent::class)->name('shop.checkout');

Route::get('/wishlist', App\Http\Livewire\WishlistComponent::class)->name('shop.wishlist');
Route::get('/checkout', App\Http\Livewire\CheckoutComponent::class)->name('shop.checkout');


Route::get('product-category/{slug}',App\Http\Livewire\CategoryComponent::class)->name('product.category');
Route::get('/search',App\Http\Livewire\SearchComponent::class)->name('product.search');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard',App\Http\Livewire\User\UserDashboardComponent::class)->name('user.dashboard');
  });

Route::middleware(['auth','authadmin'])->group(function()
{
    Route::get('/admin/dashboard',App\Http\Livewire\Admin\AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('admin/category',App\Http\Livewire\Admin\AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('admin/category/add',App\Http\Livewire\Admin\AdminAddCategoriesComponent::class)->name('admin.category.add');
    Route::get('admin/category/edit/{category_id}',App\Http\Livewire\Admin\AdminEditCategoriesComponent::class)->name('admin.category.edit');

    Route::get('admin/products',App\Http\Livewire\Admin\AdminProductComponent::class)->name('admin.products');
    Route::get('admin/product/add',App\Http\Livewire\Admin\AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('admin/product/edit/{product_id}',App\Http\Livewire\Admin\AdminEditProductComponent::class)->name('admin.product.edit');

    Route::get('admin/slider', App\Http\Livewire\Admin\AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('admin/slider/add',App\Http\Livewire\Admin\AdminAddHomeSliderComponent::class)->name('admin.home.slider.add');
    Route::get('admin/slider/edit/{slide_id}',App\Http\Livewire\Admin\AdminEditHomeSliderComponent::class)->name('admin.home.slider.edit');


 });



require __DIR__.'/auth.php';
