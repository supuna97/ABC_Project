<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Darryldecode\Cart\Cart;

use App\Models\Item;

class CartController extends Controller
{
    public function add(Item $item)
    {
        // dd($item);

        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => uniqid($item->i_id),
            'code' => $item->i_code,
            'name' => $item->i_name,
            'price' => $item->price,
            'quantity' => $item->i_qty,
            'attributes' => array(),
            'associatedModel' => $item
        ));

        return redirect()->route('welcome');
    }

    public function index()
    {
        $cartitems = \Cart::session(auth()->id())->getContent();
        return view('cart.index', compact('cartitems'));
    }

    public function destroy($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);
        return back();
    }

    public function update($rowId){

        \Cart::session(auth()->id())->update($rowId,[

            'quantity' => [
                'relative' => false,
                'value' => request('quantity')
            ]
        ]);

        return back();
    }

    public function checkout(){

        return view('cart.checkout');
    }

}
