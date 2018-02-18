<?php
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


Route::group(['prefix' => 'admin', 'middleware' => 'auth_admin'], function () {
    Route::get('comments', 'Admin\CommentController@get')->name('comments');
    Route::post('comments/post', 'Admin\CommentController@post')->name("search");
    Route::delete('/comments/{comment}', ['uses' => 'Admin\CommentController@destroy', 'as' => 'admin.comment.destroy']);
    Route::get('home', 'Admin\AdminController@get');
    Route::get('news/list/{page_num}', 'Admin\NewsController@get');
    Route::get('news/new', 'Admin\NewsNewController@get');
    Route::get('news/edit/{title}', 'Admin\NewsEditController@get');

    Route::post('news/new/post', 'Admin\NewsNewController@post');
    Route::post('news/edit/post', 'Admin\NewsEditController@post');
    Route::post('news/post', 'Admin\NewsController@post');
    Route::get('about_us/edit', 'Admin\AboutUsController@get');

    Route::get('contact_us', 'Admin\ContactUsController@get');
    Route::get('contact_us/answer', 'Admin\ContactUsSendAnswerController@get');

    Route::get('student/list/{condition}/{page_num}', 'Admin\StudentController@get')->where('page_num', '[0-9]+');
    Route::post('student/list/post', 'Admin\StudentController@post');
    Route::get('student/new', 'Admin\StudentNewController@get');
    Route::post('student/new/post', 'Admin\StudentNewController@post');
    Route::get('student/edit/{student_number}', 'Admin\StudentEditController@get');
    Route::post('student/edit/post', 'Admin\StudentEditController@post');
    Route::get('student/semester/list/{id}', 'Admin\StudentSemesterController@get');
    Route::post('student/semester/list/post', 'Admin\StudentSemesterController@post');
    Route::get('student/semester/new/{id}', 'Admin\StudentSemesterNewController@get');
    Route::post('student/semester/new/post', 'Admin\StudentSemesterNewController@post');
    Route::get('student/semester/edit/{id}', 'Admin\StudentSemesterEditController@get');

    Route::get('professor/list/{page_num}', 'Admin\ProfessorController@get')->where('page_num', '[0-9]+');
    Route::post('professor/list/post', 'Admin\ProfessorController@post');
    Route::get('professor/course/{id_professor}', 'Admin\ProfessorCourseController@get');
    Route::get('professor/new', 'Admin\ProfessorNewController@get');
    Route::post('professor/new/post', 'Admin\ProfessorNewController@post');
    Route::get('professor/edit/{id}', 'Admin\ProfessorEditController@get');
    Route::post('professor/edit/post', 'Admin\ProfessorEditController@post');

    Route::get('course/list/{page_num}', 'Admin\CourseController@get')->where('page_num', '[0-9]+');
    Route::post('course/list/post', 'Admin\CourseController@post');
    Route::get('course/available/list/{page_num}', 'Admin\CourseAvailableController@get')->where('page_num', '[0-9]+');
    Route::post('course/available/list/post', 'Admin\CourseAvailableController@post');
    Route::get('course/available/new', 'Admin\CourseAvailableNewController@get');
    Route::post('course/available/new/post', 'Admin\CourseAvailableNewController@post');
    Route::get('course/available/edit/{id}', 'Admin\CourseAvailableEditController@get');
    Route::get('course/new', 'Admin\CourseNewController@get');
    Route::post('course/new/post', 'Admin\CourseNewController@post');
    Route::get('course/edit/{id}', 'Admin\CourseEditController@get');
    Route::post('course/edit/post', 'Admin\CourseEditController@post');

    Route::get('class/list/{page_num}', 'Admin\ClassController@get')->where('page_num', '[0-9]+');
    Route::post('class/list/post', 'Admin\ClassController@post');
    Route::get('class/new', 'Admin\ClassNewController@get');
    Route::post('class/new/post', 'Admin\ClassNewController@post');
    Route::get('class/edit/{id}', 'Admin\ClassEditController@get');
    Route::post('class/edit/post', 'Admin\ClassEditController@post');

    Route::get('manage/select_unit', 'Admin\ManageSelectUnitController@get');

    Route::get('semester/list/{page_num}', 'Admin\SemesterController@get')->where('page_num', '[0-9]+');
    Route::post('semester/new/post', 'Admin\SemesterController@post');
    Route::get('student/financial_record', 'Admin\FinancialRecordController@get');
});

Route::get('admin/login', ['as' => 'login', 'uses' => 'Admin\LoginController@get']);
Route::post('admin/login/post', 'Admin\LoginController@post');
Route::post('admin/logout', 'Admin\LogoutController@logout');

Route::get('not_found', 'Admin\NotFoundController@get');


    Route::get('/', 'User\HomeController@get')->name('index');
    Route::get('/comment', 'User\HomeController@comment')->name('comment');
    Route::post('home/post', 'User\HomeController@post');

    Route::get('news/details', 'User\NewsDetailsController@get');


Route::group(['prefix' => 'student', 'middleware' => 'auth_student'], function () {
    Route::get('home', 'Student\HomeController@get');
    Route::get('setting', 'Student\SettingController@get');
    Route::get('password', 'Student\PasswordController@get');
    Route::get('course/available', 'Student\CourseAvailableController@get');
    Route::get('select_unit', 'Student\SelectUnitController@get');
    Route::get('remove_add_unit', 'Student\RemoveAddUnitController@get');
});
Route::get('student/login', ['as' => 'login_student', 'uses' => 'Student\LoginController@get']);
Route::post('student/login/post', 'Student\LoginController@post');

