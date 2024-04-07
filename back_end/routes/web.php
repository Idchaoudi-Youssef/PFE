<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AppController::class,'index'])->name('app.index');
Route::get('/about-us',[AppController::class,'aboutUs'])->name('app.aboutus');
Route::get('/contact-us',[AppController::class,'contactUs'])->name('app.contactus');
Route::post('/contact-us/store',[AppController::class,'contactUsStore'])->name('contact.store');
Route::get('/blog',[AppController::class,'blog'])->name('app.blog');


Route::get('/verify_email/{hash}',[UserController::class,'verifyEmail']);


Auth::routes();

Route::get('/shop_vetement',[ShopController::class,'index'])->name('shop.index');
Route::get('/shop_informatique' , [ShopController::class, 'shopInformatique'])->name('shop.informatique');

Route::get('/product/{slug}',[ShopController::class,'productDetails'])->name('shop.product.details');



Route::get('/cart-wishlist-count',[ShopController::class,'getCartAndWishlistCount'])->name('shop.cart.wishlist.count');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'addToCart'])->name('cart.store');
Route::delete('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

Route::post('/wishlist/add',[WishlistController::class,'addProductToWishlist'])->name('wishlist.store');
Route::get('/wishlist',[WishlistController::class,'getWishlistedProducts'])->name('wishlist.list');
Route::delete('/wishlist/remove',[WishlistController::class,'removeProductFromWishlist'])->name('wishlist.remove');
Route::delete('/wishlist/clear',[WishlistController::class,'clearWishlist'])->name('wishlist.clear');
Route::post('/wishlist/move-to-cart',[WishlistController::class,'moveToCart'])->name('wishlist.move.to.cart');


Route::middleware('auth')->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});

Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});

Route::get('/Admin-Users',[AdminController::class,'getAllUsers'])->name('admin.users');
Route::get('/Admin-products',[AdminController::class,'getAllProducts'])->name('admin.products');
Route::get('/Admin-brands',[AdminController::class,'getAllBrand'])->name('admin.brands');
Route::get('/Admin-Categorie',[AdminController::class,'getAllCategorie'])->name('admin.categories');

Route::get('/Admin-AddUsers',[AdminController::class,'createUsers'])->name('users.create');
Route::get('/Admin-AddBrands',[AdminController::class,'createBrands'])->name('brands.create');
Route::get('/Admin-AddProducts',[AdminController::class,'createProducts'])->name('products.create');
Route::get('/Admin-AddCategories',[AdminController::class,'createCategories'])->name('categorie.create');

Route::post('/Admin-StoreUsers',[AdminController::class,'storeUsers'])->name('admin.StoreUser');
Route::post('/Admin-StoreBrands',[AdminController::class,'storeBrands'])->name('admin.StoreBrand');
Route::post('/Admin-StoreCategories',[AdminController::class,'storeCategories'])->name('admin.StoreCategorie');
Route::post('/Admin-StoreProducts',[AdminController::class,'storeProducts'])->name('admin.StoreProduct');

Route::delete('/Admin-DeleteUsers/{id}',[AdminController::class,'deleteUsers'])->name('admin.deleteUser');
Route::delete('/Admin-DeleteBrands/{id}',[AdminController::class,'deleteBrands'])->name('admin.deleteBrand');
Route::delete('/Admin-DeleteProducts/{id}',[AdminController::class,'deleteProducts'])->name('admin.deleteProduct');
Route::delete('/Admin-DeleteCategories/{id}',[AdminController::class,'deleteCategories'])->name('admin.deleteCategorie');

Route::get('/Admin-editUsers/{id}', [AdminController::class, 'editUsers'])->name('admin.editUser');
Route::put('/Admin-UpdateUsers/{id}', [AdminController::class, 'updateUsers'])->name('admin.UpdateUser');

Route::get('/Admin-edit/{id}', [AdminController::class, 'editProducts'])->name('admin.editProduct');
Route::put('/Admin-UpdateProduct/{id}', [AdminController::class, 'updateProduct'])->name('admin.UpdateProduct');



Route::get('/Admin-editBrands/{id}', [AdminController::class, 'editBrands'])->name('admin.editBrand');
Route::put('/Admin-UpdateBrands/{id}', [AdminController::class, 'updateBrand'])->name('admin.UpdateBrand');

Route::get('/Admin-editCategories/{id}', [AdminController::class, 'editCategories'])->name('admin.editCategorie');
Route::put('/Admin-UpdateCategories/{id}', [AdminController::class, 'updateCategories'])->name('admin.UpdateCategorie');


Route::get('/Admin-Veridedproducts', [AdminController::class, 'VerifiedproductsView'])->name('admin.Verifiedproducts');
Route::post('/product/{product}/verify', [AdminController::class, 'verifyProduct'])->name('admin.product.verify');


Route::get('/Admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard.index');


Route::get('/user/{id}/products', [UserController::class, 'getAllProductsByUserId'])->name('user.listproducts');
Route::get('/user/{id}/waitingproducts', [UserController::class, 'waitingListProducts'])->name('user.waitinglist');
Route::get('/user/{id}/approvedproducts', [UserController::class, 'approvedListProducts'])->name('user.approvedlist');
Route::get('/user/{id}/rejectedproducts', [UserController::class, 'rejectedListProducts'])->name('user.rejectedlist');



Route::get('/user-AddProducts',[UserController::class,'createProducts'])->name('user.CreateProducts');

Route::post('/User-StoreProducts',[UserController::class,'storeProducts'])->name('user.StoreProduct');

Route::delete('/User-DeleteProducts/{id}',[UserController::class,'deleteProducts'])->name('user.deleteProduct');

Route::get('/User-Profile',[UserController::class,'profile'])->name('user.profile');
Route::get('/User-editUsers/{id}', [UserController::class, 'editUsers'])->name('User.EditUser');
Route::put('/User-UpdateUsers/{id}', [UserController::class, 'updateUsers'])->name('User.UpdateUser');

