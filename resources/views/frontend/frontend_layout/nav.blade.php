<div class="container-fluid header shadow-sm bg-light sticky-top">
      <div class="container">
        <div class="row">
          <div class="col-12 px-0">
            <!-- navbar-light/dark = font color -->
            <nav class="navbar navbar-expand-lg navbar-light no-pt">
              <div class="container-fluid no-pt">
                <a class="navbar-brand d-flex justify-content-center align-items-center" href="{{url('/')}}">
                  <div>
                    <img
                    class="rounded-circle"
                    src="{{asset ('frontend/images/thfos_logo_retouched.png')}}"
                    height="35"
                    alt=""
                    />
                  </div>
                  <div class="align-items-baseline">
                    <span class="span-semibold span-title">Tree Hill</span>
                    <span class="span-small">Free Online School</span>
                  </div>
                </a>

                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                <i class="fas fa-bars"></i>
                </button>

                <div
                  class="collapse navbar-collapse justify-content-end"
                  id="navbarSupportedContent"
                >
                  <ul class="navbar-nav">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                      <a id="{{ request()->is('/') ? 'active-a' : '' }}" class="nav-link" href="/">
                        Home
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('courses') ? 'active' : '' }}">
                      <a id="{{ request()->is('courses') ? 'active-a' : '' }}" class="nav-link" href="/courses">Courses</a>
                    </li>
                    <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}">
                      <a id="{{ request()->is('blog') ? 'active-a' : '' }}" class="nav-link" href="/blog">Blog</a>
                    </li>
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                      <a id="{{ request()->is('about') ? 'active-a' : '' }}" class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                      <a id="{{ request()->is('contact') ? 'active-a' : '' }}" class="nav-link" href="/contact">Contact</a>
                    </li>
                  </ul>
                  <div class="dropdown nav-dropdown">
                      <button class="header-btn btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Register Now
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/student_registration">Register As Student</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/volunteer_registration">Register As Volunteer</a></li>
                      </ul>
                    </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- //////////////////////messenger///////////////////// -->

    {{-- <a href="https://m.me/THFOSnov2021" target="_blank" class="my-float text-decoration-none wow animate__fadeInUp" data-wow-delay="0.3s">
      <i class="fab fa-facebook-messenger"></i>
      </a> --}}