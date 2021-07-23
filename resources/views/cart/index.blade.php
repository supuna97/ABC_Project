@extends('layouts.app')

@section('content')

<div class="container">
    <h2>My Cart</h2>



    <table class="table">
        <thead>
            <tr>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartitems as $item)
            <tr>
                <td scope="row">{{$item->code}}</td>
                <td>{{$item->name}}</td>
                <td>

                    <form action="{{route('cart.update', $item->id)}}">

                        <input name="quantity" type="number" value="{{$item->quantity}}">
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

    <a class="btn btn-primary" href="{{route('cart.checkout')}}" role="button">Proceed to checkout</a>

</div>


@endsection