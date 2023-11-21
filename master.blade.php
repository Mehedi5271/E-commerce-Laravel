@include('admin.layout.header')
<body>

    @include('admin.layout.navbar')
    


    <!-- page main section -->
	<section class="main_section">

         <!-- header -->
        <header class="header_area">
            <div class="search">
                <form>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search here..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <button type="submit" class="input-group-text btn btn-sm" id="basic-addon2">Search</span>
                    </div>
                </form>
            </div>
            <div class="header_right">

                <div class="profile">
                    <img src="{{asset('images/admin.jpg')}}" alt="profile image">
                </div>

                <div class="notification">
                    <a href="">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">13</span>
                    </a>
                </div>

                <div class="massage">
                    <a href="">
                        <i class="fa fa-envelope"></i>
                        <span class="count bg-primary">14</span>
                    </a>
                </div>
                

            </div> <!-- .header_right end -->
        </header> <!-- .header_area end -->

		

        @yield('content')



        <!-- footer area -->
      
@include('admin.layout.footer')