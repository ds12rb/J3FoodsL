<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
Wrap all routes in the web middleware to have session state and Cross-Site Request Forgery Protection
 */


Route::group(['middleware' => ['web']], function () {
	
    Route::auth();

    Route::get('/home', 'MasterController@showhome');
	
	Route::get('/dbtest', [
    'uses'=>'CustomerController@showrestaurant',
    'as'=>'dbtest'
    ]);

	//Home
	Route::get('/', [
    'uses'=>'MasterController@showhome',
    'as'=>'homelink'
    ]);
	
	//Login pressed
    
	Route::post('/validcustomerlogin',[
    'uses'=>'CustomerController@validatecustomerlogin',
    'as'=>'validcustomerloginlink'
    ]);

	//Login pages
	
	Route::get('/loginRest', [
    'uses'=>'LoginController@showrestaurantlogin',
    'as'=>'loginrest'
    ]);
	
	Route::get('/loginCust', [
    'uses'=>'LoginController@showcustomerlogin',
    'as'=>'logincust'
    ]);
	
	/*Route::get('/customerlogin',[
    'uses'=>'LoginController@showcustomerlogin',
    'as'=>'customerloginlink'
    ]);
	
	Route::get('/restaurantlogin',[
    'uses'=>'LoginController@showrestaurantlogin',
    'as'=>'restaurantloginlink'
    ]);*/
	
	Route::get('/password/reset',[
     'uses'=>'MasterController@passwordreset',
     'as'=>'passwordreset'
     ]);
	 
	 /*
	 Route::post('/restaurantlogin',[
         'uses'=>'RestaurantController@restaurantlogin',
         'as'=>'restaurantlogin'
         ]);*/
	
	
	//Register Pages
   /* Route::get('/register/{user?}',[
    'uses'=>'RegisterController@register',
    'as'=>'registerlink'
	]);*/
	
	Route::get('/register',[
    'uses'=>'RegisterController@register',
    'as'=>'registerlink'
	]);

    Route::get('/customerregister',[
    'uses'=>'RegisterController@showcustomerregister',
    'as'=>'registercustomer'
    ]);
	
	Route::get('/restaurantregister',[
        'uses'=>'RegisterController@showrestaurantregister',
        'as'=>'registerrestaurant'
        ]);
		
		Route::get('/restaurantregisterinfo',[
        'uses'=>'RegisterController@showrestaurantregisterinfo',
        'as'=>'registerrestaurantinfo'
        ]);
		
		
	//Customer pages
	Route::post('/customerupdateinfo',[
    'uses'=>'CustomerController@updateinfo',
    'as'=>'customerupdateinfo',
    ]);
	
    Route::get('/customeroverview',[
    'uses'=>'CustomerController@showcustomeroverview',
    'as'=>'customeroverviewlink',
    ]);

    Route::get('/menu/{restaurant}',[
    'uses'=>'CustomerController@showcustomermenu',
    'as'=>'customermenuoverviewlink'
    ]);

    Route::get('/customerconfirmation',[
    'uses'=>'CustomerController@showcustomerconfirmation',
    'as'=>'customerconfirmationlink'
    ]);

    Route::get('/cpeditaddress',[
    'uses'=>'CustomerController@showcpeditaddress',
    'as'=>'cpeditaddresslink'
    ]);

    Route::get('/cpeditorders',[
    'uses'=>'CustomerController@showcpeditorders',
    'as'=>'showcpeditorderslink'
    ]);

    Route::get('/customerprofile',[
    'uses'=>'CustomerController@showcustomerprofile',
    'as'=>'customerprofilelink'
    ]);

	//Restuarant pages
    Route::get('/restauranthistory',[
    'uses'=>'RestaurantController@showrestauranthistory',
    'as'=>'restauranthistorylink'
    ]);

    Route::get('/restaurantmadmin',[
    'uses'=>'RestaurantController@showrestaurantmadmin',
    'as'=>'restaurantmadminlink'
    ]);

    Route::get('/restaurantmedit',[
    'uses'=>'RestaurantController@showrestaurantmedit',
    'as'=>'restaurantmeditlink'
    ]);

    Route::get('/restaurantmoverview',[
    'uses'=>'RestaurantController@showrestaurantmoverview',
    'as'=>'restaurantmoverviewlink'
    ]);

    Route::get('/restaurantoverview',[
    'uses'=>'RestaurantController@showrestaurantoverview',
    'as'=>'restaurantoverviewlink'
     ]);

    Route::get('/restaurantprofile',[
    'uses'=>'RestaurantController@showrestaurantprofile',
    'as'=>'restaurantprofilelink'
    ]);

    Route::get('/restaurantprofilerestrictions',[
    'uses'=>'RestaurantController@showrestaurantrestrictions',
    'as'=>'restaurantprofilerestrictionslink'
     ]);

    Route::get('/restaurantprofilehours',[
    'uses'=>'RestaurantController@showrestaurantprofilehours',
    'as'=>'restaurantprofilehourslink'
    ]);

    Route::get('/registerconfirm',[
    'uses'=>'RegisterController@showregisterconfirm',
    'as'=>'registerconfirmlink'
    ]);

    Route::get('/forgotpassword',[
    'uses'=>'AuthController@showforgotpassword',
    'as'=>'forgotpasswordlink'
    ]);




//DEBUGGGING
    /*
Route::get('/test', function()
{
    return view('restaurantcontent.restaurant-profile-restrictions');
});


Route::get('/customer', 'CustomerController@index');
//Route::post('/customer', 'CustomerController@store');
Route::delete('/customer', 'CustomerController@destroy');


Route::post('/customerregister',[
'uses'=>'CustomerController@dummycreate',
'as'=>'addCustomer'
]);
*/
});

//DEBUGGING

	//Route::get('/login/{user}', 'AuthController@login');



