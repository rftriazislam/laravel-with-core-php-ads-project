<header class="header_s header_s1">
    <!-- SidePanel -->
    <div id="slidepanel">

        <!-- Top Header -->
        <div class="container-fluid no-right-padding no-left-padding top-header">
            <!-- Container -->
            <div class="container">
                <div class="top-left tcp_black">
                    <p><i class="fa fa-phone"></i> +8801716967050</p>
                    <p><i class="fa fa-envelope-o tc_black"></i>info@dreamploy.com</p>
                </div>
                <div class="top-right">
                    <p><a class="tc_dark tc_green_h" href="{{url('/login')}}" title="Login">Login</a></p>
                    <p><a class="tc_dark tc_green_h" href="https://play.google.com/store/apps/details?id=com.dreamploy.dreamploy" title="Signup">Signup</a></p>
                    <!--<p><a class="tc_dark tc_green_h" href="#" title="How We Work">How We Work</a></p>-->
                </div>
            </div><!-- Container /- -->
        </div><!-- Top Header /- -->

    </div><!-- SidePanel /- -->

    <!-- Ownavigation -->
    <nav class="navbar ownavigation bg_black menu_color">
        <!-- Container -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/home')}}/assets/images/logo.png" alt="logo"></a>
            </div>


            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class=""><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/tutorial')}}" >Tutorial</a></li>
                    <li><a href="{{url('/marketing-plan')}}" >Marketing Plan</a></li>
                    <li><a href="{{url('/our-service')}}" >Services</a></li>
                    <li><a href="{{url('/marchent')}}" >Shopping</a></li>
                    <li><a href="{{url('/login')}}" >Login</a></li>
                    <li><a href="https://play.google.com/store/apps/details?id=com.dreamploy.dreamploy" >Signup</a></li>
                </ul>
            </div>
            <div id="loginpanel" class="desktop-hide">
                <div class="right" id="toggle">
                    <a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-sign-in "></i></a>
                    <a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
                </div>
            </div>

        </div><!-- Container /- -->
    </nav><!-- Ownavigation /- -->

</header><!-- Header Section /- -->