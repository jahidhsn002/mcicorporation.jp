<?php
// use Illuminate\Mail\Markdown;
// use App\Vehicle;
// use App\Country;
// use App\Port;
// use App\User;

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



// Authentication Routes...
Route::get('/login', 'Auth\AuthFacade@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\AuthFacade@getSignOut')->name('logout');

// Registration Routes...
Route::get('/register', 'Auth\AuthFacade@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('/password/reset', 'Auth\AuthFacade@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\AuthFacade@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


// Website Operations
Route::get('/', 'Archive@home')->name('home');
Route::get('/archive', 'Archive@archive')->name('archive');
Route::get('/archive/{id}', 'Archive@single')->name('single');

Route::middleware(['auth'])->group(function () {

	// Backend Operations
	Route::get('/backend', 'Backend\AppDashboard@index')->name('dashboard');

		// Country & Port
		Route::get('/backend/country', 'Backend\AppCountryPort@index')->name('country');
		Route::get('/backend/country/delete/{id}', 'Backend\AppCountryPort@remove')->name('country_delete');
		Route::get('/backend/country/delete/port/{id}', 'Backend\AppCountryPort@port_remove')->name('country_port_delete');
		Route::get('/backend/country/{country_id}/port', 'Backend\AppCountryPort@port_index')->name('country_port');
		Route::put('/backend/country/save', 'Backend\AppCountryPort@save')->name('country_save');
		Route::put('/backend/country/port/save', 'Backend\AppCountryPort@port_save')->name('country_port_save');

		// Taxonomy & Meta
		Route::get('/backend/taxonomy', 'Backend\AppTaxonomyTaxonomyMeta@index')->name('taxonomy');
		Route::get('/backend/taxonomy/delete/{id}', 'Backend\AppTaxonomyTaxonomyMeta@remove')->name('taxonomy_delete');
		Route::get('/backend/taxonomy/delete/taxonomy-meta/{id}', 'Backend\AppTaxonomyTaxonomyMeta@taxonomy_meta_remove')->name('taxonomy_taxonomy_meta_delete');
		Route::get('/backend/taxonomy/{taxonomy_id}/taxonomy-meta', 'Backend\AppTaxonomyTaxonomyMeta@taxonomy_meta_index')->name('taxonomy_taxonomy_meta');
		Route::put('/backend/taxonomy/save', 'Backend\AppTaxonomyTaxonomyMeta@save')->name('taxonomy_save');
		Route::put('/backend/taxonomy/taxonomy-meta/save', 'Backend\AppTaxonomyTaxonomyMeta@taxonomy_meta_save')->name('taxonomy_taxonomy_meta_save');

		// Favorite
		Route::get('/backend/favorite', 'Backend\AppFavorite@index')->name('favorite');
		Route::get('/backend/favorite/{vehicle_id}', 'Backend\AppFavorite@save')->name('favorite_save');

		// Wish List
		Route::get('/backend/wishlist', 'Backend\AppWishList@index')->name('wishlist');
		Route::get('/backend/wishlist/save', 'Backend\AppWishList@save')->name('wishlist_save');
		Route::get('/backend/wishlist/delete/{id}', 'Backend\AppWishList@remove')->name('wishlist_delete');

	Route::get('/backend/account', 'Backend\AppAccount@index')->name('account');
	Route::put('/backend/account/save', 'Backend\AppAccount@save')->name('account_save');

	Route::get('/backend/password', 'Backend\AppPassword@index')->name('password');
	Route::put('/backend/password/save', 'Backend\AppPassword@save')->name('password_save');

	Route::get('/backend/language', 'Backend\AppLanguage@index')->name('language');
	Route::put('/backend/language/save', 'Backend\AppLanguage@save')->name('language_save');

	Route::get('/backend/vehicle', 'Backend\AppVehicle@index')->name('new_vehicle');
	Route::get('/backend/vehicle/{id}', 'Backend\AppVehicle@index')->name('save_vehicle');
	Route::put('/backend/vehicle', 'Backend\AppVehicle@save')->name('vehicle_save');
	Route::get('/backend/vehicle/delete/{id}', 'Backend\AppVehicle@remove')->name('vehicle_delete');

});


Route::patch('/inquary/email', 'Archive@inquary_email')->name('inquary_email');
Route::post('/upload', 'Core\Upload@handle')->name('uploads');

// Route::get('mail', function () {
//     $markdown = new Markdown(view(), config('mail.markdown'));

//     return $markdown->render('emails.inquary', [
//     	'vehicle' => Vehicle::find(1),
//     	'country' => Country::find(1),
//     	'port' => Port::find(1),
//     	'user' => User::find(1)
//     ]);
// });

