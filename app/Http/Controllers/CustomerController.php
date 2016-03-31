<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\Http\Requests;
use App\Customer;
use App\User;
use DB;
use Validator;


class CustomerController extends Controller
{
	
	
  public function __construct()
  {
    $this->middleware('auth');  
  }
  
  
	/**
		Updates the user info with the data eneterd in the update user info page
	*/	
	public function updateinfo(Request $request){
		
		$validator = $this->validatecustomerupdate($request->all());
		
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
		$this->updateDatabaseWithNewInfo($request);
		return redirect()->action('CustomerController@showcustomeroverview');
	}
	
	/**
		Updates the database with the updated info of the customer
		
		**ONLY ADD NEW FEILDS BELOW , NOTHING ABOVE EMAIL/NAME
		
	*/
	protected function updateDatabaseWithNewInfo(Request $request){
		
		if(\Auth::check()) {
            $id = \Auth::user()->id;
        }
		
		$updateUser = User::find($id);
		$updateUser->name = $request->name;
		$updateUser->email = $request->email;
		$updateUser->save();
		
		
		$updateCustomer = Customer::find($id);
		$updateCustomer->phoneno = $request->phoneno;
		$updateCustomer->save();
	}
	
	protected function validatecustomerupdate(array $data)
    {
		if(\Auth::check()) {
            $email = \Auth::user()->email;
        }
		
		if($data['email'] != $email){	//need to check if they didnt change email
			return Validator::make($data, [
                'email' => 'email|max:255|unique:users',
				'phoneno' => 'max:13',
            ]);
		}else{
			return Validator::make($data, [
				'phoneno' => 'max:13',
            ]);
		}
            
       
    }
		
	
  public function validatecustomerlogin(Request $request){//Why does this redirect to the method directly below? I remeber it had somethign to do with the url 
        return redirect()->action('CustomerController@showcustomeroverview');
  }
	
  public function showcustomeroverview(){
			
		//$restaurants = Restaurant::all();
		$restaurants = User::where('isRestaurant',1)->get();
        return view('customercontent.customer-overview',compact('restaurants'));
  }
  

  public function showcustomermenu(User $restaurant){
		$items = $restaurant->menu;
		$id = $restaurant->id;
		$restaurantInfo = Restaurant::where('id',$id)->first();
        return view('customercontent.customer-menuoverview', compact("items","restaurant","restaurantInfo"));

  }

  public function showcustomerconfirmation(){
          return view('customercontent.confirmationpage');
  }

  public function showcpeditaddress(){
          return view('customercontent.customer-profile-editaddress');
  }

  public function showcpeditorders(){
          return view('customercontent.customer-profile-editorders');
  }

  public function showcustomerprofile(){
	  
	  if(\Auth::check()) {
            $id = \Auth::user()->id;
       }
		$currentUser = User::where('id',$id)->first();
		$currentCustomer = Customer::where('id',$id)->first();

        return view('customercontent.customer-profile',compact('currentUser','currentCustomer'));
  }
		
		
		
		
		/*
		
		Danny working on test database 
		
		*/
        public function dummycreate(Request $request){
             $customer = new Customer;
             $user->username     = Input::get('username');
             $user->password     = Hash::make(Input::get('password'));
             $user->email        = Input::get('email');
             $user->save();

             return Response::make('User created! Hurray!');
        }

        public function dummygetcustomer(){
             $customers=Customer::orderBy('created_at', 'asc')->get();

             return viewcustomers('',[
                        'viewcustomers' => $viewcustomers
                ]);
        }



}
