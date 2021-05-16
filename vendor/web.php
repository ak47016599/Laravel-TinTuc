
<?php

use App\Http\Controllers\MyController;
use App\LoaiTin;
use App\Theloai;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('addComment/{idUser}/{id}', function(){
    echo 'Comment';
 });
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');
Route::get('check', 'CheckController@check');
Route::get('logout/user', function(){

    if(session()->has('login_user')){
        session()->forget('login_user');
        Auth::logout();
    }
    return redirect('tintuc/post');
});

Route::get('Login/solider', function(){
    //echo "kvkvkv"; die();
   return(view('Auth.login'));
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('Facebook', function(){
     return(view('Auth.index'));
});
Route::get('ajaxRequest', 'UsersController@ajaxRequest');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('admin/dangnhap', 'UsersController@getAdminLogin');
Route::get('admin/logout', 'UsersController@getAdminLogout');
Route::post('admin/dangnhap', 'UsersController@postAdminLogin');
Route::group(['prefix' =>'admin', 'middleware' => 'adminLogin'], function(){
    Route::group(['prefix' =>'theloai'], function(){
         Route::get('danhsach', 'TheLoaiController@getDanhSach');
         Route::get('sua/{id}', 'TheLoaiController@getSua');
         Route::post('sua/post/{id}', 'TheLoaiController@postSua');
         Route::get('them', 'TheLoaiController@getThem');
         Route::post('them', 'TheLoaiController@postThem')->name('addtheloai');
         Route::post('seach', 'TheLoaiController@SeachTheloai')->name('seachTheLoai');
         Route::get('xoa/{id}', 'TheLoaiController@getXoa');
    });
  Route::group(['prefix' => 'loaitin'], function (){
        Route::get('danhsach', 'LoaiTinController@getDanhSach');
        Route::get('sua/{id}', 'LoaiTinController@getSua');
        Route::post('sua/post/{id}', 'LoaiTinController@postSua');
        Route::get('them', 'LoaiTinController@getThem') ;
        Route::post('them', 'LoaiTinController@postThem')->name('addloaitin');
        Route::get('xoa/{id}', 'LoaiTinController@getXoa');
   });
    Route::group(['prefix' => 'tintuc'], function (){
    Route::get('danhsach', 'TinTucController@getDanhSach');
    Route::get('sua/{id}', 'TinTucController@getSua');
    Route::post('sua/post/{id}', 'TinTucController@postSua');
    Route::get('them', 'TinTucController@getThem');
    Route::post('them','TinTucController@postThem')->name('addtintuc');
    Route::get('xoa/{id}', 'TinTucController@getXoa');
    Route::get('sua/xoa/comment/{id}/{id_tintuc}', 'TinTucController@getxoaComment');
   });
   Route::group(['prefix' => 'users'], function (){
        Route::get('danhsach', 'UsersController@getDanhSach');
        Route::get('them', 'UsersController@getThem');
        Route::get('xoa/{id}', 'UsersController@getXoa');
        Route::post('them', 'UsersController@possThem')->name('addUser');
   });
   Route::group(['prefix' => 'tintuc/ajax'], function(){
         Route::get('loaitin/{idtheloai}', 'AjaxController@ajax');
   });
   Route::group(['prefix' => 'tintuc/sua/ajax'], function(){
    Route::get('loaitin/{idtheloai}', 'AjaxController@ajax');
});
});
Route::post('add/resign', 'UsersController@resignForm')->name('resign');
Route::get('tintuc/post', 'PageController@trangchu');
Route::get('tintuc/{InformationName}', 'ListController@postInformation');
Route::get('tintuc/theloai/{name}', 'PageController@theloai');
Route::get('tintuc/loaitin/{name}', 'PageController@loaitin');
Route::get('dangnhap', 'PageController@getUserLogin');
Route::post('dangnhap', 'PageController@postUserLogin');
Route::get('forgot/ajax', 'UsersController@forgotForm');
Route::get('dangnhap/ajax', 'UsersController@returnForm');
Route::get('dangky', 'UsersController@resignForm');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('tintuc/ajax/comment/{id}/{user}/{cm}', 'CommentController@AddAjaxComment');
Route::get('user/change', 'UsersController@getChange');
Route::post('post/change', 'UsersController@postChange')->name('changeUser');
Route::post('timkiem', 'SeacherController@seacher');
Route::get('ajaxRequestForgot', 'UsersController@ajaxRequestForgot');
Route::get('forgot/{id}','UsersController@GetFormForgot');
Route::post('confirm', 'UsersController@confirm');


//---------------------------------------------//
Route::get('sendEmail', function(){
    return view('send_email');
  });
  Route::post('postForm', 'SendEmailController@send');
Route::post('postFormForgot', 'UsersController@postFormChange');
