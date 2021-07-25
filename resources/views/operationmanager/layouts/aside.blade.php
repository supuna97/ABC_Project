
<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">

            <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('operationmanager/index')}}" aria-expanded="false">
                    <i class="mdi mdi-av-timer"></i>
                    <span class="hide-menu">OM Dashborad </span>
                </a>
            </li>
            <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('operationmanager/om-productcategory')}}" aria-expanded="false"><i class="mdi mdi-comment-processing-outline"></i><span class="hide-menu">Product Category</span></a></li>

            <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('operationmanager/om-item')}}" aria-expanded="false"><i class="mdi mdi-comment-processing-outline"></i><span class="hide-menu">Items</span></a></li>
            <br><br><br>

<li class="sidebar-item">

    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" aria-expanded="false">
        <i class="mdi mdi-directions"></i><span class="hide-menu">Logout</span>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    </a>
</li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->