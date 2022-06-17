<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\DashboardController;
use App\Http\Controllers\Teacher\TeacherLoginController;
use App\Http\Controllers\Student\StudentLoginController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\ExamLinkController;
use App\Http\Controllers\Teacher\ExamController;
use App\Http\Controllers\Teacher\ResponseController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\QuestionController;
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
    return view('home.portal');
});
Route::get('/aboutus', function () {
    return view('home.aboutus');
});

Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::middleware(['guest:teacher'])->group(function(){
        Route::view('/login','dashboard.teacher.login')->name('login');
        Route::view('/register','dashboard.teacher.register')->name('register');
        Route::post('/create', [TeacherLoginController::class, 'create'])->name('create');
        Route::post('/check', [TeacherLoginController::class, 'check'])->name('check');

    });

    Route::middleware(['auth:teacher'])->group(function(){
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

        Route::post('/logout', [TeacherLoginController::class, 'logout'])->name('logout');

        Route::get('/subject', [SubjectController::class, 'index'])->name('subject');
        Route::post('/save-subject', [SubjectController::class, 'save'])->name('save-subject');
        Route::get('/subject-status', [SubjectController::class, 'ChangeStatus'])->name('subject-status');
        Route::get('/subject/edit-subject/{id}', [SubjectController::class, 'edit'])->name('edit-subject');
        Route::put('/subject/update-subject/{id}', [SubjectController::class, 'update'])->name('update-subject');
        Route::delete('/subject/delete-subject/{id}', [SubjectController::class, 'delete'])->name('delete-subject');
        Route::get('/subject/{slug}={id}', [SubjectController::class, 'getIDSubject'])->name('added-subject');
        Route::get('/subject/{slug}/add-student/{id}', [SubjectController::class, 'addstudent'])->name('id.addstudent');
        Route::get('/subject/{slug}/view-assign-student/{id}', [SubjectController::class, 'viewstudent'])->name('id.student');
        Route::delete('/subject/delete-assign-student/{id}', [SubjectController::class, 'deleteAssign'])->name('delete-assign');

        Route::post('/subject/{slug}/add-student/{id}', [ExamLinkController::class, 'store'])->name('add-student');
        Route::delete('/subject/delete-student/{id}', [ExamLinkController::class, 'delete'])->name('delete-student');
        Route::get('/subject/{slug}/assign-student/{id}', [ExamLinkController::class, 'getExamID'])->name('id.exam');
        Route::post('/subject/{slug}/assign-exam/{id}', [ExamLinkController::class, 'assign'])->name('assign-exam');

        Route::get('/exam', [ExamController::class, 'index'])->name('exam');
        Route::post('/add-exam', [ExamController::class, 'save'])->name('add-exam');
        Route::get('/change-status', [ExamController::class, 'ChangeStatus'])->name('change-status');
        Route::get('/edit-exam/{id}', [ExamController::class, 'edit'])->name('edit-exam');
        Route::put('/update-exam', [ExamController::class, 'update'])->name('update-exam');
        Route::delete('/delete-exam/{id}', [ExamController::class, 'delete'])->name('delete-exam');
        Route::get('/exam/{slug?}={id}', [ExamController::class, 'getIdDetail'])->name('id.detail');
        Route::get('/exam/{slug}/view-result/{id}', [ExamController::class, 'result'])->name('id.result');

        Route::get('/exam/{slug}/add-question/{id}', [QuestionController::class, 'add'])->name('add-question');
        Route::post('/exam/save-question/{slug}/{id}', [QuestionController::class, 'save'])->name('save-question');
        Route::put('/exam/update-question/{id}', [QuestionController::class, 'update'])->name('update-question');
        Route::delete('/exam/delete-question/{id}', [QuestionController::class, 'delete'])->name('delete-question');

        Route::get('/responses', [ResponseController::class, 'index'])->name('responses');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    });

});
Route::prefix('student')->name('student.')->group(function(){

    Route::middleware(['guest:student'])->group(function(){

        Route::view('/login','dashboard.student.login')->name('login');
        Route::view('/register','dashboard.student.register')->name('register');
        Route::post('/create', [StudentLoginController::class, 'create'])->name('create');
        Route::post('/check', [StudentLoginController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:student'])->group(function(){

        Route::get('/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');

        Route::post('/logout', [StudentLoginController::class, 'logout'])->name('logout');

        Route::get('/exam', [App\Http\Controllers\Student\ExamController::class, 'index'])->name('exam');
        Route::get('/exam/join-exam/{id}', [App\Http\Controllers\Student\ExamController::class, 'join'])->name('join');
        Route::get('/exam/assign-status', [App\Http\Controllers\Student\ExamController::class, 'ChangeStatus'])->name('assign-status');

        Route::get('/exam/{slug}={id}', [App\Http\Controllers\Student\QuestionController::class, 'question'])->name('id.question');
        Route::post('/exam/submit_question', [App\Http\Controllers\Student\QuestionController::class, 'submitquestion'])->name('submit_question');
        Route::get('/exam/question/show_result={id}', [App\Http\Controllers\Student\QuestionController::class, 'showresult'])->name('show_result');

        Route::get('/permit', [App\Http\Controllers\Student\PermitsController::class, 'index'])->name('permit');
        Route::post('/upload-permits', [App\Http\Controllers\Student\PermitsController::class, 'save'])->name('upload-permits');
        Route::get('/permit/edit-permits/{id}', [App\Http\Controllers\Student\PermitsController::class, 'edit'])->name('edit-permits');
        Route::put('/permit/update-permits/{id}', [App\Http\Controllers\Student\PermitsController::class, 'update'])->name('update-permits');
        Route::delete('/delete-permit/{id}', [App\Http\Controllers\Student\PermitsController::class, 'delete'])->name('delete-permit');

        Route::get('/result', [App\Http\Controllers\Student\ResultController::class, 'index'])->name('result');
        Route::get('/result/view-result-detail/{id}', [App\Http\Controllers\Student\ResultController::class, 'getIDResponse'])->name('result-detail');

        Route::get('/profile', [App\Http\Controllers\Student\ProfileController::class, 'index'])->name('profile');
    });
});
