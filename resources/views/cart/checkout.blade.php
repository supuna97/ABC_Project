@extends('layouts.app')

@section('content')

<div class="container">
    <h2>ORDER SECTION</h2>

    <h3>Shipping Information</h3>
    <br>

    <form class="row g-3" action="{{route('orders.store')}}" method="post">
        @csrf
        <div class="col-md-6">
            <label for="" class="form-label">Full Name</label>
            <input type="text" name="shipping_fullname" class="form-control" id="shipping_fullname">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">State</label>
            <input type="text" name="shipping_state" class="form-control" id="shipping_state">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">City</label>
            <input type="text" name="shipping_city" class="form-control" id="shipping_city">
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Zip</label>
            <input type="text" name="shipping_zipcode" class="form-control" id="shipping_zipcode">
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">Full Address</label>
            <input type="text" name="shipping_address" class="form-control" id="shipping_address">
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">Mobile</label>
            <input type="number" name="shipping_phone" class="form-control" id="shipping_phone">
        </div>

        <br><br><br><br>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Place Order</button>
        </div>
    </form>

    @endsection