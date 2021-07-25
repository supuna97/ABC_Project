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
        @include('admin.layouts.aside')
        <!-- End Sidebar scroll-->
    </aside>

    <!-- End Left Sidebar - style you can find in sidebar.scss  -->

    <!-- Page wrapper  -->

    <div class="page-wrapper">

        <!-- Bread crumb and right sidebar toggle -->

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">ITEM SECTION</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">items</li>
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
                            <h4 class="card-title">ITEMS</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <a href="#long-modal-new" class="btn waves-effect waves-light btn-outline-success
                                    col-md-1 img-fluid" data-toggle="modal" data-target="">Add New</a>

                                </div>
                            </div>
                            <br>

                            <div class="table-responsive">
                            @if(count($items)>0)
                                <table id="lang_opt" class="table table-striped table-bordered display"
                                      >
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>Item Qty</th>
                                        <th>Product</th>
                                        <th>Item Price(RS)</th>
                                        <th>Item Image</th>
                                        
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items AS $data)
                                    <tr>
                                    <input type="hidden" class="itemdelete_val_id" value="{{$data->i_id}}">
                                        <td>{{$data->i_id}}</td>
                                        <td>{{$data->i_code}}</td>
                                        <td>{{$data->i_name}}</td>
                                        <td>{{$data->i_qty}}</td>
                                        <td>{{$data->getProductCategory()}}</td>
                                        <td>{{$data->price}}</td>
                                        <td><img width="70" height="50" src="{{asset('uploads/items/'.$data->i_img)}}" alt="item imgs"></td>
                                         
                                        <td>
                                            <a onclick="item_edit({{$data->i_id}});" class="btn waves-effect waves-light btn-outline-primary
                                    edit" data-toggle="modal" data-target="">Edit</a>

                                    <button type="button" class="btn waves-effect waves-light btn-outline-primary itemdeletebtn
                                    " data-toggle="" data-target="">Delete</button>
                                        </td>

                                    </tr>
                                  
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>Item Qty</th>
                                        <th>Product</th>
                                        <th>Item Price(RS)</th>
                                        <th>Item Image</th>
                                       
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

    <!--  Item Update Modal-->

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Vertically Center</h4>
                <!-- sample modal content -->
                <div id="edit_item" class="modal" tabindex="-1" role="dialog" aria-labelledby="vcenter"
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
                                                <h4 class="mb-0 text-white">Item Update Section</h4>
                                            </div>
                                            <form action="{{url('admin/update-item')}}" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <hr>
                                                <div class="form-body">
                                                    <div class="card-body">
                                                        <div class="row pt-3">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  
                                                                    <input id="i_id"
                                                                           name="i_id" class="form-control"
                                                                           placeholder="" type="hidden">
                                                                    <small class="form-control-feedback"></small>
                                                                </div>
                                                            </div>

                                                    
                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Item Code</label>
                                                                    <input type="text" id="i_code" name="i_code"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a item code
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Item Name</label>
                                                                    <input type="text" id="i_name" name="i_name"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a item name
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Item Qty</label>
                                                                    <input type="number" id="i_qty" name="i_qty"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a item qty
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Product Category</label>
                                                                    <select class="form-control custom-select" id="pc_id" name="pc_id"
                                                                            data-placeholder="Choose a Category" tabindex="1"
                                                                            required>
                                                                        <option value="">Select News Category</option>
                                                                        @foreach ($productcategory as $data)
                                                                        <option value="{{$data->pc_id}}">{{$data->pc_name}}</option>
                                                                       @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Item Price(RS)</label>
                                                                    <input type="number" id="price" name="price"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a item price
                                                                    </div>
                                                                </div>
                                                            </div>


                                                             <!-- image upload -->
                                                             <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="main-img-preview">
                                                                <img width="200" height="200" class="thumbnail img-preview" src="" title="Preview Logo">
                                                            </div>
                                                            <div class="input-group">
                                                                <input id="fakeUploadLogo" name="i_img" class="form-control fake-shadow"
                                                                    placeholder="Choose File"
                                                                    type="hidden">
                                                                <div class="input-group-btn">
                                                                    <div class="fileUpload btn btn-primary fake-shadow">
                                                                        <span><i class="glyphicon glyphicon-upload"></i> Upload Image</span>
                                                                        <input id="i_img" name="i_img" type="file" class="attachment_upload"
                                                                        accept="image/*" required>
                                                                        <div class="invalid-feedback">
                                                                        Please upload the item image new.   
                                                                    </div>
                                                                    </div>
                                                                </div>
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


    <!--Save Item Modal-->
    
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
                                    <h4 class="mb-0 text-white">Add New Item</h4>
                                </div>
                                <form action="{{url('admin/save-item')}}" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">  
                                {{ csrf_field() }} 
                                    <hr>
                                    <div class="form-body">
                                        <div class="card-body">
                                            <div class="row pt-3">
                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Item Code</label>
                                                                    <input type="text" id="i_code" name="i_code"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a item code
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Item Name</label>
                                                                    <input type="text" id="i_name" name="i_name"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a item name
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Item Qty</label>
                                                                    <input type="number" id="i_qty" name="i_qty"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a item qty
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Product Category</label>
                                                                    <select class="form-control custom-select" id="pc_id" name="pc_id"
                                                                            data-placeholder="Choose a Category" tabindex="1"
                                                                            required>
                                                                        <option value="">Select News Category</option>
                                                                        @foreach ($productcategory as $data)
                                                                        <option value="{{$data->pc_id}}">{{$data->pc_name}}</option>
                                                                       @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group has-danger">
                                                                    <label class="control-label">Item Price(RS)</label>
                                                                    <input type="number" id="price" name="price"
                                                                           class="form-control form-control-danger"
                                                                           placeholder="" required>
                                                                           <div class="invalid-feedback">
                                                                        Please enter a item price
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <!-- image upload -->
                                                            <div class="col-md-12">
                                                        <div class="form-group">
                                                            <!-- <div class="main-img-preview">
                                                                <img width="200" height="200" class=" img-preview-save thumbnail"  title="Preview Logo">
                                                            </div> -->
                                                            <div class="input-group">
                                                                <input id="fakeUploadLogo" name="i_img" class="form-control fake-shadow"
                                                                    placeholder="Choose File"
                                                                    disabled="disabled" required>
                                                                <div class="input-group-btn">
                                                                    <div class="fileUpload btn btn-primary fake-shadow">
                                                                        <span><i class="glyphicon glyphicon-upload"></i> Upload Image</span>
                                                                        <input id="i_img" name="i_img" type="file" class="attachment_upload"
                                                                        accept="image/*" required>
                                                                    </div>
                                                                </div>
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

// add image
$(document).ready(function() {
    var brand = document.getElementById('i_img');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

   
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-preview-save').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#i_img").change(function() {
        readURL(this);
    });
});


// image update
$(document).ready(function() {
    var brand = document.getElementById('i_imgs');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

   
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#i_img").change(function() {
        readURL(this);
    });
});
       
//delete item using ajax
$(document).ready(function(){

$.ajaxSetup({
    
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
});

 $('.itemdeletebtn').click(function (e){
        e.preventDefault();

        var delete_id = $(this).closest("tr").find('.itemdelete_val_id').val();

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
                url:'/admin/delete-item/'+delete_id,
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

// Update item Script
function item_edit(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "GET",
        url: "{{ url('admin/edit-item') }}",
        data: {
            id: id
        },
        success: function (data) {
            console.log(data);
            $('#edit_item').modal('show');
            $('#i_id').val(data.i_id);
            $('#i_code').val(data.i_code);
            $('#i_name').val(data.i_name);
            $('#i_qty').val(data.stock_qty);
            $('#pc_id').val(data.pc_id);
            $('#price').val(data.price);
            $('#fakeUploadLogo').val(data.i_img);
            $('.img-preview').attr('src','../uploads/items/'+data.i_img);
           
        }
    });
}

    </script>


</body>

</html>