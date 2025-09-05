<?php

use App\Http\Controllers\Api\ChannelController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// ---------------- HomeController ----------------
Route::post('get_language', [HomeController::class, 'get_language'])->name('get-language');
Route::post('doctor_detail', [HomeController::class, 'cast_detail'])->name('cast-detail');
Route::get('get_doctor', [HomeController::class, 'get_doctor'])->name('get-doctor');
Route::post('get_category', [HomeController::class, 'get_category'])->name('get-category');
Route::post('get_banner', [HomeController::class, 'get_banner'])->name('get-banner');
Route::post('general_setting', [HomeController::class, 'general_setting'])->name('general-setting');
Route::post('get_type', [HomeController::class, 'get_type'])->name('get-type');
Route::post('get_avatar', [HomeController::class, 'get_avatar'])->name('get-avatar');
Route::post('section_list', [HomeController::class, 'section_list'])->name('section-list');
Route::post('section_detail', [HomeController::class, 'section_detail'])->name('section-detail');
Route::post('add_continue_watching', [HomeController::class, 'add_continue_watching'])->name('add-continue-watching');
Route::post('remove_continue_watching', [HomeController::class, 'remove_continue_watching'])->name('remove-continue-watching');
Route::post('add_remove_bookmark', [HomeController::class, 'add_remove_bookmark'])->name('add-remove-bookmark');
Route::post('add_remove_download', [HomeController::class, 'add_remove_download'])->name('add-remove-download');
Route::post('add_transaction', [HomeController::class, 'add_transaction'])->name('add-transaction');
Route::post('add_rent_transaction', [HomeController::class, 'add_rent_transaction'])->name('add-rent-transaction');
Route::post('video_by_category', [HomeController::class, 'video_by_category'])->name('video-by-category');
Route::post('video_by_language', [HomeController::class, 'video_by_language'])->name('video-by-language');
Route::post('get_bookmark_video', [HomeController::class, 'get_bookmark_video'])->name('get-bookmark-video');
Route::post('search_video', [HomeController::class, 'search_video'])->name('search-video');
Route::post('user_rent_video_list', [HomeController::class, 'user_rent_video_list'])->name('user-rent-video-list');
Route::post('rent_video_list', [HomeController::class, 'rent_video_list'])->name('rent-video-list');
Route::post('get_payment_option', [HomeController::class, 'get_payment_option'])->name('get-payment-option');
Route::post('get_video_by_session_id', [HomeController::class, 'get_video_by_session_id'])->name('get-video-by-session-id');
Route::get('get_package', [HomeController::class, 'get_package'])->name('get-package');
Route::post('get_payment_token', [HomeController::class, 'get_payment_token'])->name('get-payment-token');

// ---------------- ChannelController ----------------
Route::post('get_channel', [ChannelController::class, 'get_channel'])->name('get-channel');
Route::post('channel_section_list', [ChannelController::class, 'channel_section_list'])->name('channel-section-list');

// ---------------- UsersController ----------------
Route::post('login', [UserController::class, 'login'])->name('api-login');
Route::post('registration', [UserController::class, 'registration'])->name('api-registration');
Route::post('get_profile', [UserController::class, 'get_profile'])->name('get-profile');
Route::get('get_blog', [UserController::class, 'get_blog'])->name('get-blog');
Route::get('get_labs', [UserController::class, 'get_alllabs'])->name('get-labs');
Route::get('get_gallery', [UserController::class, 'get_gallery'])->name('get-gallery');
Route::get('get_alltest', [UserController::class, 'get_tests'])->name('get-test');
Route::get('get_allbanner', [UserController::class, 'get_allbanner'])->name('get-allbanner');
Route::get('get_partner_subject', [UserController::class, 'get_partnersubject'])->name('get-subject');
Route::get('about_us', [UserController::class, 'about_uspage'])->name('get-about');
Route::post('enquiry', [UserController::class, 'enquiry'])->name('get-enquiry');
Route::post('blog_details', [UserController::class, 'blog_details'])->name('get-details');
Route::post('get_relation', [UserController::class, 'get_relation'])->name('get-relation');
Route::post('update_profile', [UserController::class, 'update_profile'])->name('update-profile');
Route::post('list_family', [UserController::class, 'list_family'])->name('list-family');
Route::post('add_family', [UserController::class, 'add_family'])->name('add-family');
Route::post('update_family', [UserController::class, 'update_family'])->name('update-family');
Route::post('delete_family', [UserController::class, 'delete_family'])->name('delete-family');
Route::post('image_upload', [UserController::class, 'image_upload'])->name('image-upload');
Route::post('create_booking', [UserController::class, 'create_booking'])->name('add-booking');
Route::post('booking_success', [UserController::class, 'booking_success'])->name('update-booking');
Route::post('list_address', [UserController::class, 'list_address'])->name('list-address');
Route::post('get_city', [UserController::class, 'get_city'])->name('get-city');
Route::post('get_state', [UserController::class, 'get_state'])->name('get-state');
Route::post('add_address', [UserController::class, 'add_address'])->name('add-address');
Route::post('update_address', [UserController::class, 'update_address'])->name('update-address');
Route::post('delete_address', [UserController::class, 'delete_address'])->name('delete-address');
Route::post('/booking_list', [UserController::class, 'booking_list'])->name('booking-list');

