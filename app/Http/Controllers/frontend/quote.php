<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class quote extends Controller
{
    public function index(){
        return view('frontend.quote');
    }
    public function upload(Request $data){
        // $filename= time().".".$data-> file('img')->getClientOriginalExtension();   //help to get name
        // echo $filename;die();
        $data-> file('img')->store('uploads');
    }
}
