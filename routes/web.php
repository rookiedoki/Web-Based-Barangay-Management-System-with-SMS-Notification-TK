<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\BlotterReportController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProfilingController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AdminResidentsController;
use App\Http\Controllers\BarangayOfficialController;
use App\Http\Controllers\UserRegistrationController;

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


Route::get('/test', function () {
    return view('test');
});

Route::get('/home', function () {
    return view('user.home');
});

Route::get('/reg', function () {
    return view('reg');
});

// --------------------------ADMIN RESIDENTS CONTROLLER -------------------------------

Route::group(['middleware' => ['auth', 'userType:0']], function(){

//Admin Dashboard
Route::get('/dashboard', [AdminResidentsController::class, 'dashboard'])->middleware('auth');

//Pie Chart
Route::get('/dashboard', [AnalyticsController::class, 'pieChart'])->middleware('auth');
//View Residents in Admin
Route::get('/viewResidents/{id}', [AdminResidentsController::class, 'viewResidents']);

//Admin Residents  Form
Route::get('/residents', [AdminResidentsController::class, 'residents'])->middleware('auth');

//Search Residents
Route::get('/residents', [AdminResidentsController::class, 'search_residents'])->middleware('auth');

//Store Data from Admin Residents
Route::post('/residents', [AdminResidentsController::class, 'adminStore'])->middleware('auth');

//Delete Data from Admin Residents
Route::post('/deleteResidents/{user_id}', [AdminResidentsController::class, 'deleteResidents']);

//Show Edit Form from Admin Residents
Route::get('/residents/{residents}/edit', [AdminResidentsController::class, 'editResidents'])->middleware('auth');;

//Update Data from Admin Residents
Route::put('/residents/{residents}', [AdminResidentsController::class, 'updateResidents'])->middleware('auth');;

//Archive or Deleted residents list
Route::get('/archive', [AdminResidentsController::class, 'archive']);

//Restore Deleted Residents and put back in Admin Residents
Route::post('/restore/{id}', [AdminResidentsController::class, 'restore']);

// ----------------------------------BARANGAY OFFICIAL CONTROLLER------------------------------------

//List of Barangay Official
Route::get('/listBrgyOfficial', [BarangayOfficialController::class, 'listBrgyOfficial'])->middleware('auth');

//View Form Add Barangay Official
Route::get('/official', [BarangayOfficialController::class, 'official'])->middleware('auth');

//Store Data of Barangay Official
Route::post('/storeOfficial', [BarangayOfficialController::class, 'storeOfficial']);

//Edit Form Barangay Official
Route::get('/editBarangayOfficial/{id}', [BarangayOfficialController::class, 'editOfficial']);

//Update Data from Barangay Official
Route::put('/updateBarangayOfficial/{official}', [BarangayOfficialController::class, 'updateOfficial']);

//Delete Data from barangay Official
Route::get('/deleteBarangayOfficial/{id}', [BarangayOfficialController::class, 'deleteOfficial']);

//View Form Residents Registration in Admin
Route::get('/registration', [UserController::class, 'registration']);

//Accept Residents Registration in Admin and Create Account
Route::post('/registration/{id}', [UserController::class, 'acceptRegistration']);

//View Residents Registration
Route::get('/viewRegistration/{id}', [UserController::class, 'viewRegistration']);

// ----------------------------------PROFILING CONTROLLER------------------------------------


// Admin Senior Profiling
Route::get('/listSenior', [ProfilingController::class, 'listSenior'])->middleware('auth');

// Work Status Profiling
Route::get('/workStatusProfiling', [ProfilingController::class, 'workStatusProfiling'])->middleware('auth');

// Self Employed Profiling
Route::get('/selfemployedProfiling', [ProfilingController::class, 'selfemployedProfiling'])->middleware('auth');

// Unemployed Profiling
Route::get('/unemployedProfiling', [ProfilingController::class, 'unemployedProfiling'])->middleware('auth');

// Employed Profiling
Route::get('/employedProfiling', [ProfilingController::class, 'employedProfiling'])->middleware('auth');

// Admin Voters Profiling
Route::get('/votersProfiling', [ProfilingController::class, 'votersProfiling'])->middleware('auth');

// Admin Non Voters Profiling
Route::get('/nonvotersProfiling', [ProfilingController::class, 'nonvotersProfiling'])->middleware('auth');

//Search Senior Citizen
Route::get('/searchSenior', [ProfilingController::class, 'searchSenior']);

//Search Work Status
Route::get('/searchStatus', [ProfilingController::class, 'searchStatus']);

// Age Profiling
Route::get('/ageProfiling', [ProfilingController::class, 'ageProfiling'])->middleware('auth');

//Search Age
Route::post('/searchAge', [ProfilingController::class, 'searchAge']);

// Household Profiling
Route::get('/household', [ProfilingController::class, 'household'])->middleware('auth');

//Search Household
Route::post('/searchHousehold', [ProfilingController::class, 'searchHousehold']);

//Announcements
Route::get('/announcements', [AnnouncementsController::class, 'announcements'])->middleware('auth');

//Store Announcements
Route::post('/announcementStore', [AnnouncementsController::class, 'announcementStore']);

//Delete Announcements
Route::get('/deleteAnnouncements/{id}', [AnnouncementsController::class, 'deleteAnnouncements']);

//Update Data from Announcements
Route::put('/updateAnouncements/{announcement}', [AnnouncementsController::class, 'updateAnnouncements']);

//Create Document in Compilation of Reports
Route::get('/createdocument', [FilesController::class, 'createdocument'])->middleware('auth');

//Store Documents
Route::post('/documentStore', [FilesController::class, 'documentStore']);

//Delete Documents
Route::get('/deleteDocument/{id}', [FilesController::class, 'deleteDocument']);

//Update Data from Documents
// Route::put('/updateDocument/{createdocument}', [FilesController::class, 'updateDocument']);

Route::get('/reports/{category}', [FilesController::class, 'search_reports'])->middleware('auth');

//Settings
Route::get('/settings', [SettingsController::class, 'settings'])->middleware('auth');

//Update Settings
Route::put('/settings/{setting}', [SettingsController::class, 'updateSettings']);


//Manage Admin
Route::get('/manageAdmin', [UserController::class, 'manageAdmin']);

//Store Admin
Route::post('/addAdmin', [UserController::class, 'addAdmin']);

//Export PDF
Route::get('/exportPDF', [ProfilingController::class, 'exportPDF']);

//view frequuently asked
Route::get('/freq_asked', [SettingsController::class, 'freq_asked'])->middleware('auth');

//store frequently asked
Route::post('/store_freq_asked', [SettingsController::class, 'store_freq_asked'])->middleware('auth');

//Edit frequently asked title
Route::get('/freq_asked', [SettingsController::class, 'edit_freq_asked_title'])->middleware('auth');

//Update frequently asked title
Route::put('/update_freq_asked/{id}', [SettingsController::class, 'update_freq_asked']);

//Admin View Profiling Residence Vaccination
Route::get('/viewVaccProfiling/{id}', [ProfilingController::class, 'viewVaccProfiling']);

//Add to List Vaccinated
Route::post('/addListVaccinated/{id}', [ProfilingController::class, 'addListVaccinated']);

//Admin List of Residence Vaccinted
Route::get('/listVaccinated', [ProfilingController::class, 'listVaccinated']);

//Profiling Residence Vaccination
Route::get('/vaccProfiling', [ProfilingController::class, 'vaccProfiling']);


//Profiling Senior Citizen
Route::get('/seniorProfiling', [ProfilingController::class, 'seniorProfiling']);

//Admin View Profiling Senior Citizen
Route::get('/viewSeniorProfiling/{id}', [ProfilingController::class, 'viewSeniorProfiling']);

//Add to List Senior Citizen
Route::post('/addListSenior/{id}', [ProfilingController::class, 'addListSenior']);

//Add to List Vaccinated
Route::post('/addListPWD/{id}', [ProfilingController::class, 'addListPWD']);

//Admin List of PWDs
Route::get('/listPWD', [ProfilingController::class, 'listPWD']);

//Profiling Senior Citizen
Route::get('/pwdProfiling', [ProfilingController::class, 'pwdProfiling']);

//Profiling Senior Citizen
Route::get('/viewPWDProfiling/{id}', [ProfilingController::class, 'viewPWDProfiling']);


//Admin List of Pregnants
Route::get('/listPregnant', [ProfilingController::class, 'listPregnant']);
});

// ----------------------------------FILES CONTROLLER------------------------------------

// Dynamic db, inserted category for less table
Route::get('/reports/{category}', [FilesController::class, 'reports']);
Route::get('create', [FilesController::class, 'create']);
Route::post('/reports/store/{category}', [FilesController::class, 'store']);
Route::get('/deleteFile/{id}', [FilesController::class, 'deletefile']);
Route::prefix('showFunction')->group(function(){
    Route::put('/all-functions/{id}', [FilesController::class,'showFunctions'])->name('all-functions');
});
Route::get('/print-document', [FilesController::class, 'printDocument'])->name('print-document');
// ----------------------------------Certificate CONTROLLER------------------------------------

//Residency
Route::get('/certificateOfResidency', [CertificateController::class, 'certificateOfResidency']);
//Print Residency
Route::get('/certificateOfResidency/barangayResidency/{id}', [CertificateController::class, 'barangayResidency']);

//Indigency
Route::get('/certificateOfIndigency', [CertificateController::class, 'certificateOfIndigency']);
//Print Indigency
Route::get('/certificateOfIndigency/barangayIndigency/{id}', [CertificateController::class, 'barangayIndigency']);

//Clearance
Route::get('/certificateOfClearance', [CertificateController::class, 'certificateOfClearance']);
//Print Clearance
Route::get('/certificateOfClearance/barangayClearance/{id}', [CertificateController::class, 'barangayClearance']);

// ----------------------------------BLOTTER CONTROLLER------------------------------------
Route::get('/residentBlotter', [RequestController::class, 'residentBlotter']);
Route::post('/requestBlotter/send', [RequestController::class, 'requestBlotter']);
Route::get('/deleteBlotter/{id}', [BlotterReportController::class, 'deleteBlotter']);
Route::get('/submitBlotter/blotterLetter/{id}', [BlotterReportController::class, 'submitBlotter']);
Route::get('/blotter', [BlotterReportController::class, 'blotter']);
Route::get('/blotter/search', [BlotterReportController::class, 'search_blotter']);
Route::get('/decline-certificate/{id}', [CertificateController::class, 'declineCertificate']);
Route::get('/decline-blotter/{id}', [BlotterReportController::class, 'declineBlotter']);

// ----------------------------------ACTIVITY LOG CONTROLLER------------------------------------
Route::get('/activitylog', [UserController::class, 'activityLog']);

// ---------------------------------- REQUEST/BLOTTER REPORT CONTROLLER------------------------------------

//Request
Route::get('/request', [RequestController::class, 'request']);
Route::post('/request', [RequestController::class, 'addrequest']);

//Blotter Report
Route::get('/residentBlotter', [RequestController::class, 'residentBlotter']);
Route::post('/requestBlotter/send', [RequestController::class, 'requestBlotter']);
Route::get('/deleteBlotter/{id}', [BlotterReportController::class, 'deleteBlotter']);
Route::get('/submitBlotter/blotterLetter/{id}', [BlotterReportController::class, 'submitBlotter']);


// ----------------------------------USER CONTROLLER------------------------------------
//Residents Register Form
Route::get('/register', [UserController::class, 'register']);

//Residents Register Form
Route::get('/register', [UserController::class, 'register']);

//Register Storing Data
Route::post('/register', [UserController::class, 'registerStore']);

//Log User Out
Route::post('/logout', [UserController::class, 'logout']);

//Login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

//Login User
Route::post('/login/auth', [UserController::class, 'userLogin']);


// Edit User Profile
Route::get('/myProfile', [UserController::class, 'myProfile']);

// Form Edit User Profile
Route::get('/editProfile', [UserController::class, 'editProfile']);

//Update Profile
Route::put('/updateProfile', [UserController::class, 'updateProfile']);

// ---------------------UserRegistrationController---------------------------

//Homepage Client-Side
Route::get('/', [HomeController::class, 'landingPage']);

Route::get('/portfolio-details', [HomeController::class, 'brngyportfolio']);

//User PWD profiling
Route::get('/pwd', [ProfilingController::class, 'pwd']);

//User Senior profiling
Route::get('/senior', [ProfilingController::class, 'senior']);

//User Senior profiling
Route::get('/pregnant', [ProfilingController::class, 'pregnant']);

//Pie Chart
Route::get('/home', [HomeController::class, 'numResidents'])->middleware('auth');

//User PWD Form and Storing Data
Route::post('/storePWD', [ProfilingController::class, 'storePWD']);


//User Senior Citizen Form and Storing Data
Route::post('/storeSenior', [ProfilingController::class, 'storeSenior']);


//User Vaccination Form and Storing Data
Route::post('/storeVaccination', [ProfilingController::class, 'storeVaccination']);


///User Vaccination Profiling
Route::get('/userProfiling', [ProfilingController::class, 'userProfiling'])->middleware('auth');

//User PWDs Form and Storing Data
Route::post('/storePregnant', [ProfilingController::class, 'storePregnant']);

//SMS
Route::get('messages', [SMSController::class, 'show']);
Route::post('messages', [SMSController::class, 'storePhoneNumber']);
Route::post('messages/custom', [SMSController::class, 'sendCustomMessage']);
