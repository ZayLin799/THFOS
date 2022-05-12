<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" >
    @if(session('message'))
                    <script>
                        alert("Password updated successfully");
                    </script>
    @endif
    <header class="header-mobile d-block d-lg-none" >
        <div id="mySidepanel" class="sidepanel ">
            <a href="javascript:void(0)"  class="closebtn " onclick="closeNav()" style="text-decoration:none;">&times;</a>
                 <ul id="accordionSidebar">
        <!-- Sidebar Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}" style="text-decoration:none;" >
            <img src="{{ asset('backend/img/thfos_logo.png')}}" width="55px" height="45px">
            <div class="sidebar-brand-icon rotate-n-15">

                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <div class="sidebar-brand-text mx-3 " >THFOS</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
       <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#std" href="#" >
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <span>Student</span></a>
                <div id="std" class="collapse" >
                <div class="bg-white py-2 collapse-inner rounded" id="navitem">
                     <a class="collapse-item" href="{{url('student')}}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Student List
                    </a>
                    <a class="collapse-item" href="{{url('student/create')}}">
                        <i class="fas fa-plus"></i>
                        Add Student
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#vol" href="" >
                <i class="fas fa-user " aria-hidden="true"></i>
                <span>Volunteer</span></a>
                <div id="vol" class="collapse" >
                <div class="bg-white py-2 collapse-inner rounded" id="navitem">
                    <a class="collapse-item" href="{{url('volunteer')}}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Volunteer List
                    </a>
                    <a class="collapse-item" href="{{url('position')}}">
                        <i class="fas fa-plus"></i>
                        Position
                    </a>
                    <a class="collapse-item" href="{{url('v_course')}}">
                        <i class="fas fa-plus"></i>
                        Course
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#cl" href="" >
                <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                <span>Class</span>
            </a>
            <div id="cl" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded" id="navitem">
                    <a class="collapse-item" href="{{url('batch_info')}}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Class List
                    </a>
                    <a class="collapse-item" href="{{url('batch_info/create')}}">
                        <i class="fas fa-plus"></i>
                            New Class
                    </a>
                </div>
            </div>
        </li>
            <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#cours" href="" >
                <i class="fas fa-book-open" aria-hidden="true"></i>
                <span>Course</span>
            </a>
            <div id="cours" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded" id="navitem">
                    <a class="collapse-item" href="{{url('course')}}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Course List
                    </a>
                    <a class="collapse-item" href="{{url('category')}}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Category
                    </a>
                    <!-- <a class="collapse-item" href="{{url('course/create')}}">
                        <i class="fas fa-plus"></i>
                            Create Course
                    </a> -->
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#bat" href="" >
               <i class="fab fa-bootstrap" aria-hidden="true"></i>
                <span>Batch</span>
            </a>
            <div id="bat" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded" id="navitem">
                    <a class="collapse-item" href="{{url('batch')}}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Batch List
                    </a>
                    <a class="collapse-item" href="{{url('batch/create')}}">
                        <i class="fas fa-plus"></i>
                            Create Batch 
                    </a>
                </div>
            </div>
        </li>
         <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#post" href="" >
                <i class="far fa-images"></i>
                <span>Post/Blog</span>
            </a>
            <div id="post" class="collapse" >
                <div class="bg-white py-2 collapse-inner rounded" id="navitem">
                    <a class="collapse-item" href="{{url('blogs')}}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        Blog List
                    </a>
                    <a class="collapse-item" href="{{url('blogs/create')}}">
                        <i class="fas fa-plus"></i>
                        Create Blog
                    </a>
                </div>
            </div>
        </li>
         <li class="nav-item">
            <a class="nav-link" data-target="#listcontacts" href="{{url('contacts')}}">
                <i class="fas fa-address-card"></i>
                <span>Contact</span>
            </a>
        </li>
         <li class="nav-item">
            <a class="nav-link" data-target="#listcfeedbacks" href="{{url('feedbacks')}}">
                <i class="fas fa-comment-dots"></i>
                <span>Feedback</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    </ul>
        </div>
        <button class="openbtn d-sm-none" onclick="openNav()">
            <i class="fa fa-bars"></i>
        </button>
    </header>
    <!-- Topbar Navbar -->
    <h6>Admin Dashboard</h6>
    <ul class="navbar-nav ml-auto ">
        <!-- Nav Item - Alerts -->
        <div class="topbar-divider d-sm-block "></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow ">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                 <i class="far fa-user"></i> 
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}
                </a>
                 <a class="dropdown-item" href="{{ url('editprofile/'.Auth::user()->id) }}">
                    {{ __('Edit Profile') }}
                </a>
                 <a class="dropdown-item" href="{{ url('changepassword/'.Auth::user()->id) }}">
                    {{ __('Change Password') }}
                </a>
            </div>
        </li>
    </ul>
</nav>