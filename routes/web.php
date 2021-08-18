<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{HomeComponent,CartComponent,ShopComponent,
    CheckoutComponent,ContacComponent,AboutComponent,DeatailPrd,
    CategoryComponent,SearchComponent,Wishlist,Thankyou};
use App\Http\Livewire\Admin\{AdminDashboardComponent,AdminCategory,AddCategory,EditCategory,ProductComponent,
    AddProduct,EditProduct,Honeslyder,EditSlides,AddSlides,AdminHomeCategoryComponent,
    AddCouponsComponent,UserComponent,UpdateUser,DateSale,CouponsComponent,EditCouponsComponent,OrderComponent,OrderDetail};
use App\Http\Livewire\User\{UserDashboardComponent,MyAccount,OrderComponentUser,DetailOrderUser,Changepass};
use App\Http\Controllers\{SendMail,SocialController};

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
    return view('welcome');
});

Route::get('/',HomeComponent::class);
Route::get('/Cart',CartComponent::class)->name('product.cart');
Route::get('/Shop',ShopComponent::class);
Route::get('/Checkout',CheckoutComponent::class);
Route::get('/Contact',ContacComponent::class);
Route::get('/About',AboutComponent::class);

Route::get('/Product/{slug}',DeatailPrd::class);

Route::get('/Product_Category/{slug_category}',CategoryComponent::class)->name('product.category');


Route::get('/Search',SearchComponent::class);
Route::get('/Wishlist',Wishlist::class);
Route::get('/Thankyou',Thankyou::class);
//Route::get('Products/{id}',[prdController::class,'get']);


// Route::middleware(['auth::sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// for User or Cusstomer
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);

Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
Route::get('/user/dashboard',UserDashboardComponent::class )->name('user.dashboard');
Route::get('/user/AllOrder',OrderComponentUser::class )->name('user.Order');
Route::get('/user/AllOrder/{id}',DetailOrderUser::class );
Route::get('/user/MyAccount',MyAccount::class )->name('user.MyAccount');
Route::get('/user/SendMail',[SendMail::class,'sendmail']);
Route::get('/user/ChangePassword',Changepass::class);

});
// for Admi
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class )->name('admin.dashboard');

    //Category
    Route::get('/admin/Category', AdminCategory::class)->name('admin.Category');
    Route::get('/admin/Add_category',AddCategory::class);
    Route::get('/admin/Edit_category/{slug}',EditCategory::class);

    //Product
    Route::get('/admin/Product', ProductComponent::class)->name('admin.Product');
    Route::get('/admin/AddProduct',AddProduct::class)->name('admin.AddProduct');
    Route::get('/admin/EditProduct/{slug}',EditProduct::class)->name('admin.EditProduct');

    //slides

    Route::get('/admin/homeSlides',Honeslyder::class)->name('admin.Slides');
    Route::get('/admin/AddSlides',AddSlides::class);
    Route::get('/admin/EditSlides/{id}',EditSlides::class);

    // Home category

    Route::get('/admin/Home-Categories',AdminHomeCategoryComponent::class )->name('Home.Categories');

    //sale date
    Route::get('/admin/Sale_date',DateSale::class )->name('Home.DateSale');

    //Coupons

    Route::get('/admin/Coupons',CouponsComponent::class)->name('admin.Coupons');
    Route::get('/admin/AddCoupons',AddCouponsComponent::class);
    Route::get('/admin/EditCoupons/{id}',EditCouponsComponent::class);

    // Order
    Route::get('/admin/Order',OrderComponent::class)->name('admin.Order');
    Route::get('/admin/Order/{ids}',OrderDetail::class);

    //User
    Route::get('/admin/User',UserComponent::class)->name('admin.User');
    Route::get('/admin/EditUser/{id}',UpdateUser::class)->name('admin.Edit');

});
