@extends('layouts.app')

@section('content')

<div class="container">
    <h2>My Cart</h2>

    <br><br>
    <table class="table">
        <thead>
            <tr>
                
                <th>Item Name</th>
                <th>1 Item Price</th>
                <th>Order Qty</th>
                <th>Order Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartitems as $item)
            <tr>
               
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                
                <td>

                    <form action="{{route('cart.update', $item->id)}}" >

                        <input name="quantity" type="number" min="1"  value="{{$item->quantity}}" required>
                        <input type="submit" value="save">

                    </form>
                </td>
                <td>
                    {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                </td>
                <td>
                    <a href="{{route('cart.destroy',$item->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>
        Total Price : RS {{\Cart::session(auth()->id())->getTotal()}}
    </h3>
    @if(count($cartitems)>0)
    <a class="btn btn-primary" href="{{route('cart.checkout')}}" role="button">Proceed to checkout</a>
    @else
    <button class="btn btn-primary" disabled="disabled" href="#" role="button">Proceed to checkout</button>
    @endif

</div>


@endsection