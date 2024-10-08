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
        @include('operationmanager.layouts.aside')
        <!-- End Sidebar scroll-->
    </aside>

    <!-- End Left Sidebar - style you can find in sidebar.scss  -->

    <!-- Page wrapper  -->

    <div class="page-wrapper">

        <!-- Bread crumb and right sidebar toggle -->

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">PRODUCT CATEGORY SECTION</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                @include('flash-message')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">PRODUCT CATEGORY</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <a href="#long-modal-new" class="btn waves-effect waves-light btn-outline-success
                                    col-md-1 img-fluid" data-toggle="modal" data-target="">Add New</a>

                                </div>
                            </div>
                            <br>

                            <div class="table-responsive">
                            @if(count($pcs)>0)
                                <table id="lang_opt" class="table table-striped table-bordered display"
                                      >
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>Product Category Name</th>
                                        
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pcs AS $data)
                                    <tr>
                                    <input type="hidden" class="pcdelete_val_id" value="{{$data->pc_id}}">
                                        <td>{{$data->pc_id}}</td>
                                        <td>{{$data->pc_name}}</td>
                                      
                                       
                                        <td>
                                            <a onclick="pc_edit({{$data->pc_id}});" class="btn waves-effect waves-light btn-outline-primary
                                    edit" data-toggle="modal" data-target="">Edit</a>

                                    <button type="button" class="btn waves-effect waves-light btn-outline-primary pcdeletebtn
                                    " data-toggle="" data-target="">Delete</button>
                                        </td>

                                    </tr>
                                  
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Product Category Name</th>
                                       
                                        <th></th>

                                    </tr>
                                    </tfoot>
                                </table>
                                @else
                        <div style="text-align:center"><span style="text-align:right;color:red">No Records Found</span></div>
                                @endif      

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

    <!--  Product Category Update Modal-->

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vertically Center</h4>
                <!-- sample modal content -->
                <div id="edit_pc" class="modal" tabindex="-1" role="dialog" aria-labelledby="vcenter"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <h4 class="mb-0 text-white">Product Category Update Section</h4>
                                            </div>
                                            <form action="{{url('operationmanager/update-productcategory')}}" class="needs-validation" novalidate method="POST">
                                            {{ csrf_field() }}
                                                <hr>
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row pt-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  
                                                                    <input id="pc_id"
                                                                           name="pc_id" class="form-control"
                                                                           placeholder="" type="hidden">
                                                                    <small class="form-control-feedback"></small>
                                                                </div>
                                                            </div>

                                                    
                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Name</label>
                                                                    <input type="text" id="pc_name" name="pc_name"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a product category name
                                                                    </div>
                                                                </div>
                                                            </div>
                                                

                                                      </div>

                                                            <div class="form-actions">
                                                                <div class="card-body">
                                                                    <button type="submit" class="btn btn-success"
                                                                           ><i
                                                                            class="fa fa-check"></i>Update
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            <!--End update modal-->
        </div>
    </div>


    <!--    Save AProduct Category Modal-->
    
    <div class="modal" id="long-modal-new" tabindex="-1" role="dialog" aria-labelledby="longmodal" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h4 class="mb-0 text-white">Add New Product Category</h4>
                                </div>
                                <form action="{{url('operationmanager/save-productcategory')}}" class="needs-validation" novalidate method="POST">  
                                {{ csrf_field() }} 
                                    <hr>
                                    <div class="form-body">
                                        <div class="card-body">
                                            <div class="row pt-3">
                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Product Category Name</label>
                                                                    <input type="text" id="pc_name" name="pc_name"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a product category name
                                                                    </div>
                                                                </div>
                                                            </div>
                                                
                                                            
                                                      </div>

                                                <div class="form-actions">
                                                    <div class="card-body">
                                                        <button type="submit" id="savebtn"  class="btn btn-success"
                                                                ><i class="fa fa-check"></i> Upload
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                
        <!-- footer -->
        @include('superadmin.layouts.footer')
       

<!-- End footer -->


            </div>
            <!-- /.modal-content -->
           
        </div>
        <!-- /.modal-dialog -->
    </div>
   
    <!-- End Wrapper -->

    <div class="chat-windows"></div>

    <!-- All Jquery -->

    @include('superadmin.layouts.js')

    <!--Data Tables JS-->
    @include('superadmin.layouts.datatablejs')

  
    <!--This page plugins -->

 
 <script>
       
//delete product category using ajax
$(document).ready(function(){

$.ajaxSetup({
    
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
});

 $('.pcdeletebtn').click(function (e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find('.pcdelete_val_id').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
        if (willDelete) {

            var data={

                "_token" : $('input[name="csrf-token"]').val(),
                "id" : delete_id
            }

            $.ajax({

                type:"DELETE",
                url:'/operationmanager/delete-productcategory/'+delete_id,
                data: data,
                success: function(response){
                   
                    swal(response.status, {
                        icon: "success",
                      })

                      .then((result) => {

                        location.reload();
                      });
                }

            });

           
        } 
    });
 });
});

// Update Product Category Script
function pc_edit(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: "{{ url('operationmanager/edit-productcategory') }}",
        data: {
            id: id
        },
        success: function (data) {
            console.log(data);
            $('#edit_pc').modal('show');
            $('#pc_id').val(data.pc_id);
            $('#pc_name').val(data.pc_name);
           
        }
    });
}

    </script>


</body>

</html>