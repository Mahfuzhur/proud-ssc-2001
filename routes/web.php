<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('form.create');
});
// Route::post('/form','FormController@store');
// Route::post('contact','EmailController@postContact');

// Route::get('/admin-login','AdminController@adminLogin');
// Route::post('/admin-login-check','AdminController@adminLoginCheck');
// Route::get('/admin-dashboard','AdminController@adminDashboard');
// Route::get('/admin-logout','AdminController@adminLogout');
// Route::get('/admin-user-list','AdminController@adminUserList');
// Route::get('/user-registration','UserController@userRegistration');
// Route::post('/save-user-information','UserController@saveUserInformation');
// Route::get('/user-login','UserController@userLogin');
// Route::post('/user-login-check','UserController@userLoginCheck');
// Route::get('/user-dashboard','UserController@userDashboard');

// Route::post('/accepted','AdminController@accepted');

// // //Route::get('/mail','EmailController@index');
//  Route::post('/send','EmailController@send');
// // //Route::get('/email','EmailController@email');





// Route::get('/single-user-info/{id}','UserController@userSingleInfo');
// Route::get('/user-logout','UserController@userLogout');
// Route::post('/change-password/{id}','UserController@changePassword');
Route::get('/','HomePageController@home');
Route::get('/founder-member','HomePageController@founderMember');
Route::get('/admin-moderator-panel','HomePageController@adminModeratorPanel');
Route::get('/gallery','HomePageController@gallery');
Route::get('/registration','HomePageController@registration');
Route::get('/notice-board','HomePageController@noticeBoard');
Route::get('/contact-us','HomePageController@contactUs');
Route::post('/save-contact-us-info','HomePageController@saveContactUsInfo');
Route::post('/form','FormController@store');
Route::post('contact','EmailController@postContact');

Route::get('/admin-login','AdminController@adminLogin');
Route::post('/admin-login-check','AdminController@adminLoginCheck');
Route::get('/admin-dashboard','AdminController@adminDashboard');
Route::get('/admin-logout','AdminController@adminLogout');
Route::get('/admin-user-list','AdminController@adminUserList');
Route::get('/user-registration','UserController@userRegistration');
Route::post('/save-user-information','UserController@saveUserInformation');
Route::get('/user-login','UserController@userLogin');
Route::post('/user-login-check','UserController@userLoginCheck');
Route::get('/user-dashboard','UserController@userDashboard');

Route::get('/user-profile-info/{id}','HomePageController@userProfileInfo');

Route::post('/accepted','AdminController@accepted');

//Route::get('/mail','EmailController@index');
Route::post('/send','EmailController@send');
Route::get('/search','HomePageController@search');
Route::post('/suspend-user','AdminController@suspendUser');
Route::post('/search-ssc-user','HomePageController@searchUser');
Route::get('/user-details-info/{id}','HomePageController@userDetailsInfo');

Route::get('/admin-single-user-info/{id}','AdminController@adminSingleSingleInfo');
Route::get('/suspend-user-list','AdminController@suspenduserList');


Route::get('/single-user-info/{id}','UserController@userSingleInfo');
Route::get('/user-logout','UserController@userLogout');
Route::post('/change-password/{id}','UserController@changePassword');
Route::get('/edit-user-profile/{id}','UserController@editUserProfile');
Route::post('/update-user-profile/{id}','UserController@updateUserProfile');
Route::get('/forgot-password','UserController@forgotPassword');
Route::post('/forgot-password-mail-send','EmailController@forgotPasswordMailSend');
Route::get('/notice-board','HomePageController@noticeBoard');
Route::get('/admin-notice-board','AdminController@adminMangeNoticeBoard');
Route::get('/add-notice','AdminController@addNotice');
Route::post('/save-notice-info','AdminController@saveNoticeInfo');
Route::get('/edit-notice/{id}','AdminController@editNotice');
Route::post('/update-notice-info/{id}','AdminController@updateNoticeInfo');
Route::get('/delete-notice/{id}','AdminController@deleteNotice');
Route::get('/change-notice-status/{id}','AdminController@changeNoticeStatus');
Route::get('/gallery','HomePageController@gallery');
Route::get('/gallery/{id}','HomePageController@categoryWiseGallery');
Route::get('/add-gallery-image','AdminController@addGalleryImage');
Route::post('/save-gallery-image','AdminController@saveGalleryImage');
Route::get('/admin-gallery-category','AdminController@adminGalleryCategory');
Route::get('/add-gallery-category','AdminController@addGalleryCategory');
Route::post('/save-gallery-category-info','AdminController@saveGalleryCategoryInfo');
Route::get('/edit-gallery-category/{id}','AdminController@editGalleryCategory');
Route::post('/save-gallery-category-info/{id}','AdminController@updateGalleryCategoryInfo');
Route::get('/delete-gallery-category/{id}','AdminController@deleteGalleryCategoryInfo');
Route::get('/change-gallery-category-status/{id}','AdminController@changeGalleryCategoryStatus');
Route::get('/admin-gallery','AdminController@adminManageGallery');
Route::get('/admin-edit-gallery/{id}','AdminController@adminEditGallery');
Route::post('/admin-save-gallery-image/{id}','AdminController@adminSaveGalleryImage');
Route::get('/admin-delete-gallery/{id}','AdminController@adminDeleteGallery');
Route::post('/search-friends','HomePageController@searchFriends');
Route::get('/admin-delete-user/{id}','AdminController@adminDeleteUser');
Route::get('/active-user/{id}','AdminController@activeUser');

