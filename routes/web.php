<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\FrontEndController;
use App\Http\Controllers\Backend\BackEndController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/',[FrontEndController::class,'index'])->name('index');
Route::get('/user/cv',[BackEndController::class,'home'])->name('home');
Route::get('/user/cv/info',[BackEndController::class,'userCv'])->name('userCv');
Route::get('/user/logout',[BackEndController::class,'userLogout'])->name('user.logout');
Route::post('/user/save/info',[BackEndController::class,'saveInfo'])->name('save.info');
Route::post('/user/save/skill',[BackEndController::class,'saveSkill'])->name('save.skill');
Route::get('/user/edit/info',[BackEndController::class,'editInfo'])->name('edit.info');
Route::post('/user/update/info', [BackEndController::class, 'updateInfo'])->name('update.info');
Route::post('/user/profile',[BackEndController::class,'userProfile'])->name('user.profile');

Route::get('/user/skills',[BackEndController::class,'userSkill'])->name('user.skill');
Route::get('/user/edit/skills',[BackEndController::class,'editSkill'])->name('edit.skill');
Route::post('/user/update/skill',[BackEndController::class,'updateSkill'])->name('update.skill');

Route::get('/user/edu',[BackEndController::class,'userEdu'])->name('user.edu');
Route::post('/user/save/edu',[BackEndController::class,'saveEdu'])->name('save.edu');
Route::get('/user/edit/edu',[BackEndController::class,'editEdu'])->name('edit.edu');
Route::post('/user/update/edu', [BackEndController::class, 'updateEdu'])->name('update.edu');

Route::get('/user/projects',[BackEndController::class,'userProject'])->name('user.projects');
Route::post('/user/save/project',[BackEndController::class,'saveProject'])->name('save.project');
Route::get('/user/edit/projects',[BackEndController::class,'editProject'])->name('edit.project');
Route::get('/user/edit/projects/{id}',[BackEndController::class,'editProjectDetails'])->name('edit.projectDetails');
Route::post('/user/update/project', [BackEndController::class, 'updateProject'])->name('update.project');

Route::get('/user/experience',[BackEndController::class,'userExp'])->name('user.experience');
Route::post('/user/save/experience',[BackEndController::class,'saveExp'])->name('save.experience');
Route::get('/user/edit/experience',[BackEndController::class,'editExperience'])->name('edit.experience');
Route::get('/user/edit/experience/{id}',[BackEndController::class,'editExperienceDetails'])->name('edit.experienceDetails');
Route::post('/user/update/experience', [BackEndController::class, 'updateExperience'])->name('update.experience');

Route::get('/user/certificate',[BackEndController::class,'userCertificate'])->name('user.certificate');
Route::post('/user/save/certificate',[BackEndController::class,'saveCertificate'])->name('save.certificate');
Route::get('/user/edit/certificate',[BackEndController::class,'editCertificate'])->name('edit.certificate');
Route::get('/user/edit/certificate/{id}',[BackEndController::class,'editCertificateDetails'])->name('edit.certificateDetails');
Route::post('/user/update/certificate', [BackEndController::class, 'updateCertificate'])->name('update.certificate');

Route::get('/cv',[BackEndController::class,'cv'])->name('cv');
Route::get('/download-cv', [BackEndController::class, 'downloadCV'])->name('downloadCV');

});


require __DIR__.'/auth.php';
