    <ul class="navbar-nav sidebar sidebar-dark accordion me-auto" id="accordionSidebar">
        <!-- Sidebar Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}">
            <img src="{{ asset('backend/img/thfos_logo.png')}}" width="55px" height="45px">
            <div class="sidebar-brand-icon rotate-n-15">

                <!-- <i class="fas fa-laugh-wink"></i> -->
            </div>
            <div class="sidebar-brand-text mx-3">THFOS</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{url('home')}}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>HOME</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#liststd" href="#" >
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <span>Student</span></a>
                <div id="liststd" class="collapse" >
                <div class="bg-white py-2 collapse-inner rounded">
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
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#list4" href="" >
                <i class="fas fa-user " aria-hidden="true"></i>
                <span>Volunteer</span></a>
                <div id="list4" class="collapse" >
                <div class="bg-white py-2 collapse-inner rounded">
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
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#listbatchlist" href="" >
                <i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
                <span>Class</span>
            </a>
            <div id="listbatchlist" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
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
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#list1" href="" >
                <i class="fas fa-book-open" aria-hidden="true"></i>
                <span>Course</span>
            </a>
            <div id="list1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
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
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#listbatch" href="" >
                <i class="fab fa-bootstrap"></i>
                <span>Batch</span>
            </a>
            <div id="listbatch" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
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
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#list2" href="" >
                <i class="far fa-images"></i>
                <span>Post/Blog</span>
            </a>
            <div id="list2" class="collapse" >
                <div class="bg-white py-2 collapse-inner rounded">
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
            <a class="nav-link" data-target="#listcontact" href="{{url('contacts')}}">
                <i class="fas fa-address-card"></i>
                <span>Contact</span>
            </a>
            {{-- <div id="listcontact" class="collapse" >
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{url('contacts')}}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                         List
                    </a>
                </div>
            </div> --}}
        </li>
        <li class="nav-item">
            <a class="nav-link" data-target="#listcfeedback" href="{{url('feedbacks')}}">
                <i class="fas fa-comment-dots"></i>
                <span>Feedback</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    </ul>
  