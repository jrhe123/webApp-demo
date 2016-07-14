<?php

namespace App\Http\Controllers\Admin;



use App\Http\Model\Patient;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LoginController extends CommonController{

    public function login(){

        /*Differentiate POST and GET access*/
        if($input = Input::all()){

            /*validate password*/
            $pass = $input['password'];
            if($pass == ''){
                return back()->with('msg','Password Can Not be Empty!');
            }
            /*validate email address*/
            $email = $input['email'];
            if($email == ''){
                return back()->with('msg','E-Mail Address Can Not be Empty!');
            }
            /*check the database*/
            $user = User::where('user_email',$email)->get()->toArray();
            if(empty($user)){
                return back()->with('msg','User does not exist!!');
            }
            /*compare the email and password*/
            if(Crypt::decrypt($user[0]['user_pass']) != $pass
                || $user[0]['user_email'] != $email){
                return back()->with('msg','E-Mail or Password incorrect!');
            }

            /*unset the previous session*/
            if(session('user')){
                session(['user'=>null]);
            }elseif(session('fb_user')){
                session(['fb_user'=>null]);
            }
            /*set session*/
            session(['user'=>$user[0]]);

            return redirect('admin');
        }else{
            return view('auth.login');
        }
    }

    public function register()
    {
        /*Differentiate POST and GET access*/
        if($input = Input::except('_token')){
            /*define the validation rule*/
            $rules = [
                'user_name' => 'required',
                'user_email' => 'required',
                'password'=>'required|between:6,20|confirmed',
            ];
            /*define the error message*/
            $message = [
                'user_name.required' => 'the user name can not be empty!',
                'user_email.required' => 'the email address can not be empty!',
                'password.required'=>'the password can not be empty!',
                'password.between'=>'the password length must be 6-20!',
                'password.confirmed'=>'the confirm password is different form the password!',
            ];
            /*use the validator model to validate*/
            $validator = Validator::make($input, $rules, $message);
            if($validator->passes())
            {
                /*validate the email exist*/
                if(User::where('user_email',$input['user_email'])->count()){
                    return back()->with('errors','E-Mail Address has been registered!');
                }
                /*validation passes, register the new user*/
                $user = Input::except('_token','password','password_confirmation');
                $user['user_pass'] = Crypt::encrypt($input['password']);
                $result = User::create($user);

                if ($result) {
                    /*send the confirmation email*/
                    return redirect('email');
                } else {
                    return back()->with('errors', 'register error, please try later!');
                }
            }else{
                /*return the error messages*/
                return back()->withErrors($validator);
            }
        }else{
            return view('auth.register');
        }
    }


    public function reset_pass(){

        /*Differentiate POST and GET access*/
        if($input = Input::except('_token')){

            /*define the validation rule*/
            $rules = [
                'user_email' => 'required',
                'o_password' => 'required',
                'password'=>'required|between:6,20|confirmed',
            ];
            /*define the error message*/
            $message = [
                'user_email.required' => 'the email address can not be empty!',
                'o_password.required' => 'type enter your previous password!',
                'password.required'=>'the password can not be empty!',
                'password.between'=>'the password length must be 6-20!',
                'password.confirmed'=>'the confirm password is different form the password!',
            ];

            /*use the validator model to validate*/
            $validator = Validator::make($input, $rules, $message);
            if($validator->passes()){
                /*validate the database*/
                $user = User::where('user_email',$input['user_email'])->first();
                if(!$user){
                    return back()->with('errors','No such email found!');
                }
                /*validate entered password*/
                $_password = $user->user_pass;
                if(Crypt::decrypt($_password) != $input['o_password']){
                    return back()->with('errors','Password incorrect!');
                }else{
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','Reset the password successfully!');
                }
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return view('auth.passwords.reset');
        }
    }


}