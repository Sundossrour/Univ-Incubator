<?php

use App\Http\Controllers\LAdmin\Ads\AdsController;
use App\Http\Controllers\LAdmin\Auth\AuthController;
use App\Http\Controllers\LAdmin\College\CollegeController;
use App\Http\Controllers\LAdmin\CollegeAds\CollegeAdsController;
use App\Http\Controllers\LAdmin\CollegeEvent\CollegeEventController;
use App\Http\Controllers\LAdmin\CollegeFees\CollegeFeesController;
use App\Http\Controllers\LAdmin\Event\EventController;
use App\Http\Controllers\LAdmin\LAdminController;
use App\Http\Controllers\LAdmin\QuestionUser\QuestionUserController;
use App\Http\Controllers\LAdmin\SpecializationCollege\SpecializationCollegeController;
use App\Http\Controllers\LAdmin\StudyFees\StudyFeesController;
use App\Http\Controllers\LAdmin\TeachingStaff\TeachingStaffController;
use App\Http\Controllers\LAdmin\University\UniversityController;
use App\Http\Controllers\LAdmin\UniversityAds\UniversityAdsController;
use App\Http\Controllers\LAdmin\UniversityEvent\UniversityEventController;
use App\Http\Controllers\LAdmin\UniversityLocation\UniversityLocationController;
use App\Http\Controllers\ProfileController;
use App\Models\CollegeFees;
use App\Models\UniversityAds;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Local Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Local Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Local Admin" middleware group. Make something great!
|
*/


Route::get('/ladmin', [LAdminController::class, 'index'])->middleware(['ladmin'])->name('ladmin.index');

//=================================Auth route Section==========================

Route::get('ladmin/login', [AuthController::class, 'index'])->name('ladmin.show.login');
Route::post('ladmin/login/store', [AuthController::class, 'store'])->name('ladmin.store.login');
Route::post('ladmin/logout', [AuthController::class, 'logout'])->name('ladmin.logout');

//===============================End Auth Section ===============================

Route::middleware(['ladmin'])->name('ladmin.')->prefix('ladmin')->group(function () {


    //================================= College Event Route Section ==========================

    Route::get('/college/event/university/index', [CollegeEventController::class, 'index'])->name('college.event.university.index');

    Route::get('/college/event/university/college/{id}', [CollegeEventController::class, 'collegeIndex'])->name('college.event.university.college.index');

    Route::get('/college/event/university/college/events/{id}', [CollegeEventController::class, 'eventsIndex'])->name('college.event.university.college.events.index');

    Route::put('/college/event/university/college/events/done/{id}', [CollegeEventController::class, 'eventsDone'])->name('college.event.university.college.events.done');

    Route::put('/college/event/university/college/events/cancel/{id}', [CollegeEventController::class, 'eventsCancel'])->name('college.event.university.college.events.cancel');

    Route::delete('/college/event/university/college/events/delete/{id}', [CollegeEventController::class, 'eventsDelete'])->name('college.event.university.college.events.delete');

    Route::get('/college/event/university/college/events/create/{id}', [CollegeEventController::class, 'createEvent'])->name('college.event.university.college.events.create');

    Route::post('/college/event/university/college/events/store', [CollegeEventController::class, 'storeEvent'])->name('college.event.university.college.events.store');

    Route::get('/college/event/university/college/events/edit/{id}', [CollegeEventController::class, 'eventsEdit'])->name('college.event.university.college.events.edit');

    Route::put('/college/event/university/college/events/update/{id}', [CollegeEventController::class, 'eventsUpdate'])->name('college.event.university.college.events.update');

    Route::get('/college/event/university/college/events/image/index/{id}', [CollegeEventController::class, 'eventsImageIndex'])->name('college.event.university.college.events.image.index');

    Route::get('/college/event/university/college/events/image/create/{id}', [CollegeEventController::class, 'eventsImageCreate'])->name('college.event.university.college.events.image.create');

    Route::post('/college/event/university/college/events/image/store', [CollegeEventController::class, 'eventsImageStore'])->name('college.event.university.college.events.image.store');

    Route::delete('/college/event/university/college/events/image/delete/{id}', [CollegeEventController::class, 'eventsImageDelete'])->name('college.event.university.college.events.image.delete');

    //================================= University College Teachig Staff route Section ==========================


    Route::get('/teachingStaff/index', [TeachingStaffController::class, 'index'])->name('teachingStaff.index');

    Route::get('/teachingStaff/create', [TeachingStaffController::class, 'create'])->name('teachingStaff.create');

    Route::post('/teachingStaff/store', [TeachingStaffController::class, 'store'])->name('teachingStaff.store');

    Route::get('/teachingStaff/edit/{id}', [TeachingStaffController::class, 'edit'])->name('teachingStaff.edit');

    Route::put('/teachingStaff/update/{id}', [TeachingStaffController::class, 'update'])->name('teachingStaff.update');

    Route::get('/teachingStaff/archive', [TeachingStaffController::class, 'archive'])->name('teachingStaff.archive');

    Route::delete('/teachingStaff/softDelete/{id}', [TeachingStaffController::class, 'softDelete'])->name('teachingStaff.soft.delete');

    Route::get('/teachingStaff/restore/{id}', [TeachingStaffController::class, 'restore'])->name('teachingStaff.restore');

    Route::delete('/teachingStaff/forceDelete/{id}', [TeachingStaffController::class, 'forceDelete'])->name('teachingStaff.force.delete');


    //================================= Answer User Question route Section ==========================

    Route::get('/questionUser/new/question', [QuestionUserController::class, 'newQuestion'])->name('questionAnswer.new.question');

    Route::get('/questionUser/create/answer/{id}', [QuestionUserController::class, 'createAnswer'])->name('questionAnswer.create.answer');

    Route::post('/questionUser/store/answer', [QuestionUserController::class, 'storeAnswer'])->name('questionAnswer.store.answer');

    Route::get('/questionUser/history/question', [QuestionUserController::class, 'historyQuestion'])->name('questionAnswer.history.question');


    //================================= University College Ads route Section ==========================

    Route::get('/college/ads/index', [CollegeAdsController::class, 'index'])->name('college.ads.index');

    Route::get('/college/ads/create', [CollegeAdsController::class, 'create'])->name('college.ads.create');

    Route::post('/college/ads/store', [CollegeAdsController::class, 'store'])->name('college.ads.store');

    Route::get('/college/ads/edit/{id}', [CollegeAdsController::class, 'edit'])->name('college.ads.edit');

    Route::put('/college/ads/update/{id}', [CollegeAdsController::class, 'update'])->name('college.ads.update');

    Route::get('/college/ads/archive', [CollegeAdsController::class, 'archive'])->name('college.ads.archive');

    Route::delete('/college/ads/softDelete/{id}', [CollegeAdsController::class, 'softDelete'])->name('college.ads.soft.delete');

    Route::get('/college/ads/restore/{id}', [CollegeAdsController::class, 'restore'])->name('college.ads.restore');

    Route::delete('/ads/forceDelete/{id}', [CollegeAdsController::class, 'forceDelete'])->name('college.ads.force.delete');


    //================================= University College Study Fees route Section ==========================


    Route::get('/college/fees/index', [CollegeFeesController::class, 'index'])->name('college.fees.index');

    Route::get('/college/fees/create', [CollegeFeesController::class, 'create'])->name('college.fees.create');

    Route::post('/college/fees/store', [CollegeFeesController::class, 'store'])->name('college.fees.store');

    Route::get('/college/fees/edit/{id}', [CollegeFeesController::class, 'edit'])->name('college.fees.edit');

    Route::put('/college/fees/update/{id}', [CollegeFeesController::class, 'update'])->name('college.fees.update');

    Route::get('/college/fees/archive', [CollegeFeesController::class, 'archive'])->name('college.fees.archive');

    Route::delete('/college/fees/softDelete/{id}', [CollegeFeesController::class, 'softDelete'])->name('college.fees.soft.delete');

    Route::get('/college/fees/restore/{id}', [CollegeFeesController::class, 'restore'])->name('college.fees.restore');

    Route::delete('/college/fees/forceDelete/{id}', [CollegeFeesController::class, 'forceDelete'])->name('college.fees.force.delete');


    //================================= University College route Section ==========================


    Route::get('/college/index', [CollegeController::class, 'index'])->name('college.index');

    Route::get('/college/create', [CollegeController::class, 'create'])->name('college.create');

    Route::post('/college/store', [CollegeController::class, 'store'])->name('college.store');

    Route::get('/college/edit/{id}', [CollegeController::class, 'edit'])->name('college.edit');

    Route::put('/college/update/{id}', [CollegeController::class, 'update'])->name('college.update');

    Route::get('/college/archive', [CollegeController::class, 'archive'])->name('college.archive');

    Route::delete('/college/softDelete/{id}', [CollegeController::class, 'softDelete'])->name('college.soft.delete');

    Route::get('/college/restore/{id}', [CollegeController::class, 'restore'])->name('college.restore');

    Route::delete('/college/forceDelete/{id}', [CollegeController::class, 'forceDelete'])->name('college.force.delete');


    //================================= University Specialization College route Section ==========================


    Route::get('/specialization/college/index', [SpecializationCollegeController::class, 'index'])->name('specialization.college.index');

    Route::get('/specialization/college/create', [SpecializationCollegeController::class, 'create'])->name('specialization.college.create');

    Route::post('/specialization/college/store', [SpecializationCollegeController::class, 'store'])->name('specialization.college.store');

    Route::get('/specialization/college/edit/{id}', [SpecializationCollegeController::class, 'edit'])->name('specialization.college.edit');

    Route::put('/specialization/college/update/{id}', [SpecializationCollegeController::class, 'update'])->name('specialization.college.update');

    Route::get('/specialization/college/archive', [SpecializationCollegeController::class, 'archive'])->name('specialization.college.archive');

    Route::delete('/specialization/college/softDelete/{id}', [SpecializationCollegeController::class, 'softDelete'])->name('specialization.college.soft.delete');

    Route::get('/specialization/college/restore/{id}', [SpecializationCollegeController::class, 'restore'])->name('specialization.college.restore');

    Route::delete('/specialization/college/forceDelete/{id}', [SpecializationCollegeController::class, 'forceDelete'])->name('specialization.college.force.delete');


    //================================= University Location route Section ==========================


    Route::get('/university/location/index', [UniversityLocationController::class, 'index'])->name('university.location.index');

    Route::get('/university/location/create', [UniversityLocationController::class, 'create'])->name('university.location.create');

    Route::post('/university/location/store', [UniversityLocationController::class, 'store'])->name('university.location.store');

    Route::get('/university/location/edit/{id}', [UniversityLocationController::class, 'edit'])->name('university.location.edit');

    Route::put('/university/location/update/{id}', [UniversityLocationController::class, 'update'])->name('university.location.update');

    Route::delete('/university/location/delete/{id}', [UniversityLocationController::class, 'delete'])->name('university.location.delete');



    //================================= University Ads route Section ==========================

    Route::get('/university/ads/index', [UniversityAdsController::class, 'index'])->name('university.ads.index');

    Route::get('/university/ads/create', [UniversityAdsController::class, 'create'])->name('university.ads.create');

    Route::post('/university/ads/store', [UniversityAdsController::class, 'store'])->name('university.ads.store');

    Route::get('/university/ads/edit/{id}', [UniversityAdsController::class, 'edit'])->name('university.ads.edit');

    Route::put('/university/ads/update/{id}', [UniversityAdsController::class, 'update'])->name('university.ads.update');

    Route::get('/university/ads/archive', [UniversityAdsController::class, 'archive'])->name('university.ads.archive');

    Route::delete('/university/ads/softDelete/{id}', [UniversityAdsController::class, 'softDelete'])->name('university.ads.soft.delete');

    Route::get('/university/ads/restore/{id}', [UniversityAdsController::class, 'restore'])->name('university.ads.restore');

    Route::delete('/university/ads/forceDelete/{id}', [UniversityAdsController::class, 'forceDelete'])->name('university.ads.force.delete');


     //================================= University Event route Section ==========================

     Route::get('/university/event/index', [UniversityEventController::class, 'index'])->name('university.event.index');

     Route::get('/university/event/create', [UniversityEventController::class, 'create'])->name('university.event.create');
 
     Route::post('/university/event/store', [UniversityEventController::class, 'store'])->name('university.event.store');
 
     Route::put('/university/event/done/{id}', [UniversityEventController::class, 'done'])->name('university.event.done');
 
     Route::put('/university/event/cancel/{id}', [UniversityEventController::class, 'cancel'])->name('university.event.cancel');
 
     Route::delete('/university/event/delete/{id}', [UniversityEventController::class, 'delete'])->name('university.event.delete');

     Route::get('/university/event/image/index/{id}', [UniversityEventController::class, 'univEventImageIndex'])->name('university.event.image.index');

     Route::get('/university/event/image/create/{id}', [UniversityEventController::class, 'univEventImageCreate'])->name('university.event.image.create');

     Route::post('/university/event/image/store', [UniversityEventController::class, 'univEventImageStore'])->name('university.event.image.store');

     Route::delete('/university/event/image/delete/{id}', [UniversityEventController::class, 'univEventImageDelete'])->name('university.event.image.delete');
});
