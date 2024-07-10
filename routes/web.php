<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Models\Lesson;
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
    // Route::middleware(['role:user'])->group(function () {
    //     Route::get('/dashboard', [HomeController::class, 'student'])->name('dashboard');
    //     Route::get('/update-biodata', function(){
    //         return view('bioupdate');
    //     })->name('biodata.update');
        
    // });
    Route::get('/materials/{id}/download', [MaterialController::class, 'download'])->name('materials.download');
    
    Route::post('/update-biodata',[BiodataController::class,'store'])->name('store.biodata');
    Route::middleware(['role:user', 'biodata.updated'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'student'])->name('dashboard');
        Route::get('/update-biodata',[BiodataController::class,'create'])->name('biodata.update');
        Route::get('/student-programs', [ProgramController::class, 'studentGetProgram'])->name('student.all.program');
        Route::get('/all-part/{id}', [PartController::class, 'studentFilterPart'])->name('program.part.student');
        Route::get('/register-course/{id}', [CourseController::class, 'coursebyParts'])->name('course.register.student');
        Route::post('/courses/register', [CourseController::class, 'register'])->name('courses.register');
        Route::get('/checkout-summary', [PaymentController::class, 'checkout'])->name('register.checkout.summary');
        Route::post('/apply-coupon', [CouponController::class, 'completeCheckout'])->name('apply.coupon');
        Route::get('/check-out-preview', [PaymentController::class, 'finalCheckout'])->name('checkout.preview.final');
        Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
        Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');
        Route::get('/payment-history',[PaymentController::class,'getUserPaymentHistory'])->name('user.payment.history');
        Route::get('/programmes', [ProgramController::class,'studentBoughtCourses'])->name('viewBy.bought.programme');
        Route::post('/all-parts',[PartController::class,'studentPaidFilterPart'])->name('program.start');
        Route::get('/parts', [PartController::class, 'showParts'])->name('parts.index');
        Route::get('/courses', [CourseController::class, 'enrollmentbyStudent'])->name('enrollment.index');

        Route::post('/courses',[CourseController::class,'listBoughtCoursesbyUser'])->name('list.courses');
        // Route::get('/materials/{id}/download', [MaterialController::class, 'studentdownload'])->name('material.student.download');
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
        Route::get('/lesson-edit/{id}', [LessonController::class, 'edit'])->name('lesson.edit.form');
        Route::put('/lesson-edit/{id}', [LessonController::class, 'update'])->name('lesson.update');
        Route::get('/add-material/{id}',[MaterialController::class,'create'])->name('add.material');
        Route::post('/add-material',[MaterialController::class,'store'])->name('material.store');
        Route::get('/all-material',[MaterialController::class,'index'])->name('all.materials');
        Route::delete('/material/{id}', [MaterialController::class, 'destroy'])->name('material.delete');
        Route::get('/add-center', [CenterController::class, 'create'])->name('add.center');
        Route::post('/add-center', [CenterController::class, 'store'])->name('center.store');
        Route::get('/all-centers', [CenterController::class, 'index'])->name('all.center');
        Route::get('/edit-center/{id}', [CenterController::class, 'edit'])->name('center.update');
        Route::put('/edit-center/{id}', [CenterController::class, 'update'])->name('center.store.update');
        Route::delete('/center/{id}', [CenterController::class, 'destroy'])->name('center.delete');
        Route::get('/add-coupon', [CouponController::class, 'create'])->name('add.coupon');
        Route::post('/add-coupon',[CouponController::class,'store'])->name('coupon.store');
        Route::get('/all-coupon', [CouponController::class, 'index'])->name('all.coupons');
        Route::delete('/coupon/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');
        Route::get('/all-payment-history',[PaymentController::class, 'AdminGetPaymentHistory'])->name('all.payment.history');
    });

    Route::middleware(['role:instructor'])->group(function () {
        Route::get('/instructor/dashboard', [HomeController::class, 'instructor'])->name('instructor.dashboard');
    });
});

// Unauthorized access route
Route::get('/unauthorized', function () {
    return 'Unauthorized access';
})->name('unauthorized');