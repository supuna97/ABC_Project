 
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    @include('superadmin.layouts.head')
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
        @include('superadmin.layouts.aside')
    </aside>

    <!-- End Left Sidebar - style you can find in sidebar.scss  -->

    <div class="page-wrapper">

        <div class="container-fluid">
            <br><br>
            <div style="text-align: center">
                <img src="">
                <br><br>
                <h4>Welcome to the ABC PVT Ltd Super Admin Portal System</h4>

                <h3>Please choose an option from the left.</h3>
                <br>
                <img src="../assets/admin/imgs/report.gif">
            </div>
        </div>

        <!-- footer -->

        @include('superadmin.layouts.footer')

        <!-- End footer -->

    </div>

</div>

<!-- End Wrapper -->


<div class="chat-windows"></div>

<!-- All Jquery -->

@include('superadmin.layouts.js')
</body>

</html>
