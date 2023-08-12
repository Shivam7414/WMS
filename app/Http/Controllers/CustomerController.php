<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request) {
        $customers = Customer::all();
        return view('customers.index', compact('customers', 'request'));
    }

    public function edit(Request $request) {
        if($request->customer_id){
            $customer = Customer::where('id', decryptId($request->customer_id))->first();
        }else{
            $customer = new Customer;
        }
        return view('customers.modals.add',compact('customer'));
    }

    public function store(Request $request){
        if($request->customer_id){
            $customer = Customer::where('id',decryptId($request->customer_id))->first();
        }else{
            $customer =  new Customer;
        }
        $customer->name = $request->name;
        $customer->short_name = $request->short_name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->save();
        return back()->with('success', 'Customer added successfully');
    }

    public function delete(Request $request) {
        $customer = Customer::findOrFail(decryptId($request->id));
        $customer->delete();
        return back()->with('success', 'Customer is deleted successfully');
    }
}
