<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AplicationController;
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
Route::get('/', [CourseController::class, "index"] );

Route::get("/signin", [HomeController::class,"indexReg"]);
Route::post("/signin-valid", [HomeController::class,"registration"]);

Route::get("/signup", [HomeController::class,"indexLogin"]);
Route::post("/signup-valid", [HomeController::class,"login"]);

Route::post("/enroll",[AplicationController::class,"new_aplication" ]);

Route::get("/admin",[AdminController::class,"index"]);

Route::get("/aplication/{id_aplication}/confirm",[AplicationController::class,"confirm"]);

Route::post("/course/create",[CourseController::class,"create"]);
Route::post("/category/create",[CategoryController::class,"create_category"]);

Route::get('/course/{course}', [CourseController::class, 'course']);

// Route::get('/register', function(){
//     return view('registr');
// } );
// Route::get('/login', function(){
//     return view('login');
// } );
