<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\InItem;

class InItemController extends Controller
{
    public function index(Request $request , $customer_id){
        $items = InItem::where('customer_id',$customer_id)->get();
        $customer = Customer::findOrFail($customer_id);
        return view('customers.items.index', compact('customer', 'items'));
    }

    public function edit(Request $request){
        if($request->item_id){
            $item = InItem::findOrFail($request->item_id);
        }else{
            $item = new InItem;
            $item->customer_id = $request->customer_id;
        }
        $customers = Customer::all();
        return view('customers.items.modals.edit_in_item',compact('item', 'customers'));
    }

    public function store(Request $request){
        if($request->id){
            $item = InItem::findOrFail($request->id);
        }else{
            $item = new InItem;
        }
        $item->customer_id = $request->customer_id;
        $item->date = $request->date;
        $item->name = $request->name;
        $item->weight = $request->weight;
        $item->count = $request->count;
        $item->vehicle_no = $request->vehicle_no;
        $item->block_no = $request->block_no;
        $item->save();
        return back()->with('success', 'Item added successfully');
    }

    public function delete(Request $request){
        InItem::findOrFail($request->id)->delete();
        return back()->with('success', 'Item delete successfully');
    }
}