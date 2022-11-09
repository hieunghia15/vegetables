<?php

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\AssignController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExpressController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ScaleController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FarmProductTypeController;
use App\Http\Controllers\Admin\TypeReportController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\Guest\ProductDetailController;
use App\Http\Controllers\Guest\FilterController as GuestFilterController;
use App\Http\Controllers\Guest\ProductShowController;
use App\Http\Controllers\Guest\FarmProductTypeFilterController;
use App\Http\Controllers\Guest\FarmerController;
use App\Http\Controllers\Guest\NewsController;
use App\Http\Controllers\Guest\BlogController;
use App\Http\Controllers\Guest\SearchingController;
use App\Http\Controllers\Admin\SaleController;


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

require __DIR__ . '/auth.php';


Route::prefix('/')->namespace('Guest')->name('guest.')->group(function () {

    Route::get('/farm-product-type/{product_type_slug}', [FarmProductTypeFilterController::class, 'show'])->name('type');
    Route::get('/product-type', [FarmProductTypeFilterController::class, 'filter'])->name('filter');
    Route::get('/', [ProductShowController::class, 'index'])->name('index');

    Route::prefix('product')->namespace('Product')->name('product.')->group(function () {
        Route::get('/show/{product_slug}', [ProductDetailController::class, 'productDetail'])->name('productdetail');
        Route::get('/farm-product-filter', [GuestFilterController::class, 'index'])->name('index');

        Route::get('/filter', [GuestFilterController::class, 'filter'])->name('filter');
        Route::get('/filter_two', [GuestFilterController::class, 'filter_two'])->name('filter_two');
    });
    Route::prefix('seller')->namespace('Seller')->name('seller.')->group(function () {
        Route::get('/{id}', [FarmerController::class, 'index'])->name('index');
        Route::get('/filter/{id}', [FarmerController::class, 'filter'])->name('filter');
        Route::get('/order-by/{id}', [FarmerController::class, 'farmerOrderBy'])->name('order-by');
    });
    Route::prefix('blogs')->namespace('Blogs')->name('blogs.')->group(function () {
        Route::get('/{id}', [BlogController::class, 'index'])->name('index');
        Route::get('/category/{category_slug}', [BlogController::class, 'categoryPost'])->name('category-post');
        Route::get('/read/{post_slug}', [BlogController::class, 'read'])->name('read');
    });
    Route::prefix('news')->namespace('News')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/category/{category_slug}', [NewsController::class, 'categoryPost'])->name('category-post');
        Route::get('/{post_slug}', [NewsController::class, 'read'])->name('read');
    });
    Route::get('/searching', [SearchingController::class, 'searchProduct'])->name('search');

    Route::get('/search', [SearchingController::class, 'searchPost'])->name('search-post');
});

//Get location
Route::prefix('locations')->namespace('Locations')->name('locations.')->group(function () {
    Route::get('/', [LocationController::class, 'index'])->name('location');
    Route::post('/get-province-by-region', [LocationController::class, 'getProvince'])->name('get-province');
    Route::post('/get-district-by-province', [LocationController::class, 'getDistrict'])->name('get-district');
    Route::post('/get-ward-by-district', [LocationController::class, 'getWard'])->name('get-ward');
});

//User: ADMIN
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['web', 'auth', 'role:admin|farmer'])->group(function () {
    Route::get('/', function () {
        return view('admin.layout');
    })->name('index');

    Route::prefix('sales')->namespace('Sales')->name('sales.')->middleware(['can:statistic'])->group(function () {
        Route::get('/', [SaleController::class, 'index'])->name('index');
    });

    Route::prefix('products')->namespace('Products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index')->middleware(['can:farm-produce.view']);
        Route::get('/add', [ProductController::class, 'create'])->name('add')->middleware(['can:farm-produce.*']);
        Route::post('/add', [ProductController::class, 'store'])->name('store')->middleware(['can:farm-produce.*']);
        Route::get('/update/{id}', [ProductController::class, 'edit'])->name('edit')->middleware(['can:farm-produce.*']);
        Route::patch('/update/{id}', [ProductController::class, 'update'])->name('update')->middleware(['can:farm-produce.*']);
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy')->middleware(['can:farm-produce.*']);
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('delete')->middleware(['can:farm-produce.*']);
        Route::get('/show/{product_slug}', [ProductController::class, 'show'])->name('show')->middleware(['can:farm-produce.view']);;
    });

    Route::prefix('categories')->namespace('Categories')->name('categories.')->group(function () {
        Route::get('/', function () {
            return view('admin.categories.index');
        })->name('index');
    });
    Route::prefix('farm-product-types')->namespace('Farm-product-types')->name('farm-product-types.')->group(function () {

        Route::get('/', [FarmProductTypeController::class, 'index'])->name('index');
        Route::get('/show/{id}', [FarmProductTypeController::class, 'show'])->name('show');

        Route::get('/create', [FarmProductTypeController::class, 'create'])->name('create');
        Route::post('/create', [FarmProductTypeController::class, 'store'])->name('store');

        Route::get('/update/{id}', [FarmProductTypeController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [FarmProductTypeController::class, 'update'])->name('update');

        Route::get('/delete/{id}', [FarmProductTypeController::class, 'destroy'])->name('destroy');
        Route::delete('/delete/{id}', [FarmProductTypeController::class, 'delete'])->name('delete');
    });

    Route::prefix('users')->namespace('Users')->name('users.')->middleware(['can:assign'])->group(function () {
        //List User has role
        Route::get('/list-user', [AssignController::class, 'index'])->name('permission');
    });

    //PERMISSION
    Route::prefix('permissions')->namespace('Permissions')->name('permissions.')->middleware(['can:assign'])->group(function () {

        Route::get('/role', [RoleController::class, 'index'])->name('role');
        Route::get('/create-role', [RoleController::class, 'create'])->name('create-role');
        Route::post('/create-role', [RoleController::class, 'store'])->name('store-role');
        Route::get('/update-role/{id}', [RoleController::class, 'edit'])->name('edit-role');
        Route::patch('/update-role/{id}', [RoleController::class, 'update'])->name('update-role');
        Route::get('/delete-role/{id}', [RoleController::class, 'destroy'])->name('destroy-role');
        Route::delete('/delete-role/{id}', [RoleController::class, 'delete'])->name('delete-role');

        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::get('/create-permission', [PermissionController::class, 'create'])->name('create-permission');
        Route::post('/create-permission', [PermissionController::class, 'store'])->name('store-permission');
        Route::get('/update-permission/{id}', [PermissionController::class, 'edit'])->name('edit-permission');
        Route::patch('/update-permission/{id}', [PermissionController::class, 'update'])->name('update-permission');
        Route::get('/delete-permission/{id}', [PermissionController::class, 'destroy'])->name('destroy-permission');
        Route::delete('/delete-permission/{id}', [PermissionController::class, 'delete'])->name('delete-permission');

        Route::get('/role-permission', [AssignController::class, 'rolePermission'])->name('role-permission');
        Route::get('/assign-permission/{id}', [AssignController::class, 'assignPermission'])->name('assign-permission');
        Route::patch('/assign-permission/{id}', [AssignController::class, 'insertPermission'])->name('insert-permission');
        Route::get('/assign-role/{id}', [AssignController::class, 'assignRole'])->name('assign-role');
        Route::patch('/assign-role/{id}', [AssignController::class, 'insertRole'])->name('insert-role');
    });

    Route::prefix('orders')->namespace('Orders')->name('orders.')->group(function () {
        Route::get('/', [AdminOrderController::class, 'order'])->name('index');
        Route::patch('/update-pickup/{id}', [AdminOrderController::class, 'update_pickup'])->name('update-pickup');
        Route::get('/update-delivering/{id}', [AdminOrderController::class, 'update_delivering'])->name('update-delivering');
        Route::get('/update-complete/{id}', [AdminOrderController::class, 'update_complete'])->name('update-complete');
        Route::get('/update-cancel/{id}', [AdminOrderController::class, 'update_cancel'])->name('update-cancel');

        Route::get('/complete', [AdminOrderController::class, 'complete'])->name('complete');
        Route::get('/canceled', [AdminOrderController::class, 'canceled'])->name('canceled');
        Route::get('/show/{id}', [AdminOrderController::class, 'show'])->name('show');
    });

    Route::prefix('farmers')->namespace('Farmers')->name('farmers.')->middleware(['can:farmer.*'])->group(function () {
        Route::get('/', [AssignController::class, 'indexFarmer'])->name('index');
        Route::get('/unconfirmed', [AssignController::class, 'listFarmerNotAccept'])->name('unconfirmed');
        Route::post('/accept-farmer', [AssignController::class, 'acceptFarmer'])->name('accept-farmer');
        Route::get('/blocked', function () {
            return view('admin.farmers.blocked');
        })->name('blocked');
        Route::get('/reported', function () {
            return view('admin.farmers.reported');
        })->name('reported');
    });
    Route::prefix('posts')->namespace('Posts')->name('posts.')->group(function () {
        Route::get('/test', function () {
            return view('admin.posts.test');
        })->name('test');
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/update/{id}', [PostController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [PostController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('delete');
        Route::get('/unconfirmed', [PostController::class, 'index_unconf'])->name('unconfirmed');
        Route::get('/accept/{id}', [PostController::class, 'accept'])->name('accept');
        Route::get('/blocked', function () {
            return view('admin.posts.blocked');
        })->name('blocked');
        Route::get('/reported', function () {
            return view('admin.posts.reported');
        })->name('reported');
        Route::get('/categories/index', [CategoryController::class, 'index'])->name('categories');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories_create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories_store');
        Route::get('/categories/update/{id}', [CategoryController::class, 'edit'])->name('categories_edit');
        Route::patch('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories_update');
        Route::delete('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories_delete');
    });

    Route::prefix('expresses')->namespace('Expresses')->name('expresses.')->group(function () {

        Route::get('/', [expressController::class, 'index'])->name('index');
        Route::get('/show/{id}', [expressController::class, 'show'])->name('show');

        Route::get('/create', [expressController::class, 'create'])->name('create');
        Route::post('/create', [expressController::class, 'store'])->name('store');

        Route::get('/update/{id}', [expressController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [expressController::class, 'update'])->name('update');

        Route::get('/delete/{id}', [expressController::class, 'destroy'])->name('destroy');
        Route::delete('/delete/{id}', [expressController::class, 'delete'])->name('delete');
    });

    //PRODUCT-PROPERTY
    Route::prefix('scales')->namespace('Scales')->name('scales.')->middleware(['can:scale.*'])->group(function () {
        Route::get('/', [ScaleController::class, 'index'])->name('index');
        Route::get('/show/{id}', [ScaleController::class, 'show'])->name('show');

        Route::get('/create', [ScaleController::class, 'create'])->name('create');
        Route::post('/create', [ScaleController::class, 'store'])->name('store');

        Route::get('/update/{id}', [ScaleController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [ScaleController::class, 'update'])->name('update');

        Route::get('/delete/{id}', [ScaleController::class, 'destroy'])->name('destroy');
        Route::delete('/delete/{id}', [ScaleController::class, 'delete'])->name('delete');
    });

    Route::prefix('units')->namespace('Units')->name('units.')->middleware(['can:unit.*'])->group(function () {

        Route::get('/', [UnitController::class, 'index'])->name('index');
        Route::get('/show/{id}', [UnitController::class, 'show'])->name('show');
        Route::get('/create', [UnitController::class, 'create'])->name('create');
        Route::post('/create', [UnitController::class, 'store'])->name('store');
        Route::get('/update/{id}', [UnitController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [UnitController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [UnitController::class, 'destroy'])->name('destroy');
        Route::delete('/delete/{id}', [UnitController::class, 'delete'])->name('delete');
    });

    Route::prefix('type-reports')->namespace('Type-reports')->name('type-reports.')->group(function () {

        Route::get('/', [TypeReportController::class, 'index'])->name('index');
        Route::get('/show/{id}', [TypeReportController::class, 'show'])->name('show');

        Route::get('/create', [TypeReportController::class, 'create'])->name('create');
        Route::post('/create', [TypeReportController::class, 'store'])->name('store');

        Route::get('/update/{id}', [TypeReportController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [TypeReportController::class, 'update'])->name('update');

        Route::get('/delete/{id}', [TypeReportController::class, 'destroy'])->name('destroy');
        Route::delete('/delete/{id}', [TypeReportController::class, 'delete'])->name('delete');
    });

    Route::prefix('ad-report')->namespace('Ad-report')->name('ad-report.')->group(function () {

        Route::get('/', [ReportConTroller::class, 'index'])->name('index');
        Route::get('/show/{id}', [ReportController::class, 'show'])->name('show');

        Route::get('/create', [ReportController::class, 'create'])->name('create');
        Route::post('/create', [ReportController::class, 'store'])->name('store');

        Route::get('/update/{id}', [ReportController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [ReportController::class, 'update'])->name('update');

        Route::get('/delete/{id}', [ReportController::class, 'destroy'])->name('destroy');
        Route::delete('/delete/{id}', [ReportController::class, 'delete'])->name('delete');

        Route::get('/access/{id}', [ReportController::class, 'editReport'])->name('edit2');
        Route::patch('/access/{id}', [ReportController::class, 'updateReport'])->name('update2');
    });

    Route::prefix('services')->namespace('Services')->name('services.')->middleware(['can:service.*'])->group(function () {
        Route::get('/', function () {
            return view('admin.services.index');
        })->name('index');
    });
    Route::prefix('profile')->namespace('Profile')->name('profile.')->group(function () {

        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
    });
});

//User: CUSTOMER
Route::prefix('customer')->namespace('Customer')->name('customer.')->middleware(['web', 'auth', 'role:customer|farmer'])->group(function () {

    Route::prefix('cus-report')->namespace('Cus-report')->name('cus-report.')->group(function () {

        Route::get('/', [ReportConTroller::class, 'index'])->name('index');
        Route::get('/show/{id}', [ReportController::class, 'show'])->name('show');

        Route::get('/report/{id}', [ReportController::class, 'createCusReport'])->name('create2');
        Route::post('/report', [ReportController::class, 'storeCusReport'])->name('store2');
    });

    Route::prefix('user')->namespace('User')->name('user.')->middleware(['can:account.*'])->group(function () {

        Route::get('/', function () {
            return view('customer.user.profile');
        })->name('profile');
        Route::get('/update/{id}', [UserController::class, 'editProfileUser'])->name('edit-profile');
        Route::patch('/update/{id}', [UserController::class, 'updateProfile'])->name('update-profile');

        Route::get('/register-seller', function () {
            return view('customer.user.register-seller');
        })->name('register-seller');

        Route::post('/register-seller', [UserController::class, 'registerSeller'])->name('register');
    });
    Route::prefix('orders')->namespace('Orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'customer_order'])->name('index');
        Route::get('/cancel/{id}', [OrderController::class, 'cancel'])->name('cancel');
        Route::post('/store/{id}', [OrderController::class, 'store'])->name('store-order');
        Route::get('/complete/{id}', [OrderController::class, 'update_complete'])->name('update_complete');
    });
    Route::prefix('cart')->namespace('Cart')->name('cart.')->group(function () {

        Route::get('/add-cart/{id}', [CartController::class, 'addCart'])->name('addcart');
        Route::get('/update-cart/{id}', [CartController::class, 'saveCart'])->name('updatecart');
        Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('deletecart');
        Route::post('/update-all', [CartController::class, 'updateAll'])->name('updateall');
        Route::get('/', [CartController::class, 'showCart'])->name('showcart');
        Route::get('/checkout/{id}', [OrderController::class, 'index'])->name('checkout');
    });
});