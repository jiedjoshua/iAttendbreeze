<?php


use App\Http\Controllers\IDverificationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AnnouncementController;

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

//HOME PAGE
Route::redirect('/', '/login'); 

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Example routes in web.php
   

});

//ROLE PAGE
Route::get('/role',[RoleController::class, 'index'])->name('role.index');

//ID VERIFICATION PAGE
Route::get('/idverification-parent',[IDverificationController::class, 'showParent'])->name('showParent');
Route::get('/idverification-teacher',[IDverificationController::class, 'showTeacher'])->name('showTeacher');

Route::post('/idverification-parent',[IDverificationController::class, 'checkStudent'])->name('checkStudent');
Route::post('/idverification-teacher',[IDverificationController::class, 'checkTeacher'])->name('checkTeacher');

//ADMIN 
Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/dashboard',[AdminController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/admin/announcement',[AnnouncementController::class, 'showAnnouncements'])->name('adminAnnouncement');
    Route::get('/admin/publish-announcement',[AdminController::class, 'publishAnnouncement'])->name('adminPublish');
    Route::get('/admin/account-settings',[AdminController::class, 'accountSettings'])->name('adminAccountSettings');
    Route::get('/admin/manage-acccount/teachers',[AdminController::class, 'teacher'])->name('adminTeacher');

    Route::post('/submit-announcement', [AnnouncementController::class, 'submitAnnouncement'])->name('submit.announcement');
    Route::post('/update-profile', [ProfileController::class,'updateProfile'])->name('update-profile');

});

//TEACHER 
Route::middleware(['auth', 'role:teacher'])->group(function(){

    Route::get('/teacher/dashboard',[TeacherController::class, 'teacherDashboard'])->name('teacherDashboard');
    Route::get('/teacher/subjects',[TeacherController::class, 'showSubjects'])->name('teacherSubjects');

    //Route::get('/teacher-subject/{teacherId}/{subjectId}', [TeacherController::class, 'assignedSubject'])->name('assignedSubject');

    Route::get('/attendance/show/{teacherId}/{subjectId}/{sectionId?}', [AttendanceController::class,'showAttendanceTable'])->name('showAttendanceTable');
    Route::get('/teacher/announcement',[AnnouncementController::class, 'showAnnouncements'])->name('teacherAnnouncement');

    Route::get('/teacher/account-settings',[TeacherController::class, 'accountSettings'])->name('teacherAccountSettings');
    Route::post('/update-profile', [ProfileController::class,'updateProfile'])->name('update-profile');

    Route::get('/attendance/{student_id}/{subject_id}/present', [AttendanceController::class,'updateAttendance'])->name('attendance.present');
    Route::get('/attendance/{student_id}/{subject_id}/late', [AttendanceController::class,'updateAttendance'])->name('attendance.late');
    Route::get('/attendance/{student_id}/{subject_id}/absent', [AttendanceController::class,'updateAttendance'])->name('attendance.absent');
    Route::get('/attendance/{student_id}/{subject_id}/excused', [AttendanceController::class,'updateAttendance'])->name('attendance.excused');


});

//PARENT
Route::middleware(['auth', 'role:parent'])->group(function(){

    Route::get('/parent/dashboard',[ParentController::class, 'parentDashboard'])->name('parentDashboard');
    Route::get('/parent/announcement',[AnnouncementController::class, 'showAnnouncements'])->name('parentAnnouncement');

    Route::get('/parent/account-settings',[ParentController::class, 'accountSettings'])->name('parentAccountSettings');
    Route::post('/update-profile', [ProfileController::class,'updateProfile'])->name('update-profile');

});





require __DIR__.'/auth.php';
