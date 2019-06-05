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
Route::get('/test', function () {
    return view('test2');
});

Route::get('/', function () {
    return view('welcome');
});
// authentication===========
Auth::routes();
//=============================
Route::get('/home', 'HomeController@index')->name('home');

//email verification =========================================
Auth::routes(['verify' => true]); 

Route::get('/home', function () {  // to test protecting route
    // Only verified users may enter...
})->middleware('verified');
Route::get('/logout', 'auth\LoginController@logout');
//=====================================================


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{wilayas_id}/restaurant', 'RestaurentController@afficher')->name('wilaya.restaurant');

Route::get('/{wilayas_id}/Hotel', 'HotelController@afficher')->name('wilaya.hotel');

Route::get('/{wilayas_id}/Boutique', 'BoutiqueController@afficher')->name('wilaya.boutique');
Route::get('/{wilayas_id}/Boutique/catégorie/{cat}', 'BoutiqueController@affichercat')->name('boutique.cat');

Route::get('/{wilayas_id}/GuidTaxi', 'GuidTaxiController@afficher')->name('GuidTaxi');
Route::get('/{wilayas_id}/GuidFood', 'GuidFoodController@afficher')->name('GuidFood');

Route::get('/{id}/wilaya', 'wilayaController@afficher')->name('Wilaya');


Route::post('/rate' , 'restoController@rateresto')->name('rate');






//restoservice   =============================================

Route::get('/{wilaya_id}/restaurant/{id}', 'RestoController@index')->name('resto');
Route::post('/reservation/{id}','ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact','ContactController@sendMessage')->name('contact.send');
//=========================================================


//user profil   ============================================
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar');
Route::post('profiledit', 'UserController@editCurrentUserProfile')->name('edit-profile');
//========================================

//password change ==========================================
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
//================================================================

//admin       ===========================================
Route::group(['prefix'=>'admin','middleware'=>'admin','namespace'=>'admin'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('slider','SliderController');
    Route::resource('category','CategoryController');
    Route::resource('item','ItemController');
    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('reservation/{id}','ReservationController@destory')->name('reservation.destory');

    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
});

//=====================================================

Auth::routes(); 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//===== restaurant  localisation 

Route::get('/localisation', function () {
    return view('localisation');
});
/*=======================================*/
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
/*================================================*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*===================================================*/

/*========================================================================*/

Route::get('lang/{locale}', 'MultilanguageController@index');/*this will ad session language when click to change language*/
Route::get('/dis', function () {
    return view('dis');
});

Route::get('/voyager', function () {
    dd(config('voyager.dashboard.widgets'));
});




/*===============================================================================*/
            /*contact us route*/
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactSaveData']);

/*=======================================================================*/

Route::get('event', 'EventController@index')->name('events.index');
Route::post('event', 'EventController@addEvent')->name('events.add');





