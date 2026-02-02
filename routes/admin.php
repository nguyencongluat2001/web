<?php

//Dashboard

use Modules\Client\Page\Chat\Controllers\ChatAdminController;
use Modules\System\Dashboard\ApprovePayment\Controllers\ApprovePaymentController;
use Modules\System\Dashboard\Dashboards\Controllers\DashboardController;
use Modules\System\Dashboard\Blog\Controllers\BlogController;
use Modules\System\Dashboard\Category\Controllers\CateController;
use Modules\System\Dashboard\Category\Controllers\CategoryController;
use Modules\System\Dashboard\CustomerCare\Controllers\CustomerCareController;
use Modules\System\Dashboard\DataFinancial\Controllers\DataFinancialController;
use Modules\System\Dashboard\Effective\Controllers\EffectiveController;
use Modules\System\Dashboard\Hospital\Controllers\HospitalController;
use Modules\System\Dashboard\Home\Controllers\HomeController;
use Modules\System\Dashboard\Recommended\Controllers\RecommendedController;
use Modules\System\Dashboard\Signal\Controllers\SignalController;
use Modules\System\Dashboard\Users\Controllers\UserController;
use Modules\System\Dashboard\Permision\Controllers\PermisionController;
use Modules\System\Dashboard\Specialty\Controllers\SpecialtyController;
use Modules\System\Dashboard\AppointmentAtHome\Controllers\AppointmentAtHomeController;
use Modules\System\Dashboard\BloodTest\Controllers\BloodTestController;
use Modules\System\Dashboard\BloodTest\Controllers\PriceTestController;
use Modules\System\Dashboard\Faq\Controllers\FaqController;
use Modules\System\Dashboard\Sql\Controllers\SqlController;
use Modules\System\Dashboard\UrlSearch\Controllers\UrlSearchController;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware('checkloginAdmin')->group(function () {
        // quản trị người dùng
        Route::prefix('/system/user')->group(function () {
            Route::get('/index', [UserController::class, 'index']);
            Route::get('/loadList',[UserController::class,'loadList']);
            Route::post('/edit', [UserController::class,'edit']);
            Route::post('/createForm', [UserController::class,'createForm']);
            Route::post('/create', [UserController::class,'create']);
            Route::post('/delete', [UserController::class,'delete']);
            // Cập nhật mật khẩu
            Route::post('/changeStatus', [UserController::class,'changeStatus']);
            Route::get('/changePass', [UserController::class,'changePass'])->name('changePass');
            Route::post('/updatePass', [UserController::class,'updatePass'])->name('updatePass');
        });
        Route::prefix('/system')->group(function () {
            Route::get('/userInfo/changePass', [UserController::class,'changePass'])->name('changePass');
            Route::post('/userInfo/updatePass', [UserController::class,'updatePass'])->name('updatePass');
    
            // quản trị danh mục - thể loại
            Route::prefix('/category')->group(function () {
                //Danh mục
                Route::post('/createForm',[CateController::class,'createForm']);
                Route::post('/create',[CateController::class,'create']);
                Route::post('/edit',[CateController::class,'edit']);
                Route::post('/delete',[CateController::class,'delete']);
                Route::get('/index', [CateController::class, 'index']);
                Route::get('/loadList',[CateController::class,'loadList']);
                Route::post('/updateCategory',[CateController::class,'updateCategory']);
                Route::post('/changeStatusCate',[CateController::class,'changeStatusCate']);
                //thể loại
                Route::get('/indexCategory', [CategoryController::class, 'indexCategory']);
                Route::get('/loadListCategory',[CategoryController::class,'loadListCategory']);
                Route::post('/createFormCategory',[CategoryController::class,'createFormCategory']);
                Route::post('/createCategory',[CategoryController::class,'createCategory']);
                Route::post('/editCategory',[CategoryController::class,'edit']);
                Route::post('/deleteCategory',[CategoryController::class,'delete']);
                Route::post('/updateCategoryCate',[CategoryController::class,'updateCategoryCate']);
                Route::post('/changeStatusCategoryCate',[CategoryController::class,'changeStatusCategoryCate']);
            });
            //bài viết 
            Route::prefix('/blog')->group(function () {
                Route::get('/index', [BlogController::class, 'index']);
                Route::get('/loadList',[BlogController::class,'loadList']);
                Route::post('/edit', [BlogController::class,'edit']);
                Route::post('/createForm', [BlogController::class,'createForm']);
                Route::post('/create', [BlogController::class,'create']);
                Route::post('/delete', [BlogController::class,'delete']);
                Route::get('/infor',[BlogController::class,'infor']);
    
            });
            // 
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            //Cập nhật giao diện sáng tối
            Route::get('/userInfo/index', [UserController::class, 'indexUserInfo'])->name('userInfoIndex');
            Route::post('/userInfo/editColorView', [UserController::class, 'editColorView']);
            // Trang chủ Admin
            Route::prefix('/home')->group(function () {
                Route::get('/index', [HomeController::class, 'index']);
                Route::get('/loadList',[HomeController::class,'loadList']);
                Route::get('/loadListTap1',[HomeController::class,'loadListTap1'])->name('loadListTap1');
                Route::get('/realTimeData',[HomeController::class,'realTimeData'])->name('realTimeData');
                Route::get('/loadMoney', [HomeController::class, 'loadMoney']);

            });
            //Bệnh viện
            Route::prefix('/hospital')->group(function () {
                //Hospital
                Route::get('/index', [HospitalController::class, 'index']);
                Route::get('/loadList',[HospitalController::class,'loadList'])->name('loadList');
                Route::post('/createForm',[HospitalController::class,'createForm']);
                Route::post('/create',[HospitalController::class,'create'])->name('create');
                Route::post('/edit',[HospitalController::class,'edit'])->name('edit');
                Route::post('/editMoneyPackage',[HospitalController::class,'editMoneyPackage'])->name('editMoneyPackage');
                Route::post('/createMoneyPackage',[HospitalController::class,'createMoneyPackage'])->name('createMoneyPackage');
                Route::post('/delete',[HospitalController::class,'delete']);
                Route::get('/seeVideo',[HospitalController::class,'seeVideo']);
                Route::prefix('/stage')->group(function () {
                    //Hospital
                    Route::get('/index/{code}', [HospitalController::class, 'indexStage']);

                    // Route::get('/index', [HospitalController::class, 'index']);
                    Route::get('/loadList',[HospitalController::class,'loadListStage']);
                    Route::post('/createFormStage',[HospitalController::class,'createFormStage']);
                    Route::post('/createStage',[HospitalController::class,'createStage'])->name('createStage');
                    Route::post('/editStage',[HospitalController::class,'editStage'])->name('editStage');
                    Route::post('/delete',[HospitalController::class,'deleteStage']);
                });
            });
             //Chuyên khoa
             Route::prefix('/specialty')->group(function () {
                //Hospital
                Route::get('/index', [SpecialtyController::class, 'index']);
                Route::get('/loadList',[SpecialtyController::class,'loadList'])->name('loadList');
                Route::post('/createForm',[SpecialtyController::class,'createForm']);
                Route::post('/create',[SpecialtyController::class,'create'])->name('create');
                Route::post('/edit',[SpecialtyController::class,'edit'])->name('edit');
                Route::post('/delete',[SpecialtyController::class,'delete']);
            });
            // customerCare
            Route::prefix('customerCare')->group(function(){
                Route::get('index', [CustomerCareController::class, 'index']);
                Route::get('loadList', [CustomerCareController::class, 'loadList']);
                Route::post('message', [CustomerCareController::class, 'message']);
                Route::post('broadcast', [ChatAdminController::class, 'broadcast'])->name('broadcast');
                Route::post('receive', [ChatAdminController::class, 'receive'])->name('receive');
                Route::post('delete', [CustomerCareController::class, 'delete']);
            });
             //Phê duyệt thanh toán đặt lịch 
             Route::prefix('approvepayment')->group(function(){
                Route::get('index', [ApprovePaymentController::class, 'index']);
                Route::post('loadList', [ApprovePaymentController::class, 'loadList']);
                Route::get('create', [ApprovePaymentController::class, 'create']);
                Route::get('edit', [ApprovePaymentController::class, 'edit']);
                Route::post('update', [ApprovePaymentController::class, 'update']);
                Route::post('delete', [ApprovePaymentController::class, 'delete']);
                Route::post('updateApprovePayment', [ApprovePaymentController::class, 'updateApprovePayment']);
                Route::post('changeStatusApprovePayment', [ApprovePaymentController::class, 'changeStatusApprovePayment']);
                Route::get('getUserVIP', [ApprovePaymentController::class, 'getUserVIP']);
            });
             //Lịch lấy máu, xét nghiệm tại nhà
             Route::prefix('appointmentathome')->group(function(){
                Route::get('index', [AppointmentAtHomeController::class, 'index']);
                Route::post('loadList', [AppointmentAtHomeController::class, 'loadList']);
                Route::get('create', [AppointmentAtHomeController::class, 'create']);
                Route::get('edit', [AppointmentAtHomeController::class, 'edit']);
                Route::post('update', [AppointmentAtHomeController::class, 'update']);
                Route::post('delete', [AppointmentAtHomeController::class, 'delete']);
                Route::post('updateApprovePayment', [AppointmentAtHomeController::class, 'updateApprovePayment']);
                Route::post('changeStatusAppointmentAtHome', [AppointmentAtHomeController::class, 'changeStatusAppointmentAtHome']);
            });
            //Quản trị gói xét nghiệm
            Route::prefix('/bloodtest')->group(function () {
                //bloodtest
                Route::get('/index', [BloodTestController::class, 'index']);
                Route::get('/loadList',[BloodTestController::class,'loadList']);
                Route::post('/createForm',[BloodTestController::class,'createForm']);
                Route::post('/create',[BloodTestController::class,'create']);
                Route::post('/edit',[BloodTestController::class,'edit']);
                Route::post('/delete',[BloodTestController::class,'delete']);
            });
             //giá gói xét nghiệm
             Route::prefix('/pricetest')->group(function () {
                //pricetest
                Route::get('/index', [PriceTestController::class, 'index']);
                Route::get('/loadList',[PriceTestController::class,'loadList']);
                Route::post('/createForm',[PriceTestController::class,'createForm']);
                Route::post('/create',[PriceTestController::class,'create']);
                Route::post('/edit',[PriceTestController::class,'edit']);
                Route::post('/delete',[PriceTestController::class,'delete']);
            });
              //quản trị search
              Route::prefix('/urlsearch')->group(function () {
                //Hospital
                Route::get('/index', [UrlSearchController::class, 'index']);
                Route::get('/loadList',[UrlSearchController::class,'loadList'])->name('loadList');
                Route::post('/createForm',[UrlSearchController::class,'createForm']);
                Route::post('/create',[UrlSearchController::class,'create'])->name('create');
                Route::post('/edit',[UrlSearchController::class,'edit'])->name('edit');
                Route::post('/delete',[UrlSearchController::class,'delete']);
            });
            //quản trị câu hỏi
            Route::prefix('/faq')->group(function () {
                //Hospital
                Route::get('/index', [FaqController::class, 'index']);
                Route::get('/loadList',[FaqController::class,'loadList']);
                Route::get('/create',[FaqController::class,'add']);
                Route::post('/update',[FaqController::class,'update']);
                Route::post('/delete',[FaqController::class,'delete']);
            });
             //quản trị data
             Route::prefix('/sql')->group(function () {
                //Hospital
                Route::get('/index', [SqlController::class, 'index']);
                Route::get('/loadList',[SqlController::class,'loadList']);
                Route::get('/create',[SqlController::class,'add']);
                Route::post('/update',[SqlController::class,'update']);
                Route::post('/delete',[SqlController::class,'delete']);
            });
        });
    });
});