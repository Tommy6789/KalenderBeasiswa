<?php

use App\Http\Controllers\BenuaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KalenderBeasiswaController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\TingkatStudiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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

Route::get('/', function () {
  return view('frontend.home');
});

//Login, Register, Logout
Route::resource('login', LoginController::class);
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('login_check', [LoginController::class, 'login_check'])->name('login_check'); //validate the email and paswword that was inputed
Route::get('logout', [LoginController::class, 'logout'])->name('logout'); //loging out the account that currently used

//Login, Register, Logout Subscriber
Route::get('subscriber_login', [LoginController::class, 'subscriber_login'])->name('subscriber_login');
Route::get('subscriber_register', [LoginController::class, 'subscriber_register'])->name('subscriber_register');
Route::post('subscriber_store', [LoginController::class, 'subscriber_store'])->name('subscriber_store');
Route::post('subscriber_check', [loginController::class, 'subscriber_check'])->name('subscriber_check'); //validate the email and paswword that was inputed
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//Route frontend
Route::get('home', [FrontendController::class, 'home'])->name('home');
Route::get('kalender', [FrontendController::class, 'kalender'])->name('kalender');
Route::get('detail/{id}', [FrontendController::class, 'detail'])->name('detail');
Route::get('/filter', [FrontendController::class, 'filter'])->name('beasiswa.filter');
Route::get('/register/{id}', [FrontendController::class, 'daftarBeasiswa'])->name('daftar_beasiswa');

Route::group(['middleware' => 'auth'], function () {
  //Proposal
  Route::resource('proposal', ProposalController::class,);
  Route::get('/proposal', [ProposalController::class, 'index'])->name('frontend.proposal');
  Route::post('/proposal', [ProposalController::class, 'store'])->name('proposal.store');

  //Wishlist
  Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
  Route::post('/wishlist_store', [WishlistController::class, 'store'])->name('wishlist.store');
  Route::delete('/wishlist_remove/{id}', [WishlistController::class, 'destroy'])->name('wishlist.remove');
  Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');

  //kalender
  Route::resource('kalenderBeasiswa', KalenderBeasiswaController::class);
  Route::resource('tingkatStudi', TingkatStudiController::class);
  Route::resource('user', UserController::class);
  Route::resource('levelUser', LevelUserController::class);
  Route::resource('negara', NegaraController::class);
  Route::resource('benua', BenuaController::class);

  // Route untuk halaman pending
  Route::get('/pending_kalender', [KalenderBeasiswaController::class, 'pendingKalender'])->name('pendingKalender');
  //Accpet
  Route::patch('/kalenderBeasiswa/{id}/accept', [KalenderBeasiswaController::class, 'accept'])->name('kalenderBeasiswa.accept');

  // Route soft delete, restore, and force delete for Kalender Beasiswa
  Route::get('kbeasiswa_softDelete', [KalenderBeasiswaController::class, 'softDelete'])->name('kbeasiswa_softDelete');
  Route::post('kalenderBeasiswa/restore/{id}', [KalenderBeasiswaController::class, 'restore'])->name('kbeasiswa_restore');
  Route::delete('kalenderBeasiswa/forceDelete/{id}', [KalenderBeasiswaController::class, 'forceDelete'])->name('kbeasiswa_forceDelete');

  // Route soft delete, restore, and force delete for Tingkat Studi
  Route::get('tingkatStudi_softDelete', [TingkatStudiController::class, 'softDelete'])->name('tingkatStudi_softDelete');
  Route::post('tingkatStudi/restore/{id}', [TingkatStudiController::class, 'restore'])->name('tingkatStudi_restore');
  Route::delete('tingkatStudi/forceDelete/{id}', [TingkatStudiController::class, 'forceDelete'])->name('tingkatStudi_forceDelete');

  // Route soft delete, restore, and force delete for Negara
  Route::get('negara_softDelete', [NegaraController::class, 'softDelete'])->name('negara_softDelete');
  Route::post('negara/restore/{id}', [NegaraController::class, 'restore'])->name('negara_restore');
  Route::delete('negara/forceDelete/{id}', [NegaraController::class, 'forceDelete'])->name('negara_forceDelete');

  // Route soft delete, restore, and force delete for Benua
  Route::get('benua.softDelete', [BenuaController::class, 'softDelete'])->name('benua.softDelete');
  Route::post('benua/restore/{id}', [BenuaController::class, 'restore'])->name('benua.restore');
  Route::delete('benua/forceDelete/{id}', [BenuaController::class, 'forceDelete'])->name('benua.forceDelete');

  // Route soft delete, restore, and force delete for User
  Route::get('user_softDelete', [UserController::class, 'softDelete'])->name('user_softDelete');
  Route::post('user/restore/{id}', [UserController::class, 'restore'])->name('user_restore');
  Route::delete('user/forceDelete/{id}', [UserController::class, 'forceDelete'])->name('user_forceDelete');

  // Route soft delete, restore, and force delete for Level User
  Route::get('levelUser_softDelete', [LevelUserController::class, 'softDelete'])->name('levelUser_softDelete');
  Route::post('levelUser/restore/{id}', [LevelUserController::class, 'restore'])->name('levelUser_restore');
  Route::delete('levelUser/forceDelete/{id}', [LevelUserController::class, 'forceDelete'])->name('levelUser_forceDelete');
});
