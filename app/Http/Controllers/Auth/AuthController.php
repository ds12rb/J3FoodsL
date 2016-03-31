<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\User;
use App\Customer;
use App\Restaurant;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/customeroverview';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
	
	
	public function register(Request $request)
    {
       
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));
		$results = DB::select("SELECT  `id` FROM  `users` WHERE email =  ?",[$request->email]);
    		    $idOfUser=  $results[0]->id;
    		if($request->isRestaurant == "1"){
            //Register a restaurant with the required fields
    		    
				$restaurant = new Restaurant;
				
				$restaurant->id = $idOfUser;
				$restaurant->companyname = $request->companyname;
				$restaurant->address = $request->address;
				$restaurant->province = $request->province;
				$restaurant->city = $request->city;
				$restaurant->postalcode = $request->postalcode;
				$restaurant->phoneno = $request->phoneno;			
				$restaurant->save();
				return redirect()->action('RestaurantController@showrestaurantoverview');	
    		} else{
				//register a customer, linked by an id.
				$customer = new Customer;
				$customer->id = $idOfUser;
				$customer->phoneno = "";
				$customer->save();
    		    return redirect($this->redirectPath());
    		}
    }
	
	
	/**
		Handles sending the user to different pages depending on if they are a customer or a restaurant
	*/
	protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
  
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

			$results = DB::select("SELECT  `isRestaurant` FROM  `users` WHERE email =  ?",[$request->email]);
 
  
			$newresults=  $results[0]->isRestaurant;
  
  
  
			if($newresults== '1'){
			return redirect()->action('RestaurantController@showrestaurantoverview');
			}else{
			return redirect()->intended($this->redirectPath());
			}
    }
 
 protected function getCredentials(Request $request)
    {
        return $request->only($this->loginUsername(), 'password');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
		if ($data['isRestaurant'] == 1){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'isRestaurant' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'companyname' => 'required',
                'address' => 'required',
                'province' => 'required',
                'city' => 'required',
                'postalcode' => 'required | max:7 | min:6',
                'phoneno' => 'required | max:13',
            ]);
        } else {
            return Validator::make($data, [
                'name' => 'required|max:255',
                'isRestaurant' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
			      'isRestaurant' => $data['isRestaurant'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
