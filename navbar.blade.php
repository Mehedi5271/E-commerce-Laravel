 <!-- Navbar -->
 <aside class="sidebar_area">
    <div class="sidebar-image">
        <img src="images/blood.png" alt="logo image">
    </div>
    <ul>
        <li><a href="{{route('home')}}" class="active"><i class="menu-icon fa fa-laptop"></i> Dashboard</a></li>
        <li><a href="{{route('donor.index')}}"><i class="fa fa-bars"></i> Donor</a></li>
        <li><a href="pages/request/request.html"><i class="fa fa-bell"></i> Request</a></li>
        <li><a href="pages/stock/stock.html"><i class="fa fa-fire"></i> Stock</a></li>
        <li><a href="form.html"><i class="fa fa-bars"></i> Form</a></li>
        <li><a href="login.html" target="_blank"><i class="fa fa-fire"></i> Login page</a></li>
        <li>
            <a href=" {{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit(); "><i class="fa fa-exclamation-triangle"></i> LogOut</a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
        </li>
    </ul>
</aside>