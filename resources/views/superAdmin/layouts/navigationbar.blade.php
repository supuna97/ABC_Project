
<a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <!--    <img src="assets/images/users/2.jpg" alt="user" class="rounded-circle" width="40">-->
    <span class="m-l-5 font-medium d-none d-sm-inline-block">{{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i></span>
</a>
<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">

    <div class="p-l-30 p-10">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" aria-expanded="false" class="btn btn-sm btn-success btn-rounded" >Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>