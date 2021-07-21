<?php

namespace App\Http\Controllers\AdminPortal;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    // page view route function
    public function index()
    {
        $pcs = ProductCategory::get();
        return view("admin/admin-productcategory", compact('pcs'));
    }

    //insert product category
    public function store(Request $request)
    {

        $request->validate([
            'pc_name' => 'required'        
        ]);

        $pcs = new ProductCategory();

        $pcs->pc_name = $request->input('pc_name');

        $pcs->save();

        if ($pcs) {
            return redirect('admin/admin-productcategory')->with('success', 'RECORD HAS BEEN SUCCESSFULLY INSERTED!');
        } else {
            return redirect('admin/admin-productcategory')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY INSERTED!');
        }
    }

     //delete data
     public function destroy($id)
     {
        ProductCategory::find($id)->delete();
         return response()->json(['status'=>'Admin Delete Successfully']);
 
     }

     //edit data
    public function edit_productcategory(Request $request)
    {
        $pcs = ProductCategory::find($request->id);
        return $pcs;
    }

    //update data
    public function update_productcategory(Request $request)
    {
        $pcs = ProductCategory::find($request->get('pc_id'));  

        $request->validate([
            'pc_name' => 'required'
           
        ]);

        $pcs->pc_name = $request->get('pc_name');
        
        $pcs->save();

        if ($pcs) {
            return redirect('admin/admin-productcategory')->with('success', 'RECORD HAS BEEN SUCCESSFULLY UPDATED!');
        } else {
            return redirect('admin/admin-productcategory')->with('error', 'RECORD HAS NOT BEEN SUCCESSFULLY UPDATED!');
        }
    }
}
