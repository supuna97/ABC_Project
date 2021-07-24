<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('superadmin.layouts.head')
    <!--    Data Tables CSS-->
    @include('superadmin.layouts.datatablecss')

    <![endif]-->
</head>

<body>

<!-- Preloader - style you can find in spinners.css -->

<div class="preloader">
    @include('superadmin.layouts.preloader')
</div>

<!-- Main wrapper - style you can find in pages.scss -->

<div id="main-wrapper">

    <!-- Topbar header - style you can find in pages.scss -->

    <header class="topbar">
        @include('superadmin.layouts.header')
    </header>

    <!-- End Topbar header -->

    <!-- Left Sidebar - style you can find in sidebar.scss  -->

    <aside class="left-sidebar">
        @include('salesmanager.layouts.aside')
        <!-- End Sidebar scroll-->
    </aside>

    <!-- End Left Sidebar - style you can find in sidebar.scss  -->

    <!-- Page wrapper  -->

    <div class="page-wrapper">

        <!-- Bread crumb and right sidebar toggle -->

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">DAILY SALES ITEM REPORT</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Daily Sales Item Report</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Bread crumb and right sidebar toggle -->

        <!-- Container fluid  -->

        <div class="container-fluid">

            <!-- Start Page Content -->

            <!-- basic table -->

            <!-- language options -->
            <div class="col-md-12">
               
            </div>
            <div class="row">
                <div class="col-12">
               
                    <div class="card">
                        <div class="card-body">
                           
                        <form action="{{route('search')}}" method="POST">

                        @csrf
                                <div class='row'>

                                    <!--date range pickers-->
                                    @include('superadmin.layouts.datepickers')

                                    <button type="submit"
                                            class="btn waves-effect waves-light btn-outline-primary"
                                            value="">Search
                                    </button>

                                </div>

                                
                        </form>        

                            <br><br><br>

                            <div class="table-responsive">
                            
                                <table id="lang_opt" class="table table-striped table-bordered display"
                                      >
                                    <thead>
                                    <tr>

                                        
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>Available Qty</th>
                                        <th>Price</th>
                                        <th>Order Qty</th>
                                        <th>Item Amount</th>
                                        
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                   
                                    @foreach($products as $product)
                                    @foreach($product->byPrice as $byPrice)
                                    <tr>
                                        <td>{{ $product->i_code }}</td>
                                        <td>{{ $product->i_name }}</td>
                                        <td>{{ $product->i_qty }}</td>
                                        <td>{{ $byPrice->first()->pivot->price }}</td>
                                        <td>{{ $byPrice->sum('pivot.quantity') }}</td>
                                        <td>{{ $byPrice->first()->pivot->price * $byPrice->sum('pivot.quantity') }}</td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                  
                                    
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                   
                                       
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>Available Qty</th>
                                        <th>Price</th>
                                        <th>Order Qty</th>
                                        <th>Item Amount</th>

                                    </tr>
                                    </tfoot>
                                </table>
                               

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- End PAge Content -->

            <!-- End Right sidebar -->

        </div>

        <!-- End Container fluid  -->

        <!-- footer -->

       

        <!-- End footer -->

    </div>

    
                
        <!-- footer -->
        @include('superadmin.layouts.footer')
       

<!-- End footer -->


   
    <!-- End Wrapper -->

    <div class="chat-windows"></div>

    <!-- All Jquery -->

    @include('superadmin.layouts.js')

    <!--Data Tables JS-->
    @include('superadmin.layouts.datatablejs')

    <!--Date Picker js-->
@include('superadmin.layouts.datepickerjs')

  
    <!--This page plugins -->

 


</body>

</html>