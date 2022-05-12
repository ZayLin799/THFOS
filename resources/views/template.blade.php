<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Primary Meta Tags -->
<title>Tree Hill Free Online School</title>
<link rel="icon" href="{{asset ('frontend/images/thfos_logo_retouched.png')}}" type="image/icon type">

<meta name="title" content="Tree Hill">
<meta name="description" content="Free Online School...">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://thfos.com/">
<meta property="og:title" content="Tree Hill">
<meta property="og:description" content="Free Online School...">
<meta property="og:image" content="{{asset ('frontend/images/thfos_logo_retouched.png')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://thfos.com/">
<meta property="twitter:title" content="Tree Hill">
<meta property="twitter:description" content="Free Online School...">
<meta property="twitter:image" content="{{asset ('frontend/images/thfos_logo_retouched.png')}}">

    <!-- <link href="style.css" rel="stylesheet" /> -->
    <link href="frontend/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/nav.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/slick/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.scss') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/animate_it/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/venobox/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/courses.css') }}">
    <link rel="stylesheet" href="{{ asset('fontend/css/blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/course_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/blog-post.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/stu-reg.css') }}" />
    <style>
      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      html {
        scroll-behavior: smooth;
      }
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>
  <body>
    <?php header('Access-Control-Allow-Origin: *'); ?>
    <!-- //////////////////////header///////////////////// -->
  @include('frontend.frontend_layout.nav')
    <!-- //////////////////////main session///////////////////// -->
      @yield('content')

    <!-- //////////////////////footer///////////////////// -->
  @include('frontend.frontend_layout.footer')

    <!-- <script src="script.js"></script> -->
    <script src="{{ asset('frontend/script.js') }}"></script>
    <script src="{{ asset('frontend/jquery.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('frontend/counter_up/counter_up.js') }}"></script>
    <script src="{{ asset('frontend/js/counter.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoint_nav.js') }}"></script>
    <script src="{{ asset('frontend/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/stu_feedback.js') }}"></script>
    <script src="{{ asset('frontend/wow/wow.js') }}"></script>
    <script src="{{ asset('frontend/js/wow_effect.js') }}"></script>
    <script src="{{ asset('frontend/js/sidebar.js') }}"></script>
    <script src="{{ asset('frontend/js/courses.js') }}"></script>
    <script src="{{ asset('js/vol-reg.js') }}"></script>

    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat" theme_color="#198754">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "104707275361033");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
  </body>
</html>

