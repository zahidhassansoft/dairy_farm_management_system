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

Route::get('/', function () {
	return view('auth.login');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
	Route::resource('users', 'UserController');
	Route::resource('sliders', 'SliderController');

	Route::resource('staff', 'StaffController');
	Route::resource('supplier', 'SupplierController');
	Route::resource('animaltype', 'AnimalTypeController');
	Route::resource('foodunit', 'FoodUnitController');
	Route::resource('fooditem', 'FoodItemController');
	Route::resource('expense', 'ExpenseController');
	Route::resource('expensepurpose', 'ExpensePurposeController');
	Route::resource('cowsale', 'CowSaleController');
	Route::resource('routinemonitor', 'RoutineMonitorController');
	Route::resource('monitoringservice', 'MonitoringServiceController');
	Route::resource('managecowpregnancy', 'ManageCowPregnancyController');
	Route::resource('designation', 'DesignationController');
	Route::resource('usertype', 'UserTypeController');
	Route::resource('employeesalary', 'EmployeeSalaryController');
	Route::resource('milksaleduecoll', 'MilkSaleDueCollController');
	Route::resource('cowsaleduecoll', 'CowSaleDueCollController');
	
	Route::get('employeesalary/getemployeesalary/{id}', 'EmployeeSalaryController@getemployeesalary');
	
	
	Route::get('/userlist', 'StaffController@userList')->name('userlist');
	Route::get('managecowpregnancy/loadaimalidmcp/{id}', 'ManageCowPregnancyController@mcpanimalid');
	Route::get('cowsale/getanimalidforcow/{id}', 'CowSaleController@getanimalidforcow');
	Route::get('cowsale/getanimalidforcalf/{id}', 'CowSaleController@getanimalidforcalf');
	Route::get('cowsale/getstallimage/{id}', 'CowSaleController@getstallimage');
	Route::get('getmilksaleinvno', 'MilkSaleDueCollController@milksaleduecoll');
	Route::get('getcowsaleinvno', 'CowSaleDueCollController@cowsaleduecoll');

	Route::get('/milkparlor', 'MilkParlorController@index');
	Route::post('storemilk', 'MilkParlorController@store');
	Route::post('getcowid', 'MilkParlorController@getcowid');
	Route::get('collectedmilklist', 'MilkParlorController@collectedmilklist');
	Route::get('salemilklist', 'MilkParlorController@salemilklist');
	Route::get('salemilk', 'MilkParlorController@saleMilk');
	Route::post('salemilkstore', 'MilkParlorController@salemilkstore');
	Route::post('getmilkinfo', 'MilkParlorController@getmilkinfo');
	Route::get('duecollection', 'MilkParlorController@duecollection');
	Route::get('getduecollectiondata/{id}', 'MilkParlorController@getduecollectiondata');
	Route::post('getmilkdueinfo', 'MilkParlorController@getmilkdueinfo');
	Route::get('salemilk/{id}/edit', 'MilkParlorController@salemilk_edit');
	Route::PATCH('salemilkup/{id}', 'MilkParlorController@salemilkup');
	Route::post('salemilk/getmilkinfo', 'MilkParlorController@getmilk');
	Route::DELETE('salemilk/{id}', 'MilkParlorController@salemilkdelete');
	Route::get('salemilk/view/{id}', 'MilkParlorController@show');

	Route::get('milkparlor/{id}/edit', 'MilkParlorController@edit');
	Route::get('milkparlor/loadaimalno/{id}', 'MilkParlorController@getanimalno');
	Route::delete('milkparlor/{id}', 'MilkParlorController@destroy');
	Route::patch('storemilk/{id}', 'MilkParlorController@update');


	Route::get('cowsfeed', 'CowsFeedController@index');
	Route::get('cowsfeedcreate', 'CowsFeedController@create');
	Route::post('storefeed', 'CowsFeedController@store');
	Route::post('storefeed/{id}', 'CowsFeedController@update');
	Route::delete('cowsfeed/{id}', 'CowsFeedController@destroy');
	Route::get('cowsfeed/view/{id}', 'CowsFeedController@show');
	Route::get('cowsfeed/{id}/edit', 'CowsFeedController@edit');

	Route::get('getmanimalid/{id}', 'CowsFeedController@getmanimalid');
	Route::get('cowsfeed/getmanimalid/{id}', 'CowsFeedController@getmanimalid');
	Route::get('/routinemonitor/loadaimalid/{id}', 'MonitoringServiceController@getanimalid');

	Route::get('cow', 'CowController@index');
	Route::get('dimuna', 'CowController@create')->name('cow/create');
	Route::post('cow/store', 'CowController@store');
	Route::get('cow/{id}/edit', 'CowController@edit');
	Route::post('cow/update/{id}', 'CowController@update');
	Route::get('cow/delete/{id}', 'CowController@destroy');


	Route::get('cowcalf', 'CowCalfController@index');
	Route::get('cowcalf/create', 'CowCalfController@create');
	Route::post('cowcalf/store', 'CowCalfController@store');
	Route::get('cowcalf/edit/{id}', 'CowCalfController@edit');
	Route::post('cowcalf/update/{id}', 'CowCalfController@update');
	Route::get('cowcalf/delete/{id}', 'CowCalfController@destroy');

	Route::get('stall', 'StallController@index');
	Route::get('stallcreate', 'StallController@create');
	Route::post('storestall', 'StallController@store');
	Route::get('stall/{id}/edit', 'StallController@edit');
	Route::post('stall/update/{id}', 'StallController@update');
	Route::delete('stall/delete/{id}', 'StallController@destroy');

	Route::get('colors', 'ColorsController@index');
	Route::get('color/create', 'ColorsController@create');
	Route::post('colorstore', 'ColorsController@store');
	Route::get('color/{id}/edit', 'ColorsController@edit');
	Route::post('color/update/{id}', 'ColorsController@update');
	Route::delete('color/{id}', 'ColorsController@destroy');

	Route::get('/expensereport', 'ExpenseController@expense');
	Route::post('/officeexpense/reports', 'ExpenseController@getofficeexpense');
	Route::get('getofficeexpense/{from}/{to}', 'ExpenseController@getofficeexpense');
	
	Route::get('/employeesalaryreport', 'ReportController@salaryreport');
	Route::get('/getemployeesalary/{from}/{to}', 'ReportController@getsalaryreport');
	Route::get('/milkcollectreport', 'ReportController@milkcollectreport');
	Route::get('/getmilkcollectreport/{from}/{to}/{stall}', 'ReportController@getmilkcollectreport');
	Route::get('/milksalereport', 'ReportController@milksalereport');
	Route::get('/getmilksalereport/{from}/{to}/{accno}', 'ReportController@getmilksalereport');
	Route::get('/cowsalereport', 'ReportController@cowsalereport');
	Route::get('/getcowsalereport/{from}/{to}', 'ReportController@getcowsalereport');

});
