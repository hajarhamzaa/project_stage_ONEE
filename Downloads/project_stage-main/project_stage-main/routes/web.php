<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    ProfileController,
    MailSettingController,
    TicketController,
    HistoriqueController
};
use Illuminate\Support\Facades\Auth;

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


Route::get('/test-mail',function(){

    $message = "Testing mail";

    \Mail::raw('Hi, welcome!', function ($message) {
      $message->to('ismailbaby32@gmail.com')
        ->subject('Testing mail');
    });

    dd('sent');

});


Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['front'])->name('dashboard');


require __DIR__.'/front_auth.php';

// Admin routes
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

require __DIR__.'/auth.php';




Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function(){
        Route::resource('roles','RoleController');
        Route::resource('permissions','PermissionController');
        Route::resource('users','UserController');
        Route::resource('intervenants','TicketController');
        Route::resource('detailsTickets','DetailsTickets');
        Route::resource('historiqueDemandes','HistoriqueController');
        Route::resource('demanderTickets','DemanderTickets');
        Route::resource('finaliserTicket','FinaliserController');
        Route::resource('posts','PostController');
        Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::get('/setting/historique', [HistoriqueController::class, 'index'])->name('setting.historique.index');
        Route::put('/profile-update',[ProfileController::class,'update'])->name('profile.update');
        Route::get('/mail',[MailSettingController::class,'index'])->name('mail.index');
        Route::put('/mail-update/{mailsetting}',[MailSettingController::class,'update'])->name('mail.update');
        Route::put('admin/intervenants/{intervenant}', [TicketController::class, 'modife'])->name('intervenants.modife');
        Route::put('admin/historiqueDemandes/{historiqueDemande}/edit', [HistoriqueController::class, 'update'])->name('historiqueDemandes.update');
    });

