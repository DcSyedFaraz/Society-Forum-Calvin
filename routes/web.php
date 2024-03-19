<?php

// use App\Http\Controllers\CommunityController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\FileCabinetController;
use App\Http\Controllers\real_estate\EstateController;
use Illuminate\Support\Facades\Route;
// Admin Dashboard
use App\Http\Controllers\Admin\DashboardController;
// users Dashboard
use App\Http\Controllers\User\DashboardController as UserDashboardController;

// Admin modules
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TransactionsController as AdminTransactionsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\GamesController;
use App\Http\Controllers\voting\PostController as VotingPostController;
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

Route::get('/done', function () {
    Artisan::call('migrate:fresh --seed');
    Artisan::call('optimize:clear');

    return 'done';
});
Route::middleware(['check.auth',])->group(function () {
    Auth::routes();

    Route::get('/signup', [RegisterController::class, 'register_form'])->name('signup');
    Route::get('/agentsignup', [RegisterController::class, 'agent_register_form'])->name('agentsignup');
    Route::post('/agentregisteration', [RegisterController::class, 'agent_registeration'])->name('agentregisteration');
    Route::post('/executive_registration', [RegisterController::class, 'executive_registration'])->name('executive_registration');
    Route::get('/estate_login', [HomeController::class, 'estate_login'])->name('estate_login');
    Route::get('/executive_login', [HomeController::class, 'executive_login'])->name('executive_login');
    Route::get('/estate-signup', [HomeController::class, 'estate_signup'])->name('estate_signup');
    Route::get('/executive-signup', [HomeController::class, 'executive_signup'])->name('executive_signup');
});

Route::post('/mark-as-read/{id}', [DashboardController::class, 'markasread'])->name('markasread');
Route::get('/waiting', [DashboardController::class, 'waiting'])->name('waiting');


Route::get('logout', [LoginController::class, 'logout']);
Route::get('account/verify/{token}', [LoginController::class, 'verifyAccount'])->name('user.verify');

Route::post('/registeration', [RegisterController::class, 'registeration'])->name('registeration');
// Route::post('/estate_registration', [RegisterController::class, 'estate_registration'])->name('estate_registration');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about_us');
Route::get('/realstate', [HomeController::class, 'realstate'])->name('realstate');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/community-forum', [HomeController::class, 'community_forum'])->name('community_forum');
Route::get('/contact', [HomeController::class, 'contact_us'])->name('contact');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {

    Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [DashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Announcements
    Route::get('/announcements', [DashboardController::class, 'announcements'])->name('announcements');
    Route::post('/announcements', [DashboardController::class, 'announcementSave'])->name('announcements.save');
    Route::delete('/announcement/delete/{announcement}', [DashboardController::class, 'announcementDelete'])->name('announcement.delete');

    // Property Request
    Route::get('/request', [DashboardController::class, 'request'])->name('request');
    Route::get('/request/accept/{id}', [DashboardController::class, 'request_approved'])->name('property.approved');
    Route::get('/request/decline/{id}', [DashboardController::class, 'request_decline'])->name('property.decline');
    // Artchitectural Request
    Route::get('/artchitectural', [DashboardController::class, 'artchitectural'])->name('artchitectural');
    Route::get('/artchitectural/accept/{id}', [DashboardController::class, 'artchitectural_approved'])->name('artchitectural.approved');
    Route::get('/artchitectural/decline/{id}', [DashboardController::class, 'artchitectural_decline'])->name('artchitectural.decline');
    //User Request
    Route::get('/User/accept/{id}', [DashboardController::class, 'User_approved'])->name('User.approved');
    Route::get('/User/decline/{id}', [DashboardController::class, 'User_decline'])->name('User.decline');

    // Community
    // Route::get('/community', [CommunityController::class, 'community'])->name('community');
    Route::resource('community', CommunityController::class);
    // File Cabinet
    Route::get('/contracts', [FileCabinetController::class, 'contracts'])->name('contracts');
    Route::get('/legal_info', [FileCabinetController::class, 'legal_info'])->name('legal_info');
    Route::get('/report', [FileCabinetController::class, 'report'])->name('report');
    Route::get('/minutes', [FileCabinetController::class, 'minutes'])->name('minutes');
    Route::get('/newsletter', [FileCabinetController::class, 'newsletter'])->name('newsletter');
    Route::get('/financial', [UserDashboardController::class, 'financial'])->name('financial');
    Route::get('/lost-found', [FileCabinetController::class, 'lostfound'])->name('lostfound');
    Route::get('/ccnrs', [FileCabinetController::class, 'ccnrs'])->name('ccnrs');

    Route::resource('roles', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.index');
    // Storage
    Route::get('/document', [DashboardController::class, 'document'])->name('document');
    Route::get('/signature', [DashboardController::class, 'signature'])->name('signature');

    Route::post('profile/update', [DashboardController::class, 'update'])->name('profile.update');
    Route::post('wallet/create/withdraw', [DashboardController::class, 'createdewithdraw'])->name('admin.wallet.create.withdraw');
    Route::get('wallet/withdraw/{id}', [DashboardController::class, 'walletwithdraw'])->name('admin.wallet.withdraw');
    Route::post('wallet/create/deposite', [DashboardController::class, 'createdeposite'])->name('admin.wallet.store');
    Route::get('wallet/deposite/{id}', [DashboardController::class, 'walletdeposit'])->name('admin.wallet.deposit');
    Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
    // Games Type






});

Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth', 'role:member', 'check.access']], function () {

    Route::get('/announcements', [DashboardController::class, 'announcements'])->name('announcements');
    Route::get('/architectural', [DashboardController::class, 'architectural'])->name('architectural');
    Route::post('/architectural', [DashboardController::class, 'architecturalSave'])->name('architectural.save');
    Route::get('/forum', [DashboardController::class, 'forum'])->name('forum');

    // File Cabinet
    Route::get('/lost-found', [FileCabinetController::class, 'lostfound'])->name('lostfound');
    Route::get('/ccnrs', [FileCabinetController::class, 'ccnrs'])->name('ccnrs');
    Route::get('/newsletter', [FileCabinetController::class, 'newsletter'])->name('newsletter');

    Route::get('/dashboard', [UserDashboardController::class, 'member'])->name('dashboard');
    Route::get('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [UserDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('member.profile');
    Route::post('/update/profile', [UserDashboardController::class, 'UserProfileUpdate'])->name('member.profile.update');
    Route::post('/edit/profile', [UserDashboardController::class, 'UserEditProfile'])->name('member.edit.profile');
    Route::post('/bank/detail', [UserDashboardController::class, 'UserBankDetail'])->name('member.bank.detail');
});

Route::group(['prefix' => 'real_estate', 'as' => 'agent.', 'middleware' => ['auth', 'role:agent', 'check.access']], function () {

    Route::get('/dashboard', [UserDashboardController::class, 'realstate'])->name('dashboard');
    Route::get('/register', [EstateController::class, 'register'])->name('register');
    Route::get('/list', [EstateController::class, 'list'])->name('list');
    Route::post('/list', [EstateController::class, 'listSave'])->name('list.save');

    Route::get('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [UserDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('real_estate.profile');
    Route::post('/update/profile', [UserDashboardController::class, 'UserProfileUpdate'])->name('real_estate.profile.update');
    Route::post('/edit/profile', [UserDashboardController::class, 'UserEditProfile'])->name('real_estate.edit.profile');
    Route::post('/bank/detail', [UserDashboardController::class, 'UserBankDetail'])->name('real_estate.bank.detail');

});

Route::group(['prefix' => 'executive', 'as' => 'executive.', 'middleware' => ['auth', 'role:executive', 'check.access']], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/announcements', [DashboardController::class, 'announcements'])->name('announcements');

    // File Cabinet
    Route::get('/contracts', [FileCabinetController::class, 'contracts'])->name('contracts');
    Route::get('/legal_info', [FileCabinetController::class, 'legal_info'])->name('legal_info');
    Route::get('/report', [FileCabinetController::class, 'report'])->name('report');
    Route::get('/minutes', [FileCabinetController::class, 'minutes'])->name('minutes');
    Route::get('/newsletter', [FileCabinetController::class, 'newsletter'])->name('newsletter');
    Route::get('/financial', [UserDashboardController::class, 'financial'])->name('financial');
    Route::get('/lost-found', [FileCabinetController::class, 'lostfound'])->name('lostfound');
    Route::get('/ccnrs', [FileCabinetController::class, 'ccnrs'])->name('ccnrs');

    Route::get('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [UserDashboardController::class, 'store_change_password'])->name('store_change_password');

    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [UserDashboardController::class, 'UserProfileUpdate'])->name('profile.update');
    Route::post('/edit/profile', [UserDashboardController::class, 'UserEditProfile'])->name('edit.profile');
    Route::post('/bank/detail', [UserDashboardController::class, 'UserBankDetail'])->name('bank.detail');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {

    Route::get('/change_password', [UserDashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [UserDashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

    //post
    //user Profile
    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('voting.profile');
    Route::post('/update/profile', [UserDashboardController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::post('/edit/profile', [UserDashboardController::class, 'UserEditProfile'])->name('user.edit.profile');
    Route::post('/bank/detail', [UserDashboardController::class, 'UserBankDetail'])->name('user.bank.detail');


});
