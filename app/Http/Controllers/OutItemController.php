<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\OutItem;

class OutItemController extends Controller
{
    public function edit(Request $request){
        if($request->id){
            $item = OutItem::findOrFail($request->id);
        }else{
            $item = new OutItem;
            $item->in_item_id = $request->in_item_id;
        }
        return view('customers.items.modals.edit_out_item',compact('item'));
    }

    public function store(Request $request){
        if($request->id){
            $item = OutItem::findOrFail($request->id);
        }else{
            $item = new OutItem;
        }
        $item->in_item_id = $request->in_item_id;
        $item->date = $request->date;
        $item->weight = $request->weight;
        $item->count = $request->count;
        $item->vehicle_no = $request->vehicle_no;
        $item->save();
        return back()->with('success', 'Item added successfully');
    }

    public function delete(Request $request){
        OutItem::findOrFail($request->id)->delete();
        return back()->with('success', 'Item delete successfully');
    }
}