<?php
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UnitController;
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
*/
//Frontend
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/view-product-details/{id}', [HomeController::class,'viewProductDetails'])->name('view-product-details');
Route::get('/category/products/{id}', [HomeController::class,'categoryProducts'])->name('category.products');
Route::post('/add/cart', [CartController::class,'addToCart'])->name('add.cart');
Route::get('/cart/details', [CartController::class,'cartDetails'])->name('cartdetails');
Route::post('/update/cart', [CartController::class,'updateCart'])->name('update-cart');
Route::get('/delete/cart/{id}', [CartController::class,'deleteCart'])->name('cart.delete');
Route::get('/checkout/info', [CheckoutController::class,'index'])->name('checkout.info');
Route::post('/new/customer', [CheckoutController::class,'saveCustomerInfo'])->name('new.customer');
// Route::get('/', function () {
//     return view('frontend.home.home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    
    //Category
    Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('/categories', [CategoryController::class,'index'])->name('categories');

    // Category published/unpublished
    Route::get('/category/unpublished/{id}', [CategoryController::class, 'UnpublishedCategory'])->name('unpublished.category');
    Route::get('/category/published/{id}', [CategoryController::class, 'publishedCategory'])->name('published.category');

    // Category edit, update, delete
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
    // Sub Category 
    Route::get('/subcategory/create',[SubcategoryController::class,'create'])->name('subcategory.create');
    Route::post('/subcategory/store',[SubcategoryController::class,'store'])->name('subcategory.store');
    Route::get('/subcategories',[SubcategoryController::class,'index'])->name('subcategories');

    Route::get('/subcategory/unpublished/{id}', [SubcategoryController::class, 'unpublishedSubcategory'])->name('unpublished.subcategory');
    Route::get('/subcategory/published/{id}', [SubcategoryController::class, 'publishedSubcategory'])->name('published.subcategory');
    
    Route::get('/subcategories/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategories.edit');
    Route::post('/subcategories/update/{id}', [SubcategoryController::class, 'update'])->name('subcategories.update');
    Route::get('/subcategories/destroy/{id}', [SubcategoryController::class, 'destroy'])->name('subcategories.destroy');
    
    //Brand
    Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');

    Route::get('/brand/unpublished/{id}', [BrandController::class, 'unpublishedBrand'])->name('unpublished.brand');
    Route::get('/brand/published/{id}', [BrandController::class, 'publishedBrand'])->name('published.brand');
    
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

    //Unit
    Route::get('/unit/create',[UnitController::class,'create'])->name('unit.create');
    Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/units', [UnitController::class, 'index'])->name('units');
    
    Route::get('/unit/unpublished/{id}', [UnitController::class, 'unpublishedUnit'])->name('unpublished.unit');
    Route::get('/unit/published/{id}', [UnitController::class, 'publishedUnit'])->name('published.unit');
    
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');

    //Products
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    
    Route::get('/product/unpublished/{id}', [ProductController::class, 'unpublishedProduct'])->name('unpublished.product');
    Route::get('/product/published/{id}', [ProductController::class, 'publishedProduct'])->name('published.product');
    
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    
    // Route::get('/subcat/create', function() {
    //     return view('backend.subcategory.add');
    // });
});

