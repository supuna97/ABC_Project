<?php

namespace App\Http\Controllers\OperationManagerPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\Item;
use App\Models\ProductCategory;

class ItemController extends Controller
{
    // page view route function
    public function index()
    {
        $items = Item::get();
        $productcategory = ProductCategory::get();
        return view("operationmanager/om-item", compact('items','productcategory'));
    }

    //insert item
    public function store(Request $request)
    {

        $request->validate([
            'i_code' => 'required',
            'i_name' => 'required',
            'i_qty' => 'required',
            'i_img' => 'required',
            'pc_id' => 'required',
            'price' =>'required'           
        ]);

        $items = new Item();

        $items->i_code = $request->input('i_code');
        $items->i_name = $request->input('i_name');
        $items->i_qty = $request->input('i_qty');
        $items->pc_id = $request->input('pc_id');
        $items->price = $request->input('price');
        $items->stock_qty = $request->input('i_qty');


        if ($request->hasfile('i_img')) {
            $file = $request->file('i_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/items/' ,$filename);
            $items->i_img = $filename;
            
        } 
        
        else {
            return $request;
            $items->i_img ="";

        }


        $items->save();

        if ( $items) {
            return redirect('operationmanager/om-item')->with('success', 'RECORD HAS BEEN SUCCESSFULLY INSERTED!');
        } else {
            return redirect('operationmanager/om-item')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY INSERTED!');
        }
    }

     //delete data
     public function destroy($id)
     {
        Item::find($id)->delete();
         return response()->json(['status'=>'Admin Delete Successfully']);
 
     }

     //edit data
    public function edit_item(Request $request)
    {
        $items = Item::find($request->id);
        return $items;
    }

    //update data
    public function update_item(Request $request)
    {
        $items = Item::find($request->get('i_id'));  

        $request->validate([
            'i_code' => 'required',
            'i_name' => 'required',
            'i_qty' => 'required',
            'i_img' => 'required',
            'pc_id' => 'required',
            'price' => 'required'           
           
        ]);

        $items->i_code = $request->get('i_code');
        $items->i_name = $request->get('i_name');
        $items->i_qty = $request->get('i_qty');
        $items->pc_id = $request->get('pc_id');
        $items->price = $request->get('price');
        $items->stock_qty = $request->get('i_qty');


        if ($request->hasfile('i_img')) {
            $file = $request->file('i_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/items/' ,$filename);
            $items->i_img = $filename; 
        } 
        
        else {
             return $request;
             $items->i_img = "";

        }
        
        $items->save();

        if ($items) {
            return redirect('operationmanager/om-item')->with('success', 'RECORD HAS BEEN SUCCESSFULLY UPDATED!');
        } else {
            return redirect('operationmanager/om-item')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY UPDATED!');
        }
    }
}
