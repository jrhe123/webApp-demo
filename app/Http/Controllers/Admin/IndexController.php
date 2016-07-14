<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Patient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{

    public function index()
    {
        /*get the patient list for "doctor"*/
        if(session('user')){

            $patient = Patient::where('patient_doctor_id',session('user')['user_id'])->get();
        }elseif(session('fb_user')){

            $patient = Patient::all();
        }

        /*handle the search scenario*/
        if($input = Input::except('_token')){

            $patient = Patient::where('patient_name','like','%'.$input['search'].'%')->get();
        }
        return view('admin.index',compact('patient'));
    }

    public function logout()
    {
        if(session('user')){
            session(['user'=>null]);
        }elseif(session('fb_user')){
            session(['fb_user'=>null]);
        }
        return redirect('login');
    }

    public function invite()
    {
        /*send the invitation*/
        return view('admin.invite');
    }

    public function info($patient_id){

        /*view the patient detail info*/
        $patient = Patient::find($patient_id);
        return view('admin.info',compact('patient'));
    }

}
