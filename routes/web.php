<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AmenitieController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\ExcelDateController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/// admin group middleware
Route::middleware(['auth','role:admin'])->group(function(){

    ///GET
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    ///POST
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    
});

Route::middleware(['auth','role:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::middleware(['auth','role:admin'])->group(function(){

    ///Property type  All Route
    
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
    });

    
    ///Amenetie  All Route
    Route::controller(AmenitieController::class)->group(function(){
        Route::get('/all/amenities', 'AllAmenities')->name('all.amenities');
        Route::get('/add/amenities', 'AddAmenities')->name('add.amenities');
        Route::post('/store/amenities', 'StoreAmenities')->name('store.amenities');
        Route::get('/edit/amenities/{id}', 'EditAmenities')->name('edit.amenities');
        Route::post('/update/amenities', 'UpdateAmenities')->name('update.amenities');
        Route::get('/delete/amenities/{id}', 'DeleteAmenities')->name('delete.amenities');
    });
    ///Permission  All Route
    Route::controller(RoleController::class)->group(function(){
    Route::get('/all/permission', 'AllPermission')->name('all.permission');
    Route::get('/add/permission', 'AddPermission')->name('add.permission');
    Route::post('/store/permission', 'StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
    Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
    Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
    });
    ///Role all Route 
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/role', 'AllRole')->name('all.role');
        Route::get('/add/role', 'AddRole')->name('add.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');
    });
    ///Role in Permission
    Route::controller(RoleController::class)->group(function(){
    Route::get('/all/role/permission', 'AllRolePermission')->name('all.role.permission');
    Route::get('/add/role/permission', 'AddRolePermission')->name('add.role.permission');
    Route::post('/store/role/permission', 'StoreRolePermission')->name('store.role.permission');
    Route::get('/admin/edit/role/{id}', 'EditRolePermission')->name('admin.edit.role');
    Route::post('/admin/roles/update/{id}', 'UpdateRolePermission')->name('admin.role.update');
    Route::get('/delete/role/permission/{id}', 'DeleteRolePermission')->name('admin.role.delete');
    });

    ///Excel  All Route
    Route::controller(ExcelDateController::class)->group(function(){
    Route::get('/export', 'ExportPermission')->name('export.permission');
    Route::get('/import/permission', 'ImportPermission')->name('import.permission');
    Route::post('/import', 'Import')->name('import');

    });


    ///All User Route
    Route::controller(AdminController::class)->group(function(){
    Route::get('/all/admin', 'AllAdmin')->name('all.admin');
    Route::get('/add/admin', 'AddAdmin')->name('add.admin');
    Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
    Route::get('/admin/edit/{id}', 'EditAdmin')->name('admin.edit');
    Route::post('/admin/update/{id}', 'UpdateAdmin')->name('update.admin');
    Route::get('/admin/delete/{id}', 'DeleteAdmin')->name('admin.delete');


    
    });
    
});