<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $url= url('/customer');
        $header= "Create User";
        $data= compact('url', 'header');
        return view('customer')->with($data);
    }
    public function store(Request $data){
        echo "<pre>";
        print_r($data->all());

        
        
        $customer= new Customer;
        $customer->customer_name= $data['name'];
        $customer->customer_email= $data['email'];
        $customer->dob= $data['dob'];
        $customer->gender= $data['gender'];
        $customer->address= $data['add'];
        $customer->password= md5($data['password']);
        $customer->save();
        return redirect('/customer/view');
    }
    public function view(Request $req){
        $search= $req['search'] ?? "";
        if ($search != "") {
            $customer= Customer::where('customer_name', 'LIKE', "%$search%")->orWhere('customer_email', 'LIKE', "%$search%")->get();
            
        } else {
            $customer= Customer::paginate(15);
        }
                
        $data= compact('customer','search');
        return view('table')->with($data);

    }
    public function trash(){
        $customer= Customer::onlyTrashed()->get();
        $data= compact('customer');
        return view('trash')->with($data);

    }

    public function restore($id){
        $c= Customer::withTrashed()->find($id);
        if (!is_null($c)) {
            $c->restore();
        }

        return redirect('/customer/view');
    }
    public function pdelete($id){
        $c= Customer::withTrashed()->find($id);
        if (!is_null($c)) {
            $c->forceDelete();
        }

        return redirect('/customer/view');
    }
    public function delete($id){

        $c= Customer::find($id);
        if (!is_null($c)) {
            $c->delete();
        }

        return redirect()->back();
    }
    public function edit($id){
        $customer= Customer::find($id);
        if (is_null($customer)) {
            return view('table');
        } else {    
            # code...
            $header= "Update User";
            $url= url('/customer/update')."/".$id;
            $data= compact('customer','url','header');
            return view('customer')->with($data);
        }
        
    }
    public function update($id, Request $data){
        $customer= Customer::find($id);
        $customer->customer_name= $data['name'];
        $customer->customer_email= $data['email'];
        $customer->dob= $data['dob'];
        $customer->gender= $data['gender'];
        $customer->address= $data['add'];
        $customer->save();
        return redirect('/customer/view');
    }
}

