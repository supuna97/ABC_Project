<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\ProductCategory;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'items';

    protected $primaryKey = 'i_id';

    protected $fillable = [
        'i_code','i_name','i_qty','i_img','pc_id'
    ];

    //get the product name using product id
    
    public function getProductCategory(){
        $productcategory = ProductCategory::find($this->pc_id);
        return $productcategory ? $productcategory->pc_name:"";
    }

    public function productCategory(){
        return $this->belongsTo('App\Models\ProductCategory','pc_id','pc_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_items','i_id','o_id')->withPivot('price','quantity');
    }
}
