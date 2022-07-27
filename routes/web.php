<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TestsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/user/profile/{id}',[ProfileController::class, 'profile'])->name('view.profile');
Route::post('/profile/info/update/{id}',[ProfileController::class, 'update'])->name('profile.info.update');

Route::get('/departments',[DepartmentsController::class, 'profile'])->name('view.departments');

Route::get('/users',[UsersController::class, 'profile'])->name('view.users');
Route::get('/user/info',[UsersController::class, 'profileInfo'])->name('view.user.info');
Route::get('/user/info/table',[UsersController::class, 'profileInfoTable'])->name('view.user.info.table');
Route::get('/user/info/cu/progress',[UsersController::class, 'profileInfoCuProgress'])->name('view.user.cu.progress');
Route::get('/users/table',[UsersController::class, 'switchToTable'])->name('switch.to.table');
Route::get('/users/search',[UsersController::class, 'usersSearch'])->name('search.users');
Route::get('/users/search/role',[UsersController::class, 'usersSearchRole'])->name('search.users.by.role');

Route::get('/test',[TestsController::class, 'test'])->name('test');
Route::get('/test/role/specific/{id}',[TestsController::class, 'testRoleSpecific'])->name('test.role.specific');
Route::get('/test/role/specific/levels/{id}',[TestsController::class, 'testRoleSpecificLevels'])->name('test.role.specific.levels');



Route::get('/search/role',[TestsController::class, 'searchRole'])->name('search.role');
Route::get('/test/levels/{id}',[TestsController::class, 'levels'])->name('test.levels');



Route::get('/test/level/{id}/questions',[TestsController::class, 'levelQuestions'])->name('test.level.questions');
Route::get('/test/level/{id}/add/question',[TestsController::class, 'levelAddQuestion'])->name('test.level.add.question');
Route::post('/save/level/new/question/{id}',[TestsController::class, 'saveLevelNewQuestion'])->name('save.level.new.question');
Route::get('test/level/{id}/question/edit',[TestsController::class, 'levelQuestionEdit'])->name('test.level.question.edit');
Route::post('test/level/{id}/question/update',[TestsController::class, 'levelQuestionUpdate'])->name('test.level.question.update');
Route::post('test/level/{id}/question/delete',[TestsController::class, 'levelQuestionDelete'])->name('test.level.question.delete');





Route::get('user/role/specific/{id}',[TestsController::class, 'usertestRoleSpecific'])->name('user.role.specific');
Route::get('user/role/specific/{id}/levels',[TestsController::class, 'userTestRoleSpecificLevels'])->name('user.role.specific.levels');
Route::get('user/level/questions',[TestsController::class, 'userLevelQuestions'])->name('user.level.questions');
Route::post('user/level/save/test',[TestsController::class, 'userLevelSaveTest'])->name('user.level.save.test');

Route::post('/user/profile',[ProfileController::class,'aboutMe'])->name('aboutme');
Route::post('/user/profile/change',[ProfileController::class,'changePW'])->name('changePW');


require __DIR__.'/auth.php';
