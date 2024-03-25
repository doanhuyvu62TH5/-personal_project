//
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
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
    return view('home');
})->name('home');
 
Route::get('/about', [UserController::class, 'about'])->name('about');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
});
 
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
 
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');
    
    Route::get('/admin/authors', [AuthorController::class, 'index'])->name('admin/authors');
    Route::get('/admin/authors/create', [AuthorController::class, 'create'])->name('admin/authors/create');
    Route::post('/admin/authors/store', [AuthorController::class, 'store'])->name('admin/authors/store');
    Route::get('/admin/authors/show/{id}', [AuthorController::class, 'show'])->name('admin/authors/show');
    Route::get('/admin/authors/edit/{id}', [AuthorController::class, 'edit'])->name('admin/authors/edit');
    Route::put('/admin/authors/edit/{id}', [AuthorController::class, 'update'])->name('admin/authors/update');
    Route::delete('/admin/authors/destroy/{id}', [AuthorController::class, 'destroy'])->name('admin/authors/destroy');
});