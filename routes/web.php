<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\ChargesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PreliminaryPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\WishlistController;
use App\Models\Blog;
use App\Models\Lesson;
use App\Models\PreliminaryPage;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// public routes
Route::get('/about-us', [PreliminaryPageController::class, 'aboutUs'])->name('about.view');
Route::get('/contact-us', [ContactUsController::class, 'ContactHome'])->name('contact.view');
Route::get('/course', [CourseController::class, 'CourseHome'])->name('course.view');
Route::get('/blog', [BlogController::class, 'BlogHome'])->name('blog.view');
Route::get('/blog/{id}', [BlogController::class, 'BlogDetail'])->name('blog-detail.view');
Route::get('/blog/category/{id}', [BlogController::class, 'BlogCategory'])->name('blog-category.view');

// wishlist
Route::get('/wishlist', [WishlistController::class, 'getWishlist'])->name('wishlist');
Route::post('/add-to-wishlist/{course_id}', [WishlistController::class, 'AddToWishList']);
Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlist']);

// cart
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
Route::get('/cart/data/', [CartController::class, 'CartData']);
Route::get('/course/mini/cart/', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/course/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

//checkout
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout.view');

// course
Route::get('/courses/{id}/{slug}', [CourseController::class, 'courseDetails'])->name('course.details.view');
// Cart All Route
Route::controller(CartController::class)->group(function(){
    Route::get('/mycart','MyCart')->name('mycart');
    Route::get('/get-cart-course','GetCartCourse');
});

Route::middleware(['auth'])->group(function () {
    // Route::middleware(['role:user'])->group(function () {
    //     Route::get('/dashboard', [HomeController::class, 'student'])->name('dashboard');
    //     Route::get('/update-biodata', function(){
    //         return view('bioupdate');
    //     })->name('biodata.update');

    // });

    Route::get('/materials/{id}/download', [MaterialController::class, 'download'])->name('materials.download');

    Route::post('/update-biodata',[BiodataController::class,'store'])->name('store.biodata');

    Route::middleware(['role:user'])->group(function () {
    // Route::middleware(['role:user', 'biodata.updated'])->group(function () {
        Route::get('/student/dashboard', [HomeController::class, 'student'])->name('dashboard');
        Route::get('/student/update-biodata',[BiodataController::class,'create'])->name('biodata.update');
        Route::get('/student/student-programs', [ProgramController::class, 'studentGetProgram'])->name('student.all.program');
        Route::get('/student/all-part/{id}', [PartController::class, 'studentFilterPart'])->name('program.part.student');

        Route::get('/onboard/program/{id}', [PartController::class, 'studentFilterPartView'])->name('program.level');
        Route::get('/onboard/program/register-course/{id}', [CourseController::class, 'coursebyPartsView'])->name('program.level.register.student');
        Route::get('/onboard/program/register-course/summary', [PaymentController::class, 'onboardCheckout'])->name('program.level.register.summary');
        Route::post('/onboard/program/register-course/checkout-summary/register', [CourseController::class, 'onboardRegister'])->name('program.level.register.courses.register');
        Route::post('/onboard/program/student/apply-coupon', [CouponController::class, 'onboardCompleteCheckout'])->name('onboard.apply.coupon');
        Route::get('/onboard/program/student/check-out-preview', [PaymentController::class, 'onboardFinalCheckout'])->name('onboard.checkout.preview.final');


        Route::get('/student/register-course/{id}', [CourseController::class, 'coursebyParts'])->name('course.register.student');
        Route::post('/student/courses/register', [CourseController::class, 'register'])->name('courses.register');
        Route::get('/student/checkout-summary', [PaymentController::class, 'checkout'])->name('register.checkout.summary');
        Route::post('/student/apply-coupon', [CouponController::class, 'completeCheckout'])->name('apply.coupon');
        Route::get('/student/check-out-preview', [PaymentController::class, 'finalCheckout'])->name('checkout.preview.final');
        Route::post('/student/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
        Route::get('/student/payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');
        Route::get('/student/payment-history',[PaymentController::class,'getUserPaymentHistory'])->name('user.payment.history');
        Route::get('/student/programmes', [ProgramController::class,'studentBoughtCourses'])->name('viewBy.bought.programme');
        // Route::get('/student/all-parts/{id}',[PartController::class,'studentPaidFilterPart'])->name('program.start');
        Route::get('/student/list-courses/{id}',[CourseController::class,'listBoughtCoursesbyUser'])->name('list.courses');
        Route::get('/student/parts/{id}', [PartController::class, 'studentPaidFilterPart'])->name('program.start');
        Route::get('/student/courses', [CourseController::class, 'enrollmentbyStudent'])->name('enrollment.index');
        Route::get('/student/courses-modules/{id}', [CourseController::class, 'CourseModuleDetails'])->name('course.modules.enrollment');
        Route::get('/student/list-courses-paid/{id}',[CourseController::class, 'ShowBoughtCourses'])->name('bought.courses.list');
        Route::get('/student/lessons-details/{id}',[LessonController::class, 'lessDetails'])->name('bought.lesson.details');
        Route::get('/student/complete-lesson/{id}',[LessonController::class, 'CompleteLesson'])->name('student.complete.lesson');
        // Route::get('/materials/{id}/download', [MaterialController::class, 'studentdownload'])->name('material.student.download');

        // program
        Route::get('/program/{id}', [ProgramController::class, 'programReg'])->name('program');

        // testing
        Route::get('/student/course', function () {
            return view('student.course');
        })->name('student.course');
        Route::get('/student/wishlist', [WishlistController::class, 'studentWishList'])->name('user.wishlist');

        Route::get('/student/review', function () {
            return view('student.review');
        })->name('student.review');
        Route::get('/student/referral', function () {
            return view('student.referral');
        })->name('student.referral');
        Route::get('/student/message', function () {
            return view('student.message');
        })->name('student.message');
        Route::get('/student/support', function () {
            return view('student.support');
        })->name('student.support');
        Route::get('/student/setting', function () {
            return view('student.setting');
        })->name('student.setting');

        Route::get('/student/change-password', function () {
            return view('student.change-password');
        })->name('student.change-password');

        Route::get('/student/social-profile', function () {
            return view('student.social-profile');
        })->name('student.social-profile');

        Route::get('/student/notification', function () {
            return view('student.notification');
        })->name('student.notification');


    });


    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/add-progam',[ProgramController::class,'create'])->name('program.create');
        Route::post('/admin/add-program',[ProgramController::class,'store'])->name('program.store');
        Route::get('/admin/programs', [ProgramController::class, 'index'])->name('program.all');
        Route::get('/admin/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
        Route::post('/admin/program/update', [ProgramController::class, 'update'])->name('program.update');
        Route::delete('/admin/program/{id}', [ProgramController::class, 'destroy'])->name('program.delete');
        Route::get('/admin/add-part', [PartController::class, 'create'])->name('part.form');
        Route::post('/admin/add-part',[PartController::class, 'store'])->name('part.store');
        Route::get('/admin/all-part',[PartController::class, 'index'])->name('all.part');
        Route::delete('/admin/part/{id}', [PartController::class, 'destroy'])->name('part.delete');
        Route::get('/admin/add-course', [CourseController::class,'create'])->name('course.form');
        Route::post('/admin/add-course', [CourseController::class, 'store'])->name('course.store');
        Route::get('/admin/view-courses',[CourseController::class,'index'])->name('all.courses');
        Route::get('/admin/course-detail/{id}', [CourseController::class, 'courseDetail'])->name('course.detail');
        Route::get('/admin/edit-course/{id}', [CourseController::class, 'editCourse'])->name('course.edit');
        Route::put('/admin/courses/{id}', [CourseController::class, 'storeupdate'])->name('course.update');
        Route::delete('/admin/course/{id}', [CourseController::class, 'destroy'])->name('course.delete');
        Route::get('/admin/add-module', [ModuleController::class, 'create'])->name('add.module');
        Route::post('/admin/add-module',[ModuleController::class,'store'])->name('module.store');
        Route::get('/admin/view-modules',[ModuleController::class,'index'])->name('all.modules');
        Route::get('/admin/edit-module/{id}', [ModuleController::class, 'editModule'])->name('module.edit');
        Route::put('/admin/module/{id}', [ModuleController::class, 'storeupdate'])->name('module.update');
        Route::delete('/admin/module/{id}', [ModuleController::class, 'destroy'])->name('module.delete');
        Route::get('/all-modules', [LessonController::class, 'index'])->name('all.modules.lesson');
        Route::get('/admin/add-lesson/{id}', [LessonController::class,'create'])->name('add.lesson');
        Route::post('/admin/add-lesson', [LessonController::class, 'store'])->name('lesson.store');
        Route::get('/admin/lesson-course/{id}', [LessonController::class, 'showCoures'])->name('lesson.course.module');
        Route::delete('/admin/lesson/{id}', [LessonController::class, 'destroy'])->name('lesson.delete');
        Route::get('/admin/lesson-edit/{id}', [LessonController::class, 'edit'])->name('lesson.edit.form');
        Route::put('/admin/lesson-edit/{id}', [LessonController::class, 'update'])->name('lesson.update');
        Route::get('/admin/add-material/{id}',[MaterialController::class,'create'])->name('add.material');
        Route::post('/admin/add-material',[MaterialController::class,'store'])->name('material.store');
        Route::get('/admin/all-material',[MaterialController::class,'index'])->name('all.materials');
        Route::delete('/admin/material/{id}', [MaterialController::class, 'destroy'])->name('material.delete');
        Route::get('/admin/add-center', [CenterController::class, 'create'])->name('add.center');
        Route::post('/admin/add-center', [CenterController::class, 'store'])->name('center.store');
        Route::get('/admin/all-centers', [CenterController::class, 'index'])->name('all.center');
        Route::get('/admin/edit-center/{id}', [CenterController::class, 'edit'])->name('center.update');
        Route::put('/admin/edit-center/{id}', [CenterController::class, 'update'])->name('center.store.update');
        Route::delete('/admin/center/{id}', [CenterController::class, 'destroy'])->name('center.delete');
        Route::get('/admin/add-coupon', [CouponController::class, 'create'])->name('add.coupon');
        Route::post('/admin/add-coupon',[CouponController::class,'store'])->name('coupon.store');
        Route::get('/admin/all-coupon', [CouponController::class, 'index'])->name('all.coupons');
        Route::delete('/admin/coupon/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');
        Route::get('/admin/all-payment-history',[PaymentController::class, 'AdminGetPaymentHistory'])->name('all.payment.history');
        Route::get('/admin/edit-part/{id}', [PartController::class, 'edit'])->name('show.edit.form');
        Route::put('/admin/store-part/{id}', [PartController::class, 'update'])->name('parts.store');
        Route::get('/admin/add-charge', [ChargesController::class, 'create'])->name('charge.form');
        Route::post('/admin/add-charge', [ChargesController::class, 'store'])->name('charge.store');
        Route::get('/admin/all-charge', [ChargesController::class, 'index'])->name('all.charges');
        Route::delete('/admin/delete-charge/{id}', [ChargesController::class, 'destroy'])->name('charge.delete');
        Route::get('/charges/{charge}/edit', [ChargesController::class, 'edit'])->name('charges.edit');
        Route::put('/charges/{charge}', [ChargesController::class, 'update'])->name('charges.update');

        Route::get('/admin/add-category', [BlogCategoryController::class, 'create'])->name('category.form');
        Route::post('/admin/store-category',[BlogCategoryController::class,'store'])->name('category.store');
        Route::get('/admin/all-category', [BlogCategoryController::class, 'index'])->name('all.category');
        Route::get('/admin/edit-category/{id}', [BlogCategoryController::class, 'edit'])->name('edit.category.form');
        Route::put('/admin/store-category/{id}', [BlogCategoryController::class, 'update'])->name('category.edit.store');
        Route::delete('/admin/delete-category/{id}', [BlogCategoryController::class, 'destroy'])->name('category.delete');
        Route::get('/admin/add-post', [BlogController::class, 'create'])->name('post.form');
        Route::post('/admin/store-post',[BlogController::class,'store'])->name('post.store');
        Route::get('/admin/all-posts', [BlogController::class, 'index'])->name('all.post');
        Route::delete('/admin/delete-post/{id}', [BlogController::class, 'destroy'])->name('post.delete');
        Route::get('/admin/edit-post/{id}', [BlogController::class, 'edit'])->name('edit.post.form');
        Route::put('/admin/store-post/{id}', [BlogController::class, 'update'])->name('post.edit.store');

        Route::resource('slide', PartnerController::class);
    });

    Route::middleware(['role:instructor'])->group(function () {
        Route::get('/instructor/dashboard', [HomeController::class, 'instructor'])->name('instructor.dashboard');
    });
});

// Unauthorized access route
Route::get('/unauthorized', function () {
    return 'Unauthorized access';
})->name('unauthorized');
