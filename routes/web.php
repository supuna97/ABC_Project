<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

use App\Http\Controllers\OrderController;

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

/* route details */
Route::get('/', 'App\Http\Controllers\Client\DashboardController@index');

Auth::routes();

Route::get('welcome', 'App\Http\Controllers\Client\DashboardController@index')->name('welcome')->middleware('role:'. User::CLIENTS);



// Super Admin Routes

Route::get('superadmin/index', 'App\Http\Controllers\SuperAdminPortal\SuperAdminController@index')->name('index')->middleware('role:'. User::SUPERADMIN);

Route::get('superadmin/superadmin-admin', 'App\Http\Controllers\SuperAdminPortal\AdminController@index')->name('index')->middleware('role:'. User::SUPERADMIN);

Route::get('superadmin/superadmin-salesmanager', 'App\Http\Controllers\SuperAdminPortal\SalesManagerController@index')->name('index')->middleware('role:'. User::SUPERADMIN);

Route::get('superadmin/superadmin-operationmanager', 'App\Http\Controllers\SuperAdminPortal\OperationManagerController@index')->name('index')->middleware('role:'. User::SUPERADMIN);


// super admin --- admin section

Route::post('superadmin/save-admin', 'App\Http\Controllers\SuperAdminPortal\AdminController@store'); // Create Admin

Route::delete('superadmin/delete-admin/{id}', 'App\Http\Controllers\SuperAdminPortal\AdminController@destroy'); //Delete Admin

Route::get('superadmin/edit-admin', 'App\Http\Controllers\SuperAdminPortal\AdminController@edit_admin'); // Edit Admin

Route::post('superadmin/update-admin','App\Http\Controllers\SuperAdminPortal\AdminController@update_admin'); //Update Admin


// super admin --- operation manager section

Route::post('superadmin/save-operationmanager', 'App\Http\Controllers\SuperAdminPortal\OperationManagerController@store'); // Create operationmanager

Route::delete('superadmin/delete-operationmanager/{id}', 'App\Http\Controllers\SuperAdminPortal\OperationManagerController@destroy'); //Delete operationmanager

Route::get('superadmin/edit-operationmanager', 'App\Http\Controllers\SuperAdminPortal\OperationManagerController@edit_operationmanager'); // Edit operationmanager

Route::post('superadmin/update-operationmanager','App\Http\Controllers\SuperAdminPortal\OperationManagerController@update_operationmanager'); //Update operationmanager


// super admin --- sales manager section

Route::post('superadmin/save-salesmanager', 'App\Http\Controllers\SuperAdminPortal\SalesManagerController@store'); // Create salesmanager

Route::delete('superadmin/delete-salesmanager/{id}', 'App\Http\Controllers\SuperAdminPortal\SalesManagerController@destroy'); //Delete salesmanager

Route::get('superadmin/edit-salesmanager', 'App\Http\Controllers\SuperAdminPortal\SalesManagerController@edit_salesmanager'); // Edit salesmanager

Route::post('superadmin/update-salesmanager','App\Http\Controllers\SuperAdminPortal\SalesManagerController@update_salesmanager'); //Update salesmanager


// Admin Routes

Route::get('admin/index', 'App\Http\Controllers\AdminPortal\AdminController@index')->name('index')->middleware('role:'. User::ADMIN);

Route::get('admin/admin-productcategory', 'App\Http\Controllers\AdminPortal\ProductCategoryController@index')->name('index')->middleware('role:'. User::ADMIN);

Route::get('admin/admin-item', 'App\Http\Controllers\AdminPortal\ItemController@index')->name('index')->middleware('role:'. User::ADMIN);


// Admin  -- product category section

Route::post('admin/save-productcategory', 'App\Http\Controllers\AdminPortal\ProductCategoryController@store'); // Create productcategory

Route::delete('admin/delete-productcategory/{id}', 'App\Http\Controllers\AdminPortal\ProductCategoryController@destroy'); //Delete productcategory

Route::get('admin/edit-productcategory', 'App\Http\Controllers\AdminPortal\ProductCategoryController@edit_productcategory'); // Edit productcategory

Route::post('admin/update-productcategory','App\Http\Controllers\AdminPortal\ProductCategoryController@update_productcategory'); //Update productcategory


// Admin  -- item section

Route::post('admin/save-item', 'App\Http\Controllers\AdminPortal\ItemController@store'); // Create item

Route::delete('admin/delete-item/{id}', 'App\Http\Controllers\AdminPortal\ItemController@destroy'); //Delete item

Route::get('admin/edit-item', 'App\Http\Controllers\AdminPortal\ItemController@edit_item'); // Edit item

Route::post('admin/update-item','App\Http\Controllers\AdminPortal\ItemController@update_item'); //Update item



// Operation Manager Routes

Route::get('operationmanager/index', 'App\Http\Controllers\OperationManagerPortal\OperationManagerController@index')->name('index')->middleware('role:'. User::OM);

Route::get('operationmanager/om-productcategory', 'App\Http\Controllers\OperationManagerPortal\ProductCategoryController@index')->name('index')->middleware('role:'. User::OM);

Route::get('operationmanager/om-item', 'App\Http\Controllers\OperationManagerPortal\ItemController@index')->name('index')->middleware('role:'. User::OM);


// Operation Manager  -- product category section

Route::post('operationmanager/save-productcategory', 'App\Http\Controllers\OperationManagerPortal\ProductCategoryController@store'); // Create productcategory

Route::delete('operationmanager/delete-productcategory/{id}', 'App\Http\Controllers\OperationManagerPortal\ProductCategoryController@destroy'); //Delete productcategory

Route::get('operationmanager/edit-productcategory', 'App\Http\Controllers\OperationManagerPortal\ProductCategoryController@edit_productcategory'); // Edit productcategory

Route::post('operationmanager/update-productcategory','App\Http\Controllers\OperationManagerPortal\ProductCategoryController@update_productcategory'); //Update productcategory


// Operation Manager  -- item section

Route::post('operationmanager/save-item', 'App\Http\Controllers\OperationManagerPortal\ItemController@store'); // Create item

Route::delete('operationmanager/delete-item/{id}', 'App\Http\Controllers\OperationManagerPortal\ItemController@destroy'); //Delete item

Route::get('operationmanager/edit-item', 'App\Http\Controllers\OperationManagerPortal\ItemController@edit_item'); // Edit item

Route::post('operationmanager/update-item','App\Http\Controllers\OperationManagerPortal\ItemController@update_item'); //Update item


// Sales Manager Routes

Route::get('salesmanager/index', 'App\Http\Controllers\SalesManagerPortal\SalesManagerController@index')->name('index')->middleware('role:'. User::SM);

Route::get('salesmanager/sm-dailysales-item', 'App\Http\Controllers\SalesManagerPortal\DailySalesItemController@index')->name('index')->middleware('role:'. User::SM);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Cart Section

Route::get('/add-to-cart/{item}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add')->middleware('role:'. User::CLIENTS);

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index')->middleware('role:'. User::CLIENTS);

Route::get('/cart/destroy/{itemId}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy')->middleware('role:'. User::CLIENTS);

Route::get('/cart/update/{rowId}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update')->middleware('role:'. User::CLIENTS);

Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout')->middleware('role:'. User::CLIENTS);


// Order Setion

Route::resource('orders',OrderController::class)->middleware('role:'. User::CLIENTS);