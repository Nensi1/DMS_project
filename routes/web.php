<?php



use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;

/*
User type: Employee
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@userlogout')->name('user.logout');

//ADMIN + MANAGER MIDDLEWARE
Route::group(['prefix' => 'user',  'middleware' => 'positions:admin|manager'], function(){
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/home', 'HomeController@index')->name('home');

 });

Route::group(['prefix' => 'user',  'middleware' => 'positions:admin|manager'], function(){
    Route::get('/','EmployeesController@index')->name('index.employees');
    Route::get('/create','EmployeesController@create')->name('create.employees');
    Route::get('/create','EmployeesController@showPosition');
    Route::post('/','EmployeesController@store')->name('store.employees');
    Route::post('/search', 'EmployeesController@search');
    Route::get('/{user}', 'EmployeesController@show')->name('show.employees');
    Route::get('/{user}/edit','EmployeesController@edit')->name('edit.employees');
    Route::patch('/{user}','EmployeesController@update')->name('update.employees');
    Route::delete('/{user}','EmployeesController@destroy')->name('delete.employees');
    Route::post('/month','EmployeesController@month')->name('month.employees');
});

Route::group(['prefix' => 'user/clients',  'middleware' => 'positions:admin|manager|sales agent'], function(){
    Route::get('/list','ClientCrud@index')->name('index.clients');
    Route::get('/create','ClientCrud@create')->name('create.clients');
    Route::get('/create','ClientCrud@showCategArea')->name('create.clients');
    Route::get('/{client}','ClientCrud@show')->name('show.client');
    Route::post('/','ClientCrud@store')->name('store.clients');
    Route::get('/{client}/edit','ClientCrud@edit')->name('edit.client');
    Route::patch('/{client}','ClientCrud@update')->name('update.client');
});
Route::post('/search', 'ClientCrud@search');

Route::group(['prefix' => 'user/clients',  'middleware' => 'positions:admin|manager'], function(){
    Route::delete('/{client}','ClientCrud@delete')->name('delete.client');
});
Route::post('/search', 'ClientCrud@search');


Route::group(['prefix' => 'acc'], function(){
    Route::get('/{user}', 'UserController@show')->name('show.account');
    Route::get('/{user}/edit','UserController@edit')->name('edit.account');
    Route::patch('/{user}','UserController@update')->name('update.account');
    Route::delete('/{user}','UserController@destroy')->name('delete.account');
 });
 Route::group(['prefix' => 'acc',  'middleware' => 'positions:admin|manager'], function(){
    Route::delete('/{user}','UserController@destroy')->name('delete.account');
 });

 Route::group(['prefix' => 'supplier',  'middleware' => 'positions:admin|manager|inventory supervisor'], function(){
    Route::get('/','SupplierController@index')->name('index.supplier');
    Route::get('/create','SupplierController@create');
    Route::get('/{supplier}','SupplierController@show');
    Route::post('/','SupplierController@store')->name('store.supplier');
    Route::post('/search','SupplierController@search')->name('search.supplier');
    Route::get('/{supplier}/edit','SupplierController@edit');
    Route::patch('/{supplier}','SupplierController@update');
    Route::delete('/{supplier}','SupplierController@delete');
 });

Route::group(['prefix' => 'schedule',  'middleware' => 'positions:admin|manager|sales agent'], function(){
    Route::get('/create', 'ScheduleController@create');
    Route::post('/', 'ScheduleController@store')->name('store.schedule');
    Route::get('/', 'ScheduleController@index')->name('index.schedule');
    Route::post('/check','ScheduleController@show')->name('show.schedule');
    Route::get('/sales','ScheduleController@sales_show')->name('show.schedule');
});

Route::group(['prefix' => 'tasks',  'middleware' => 'positions:admin|manager|sales agent'], function(){
    Route::get('/list', 'TaskController@index');
    Route::get('/todo', 'TaskController@sales');
    Route::patch('/todo/{task}','TaskController@update');
    Route::patch('/todo/update/{task}','TaskController@update2');
    Route::delete('/{task}', 'TaskController@destroy')->name('task.delete');
});


Route::group(['prefix' => 'products',  'middleware' => 'positions:admin|manager|inventory supervisor'], function(){
    Route::get('/', 'ProductController@index')->name('index.products');;
    Route::get('/create','ProductController@create')->name('create.products');
    Route::get('/{product}','ProductController@show')->name('show.product');
    Route::post('/search','ProductController@search')->name('search.product');
    Route::post('/','ProductController@store')->name('store.product');
    Route::get('/{product}/edit','ProductController@edit')->name('edit.product');
    Route::patch('/{product}','ProductController@update')->name('update.product');
    Route::delete('/{product}','ProductController@delete')->name('delete.product');
    Route::patch('/stock/{product}','StockController@update');
    Route::post('/order_nr','StockController@updateNr');
 });

 Route::group(['prefix' => 'user',  'middleware' => 'positions:admin|manager|sales agent'], function(){
    Route::get('/shop/list', 'UserShopController@index')->name('user.ecommerce');
    Route::post('/shop/list','UserShopController@store')->name('user.cartline');
    Route::get('/shop/{product}', 'UserShopController@show')->name('show.product');

    //cart
    Route::patch('/cart/{cartline}','UserShopController@update')->name('usercartline.update');
    Route::delete('/cart/{cartline}','UserShopController@destroy')->name('usercartline.destroy');
    Route::get('/autocomplete','UserShopController@autocomplete')->name('autocomplete');

});
Route::get('/empcart', 'UserShopController@cart')->name('user.empcart');

Route::group(['prefix' => 'orders',  'middleware' => 'positions:admin|manager|sales agent'], function(){
    Route::get('/','OrderEmployeeController@index')->name('user.orders');
    Route::delete('/{order}','OrderEmployeeController@destroy')->name('delete.order-user');
    Route::get('/checkout','OrderEmployeeController@store')->name('user.checkout');
});


//order dispatcher sector
Route::group(['prefix' => 'dispatcher',  'middleware' => 'positions:Admin|Order Dispatcher'], function(){
    Route::get('/','DispatcherController@index')->name('dispatcher.index');
    Route::patch('/{order}','DispatcherController@update');
    Route::get('/{order}', 'DispatcherController@show')->name('dispatcher.show');
});

//delivery sector
Route::group(['prefix' => 'delivery',  'middleware' => 'positions:admin|delivery'], function(){
    Route::get('/','DeliveryController@index')->name('delivery.index');
    Route::patch('/{order}','DeliveryController@update');
    Route::patch('/complete/{order}','DeliveryController@update2');
    Route::get('/order/{order}', 'DeliveryController@show');
    Route::delete('/{order}', 'DeliveryController@destroy')->name('delivery.delete');
});

//inventory supervisor sector

Route::group(['prefix' => 'cost',  'middleware' => 'positions:admin|inventory supervisor'], function(){
    Route::get('/','CostController@index')->name('user.cost');
    Route::post('/search','CostController@search');
    Route::patch('/{cost}','CostController@update')->name('amount.update');
    Route::post('/','CostController@store')->name('store.cost');
    Route::delete('/{cost}','CostController@destroy')->name('cost.destroy');
    Route::patch('/update/{cost}','CostController@updateRepeat')->name('repeat.update');
    Route::post('/eoq','EoqController@store')->name('store.eoq');    
});

//performance
Route::group(['prefix' => 'performance',  'middleware' => 'positions:admin|manager'], function(){
    Route::get('/','ChartController@index')->name('user.performance');
    Route::get('/month','ChartController@indexChart')->name('user.chart');
});



/*
User type: Client
*/
Route::prefix('client')->group(function(){
    Route::get('/', 'ClientController@index')->name('home')->name('client.dashboard');
    Route::get('/login', 'Auth\ClientLoginController@showLoginform')->name('client.login');
    Route::post('/login', 'Auth\ClientLoginController@login')->name('client.login.submit');
    Route::post('/logout','Auth\ClientLoginController@logout')->name('client.logout');
    
    //password reset
    Route::get('/password/reset', 'Auth\ClientForgotPasswordController@showLinkRequestForm')->name('client.password.request');
    Route::post('/password/email', 'Auth\ClientForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
    Route::get('/password/reset/{token}', 'Auth\ClientResetPasswordController@showResetForm')->name('client.password.reset');
    Route::post('/password/reset', 'Auth\ClientResetPasswordController@reset');
});



Route::group(['prefix' => 'shop'], function(){
    Route::get('/', 'ShopController@index')->name('ecommerce');
    Route::get('{product}', 'ShopController@show');
    Route::post('/','CartLineController@store')->name('store.cartline');
 });
Route::group(['prefix' => 'cart'], function(){
    Route::get('/', 'CartLineController@index')->name('index.cartline');
    Route::patch('/{cartline}','CartLineController@update')->name('cartline.update');
    Route::delete('/{cartline}','CartLineController@destroy')->name('cartline.destroy');

 });
 //shop
Route::group(['prefix' => 'order'], function(){
    Route::get('/','OrderController@index')->name('index.orders');
    Route::delete('/{order}','OrderController@destroy')->name('delete.order');
});

Route::group(['prefix' => 'checkout'], function(){
    Route::get('/','ShopController@checkout')->name('checkout');
    Route::get('/stripe','ShopController@stripe')->name('stripe');
    Route::post('/stripe','ShopController@stripePayment')->name('stripePayment');
});

