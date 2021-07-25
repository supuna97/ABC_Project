@include('superadmin.layouts.head')
@extends('layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

@section('content')

<div class="container">

    <h3>Customer Purchased Item Report</h3>

    <br><br>


    @if(count($items)>0)

    <table id="lang_opt" class="table table-striped table-bordered display">
        <thead>
            <tr>

                <th>Order Code</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Item Total Price</th>
                <th>Date</th>

            </tr>
        </thead>
        <tbody>

            @foreach($items as $data)
            <tr>
                <td>{{$data['o_number']}}</td>               
                <td>{{$data['i_code']}}</td>
                <td>{{$data['i_name']}}</td>
                <td>{{$data['price']}}</td>
                <td>{{$data['quantity']}}</td>
                <td>{{$data['price']*$data['quantity']}}</td>
                <td>{{$data['created_at']}}</td>
               
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>Order Code</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Item Total Price</th>
                <th>Date</th>

            </tr>
        </tfoot>
    </table>
    
    @else
    <div style="text-align:center"><span style="text-align:right;color:red">No Records Found</span></div>
    @endif

</div>
@include('superadmin.layouts.js')

<!--Data Tables JS-->
@include('superadmin.layouts.datatablejs')

@endsection