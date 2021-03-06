<?php

/*
  This controller handles all the registration requests
*/  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;

class RegisterController extends Controller
{

  /*
  * Displays the registration page to the customer
  */
    public function showcustomerregister(){
          return view('auth.register');
  }
  /*
  * Displays the registration page to the restaurant
  */
   public function showrestaurantregister(){
          return view('auth.restaurantRegister');
  }
  /*
  * returns the view of the restaurant registration information
  */
  public function showrestaurantregisterinfo(){
          return view('restaurantcontent.restaurant-registration');
  }

  //Confirmation page thanks for coming!!
  public function showregisterconfirm(){
          return view('registration.registrationconfirmation');
  }

/**
 * [confirm when this function is called the user is confirmed ]
 * @param  String $confirmation_code the confirmation code the user was given in their email
 * @return View     redirects to login page
 */
public function confirm($confirmation_code){
  $user = User::where('confirmation_code',$confirmation_code)->first();
  if(!$confirmation_code)
        {
          //  throw new InvalidConfirmationCodeException;
        }
  if(!$user){
      //throw new UserNotFoundException;
  }
  $user->confirmed = 1;
  $user->confirmation_code = null;
  $user->save();

  return Redirect::route('logincust');
}



}
