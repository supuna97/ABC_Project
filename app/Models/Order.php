<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orders';

    protected $primaryKey = 'o_id';

    protected $fillable = [
        'o_number','u_id','status','grand_total','item_count','is_paid','payment_method'
    ];

    public function items(){
        return $this->belongsToMany(Item::class,'order_items','o_id','i_id')->withPivot('price','quantity');
    }

}
