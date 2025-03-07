<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\CategoryController;


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

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/families/create', [FamilyController::class, 'create'])->name('families.create')->middleware('auth');
Route::get('/families', [FamilyController::class, 'index'])->name('families.index')->middleware('auth');
Route::post('/families', [FamilyController::class, 'store'])->name('families.store')->middleware('auth');
Route::get('/families/{family}', [FamilyController::class, 'show'])->name('families.show')->middleware('auth');
Route::get('/families/{family}/manage', [FamilyController::class, 'manage'])->name('families.manage')->middleware('auth');
Route::delete('/families/{family}', [FamilyController::class, 'destroy'])->name('families.destroy')->middleware('auth');
Route::post('/families/{family}/generateInvitation', [FamilyController::class, 'generateInvitation'])->name('families.generateInvitation')->middleware('auth');
Route::get('/invitations/{code}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');


Route::resource('revenues', RevenueController::class);

Route::resource('expenses', ExpenseController::class);

Route::resource('goals', GoalController::class);

Route::resource('categories', CategoryController::class);

Route::post('/optimize', [BudgetController::class, 'optimize'])->name('budget.optimize');
Route::get('/optimize', [BudgetController::class, 'showOptimizationForm'])->name('budget.form')->middleware('auth');
Route::post('/optimize', [BudgetController::class, 'optimize'])->name('budget.optimize')->middleware('auth');