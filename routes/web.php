<?php

use Illuminate\Support\Facades\Route;
// Admin Dashboard
use App\Http\Controllers\Admin\DashboardController;
// users Dashboard
use App\Http\Controllers\User\DashboardController as UserDashboardController;
// users panel modules
use App\Http\Controllers\users\DepositWalletController;
use App\Http\Controllers\users\DepositController;
use App\Http\Controllers\users\RedeemController;
use App\Http\Controllers\users\GiftCardController;
use App\Http\Controllers\users\LinkGameController;
use App\Http\Controllers\users\RequestController;
use App\Http\Controllers\users\TransactionsController;
use App\Http\Controllers\users\WithdrawController;
// Admin modules
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TransactionsController as AdminTransactionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\voting\PostController as VotingPostController;
use App\Http\Controllers\nonvoting\PostController as NonVotingPostController;
use App\Http\Controllers\GeneralSettingController;
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
Route::get('/signup', [RegisterController::class, 'register_form'])->name('signup');
Route::post('/registeration', [RegisterController::class, 'registeration'])->name('registeration');
Route::get('/agentsignup', [RegisterController::class, 'agent_register_form'])->name('agentsignup');
Route::post('/agentregisteration', [RegisterController::class, 'agent_registeration'])->name('agentregisteration');
Route::get('logout', [LoginController::class, 'logout']);
Route::get('account/verify/{token}', [LoginController::class, 'verifyAccount'])->name('user.verify');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// Route::get('/', [HomeController::class,'login']);
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about-us', [HomeController::class,'about_us'])->name('about_us');
Route::get('/realstate', [HomeController::class,'realstate'])->name('realstate');
Route::get('/gallery', [HomeController::class,'gallery'])->name('gallery');
Route::get('/community-forum', [HomeController::class,'community_forum'])->name('community_forum');
Route::get('/contact', [HomeController::class,'contact_us'])->name('contact');


Route::group(['prefix' => 'admin','middleware'=> ['auth']], function(){

    Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [DashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.index');
   // Storage
   Route::get('/document', [DashboardController::class, 'document'])->name('document');
   Route::get('/signature', [DashboardController::class, 'signature'])->name('signature');

    Route::post('profile/update', [DashboardController::class, 'update'])->name('profile.update');
    Route::resource('general_setting',GeneralSettingController::class);
    Route::post('wallet/create/withdraw', [DashboardController::class, 'createdewithdraw'])->name('admin.wallet.create.withdraw');
    Route::get('wallet/withdraw/{id}', [DashboardController::class, 'walletwithdraw'])->name('admin.wallet.withdraw');
    Route::post('wallet/create/deposite', [DashboardController::class, 'createdeposite'])->name('admin.wallet.store');
    Route::get('wallet/deposite/{id}', [DashboardController::class, 'walletdeposit'])->name('admin.wallet.deposit');
    Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
    // Games Type
    Route::resource('games', GamesController::class);
    Route::get('/transactions/deposit', [AdminTransactionsController::class, 'transaction_deposit'])->name('transactions.deposit');
    Route::put('/deposit/approved/{id}', [AdminTransactionsController::class, 'deposit_approved'])->name('deposit.approved');


    Route::get('/transactions/redeems', [AdminTransactionsController::class, 'transaction_redeems'])->name('transactions.redeems');
    Route::put('/redeems/approved/{id}', [AdminTransactionsController::class, 'redeems_approved'])->name('redeems.approved');


    Route::get('/transactions/withdrawals', [AdminTransactionsController::class, 'transaction_withdrawals'])->name('transactions.withdrawals');
    Route::put('withdrawals/approved/{id}', [AdminTransactionsController::class, 'withdrawal_approved'])->name('withdraw.approved');


});
Auth::routes();
Route::group(['prefix' => 'user','middleware'=> ['auth']], function(){

    Route::get('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [UserDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    //post
    Route::get('/blogs', [VotingPostController::class, 'index'])->name('user.blogs');
    //user Profile
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('voting.profile');
    Route::post('/update/profile', [UserDashboardController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::post('/edit/profile', [UserDashboardController::class, 'UserEditProfile'])->name('user.edit.profile');
    Route::post('/bank/detail', [UserDashboardController::class, 'UserBankDetail'])->name('user.bank.detail');


});

Route::group(['prefix' => 'member','middleware'=> ['auth']], function(){

    Route::get('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [UserDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('member.dashboard');
    Route::get('/blogs', [VotingPostController::class, 'index'])->name('member.blogs');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('member.profile');
    Route::post('/update/profile', [UserDashboardController::class, 'UserProfileUpdate'])->name('member.profile.update');
    Route::post('/edit/profile', [UserDashboardController::class, 'UserEditProfile'])->name('member.edit.profile');
    Route::post('/bank/detail', [UserDashboardController::class, 'UserBankDetail'])->name('member.bank.detail');
});

Route::group(['prefix' => 'real_estate','middleware'=> ['auth']], function(){

    Route::get('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [UserDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('real_estate.dashboard');
    Route::get('/blogs', [VotingPostController::class, 'index'])->name('real_estate.blogs');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('real_estate.profile');
    Route::post('/update/profile', [UserDashboardController::class, 'UserProfileUpdate'])->name('real_estate.profile.update');
    Route::post('/edit/profile', [UserDashboardController::class, 'UserEditProfile'])->name('real_estate.edit.profile');
    Route::post('/bank/detail', [UserDashboardController::class, 'UserBankDetail'])->name('real_estate.bank.detail');

});

Route::group(['prefix' => 'excutive','middleware'=> ['auth']], function(){
    Route::get('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [UserDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('excutive.dashboard');
    Route::get('/blogs', [VotingPostController::class, 'index'])->name('excutive.blogs');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('excutive.profile');
    Route::post('/update/profile', [UserDashboardController::class, 'UserProfileUpdate'])->name('excutive.profile.update');
    Route::post('/edit/profile', [UserDashboardController::class, 'UserEditProfile'])->name('excutive.edit.profile');
    Route::post('/bank/detail', [UserDashboardController::class, 'UserBankDetail'])->name('excutive.bank.detail');
});


