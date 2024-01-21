<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        echo"okk";die();
        return view('form');
    }
    public function register(Request $data){

        //validation
        $data->validate(
            [
                'name'  => 'required',
                'email' => 'required|email',
                'password'  => 'required|confirmed',
                'password_confirmation'  => 'required',
            ]
        );
        echo "<pre>";
        print_r($data->all());
        echo "</pre>";
    }
}
