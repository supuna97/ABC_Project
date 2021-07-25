@extends('layouts.app')

@section('content')

<div class="container">
    <h2>ORDER SECTION</h2>

    <h3>Shipping Information</h3>
    <br>

    <form class="row g-3" action="{{route('orders.store')}}" class="needs-validation" enctype="multipart/form-data" novalidate method="post">
    {{ csrf_field() }}
        <div class="col-md-6">
            <label for="" class="form-label">Full Name</label>
            <input type="text" name="shipping_fullname" class="form-control" id="shipping_fullname" required>

            <div class="invalid-feedback">
                Please enter a name
            </div>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">State</label>
            <input type="text" name="shipping_state" class="form-control" id="shipping_state" required>

            <div class="invalid-feedback">
                Please enter a state
            </div>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">City</label>
            <input type="text" name="shipping_city" class="form-control" id="shipping_city" required>

            <div class="invalid-feedback">
                Please enter a city
            </div>
        </div>
        <div class="col-md-6">
            <label for="" class="form-label">Zip</label>
            <input type="text" name="shipping_zipcode" class="form-control" id="shipping_zipcode" required>
            <div class="invalid-feedback">
                Please enter a zipcode
            </div>
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">Full Address</label>
            <input type="text" name="shipping_address" class="form-control" id="shipping_address" required>

            <div class="invalid-feedback">
                Please enter a address
            </div>
        </div>

        <div class="col-md-6">
            <label for="" class="form-label">Mobile</label>
            <input type="number" name="shipping_phone" class="form-control" id="shipping_phone" required>

            <div class="invalid-feedback">
                Please enter a mobile number
            </div>
        </div>

        <br><br><br><br>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Place Order</button>
        </div>
    </form>

    @endsection