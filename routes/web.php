<?php

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",[Homecontroller::class,"index"]);
Route::get("/redirects",[Homecontroller::class,"redirect"]);
Route::get("/users",[Admincontroller::class,"user"]);
Route::get("/deleteuser/{id}",[Admincontroller::class,"deleteuser"]);
Route::get("/foodmenu",[Admincontroller::class,"foodmenu"]);
Route::post("/uploadfood",[Admincontroller::class,"upload"]);
Route::get("/deletefood/{id}",[Admincontroller::class,"deletefood"]);
Route::get("/updatefood/{id}",[Admincontroller::class,"updatefood"]);
Route::post("/editfood/{id}",[Admincontroller::class,"editfood"]);

Route::post("/reservation",[Admincontroller::class,"reservation"]);
Route::get("/viewfoodreserve",[Admincontroller::class,"viewfoodreserve"]);

Route::get("/addcheif",[Admincontroller::class,"addcheif"]);
Route::post("/uploadcheif",[Admincontroller::class,"uploadcheif"]);
Route::get("/deletecheif/{id}",[Admincontroller::class,"deletecheif"]);
Route::get("/updatecheif/{id}",[Admincontroller::class,"updatecheif"]);
Route::post("/editcheif/{id}",[Admincontroller::class,"editcheif"]);

Route::post("/addcart/{id}",[Homecontroller::class,"addcart"]);
Route::get("/showcart/{id}",[Homecontroller::class,"showcart"]);


Route::get("/deleteproduct/{id}",[Homecontroller::class,"deleteproduct"]);
Route::post("/orderconfirm",[Homecontroller::class,"orderconfirm"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
