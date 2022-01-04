<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


// HR Section

Route::get('/atten', function () {
    return view('HR.attendenceform');
});

Route::middleware(['auth','hr'])->group(function (){
        // department
    Route::post('/saveDepData',[App\Http\Controllers\departmentController::class, 'save']);
    Route::get('/department',[App\Http\Controllers\departmentController::class,'pageOpen']);

    //jbroles
    Route::post('/jbrolesave',[App\Http\Controllers\jbRoleController::class,'save']);
    Route::get('/jbroles',[App\Http\Controllers\jbRoleController::class,'pageOpen']);

    //employees
    Route::get('/employees',[App\Http\Controllers\employeeController::class,'pageopen']);
    Route::post('/empSave',[App\Http\Controllers\employeeController::class,'empsave']);
    Route::get('/empremove/{id}',[App\Http\Controllers\employeeController::class,'deleteemp']);
    Route::get('/empradd/{id}',[App\Http\Controllers\employeeController::class,'readd']);
    
    

    //attendence record
    
    Route::get('/empattendence',[App\Http\Controllers\attendenceController::class,'pageopen']);
    Route::post('/empattendenceHR',[App\Http\Controllers\attendenceController::class,'HRattendence']);
    Route::get('/export-attendence',[App\Http\Controllers\attendenceController::class,'export']);

    Route::get('/getRole/getPro/{id}',[App\Http\Controllers\employeeController::class, 'getRole']);

    //emp salary 
    Route::get('/empsalary',[App\Http\Controllers\salaryController::class,'pageopen']);
    Route::get('/makesalary/{id}/{hours}',[App\Http\Controllers\salaryController::class,'makeSalary']);

    Route::post('/emp_salary_save',[App\Http\Controllers\salaryController::class,'salary_create']);

    //hr Dashboard

    Route::get('/HRsection',[App\Http\Controllers\employeeController::class,'opendashboard']);

});

Route::post('/saveAttendence',[App\Http\Controllers\attendenceController::class,'saveattendence']);




// end HR section


Route::middleware(['auth','financial'])->group(function (){
    // financial Section
Route::get('/findashboard',[App\Http\Controllers\financialController::class,'opendashboard']);
Route::get('/finance_salary',[App\Http\Controllers\financialController::class,'paysheet']);
Route::get('paysheetview/{id}',[App\Http\Controllers\financialController::class,'paysheetview']);
Route::get('/finance-bar-report',[App\Http\Controllers\financialController::class,'barreport']);

});

//emp reported

Route::get('/export-employee',[App\Http\Controllers\employeeController::class,'emp_report']);
Route::get('/empcard/{id}',[App\Http\Controllers\employeeController::class,'procard']);


//end financial Section


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth','cushad'])->group(function (){
    Route::get('/customer', [App\Http\Controllers\CustomerDataController::class, 'index'])->name('customer');
    Route::post('/customer', [App\Http\Controllers\CustomerDataController::class, 'search'])->name('customer');
    Route::post('/customer_registration', [App\Http\Controllers\CustomerDataController::class, 'register'])->name('customer_registration');
});

Route::middleware(['auth','liqor'])->group(function (){
        // financial Section
        Route::get('/ItemAdd', function () {
            return view('Itemadd');
        });
        
        Route::post('/itemsave', [App\Http\Controllers\itemController::class, 'saveitem']);
        
        Route::get('/CatAdd', function () {
            return view('catadd');
        });
        
        Route::post('/Addsuppliers', [App\Http\Controllers\AddSupplier::class, 'addsup']);
        
        Route::post('/Catadd', [App\Http\Controllers\CatAddController::class, 'addcat']);
        
        Route::post('/addorder', [App\Http\Controllers\Ordercontroller::class, 'addorder']);
        
        Route::get('/bardashboard', function () {
            return view('barDashboard');
        });
        
        Route::get('/bardashboard',[App\Http\Controllers\bardashboardController::class,'dashboardopen']);
        
        Route::get('/barsale',[App\Http\Controllers\itemController::class,'barsalepage']);
        Route::get('/liqorview/{id}',[App\Http\Controllers\itemController::class,'liqview']);
        Route::post('/salesliq', [App\Http\Controllers\itemController::class, 'newsale']);
        
        //bar reports
        Route::get('/monthly-report',[App\Http\Controllers\bardashboardController::class,'monthlyreport']);
        Route::get('/most-sold',[App\Http\Controllers\bardashboardController::class,'mostsold']);
        Route::get('/barinventory',[App\Http\Controllers\bardashboardController::class,'inventory']);
        Route::post('/barserach', [App\Http\Controllers\itemController::class, 'search']);

    });

    

Route::middleware(['auth','rm'])->group(function (){
        //rooms reservation module
    Route::get('/rmdashboard',[App\Http\Controllers\roomsController::class,'opendashboard']);
    Route::get('/rooms_man',[App\Http\Controllers\roomsController::class,'openrooms']);
    Route::post('/roomtypesave',[App\Http\Controllers\roomsController::class,'roomtypesave']);
    Route::post('/saveRoomdata',[App\Http\Controllers\roomsController::class,'roomsave']);
    Route::get('/roomres',[App\Http\Controllers\roomsController::class,'openres']);
    Route::get('/getrooms/roomsno/{id}',[App\Http\Controllers\roomsController::class, 'getrooms']);
    Route::post('/reservationsave',[App\Http\Controllers\roomsController::class,'roomreserve']);
    
});

Route::middleware(['auth','service'])->group(function (){
            //room services
    Route::get('/servicesdash',[App\Http\Controllers\serviceController::class,'opendashboard']);
    Route::get('/services',[App\Http\Controllers\serviceController::class,'servicemanage']);
    Route::post('/saveservices',[App\Http\Controllers\serviceController::class,'saveservice']);
    Route::get('/provide_service/{id}/{roomno}',[App\Http\Controllers\serviceController::class,'servicepageopen']);
    Route::post('/res_service',[App\Http\Controllers\serviceController::class,'serve']);


    });




//admin controller
Route::get('/admindash',[App\Http\Controllers\adminController::class,'opendashboard']);
Route::get('/usermanage',[App\Http\Controllers\adminController::class,'usermanage']);
Route::get('/getRole/emp/{id}',[App\Http\Controllers\adminController::class, 'getemp']);
Route::post('/usersave',[App\Http\Controllers\adminController::class,'usersave']);


Route::get('/make_payment',[App\Http\Controllers\paymentHadling::class,'openpage']);
Route::get('/viewpayslip/{id}/{roomnumber}',[App\Http\Controllers\paymentHadling::class,'paymentdetails']);




