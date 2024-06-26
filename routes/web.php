<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
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
});

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:user'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'student'])->name('dashboard');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/add-progam',[ProgramController::class,'create'])->name('program.create');
        Route::post('/add-program',[ProgramController::class,'store'])->name('program.store');
        Route::get('/programs', [ProgramController::class, 'index'])->name('program.all');
        Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
        Route::post('/program/update', [ProgramController::class, 'update'])->name('program.update');
        Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.delete');
        Route::get('/add-part', [PartController::class, 'create'])->name('part.form');
        Route::post('/add-part',[PartController::class, 'store'])->name('part.store');
        Route::get('/all-part',[PartController::class, 'index'])->name('all.part');
        Route::delete('/part/{id}', [PartController::class, 'destroy'])->name('part.delete');
        Route::get('/add-course', [CourseController::class,'create'])->name('course.form');
        Route::post('/add-course', [CourseController::class, 'store'])->name('course.store');
        Route::get('/view-courses',[CourseController::class,'index'])->name('all.courses');
        Route::get('/course-detail/{id}', [CourseController::class, 'courseDetail'])->name('course.detail');
        Route::get('/edit-course/{id}', [CourseController::class, 'editCourse'])->name('course.edit');
        Route::put('/courses/{id}', [CourseController::class, 'storeupdate'])->name('course.update');
        Route::delete('/course/{id}', [CourseController::class, 'destroy'])->name('course.delete');
        Route::get('/add-module', [ModuleController::class, 'create'])->name('add.module');
        Route::post('/add-module',[ModuleController::class,'store'])->name('module.store');
        Route::get('/view-modules',[ModuleController::class,'index'])->name('all.modules');
        Route::get('/edit-module/{id}', [ModuleController::class, 'editModule'])->name('module.edit');
        Route::put('/module/{id}', [ModuleController::class, 'storeupdate'])->name('module.update');
        Route::delete('/module/{id}', [ModuleController::class, 'destroy'])->name('module.delete');
        Route::get('all-modules', [LessonController::class, 'index'])->name('all.modules.lesson');
        Route::get('/add-lesson/{id}', [LessonController::class,'create'])->name('add.lesson');
        Route::post('/add-lesson', [LessonController::class, 'store'])->name('lesson.store');
        Route::get('/lesson-course/{id}', [LessonController::class, 'showCoures'])->name('lesson.course.module');
        Route::delete('/lesson/{id}', [LessonController::class, 'destroy'])->name('lesson.delete');
        Route::get('/edit-lesson/{id}',[LessonController::class,'editLesson'])->name('edit.lesson.form');
        Route::put('/edit-lesson/{id}', [LessonController::class, 'storeupdate'])->name('lesson.update');
        Route::get('/add-material/{id}',[MaterialController::class,'create'])->name('add.material');
        Route::post('/add-material',[MaterialController::class,'store'])->name('material.store');
        Route::get('/all-material',[MaterialController::class,'index'])->name('all.materials');
        Route::delete('/material/{id}', [MaterialController::class, 'destroy'])->name('material.delete');
        Route::get('/materials/{id}/download', [MaterialController::class, 'download'])->name('materials.download');

    });

    Route::middleware(['role:instructor'])->group(function () {
        Route::get('/instructor/dashboard', [HomeController::class, 'instructor'])->name('instructor.dashboard');
    });
});

// Unauthorized access route
Route::get('/unauthorized', function () {
    return 'Unauthorized access';
})->name('unauthorized');