<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\Page\Home\Controllers\HomeController as ClientHomeController;

use App\Http\Controllers\Auth\LoginController;
use Modules\Client\Auth\Controllers\RegisterController;
use Modules\Client\Page\Chat\Controllers\ChatClientController;
use Modules\Client\Page\Facilities\Controllers\FacilitiesController;
use Modules\Client\Page\Contact\Controllers\ContactController;
use Modules\Client\Page\Specialty\Controllers\SpecialtyController;
use Modules\Client\Page\Package\Controllers\PackageController;
use Modules\Client\Page\SearchSchedule\Controllers\SearchScheduleController;
use Modules\Client\Page\AppointmentAtHome\Controllers\AppointmentAtHomeController;
use Modules\Client\Page\Infor\Controllers\InforController;
use Modules\Client\Page\Patient\Controllers\PatientController;
use Modules\Client\Page\Role\Controllers\RoleController;
use Modules\Client\Page\Faq\Controllers\FAQController;
use Modules\Client\Page\About\Controllers\AboutController;

//Dashboard
use Modules\System\Dashboard\Users\Controllers\UserController;
use Modules\Client\Page\MapController;

// use Modules\Client\Page\Home\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', [HomeController::class, 'index']);


Route::get('mapReport',  [MapController::class,'mapReport']);

Route::post('/system/home', [LoginController::class, 'checkLogin'])->name('checkLogin');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/system/login', [LoginController::class, 'logout'])->name('fromLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('register/send-otp/sent_OTP', [UserController::class, 'sent_OTP']);
Route::get('/home', [App\Http\Controllers\ClientHomeController::class, 'index'])->name('home');
Route::get('/', [ClientHomeController::class, 'index']);

// Auth::routes();
Route::prefix('register')->group(function () {
    Route::get('', [RegisterController::class, 'index'])->name('register');
    Route::get('tab1', [RegisterController::class, 'tab1']);
    Route::get('tab2', [RegisterController::class, 'tab2']);
    Route::get('tab3', [RegisterController::class, 'tab3']);
    Route::get('tab4', [RegisterController::class, 'tab4']);
    Route::get('checkEmail', [RegisterController::class, 'checkEmail']);
});

// Auth::routes();
Route::post('client/searchschedule/getFile', [SearchScheduleController::class, 'getFile']);
Route::get('/api/login', [SearchScheduleController::class, 'login']);
Route::get('/api/getTKQ', [SearchScheduleController::class, 'getTKQ']);
Route::get('kq',  [SearchScheduleController::class,'ketquaxetnghiem']);

// Trang chủ
Route::get('/', [ClientHomeController::class, 'index']);
// Route::get('/', [AppointmentAtHomeController::class,'indexApointment']);
// Trang chủ cơ sở bệnh viện
Route::get('/facilities', [FacilitiesController::class, 'index']);
Route::get('/facilities/{code}', [FacilitiesController::class, 'detailIndex']);
Route::get('/schedule/{code}', [FacilitiesController::class, 'schedule']);
Route::get('/schedule/{code}/{idstaff}', [FacilitiesController::class, 'schedule']);
// lịch khám có bác sĩ theo chuyên khoa
Route::get('/scheduleStage/{code}/{physician}', [FacilitiesController::class, 'scheduleStage']);

// dịch vụ tại nhà
Route::get('/appointmentathome/{code}', [AppointmentAtHomeController::class, 'index']);

// Trang chủ cơ sở bệnh viện
Route::get('/package', [PackageController::class, 'index']);

// chuyên khoa
Route::get('/specialty', [SpecialtyController::class, 'index']);
Route::get('/specialty/{code}', [SpecialtyController::class, 'specialty']);

Route::prefix('chat')->group(function () {
    Route::get('/broadcast', [ChatClientController::class, 'broadcast'])->name('broadcast');
    Route::get('/receive', [ChatClientController::class, 'receive'])->name('receive');
    Route::post('/showMessage', [ChatClientController::class, 'showMessage'])->name('showMessage');
});
// Trang chủ contact
Route::get('/contact', [ContactController::class, 'index']);
// trang chủ tra cứu
Route::get('/searchschedule',[SearchScheduleController::class,'index']);
Route::get('/patients',[PatientController::class,'index']);
Route::get('/vai-tro',[RoleController::class,'index']);
Route::get('/lien-he',[ContactController::class,'lien_he']);
Route::get('/faq',[FAQController::class,'index']);

// route phía người dùng
Route::prefix('/client')->group(function () {
        $arrModules = config('menuClient');
            $this->arrModules = $arrModules;
        view()->composer('*', function ($view) {
            $view->with('menuItems', $this->arrModules);
        });
        // Trang chủ client
        Route::prefix('home')->group(function(){
            Route::get('/loadList',[ClientHomeController::class,'loadList']);
            Route::get('/loadListBlog',[ClientHomeController::class,'loadListBlog']);
            Route::get('/loadListTap1',[ClientHomeController::class,'loadListTap1']);
            Route::get('/loadListTop',[ClientHomeController::class,'loadListTop']);
        });

        Route::prefix('infor')->group(function(){
            Route::get('/index', [InforController::class, 'index']);
            Route::post('update', [InforController::class, 'update']);
            Route::post('loadList', [InforController::class, 'loadList']);
            Route::post('updateCustomer', [InforController::class, 'updateCustomer']);
            Route::get('/changePass', [UserController::class,'changePass']);
            Route::post('/updatePass', [UserController::class,'updatePass']);
        });
        Route::prefix('project')->group(function () {
            Route::get('/index', [AboutController::class, 'index']);
            Route::get('/loadListTHTT', [AboutController::class, 'loadListTHTT']);
            Route::prefix('/session')->group(function(){
                Route::get('', [AboutController::class, 'session']);
                Route::get('/loadListTKP', [AboutController::class, 'loadListTKP']);
            });
            Route::prefix('/industry')->group(function(){
                Route::get('', [AboutController::class, 'industry']);
                Route::get('/loadListPTN', [AboutController::class, 'loadListPTN']);
            });
            Route::prefix('/stock')->group(function(){
                Route::get('', [AboutController::class, 'stock']);
                Route::get('/loadListPTCP', [AboutController::class, 'loadListPTCP']);
            });
            Route::get('/reader/{id}', [AboutController::class, 'reader']);
        });
        // Đọc thông báo
        Route::get('readNotification', [ReadNotificationController::class, 'readNotification']);

    
    Route::prefix('des')->group(function () {
        Route::get('index', [DesController::class, 'index']);
    });
    
    // Route::prefix('about')->group(function () {
    //     Route::get('/reader/{id}', [AboutController::class, 'reader']);
    // });
});


