<?php
Route::get('/', function () { return redirect('/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('abilities', 'Admin\AbilitiesController');
    Route::post('abilities_mass_destroy', ['uses' => 'Admin\AbilitiesController@massDestroy', 'as' => 'abilities.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('carousel', 'Site\CarouselsController');
    Route::post('carousel_mass_destroy', ['uses' => 'Site\CarouselsController@massDestroy', 'as' => 'carousel.mass_destroy']);
    Route::resource('products', 'Site\ProductsController');
    Route::post('products_mass_destroy', ['uses' => 'Site\ProductsController@massDestroy', 'as' => 'products.mass_destroy']);
    Route::resource('delivery', 'Delivery\DeliveriesController');
    Route::post('delivery_mass_destroy', ['uses' => 'Delivery\DeliveriesController@massDestroy', 'as' => 'delivery.mass_destroy']);

});
Route::get('/home','SiteHomeController@index');
Route::get('/my-delivery','FarmerDeliveryController@index')->name('mydelivery');
