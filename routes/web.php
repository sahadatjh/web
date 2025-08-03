<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CommonAdminController;
use App\Http\Controllers\TeacherController;
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

// Route::get('/', function(){
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/detail/{slug}/{id}',[HomeController::class,'detail']);
Route::get('/all-categories',[HomeController::class,'all_category']);
Route::get('/category/{slug}/{id}',[HomeController::class,'category']);
Route::post('/save-comment/{slug}/{id}',[HomeController::class,'save_comment']);
Route::get('save-post-form',[HomeController::class,'save_post_form']);
Route::post('save-post-form',[HomeController::class,'save_post_data']);
Route::get('manage-posts',[HomeController::class,'manage_posts']);


// Admin Routes
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'submit_login']);
Route::get('/admin/logout',[AdminController::class,'logout']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
// Post
Route::get('admin/user',[AdminController::class,'users']);
Route::get('admin/user/delete/{id}',[AdminController::class,'delete_user']);
// Comment
Route::get('admin/comment',[AdminController::class,'comments']);
Route::get('admin/comment/delete/{id}',[AdminController::class,'delete_comment']);
// Categories
Route::get('admin/category/{id}/delete',[CategoryController::class,'destroy']);
Route::resource('admin/category',CategoryController::class);
// Posts
Route::get('admin/post/{id}/delete',[PostController::class,'destroy']);
Route::resource('admin/post',PostController::class);
// Settings
Route::get('/admin/setting',[SettingController::class,'index']);
Route::post('/admin/setting',[SettingController::class,'save_settings']);

// CMS
Route::get('admin/cms_pages/{id}',[AboutusController::class,'aboutUsPages']);
Route::get('admin/cms_page/{id}/edit',[AboutusController::class,'contentEdit']);
Route::put('admin/cms_page_update/{id}',[AboutusController::class,'contentUpdateSave']);

Route::post('admin/ckeditor_upload', [AboutusController::class, 'upload_ckeditor_data'])->name('admin.ckeditor_upload');


Route::get('admin/information_pages',[InformationsController::class,'informationPages']);
Route::get('admin/information/{id}/delete',[InformationsController::class,'destroy']);
Route::resource('admin/information',InformationsController::class);

Route::get('admin/event_pages',[EventsController::class,'eventPages']);
Route::get('admin/event/{id}/delete',[EventsController::class,'destroy']);
Route::resource('admin/event',EventsController::class);

// Website banners
Route::get('admin/banners',[CommonAdminController::class,'index']);
Route::get('admin/create-banner',[CommonAdminController::class,'create_banner']);
Route::post('admin/banner-add-save',[CommonAdminController::class,'banner_add_save']);
Route::get('admin/banner/{id}/edit',[CommonAdminController::class,'banner_edit']);
Route::put('admin/banner-update-save/{id}',[CommonAdminController::class,'banner_update_save']);
Route::get('admin/banner/{id}/delete',[CommonAdminController::class,'banner_delete']);
// Website banners contents
Route::get('admin/banner-contents',[CommonAdminController::class,'bannerc_ontents']);
Route::get('admin/create-banner-content',[CommonAdminController::class,'create_banner_contents']);
Route::post('admin/banner-content-add-save',[CommonAdminController::class,'banner_contents_add_save']);
Route::get('admin/banner-content/{id}/edit',[CommonAdminController::class,'banner_contents_edit']);
Route::put('admin/banner-content-update-save/{id}',[CommonAdminController::class,'banner_contents_update_save']);
// Route::get('admin/banner-content/{id}/delete',[CommonAdminController::class,'banner_contents_delete']);
// Website about us
Route::get('admin/about_us',[CommonAdminController::class,'aboutUs']);
Route::get('admin/create_about_us',[CommonAdminController::class,'createAboutUs']);
Route::post('admin/create_about_us_save',[CommonAdminController::class,'aboutUsSave']);
Route::get('admin/about_us/{id}/edit',[CommonAdminController::class,'aboutUsEdit']);
Route::put('admin/about_us_update_save/{id}',[CommonAdminController::class,'aboutUsUpdateSave']);

// Website online-fee-payment
Route::get('admin/online_fee_payment',[CommonAdminController::class,'onlineFeePayment']);
Route::get('admin/create_online_fee_payment',[CommonAdminController::class,'createonlineFeePayment']);
Route::post('admin/create_online_fee_payment_save',[CommonAdminController::class,'onlineFeePaymentSave']);
Route::get('admin/online_fee_payment/{id}/edit',[CommonAdminController::class,'onlineFeePaymentEdit']);
Route::put('admin/online_fee_payment_update_save/{id}',[CommonAdminController::class,'onlineFeePaymentUpdateSave']);
Route::get('admin/online_fee_payment/{id}/delete',[CommonAdminController::class,'onlineContentDelete']);

// Website online-result
Route::get('admin/online_result',[CommonAdminController::class,'onlineResult']);
Route::get('admin/create_online_result',[CommonAdminController::class,'createonlineResult']);
Route::post('admin/create_online_result_save',[CommonAdminController::class,'onlineResultSave']);
Route::get('admin/online_result/{id}/edit',[CommonAdminController::class,'onlineResultEdit']);
Route::put('admin/online_result_update_save/{id}',[CommonAdminController::class,'onlineResultUpdateSave']);
Route::get('admin/online_result/{id}/delete',[CommonAdminController::class,'onlineContentDelete']);

// Website online-exam info
Route::get('admin/online_exam',[CommonAdminController::class,'onlineExam']);
Route::get('admin/create_online_exam',[CommonAdminController::class,'createonlineExam']);
Route::post('admin/create_online_exam_save',[CommonAdminController::class,'onlineExamSave']);
Route::get('admin/online_exam/{id}/edit',[CommonAdminController::class,'onlineExamEdit']);
Route::put('admin/online_exam_update_save/{id}',[CommonAdminController::class,'onlineExamUpdateSave']);
Route::get('admin/online_exam/{id}/delete',[CommonAdminController::class,'onlineContentDelete']);

// Website all_events
Route::get('admin/all_events',[CommonAdminController::class,'allEvents']);
Route::get('admin/create_event',[CommonAdminController::class,'createEvent']);
Route::post('admin/create_event_save',[CommonAdminController::class,'createEventSave']);
Route::get('admin/all_events/{id}/edit',[CommonAdminController::class,'eventEdit']);
Route::put('admin/event_update_save/{id}',[CommonAdminController::class,'eventUpdateSave']);
Route::get('admin/all_events/{id}/delete',[CommonAdminController::class,'eventDelete']);

// Website archives images
Route::get('admin/home_page_archives',[CommonAdminController::class,'homePageArchives']);
Route::get('admin/create_home_page_archive',[CommonAdminController::class,'createHomePageArchives']);
Route::post('admin/home_page_archive_save',[CommonAdminController::class,'homePageArchivesSave']);
Route::get('admin/home_page_archives/{id}/edit',[CommonAdminController::class,'homePageArchivesEdit']);
Route::put('admin/home_page_archive_update_save/{id}',[CommonAdminController::class,'homePageArchivesUpdateSave']);
Route::get('admin/home_page_archives/{id}/delete',[CommonAdminController::class,'homePageArchivesDelete']);

Route::get('admin/web_settings',[CommonAdminController::class,'webSettings']);
Route::put('admin/web_settings_save',[CommonAdminController::class,'webSettingsSave']);

// Teachers
Route::get('admin/teacher_list',[TeacherController::class,'index']);
Route::get('admin/create-teacher',[TeacherController::class,'create_teacher']);
Route::post('admin/teacher-add-save',[TeacherController::class,'teacher_add_save']);
Route::get('admin/teacher/{id}/edit',[TeacherController::class,'teacher_edit']);
Route::post('admin/teacher-update-save/{id}',[TeacherController::class,'teacher_update_save']);
Route::get('admin/teacher/{id}/delete',[TeacherController::class,'teacher_delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

// Teachers page
Route::get('/all-teachers',[HomeController::class,'all_teachers']);

// getContentForPage
Route::get('/page/{slug}',[HomeController::class,'getContentForPage']);