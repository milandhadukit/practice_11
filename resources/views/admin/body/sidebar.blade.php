<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('home') }}">

                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>System </h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('home') }}">
                    {{--  --}}
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->usertype == 'Admin')
                <li class="treeview">
                    <a href="#">
                        <i data-feather="user"></i>
                        <span>Manage User</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.userview') }}"><i class="ti-more"></i> View User</a></li>
                        <li><a href="{{ route('admin.useradd') }}"><i class="ti-more"></i>Add User</a></li>
                        <li><a href="{{ route('user.viewdata') }}"><i class="ti-more"></i> Server Side View</a></li>
                        <li><a href="{{ route('admin.userrole') }}"><i class="ti-more"></i> User Role</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i data-feather="gift"></i> <span>Manage Product</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.addProducts') }}"><i class="ti-more"></i>Add Product</a></li>
                        <li><a href="{{ route('admin.add-product-image') }}"><i class="ti-more"></i>Add Product Image</a></li>
                        <li><a href="{{ route('admin.product-list') }}"><i class="ti-more"></i> Product List</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i data-feather="archive"></i> <span>Manage Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href="{{ route('admin.addCategory') }}"><i class="ti-more"></i>Add Category</a></li>
                        
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i data-feather="mail"></i> <span>Manage Profile</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li><a href=""><i class="ti-more"></i>Your Profile</a></li>
                        {{-- <li><a href="mailbox_compose.html"><i class="ti-more"></i>Change Password</a></li> --}}
                    </ul>
                </li>
            @elseif (Auth::user()->usertype == 'User')
                <li class="treeview">
                    <a href="#">
                        <i data-feather="mail"></i> <span>Show Data</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.viewdata') }}"><i class="ti-more"></i> View</a></li>
                        <li><a href="{{ route('test.getusers') }}"><i class="ti-more"></i> test </a></li>

                        <li><a href=""><i class="ti-more"></i>Others</a></li>
                        {{-- mailbox_compose.html --}}

                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i data-feather="grid"></i>
                        <span>Contact</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="ti-more"></i>Contact Us</a></li>
                        <li><a href="#"><i class="ti-more"></i>About Us</a></li>

                    </ul>
                </li>
            @endif


            <li>
                <a href="{{ route('admin.logout') }}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>
</aside>
