<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Course_categoryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\THFOS_Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\Batch_infoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\V_courseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserController;

//////////Frontend/////////////
use App\Http\Controllers\HomeFEController;
use App\Http\Controllers\StudentFEController;
use App\Http\Controllers\CourseFEController;
use App\Http\Controllers\BlogFEController;
use App\Http\Controllers\VolunteerFEController;
use App\Http\Controllers\ContactFEController;
use App\Http\Controllers\FeedbackFEController;


Route::get('/', function () {
    return view('frontend/home');
});
Route::resource('/', HomeFEController::class);
// Route::get('/',[HomeFEController::class, 'cate_show']);

// Route::get('/courses', function () {
//     return view('frontend/courses');
// });
//////////Courses////////////
Route::resource('courses', CourseFEController::class);
Route::get('/course_detail/{id}',[CourseFEController::class, 'course_detail']);

Route::get('/course_detail', function () {
    return view('frontend/course_detail');
});
Route::get('/blog',[BlogFEController::class, 'blog_show'])->name('blogShow');
Route::get('/blog-post/{id}',[BlogFEController::class, 'blpost_show' ])->name('blogDetail');
Route::get('/about', function () {
    return view('frontend/about');
});


//////////Contact////////////
// Route::get('/contact', function () {
//     return view('frontend/contact');
// });
Route::resource('contact', ContactFEController::class);


//////////Student Registration////////////
Route::resource('student_registration', StudentFEController::class);
Route::get('/student_registration',[StudentFEController::class, 'all']);
Route::get('/course_registration/{id}',[StudentFEController::class, 'selected_course']);

// Route::get('/stu_reg_complete', function () {
//     return view('frontend/stu_reg_complete');
// });

Route::post('/student_register_complete',[StudentFEController::class, 'regData']);

//////////Volunteer Registration////////////
Route::resource('volunteer_registration', VolunteerFEController::class);
Route::post('volunteer_registration/fetch', [VolunteerFEController::class,'fetch'])->name('volunteerregistration.fetch');

//////////Feedback////////////
Route::resource('feedback', FeedbackFEController::class);


//////////Frontend/////////////

//////////Backend/////////////

Auth::routes();
Route::group(['middleware' => 'auth'], function(){

Route::get('editprofile/{id}',[UserController::class, 'edit']);
Route::get('updateprofile/{id}',[UserController::class, 'update']);

Route::get('changepassword/{id}',[UserController::class, 'editpwd']);
Route::get('updatepassword/{id}',[UserController::class, 'updatepwd']);
    //////////Course////////////
Route::resource('course', CourseController::class);
Route::get('course/create',[CourseController::class, 'create']);
Route::get('create_course/{id}',[CourseController::class, 'course']);

/////////Batchinfo////////////////
Route::resource('batch_info', Batch_infoController::class);

Route::get('batch_info/create',[Batch_infoController::class, 'create'])->name('batch_info.create');
Route::get('batchinfo/{id}',[Batch_infoController::class, 'batch']);
Route::get('batchinfo_status/{id}',[Batch_infoController::class, 'changeStatus'])->name('completedUpdate');
Route::get('active_classes', [Batch_infoController::class, 'active']);
Route::get('inactive_classes', [Batch_infoController::class, 'inactive']);

/////////Batch////////////////
Route::resource('batch', BatchController::class);
Route::get('batch/create',[BatchController::class, 'create']);

////////Blog////////////
Route::resource('blogs', BlogController::class);
Route::get('blogs/create',[BlogController::class, 'create']);

////////Contact////////////
Route::resource('contacts', ContactController::class);

////////Feedback////////////
Route::resource('feedbacks', FeedbackController::class);
Route::get('feedbacks/create',[FeedbackController::class, 'create']);
Route::get('uploadFeedback/{id}',[FeedbackController::class, 'changeStatus'])->name('uploadFeedback');


////////Position////////////
Route::resource('position', PositionController::class);
Route::get('position/create',[PositionController::class, 'create']);

////////Course_category////////////
Route::resource('category', Course_categoryController::class);
Route::get('category/create',[Course_categoryController::class, 'create']);

////////Volunteer//////////
Route::resource('volunteer',VolunteerController::class);
Route::get('volunteer/create',[VolunteerController::class, 'create']);
Route::get('volunteer_confirm/{id}',[VolunteerController::class, 'changeStatus'])->name('confirmVolunteer');
Route::get('active_volunteer', [VolunteerController::class, 'active']);
Route::get('inactive_volunteer', [VolunteerController::class, 'inactive']);

////////v_course//////////
Route::resource('v_course',V_courseController::class);
Route::get('v_course/create',[V_courseController::class, 'create']);

////////Student//////////
Route::resource('student',StudentController::class);
Route::get('student_pivot',[StudentController::class, 'student_pivot']);
Route::get('student/create',[StudentController::class, 'create']);
Route::post('student/store_student',[StudentController::class, 'store_student']);
Route::get('/studentRegister/{id}', [BackendController::class, 'studentRegister'])->name('backend.studentRegister');
Route::post('student/filter', [BackendController::class, 'studentFilter'])->name('students.filter');

Route::get('student_confirm/{id}/{batch_info_id}',[StudentController::class, 'changeStatus'])->name('confirmStudent');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'main'])->name('home');
});

