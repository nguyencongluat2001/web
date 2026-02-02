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
        // Trang chủ cơ sở bệnh viện
        Route::prefix('facilities')->group(function(){
            // Route::get('/index',[FacilitiesController::class,'index']);
            Route::get('/loadList',[FacilitiesController::class,'loadList']);
            Route::get('/loadListBlog',[FacilitiesController::class,'loadListBlog']);
            Route::get('/loadListTap1',[FacilitiesController::class,'loadListTap1']);
            Route::get('/loadListTop',[FacilitiesController::class,'loadListTop']);
            Route::get('/getHuyen',[FacilitiesController::class,'getHuyen']);
            Route::get('/getXa',[FacilitiesController::class,'getXa']);

             // Trang chủ chi tiết cơ sở bệnh viện
            Route::prefix('detail')->group(function(){
                Route::get('/index',[FacilitiesController::class,'detailIndex']);
                Route::get('/loadList',[FacilitiesController::class,'loadList']);
                Route::get('/loadListBlog',[FacilitiesController::class,'loadListBlog']);
                Route::get('/loadListTap1',[FacilitiesController::class,'loadListTap1']);
                Route::get('/loadListTop',[FacilitiesController::class,'loadListTop']);
            });
        });
        // đặt lịch khám
        route::prefix('schedule')->group(function(){
            Route::get('/createForm', [FacilitiesController::class,'createForm']);
            Route::get('/loadList', [FacilitiesController::class,'loadList']);
            Route::get('/getHuyen',[FacilitiesController::class,'getHuyen']);
            Route::get('/getXa',[FacilitiesController::class,'getXa']);
            Route::post('/sendPayment',[FacilitiesController::class,'sendPayment']);
            Route::post('/getUser',[FacilitiesController::class,'getUser']);
            Route::get('/getMoney',[FacilitiesController::class,'getMoney']);
        });
        // đặt lịch xét nghiệm , truyền tại nhà
        route::prefix('appointmentathome')->group(function(){
            Route::get('/index',[AppointmentAtHomeController::class,'index']);
            Route::get('/appointmentathome/{code}', [AppointmentAtHomeController::class, 'index_edit']);

            Route::get('/indexApointment',[AppointmentAtHomeController::class,'indexApointment']);
            Route::get('/tab1/{code}',[AppointmentAtHomeController::class,'tab1']);

            Route::get('/createForm', [AppointmentAtHomeController::class,'createForm']);
            Route::get('/loadList', [AppointmentAtHomeController::class,'loadList']);
            Route::get('/getHuyen',[AppointmentAtHomeController::class,'getHuyen']);
            Route::get('/getXa',[AppointmentAtHomeController::class,'getXa']);
            Route::post('/sendPayment',[AppointmentAtHomeController::class,'sendPayment']);
            Route::get('/getPrice',[AppointmentAtHomeController::class,'getPrice']);
            Route::get('/showInfor', [AppointmentAtHomeController::class,'showInfor']);

            Route::get('/getInfioPatient',[AppointmentAtHomeController::class,'getInfioPatient']);

            Route::get('/showPack', [AppointmentAtHomeController::class,'showPack']);
            Route::get('/flow', [AppointmentAtHomeController::class,'flow']);
            //danh sách lịch chỉ định
            Route::get('/list_Indications', [AppointmentAtHomeController::class,'list_Indications']);
            Route::get('/loadList_Indications', [AppointmentAtHomeController::class,'loadList_Indications']);
            Route::get('/showDetail', [AppointmentAtHomeController::class,'showDetail']);
            Route::get('/nhapngayhen', [AppointmentAtHomeController::class,'nhapngayhen']);
            Route::get('/pdf', [AppointmentAtHomeController::class,'pdf']);
            Route::post('/delete', [AppointmentAtHomeController::class,'delete']);
            Route::post('/exportExcel', [AppointmentAtHomeController::class,'exportExcel']);

            Route::get('/chart',[AppointmentAtHomeController::class,'chart']);
            Route::get('/report',[AppointmentAtHomeController::class,'report']);

            //danh sách lịch chỉ định
            Route::get('/lichhen', [AppointmentAtHomeController::class,'lichhen']);
            Route::post('/nhapngayhen', [AppointmentAtHomeController::class,'nhapngayhen']);
            // Route::get('/loadlichhen', [AppointmentAtHomeController::class,'loadlichhen']);
            
            // Truyền dịch
            Route::get('/indexInfusion',[AppointmentAtHomeController::class,'indexInfusion']);
            Route::get('/tab2/{code}',[AppointmentAtHomeController::class,'indexInfusion_form']);

        });
        
        // Trang chủ cơ sở bệnh viện
        Route::prefix('contact')->group(function(){
            // Route::get('/index',[FacilitiesController::class,'index']);
            Route::get('/loadList',[ContactController::class,'loadList']);
            Route::get('/loadListBlog',[ContactController::class,'loadListBlog']);
            Route::get('/loadListTap1',[ContactController::class,'loadListTap1']);
            Route::get('/loadListTop',[ContactController::class,'loadListTop']);
            Route::get('/getHuyen',[ContactController::class,'getHuyen']);
            Route::get('/getXa',[ContactController::class,'getXa']);
        });
        // gói khám
        Route::prefix('package')->group(function(){
            // Route::get('/index',[FacilitiesController::class,'index']);
            Route::get('/loadList',[PackageController::class,'loadList']);
            Route::get('/loadListBlog',[PackageController::class,'loadListBlog']);
             // Trang chủ chi tiết cơ sở bệnh viện
            Route::prefix('detail')->group(function(){
                Route::get('/index',[PackageController::class,'detailIndex']);
                Route::get('/loadList',[PackageController::class,'loadList']);
                Route::get('/loadListBlog',[PackageController::class,'loadListBlog']);
                Route::get('/loadListTap1',[PackageController::class,'loadListTap1']);
                Route::get('/loadListTop',[PackageController::class,'loadListTop']);
            });
        });
         // chuyên khoa
         Route::prefix('specialty')->group(function(){
            Route::get('/loadList',[SpecialtyController::class,'loadList']);
            Route::get('/loadListBlog',[SpecialtyController::class,'loadListBlog']);
            Route::get('/loadListTap1',[SpecialtyController::class,'loadListTap1']);
            Route::get('/loadListTop',[SpecialtyController::class,'loadListTop']);
        });
        //tra cứu gói khám
        Route::prefix('searchschedule')->group(function(){
            Route::get('/index',[SearchScheduleController::class,'index']);
            Route::get('/loadList',[SearchScheduleController::class,'loadList']);
            Route::get('/loadListBlog',[SearchScheduleController::class,'loadListBlog']);
        });







        Route::prefix('infor')->group(function(){
            Route::get('/index', [InforController::class, 'index']);
            Route::post('update', [InforController::class, 'update']);
            Route::post('loadList', [InforController::class, 'loadList']);
            Route::post('updateCustomer', [InforController::class, 'updateCustomer']);
            Route::get('/changePass', [UserController::class,'changePass']);
            Route::post('/updatePass', [UserController::class,'updatePass']);
        });
        Route::prefix('about')->group(function () {
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


