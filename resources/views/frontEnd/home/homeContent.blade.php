@extends('frontEnd.layouts.master')
@section('title')
    Home
    @endsection

@section('mainContent')

    <!-- Main Container -->
    <div class="main-container">

        <main class="site-main">

            <!-- News Ticker Section -->
            <div class="container-fluid no-left-padding no-right-padding welcome-section" style="padding:0;">
                <!-- Container -->
                <div class="container">
                    <div class="breakingNews" id="bn1">
                        <div class="bn-title"><h2><a href="notice.html" title="View All">News</a></h2><span></span></div>
                        <ul>
                            <li><a href="#">Now you can withdraw your income via bKash and Rocket Account. Stay connected & Earn more.</a></li>
                            <li><a href="#">Do not try to make fake joining. After join you have to complete a challenge and then you will withdraw money.</a></li>
                            <li><a href="#">We are going to arrange our annual program at 14th September 2018.</a></li>
                        </ul>
                        <div class="bn-navi">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div><!-- Container /- -->

            </div><!-- News Ticker /- -->

            <!-- Slider Section -->
            <div id="home-revslider" class="slider-section container-fluid no-padding">
                <!-- START REVOLUTION SLIDER 5.3 -->
                <div class="rev_slider_wrapper">
                    <div id="home-slider1" class="rev_slider" data-version="5.3">
                        <ul>
                            <li>
                                <img src="{{asset('public/home')}}/assets/images/slider.jpg" alt="slider" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 tc_dark" id="slide-1-layer-5"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-84','-84','-84','-74']"
                                     data-fontsize="['60','55','50','30']"
                                     data-lineheight="['77','60','55','35']"
                                     data-width="['900','900','700','450']"
                                     data-whitespace="normal"
                                     data-transform_idle="o:1;"
                                     data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                     data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                     data-start="1000"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-responsive_offset="on"
                                     data-elementdelay="0.05"
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 5; letter-spacing: 1.5px; text-transform:capitalize; font-weight:bold; font-family: 'Roboto Slab', serif; color:#fff;">
                                    Benefits of Advertisers
                                </div>
                                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 tc_dark" id="slide-1-layer-6"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['0','30','20','20']"
                                     data-fontsize="['22','22','22','18']"
                                     data-lineheight="['26','26','26','26']"
                                     data-width="['900','900','700','450']"
                                     data-whitespace="normal"
                                     data-transform_idle="o:1;"
                                     data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                     data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                     data-start="1000"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-responsive_offset="on"
                                     data-elementdelay="0.05"
                                     data-textAlign="['center','center','center','center']"
                                     style="z-index: 5; letter-spacing: 0.55px; white-space: normal;font-weight: normal; font-family: 'Source Sans Pro', sans-serif; color:#fff; ">Everyday 5,000 to 10,000 unique users are joining with us. <br> We have a genuine network.
                                </div>
                                <div class="tp-caption tp-resizeme rev-bordered bg_green tc_white" id="slide-1-layer-7"
                                     data-x="['center','center','center','center']" data-hoffset="['-95','-95','-95','-75']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['113','113','113','100']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]'
                                     data-responsive_offset="on"
                                     data-responsive="on"
                                     data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[16,16,16,11]"
                                     data-paddingright="[50,50,50,20]"
                                     data-paddingbottom="[16,16,16,11]"
                                     data-paddingleft="[50,50,50,20]"
                                     style="z-index: 10; border-radius: 2px; line-height: 24px; font-family: 'Oxygen', sans-serif; font-size: 14px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.35px;">Learn More
                                </div>
                                <div class="tp-caption tp-resizeme rev-bordered brd_color_dark" id="slide-1-layer-8"
                                     data-x="['center','center','center','center']" data-hoffset="['95','95','95','75']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['113','113','113','100']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]'
                                     data-responsive_offset="on"
                                     data-responsive="on"
                                     data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bg:rgba(0, 0, 0, 1.00);bc:rgba(0, 0, 0, 1.00);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[14,14,14,9]"
                                     data-paddingright="[35,35,35,20]"
                                     data-paddingbottom="[14,14,14,9]"
                                     data-paddingleft="[35,35,35,20]"
                                     style="z-index: 11; border-radius: 2px; line-height: 24px; font-family: 'Oxygen', sans-serif; font-size: 14px; font-weight: bold; text-transform: uppercase; border-style: solid; border-width: 2px; border-color:#fff; color:#fff; letter-spacing: 0.35px; ">Login
                                </div>
                            </li>
                            <li>
                                <img src="{{asset('public/home')}}/assets/images/slider.jpg" alt="slider" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 tc_dark" id="slide-1-layer-5"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-84','-84','-84','-74']"
                                     data-fontsize="['60','55','50','30']"
                                     data-lineheight="['77','60','55','35']"
                                     data-width="['900','900','700','450']"
                                     data-whitespace="normal"
                                     data-transform_idle="o:1;"
                                     data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                     data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                     data-start="1000"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-responsive_offset="on"
                                     data-elementdelay="0.05"
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 5; letter-spacing: 1.5px; text-transform:capitalize; font-weight:bold; font-family: 'Roboto Slab', serif; color:#fff;">
                                    Benefits of Publishers
                                </div>
                                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 tc_dark" id="slide-1-layer-6"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['0','30','20','20']"
                                     data-fontsize="['22','22','22','18']"
                                     data-lineheight="['26','26','26','26']"
                                     data-width="['900','900','700','450']"
                                     data-whitespace="normal"
                                     data-transform_idle="o:1;"
                                     data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                     data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                     data-start="1000"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-responsive_offset="on"
                                     data-elementdelay="0.05"
                                     data-textAlign="['center','center','center','center']"
                                     style="z-index: 5; letter-spacing: 0.55px; white-space: normal;font-weight: normal; font-family: 'Source Sans Pro', sans-serif; color:#fff; ">Earn unlimited without investment. <br>No hidden charges and activation fee, just 100% free.
                                </div>
                                <div class="tp-caption tp-resizeme rev-bordered bg_green tc_white" id="slide-1-layer-7"
                                     data-x="['center','center','center','center']" data-hoffset="['-95','-95','-95','-75']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['113','113','113','100']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]'
                                     data-responsive_offset="on"
                                     data-responsive="on"
                                     data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[16,16,16,11]"
                                     data-paddingright="[50,50,50,20]"
                                     data-paddingbottom="[16,16,16,11]"
                                     data-paddingleft="[50,50,50,20]"
                                     style="z-index: 10; border-radius: 2px; line-height: 24px; font-family: 'Oxygen', sans-serif; font-size: 14px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.35px;">Learn More
                                </div>
                                <div class="tp-caption tp-resizeme rev-bordered brd_color_dark" id="slide-1-layer-8"
                                     data-x="['center','center','center','center']" data-hoffset="['95','95','95','75']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['113','113','113','100']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]'
                                     data-responsive_offset="on"
                                     data-responsive="on"
                                     data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bg:rgba(0, 0, 0, 1.00);bc:rgba(0, 0, 0, 1.00);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[14,14,14,9]"
                                     data-paddingright="[35,35,35,20]"
                                     data-paddingbottom="[14,14,14,9]"
                                     data-paddingleft="[35,35,35,20]"
                                     style="z-index: 11; border-radius: 2px; line-height: 24px; font-family: 'Oxygen', sans-serif; font-size: 14px; font-weight: bold; text-transform: uppercase; border-style: solid; border-width: 2px; border-color:#fff; color:#fff; letter-spacing: 0.35px; ">Login
                                </div>
                            </li>

                            <li>
                                <img src="{{asset('public/home')}}/assets/images/slider.jpg" alt="slider" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 tc_dark" id="slide-1-layer-5"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-84','-84','-84','-74']"
                                     data-fontsize="['60','55','50','30']"
                                     data-lineheight="['77','60','55','35']"
                                     data-width="['900','900','700','450']"
                                     data-whitespace="normal"
                                     data-transform_idle="o:1;"
                                     data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                     data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                     data-start="1000"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-responsive_offset="on"
                                     data-elementdelay="0.05"
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"
                                     style="z-index: 5; letter-spacing: 1.5px; text-transform:capitalize; font-weight:bold; font-family: 'Roboto Slab', serif; color:#fff;">
                                    Benefits of Merchants
                                </div>
                                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 tc_dark" id="slide-1-layer-6"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['0','30','20','20']"
                                     data-fontsize="['22','22','22','18']"
                                     data-lineheight="['26','26','26','26']"
                                     data-width="['900','900','700','450']"
                                     data-whitespace="normal"
                                     data-transform_idle="o:1;"
                                     data-transform_in="x:[-105%];s:1000;e:Power4.slideInRight;"
                                     data-transform_out="y:[100%];s:1000;s:1000;e:Power2.slideInRight;"
                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                     data-start="1000"
                                     data-splitin="none"
                                     data-splitout="none"
                                     data-responsive_offset="on"
                                     data-elementdelay="0.05"
                                     data-textAlign="['center','center','center','center']"
                                     style="z-index: 5; letter-spacing: 0.55px; white-space: normal;font-weight: normal; font-family: 'Source Sans Pro', sans-serif; color:#fff; ">We have a big platform on e-commerce world wide . we make customers world wide .<br> if you  are connected with us ,  you  can get a lots number of buyers everyday .
                                </div>
                                <div class="tp-caption tp-resizeme rev-bordered bg_green tc_white" id="slide-1-layer-7"
                                     data-x="['center','center','center','center']" data-hoffset="['-95','-95','-95','-75']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['113','113','113','100']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]'
                                     data-responsive_offset="on"
                                     data-responsive="on"
                                     data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[16,16,16,11]"
                                     data-paddingright="[50,50,50,20]"
                                     data-paddingbottom="[16,16,16,11]"
                                     data-paddingleft="[50,50,50,20]"
                                     style="z-index: 10; border-radius: 2px; line-height: 24px; font-family: 'Oxygen', sans-serif; font-size: 14px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.35px;">Learn More
                                </div>
                                <div class="tp-caption tp-resizeme rev-bordered brd_color_dark" id="slide-1-layer-8"
                                     data-x="['center','center','center','center']" data-hoffset="['95','95','95','75']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['113','113','113','100']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"
                                     data-type="text"
                                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]'
                                     data-responsive_offset="on"
                                     data-responsive="on"
                                     data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":2500,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"x:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"500","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(255, 255, 255, 1.00);bg:rgba(0, 0, 0, 1.00);bc:rgba(0, 0, 0, 1.00);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[14,14,14,9]"
                                     data-paddingright="[35,35,35,20]"
                                     data-paddingbottom="[14,14,14,9]"
                                     data-paddingleft="[35,35,35,20]"
                                     style="z-index: 11; border-radius: 2px; line-height: 24px; font-family: 'Oxygen', sans-serif; font-size: 14px; font-weight: bold; text-transform: uppercase; border-style: solid; border-width: 2px; border-color:#fff; color:#fff; letter-spacing: 0.35px; ">Login
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div><!-- Slider Section -->

            <!-- Services Section -->
            <div class="container-fluid no-left-padding no-right-padding welcome-section">
                <!-- Container -->
                <div class="container">
                    <!-- Section Header -->
                    <div class="section-header" >
                        <h3 class="tc_dark" style="text-transform:capitalize;">Every Service Under One Roof</h3>
                        <div class="title-border"><i class="fa fa-caret-up" style="margin-top:-10px;"></i></div>
                        <p>Dreamploy, an advertising & Freelancing Site where one can earn $500-$2500 without any investment. Advertiser can get maximum coverage through our genuine publisher. </p>
                    </div><!-- Section Header /- -->
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <div class="service-item view-more">
                            <div class="service-icon">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <h3>Benefits of Publishers</h3>
                            <p>Earn unlimited without investment. No hidden charges and activation fee, just 100% free. You can work by Desktop, Laptop, Android Mobile or other device. You can earn- in 75 ways.You can earn more and more as much as you want.</p>
                            <a href="#" data-toggle="modal" data-target=".more-services" class="tc_white bg_green tc_white_h bg_black_h">Read More</a>
                        </div>
						<div class="text-center" style="margin-top: 10px">
                            <a href="{{url('/login')}}" class="btn btn-default btn-outline custom-btn-all">Login</a> || <a href="https://play.google.com/store/apps/details?id=com.dreamploy.dreamploy" target="_blank" class="btn btn-default btn-outline custom-btn-all">Register</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <div class="service-item view-more">
                            <div class="service-icon">
                                <i class="fa fa-umbrella"></i>
                            </div>
                            <h3>Benefits of Advertisers</h3>
                            <p>Everyday 5,000 to 10,000 unique users are joining with us. We have a genuine network. Every users has to submit their NID, Pan Card and PR Number , that’s why there is no way to fake joining. Your product can achieve maximum coverage over the world.</p>
                            <a href="#" data-toggle="modal" data-target=".more-services" class="tc_white bg_green tc_white_h bg_black_h">Read More</a>
                        </div>
						<div class="text-center" style="margin-top: 10px">
                            <a href="http://advertiser.dreamploy.com/login" target="_blank" class="btn btn-default btn-outline custom-btn-all">Login</a> || <a href="http://advertiser.dreamploy.com/register" target="_blank" class="btn btn-default btn-outline custom-btn-all">Register</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <div class="service-item view-more">
                            <div class="service-icon">
                                <i class="fa fa-diamond"></i>
                            </div>
                            <h3>Benefits of Merchants</h3>
                            <p>We have a big platform on e-commerce world wide . we make customers world wide . if you  are connected with us ,  you  can get a lots number of buyers everyday . in addition to excellent customer support and service , there are many benefits with merchants .</p>
                            <a href="#" data-toggle="modal" data-target=".more-services" class="tc_white bg_green tc_white_h bg_black_h">Read More</a>
                        </div>
						<div class="text-center" style="margin-top: 10px">
                            <a href="" class="btn btn-default btn-outline custom-btn-all">Login</a> || <a href="{{url('/marchent')}}" class="btn btn-default btn-outline custom-btn-all">Register</a>
                        </div>
                    </div>

                </div>
            </div><!-- Container /- -->


    </div><!-- Services Section /- -->

    <!-- Shopping Section -->
    <div class="container-fluid no-left-padding no-right-padding shopping-section">
        <!-- Container -->
        <div class="container">
            <!-- Section Header -->
            <div class="section-header tcp_white view-more">
                <h3 class="tc_white">Find the best for you Shoping</h3>
                <p>Dreamploy is the largest rising online Shopping Mall which ensure your best products and service.We claim to be the best online shopping products seller for the Retailer and Wholeseller. Our all products are made with superior quality material. We ensure you for the best online shopping experience with quick delivery at your door step. We provide you with the safest, most secure shopping experience possible. We enable encryption of sensitive information, including passwords and credit card numbers, during your online transactions. All of the forms on our site are secured, so your personal information stays safe and out of malicious hands.</p>
                <a href="#" data-toggle="modal" data-target=".more-services" class="tc_white bg_green tc_white_h bg_black_h">Read More</a>
            </div><!-- Section Header /- -->
        </div><!-- Container /- -->
    </div><!-- Shopping Section /- -->

    <!-- Welcome Section -->
    <div class="container-fluid no-left-padding no-right-padding welcome-section">

        <!-- Container -->
        <div class="container">
            <div class="col-md-12 col-xs-12">
                <!-- Section Header -->
                <div class="section-header" >
                    <h3 class="tc_dark" style="text-transform:capitalize;">Why Choose Us</h3>
                    <div class="title-border"><i class="fa fa-caret-up" style="margin-top:-10px;"></i></div>

                </div><!-- Section Header /- -->
                <!-- Row -->
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="border-right:1px solid #0098D7;">
                        <div class="welcome-box tcp_gray2">
                            <i class="fa fa-tencent-weibo bg_green tc_white"></i>
                            <h3 class="tc_dark tc_green_h">Promote Your Apps</h3>
                            <p>Dreamploy is the biggest Advertisement platform through which Advertisers get benefit of our 100% Genuine Network. Any Company can promote their Apps with huge registered publishers of Dreamploy.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="welcome-box tcp_gray2">
                            <i class="fa fa-sun-o  bg_green tc_white"></i>
                            <h3 class="tc_dark tc_green_h">Monetize Your Website</h3>
                            <p>Monetizing your website and making money From Your website isn’t easy Work. But Dreamploy has a strong community that’s huge visitors help your website to get Google Adsense and will open a great opportunity to earn huge amount of Money.</p>

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12" style="border-right:1px solid #0098D7;">
                        <div class="welcome-box tcp_gray2">
                            <i class="fa fa-recycle bg_green tc_white"></i>
                            <h3 class="tc_dark tc_green_h">Set Up An E-commerce Website</h3>
                            <p>Everyday 5,000 to 10,000 unique users are joining with us and are made a genuine Network. So anyone can set up an E-commerce website to purpose of Business by dreamploy with its strong community.</p>

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="welcome-box tcp_gray2">
                            <i class="fa fa-pagelines bg_green tc_white"></i>
                            <h3 class="tc_dark tc_green_h">Advertising & Marketing cost:</h3>
                            <p>Now a day’s Advertising & Marketing cost is so high. Dreamploy has a strong community with huge registered member. As a result You can easily advertise and marketing your goods and services with low cost to reach all over the world.</p>

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12" style="border-right:1px solid #0098D7;">
                        <div class="welcome-box tcp_gray2">
                            <i class="fa fa-tint bg_green tc_white"></i>
                            <h3 class="tc_dark tc_green_h">Publisher’s Benefits</h3>
                            <p>Earn unlimited by download apps, referring, seeing Banner ads  without investment. No hidden charges and activation fee, just 100% free. You can work by Desktop, Laptop, Android Mobile or other device. You can earn- in 75 ways.</p>

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="welcome-box tcp_gray2">
                            <i class="fa fa-ban bg_green tc_white"></i>
                            <h3 class="tc_dark tc_green_h">Shopping Opportunities</h3>
                            <p>We provide you with the safest, most secure shopping experience possible. We enable encryption of sensitive information, including passwords and credit card numbers, during your online transactions. All of the forms on our site are secured, so your personal information stays safe and out of malicious hands.</p>

                        </div>
                    </div>
                </div><!-- Row /- -->
            </div>
        </div><!-- Container /- -->
    </div><!-- Welcome Section /- -->



    <!-- Counter Section -->
    <div class="container-fluid no-left-padding no-right-padding counter-section">
        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="counter-detail bg_counter">
                        <i class="fa fa-users tc_white"></i>
                        <span class="tc_dark"  style="color:#fff;" id="skill_count-1" data-skills_percent="{{$users}}"></span>
                        <h4 class="tc_dove_gray" style="color:#fff;">Users</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="counter-detail bg_counter">
                        <i class="fa fa-database tc_white"></i>
                        <span class="tc_dark" style="color:#fff;" id="skill_count-2" data-skills_percent="300"></span>
                        <h4 class="tc_dove_gray" style="color:#fff;">Advertisers</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="counter-detail bg_counter">
                        <i class="fa fa-star-o tc_white"></i>
                        <span class="tc_dark" style="color:#fff;" id="skill_count-3" data-skills_percent="{{$marchent}}"></span>
                        <h4 class="tc_dove_gray" style="color:#fff;">Marchant</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="counter-detail bg_counter">
                        <i class="fa fa-globe tc_white"></i>
                        <span class="tc_dark" style="color:#fff;" id="skill_count-4" data-skills_percent="195"></span>
                        <h4 class="tc_dove_gray" style="color:#fff;">Countries</h4>
                    </div>
                </div>

            </div><!-- Row /- -->
        </div><!-- Container /- -->
    </div><!-- Counter Section /- -->

    <!-- Testimonials Section -->
    <div class="container-fluid no-left-padding no-right-padding testimonials-section">
        <!-- Container -->
        <div class="container">
            <!-- Section Header -->
            <div class="section-header" >
                <h3 class="tc_dark" style="text-transform:capitalize;">Customer Feedback</h3>
                <div class="title-border"><i class="fa fa-caret-up" style="margin-top:-10px;"></i></div>
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit in ex ac egestas. In hac habitasse platea<br> dictumst. Vestibulum interdum ligula eros, id porta tortor venenatis quis. Fusce suscipit enim</p>-->
            </div><!-- Section Header /- -->

            <div class="testimonial-slider">
                <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active tcp_gray2 brd_color_light_gray3">
                            <i><img src="{{asset('public/home')}}/assets/images/testi-1.jpg" alt="Testi"></i>
                            <p>There was a lot of traffic required for our business and then with the help of one, we have recourse to Dreamploy. It has helped us successively reached our goals. Then we haven’t looked back since. Thanks for the quality traffic of Dreamploy.</p>
                            <h3 class="tcspan_green tc_dark">Patricia Standard <span>CEO, Founder</span></h3>
                        </div>
                        <div class="item tcp_gray2 brd_color_light_gray3">
                            <i><img src="{{asset('public/home')}}/assets/images/Nazmul.jpg" alt="Testi"></i>
                            <p>When we need to attract national audiences, while targeted covered local consumers for Shopping search engines like ours Dreamploy was able to tailor a campaign to meet all our needs. Thanks a lot to Dreamploy community.</p>
                            <h3 class="tcspan_green tc_dark">Nazmul Hossain <span>Head of marketing, bdnakshi</span></h3>
                        </div>
                        <div class="item tcp_gray2 brd_color_light_gray3">
                            <i><img src="{{asset('public/home')}}/assets/images/rabbi.jpg" alt="Testi"></i>
                            <p>I am very satisfied with the service of Dreamploy and the quality and quality of their products are very much appreciated. In my opinion, Dreamploy is the best for online shopping. I'm always with Dreamploy.</p>
                            <h3 class="tcspan_green tc_dark">Golam Rabbi <span>Customer</span></h3>
                        </div>
                    </div>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonial-carousel" data-slide-to="1"></li>
                        <li data-target="#testimonial-carousel" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </div><!-- Container /- -->
    </div><!-- Testimonials Section /- -->

    <!-- Client Section -->
    <div class="container-fluid no-left-padding no-right-padding client-section">
        <!-- Container -->
        <div class="container">
            <!-- Section Header -->
            <div class="section-header" >
                <h3 class="tc_dark" style="text-transform:capitalize;">Our Partners</h3>
                <div class="title-border"><i class="fa fa-caret-up" style="margin-top:-10px;"></i></div>
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit in ex ac egestas. In hac habitasse platea<br> dictumst. Vestibulum interdum ligula eros, id porta tortor venenatis quis. Fusce suscipit enim</p>-->
            </div><!-- Section Header /- -->
            <div class="client-carousel">
                <div class="item">
                    <a href="#"><img src="{{asset('public/home')}}/assets/images/client-logo-1.jpg" alt="Client Logo" /></a>
                    <div class="logo-overlay"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
                <div class="item">
                    <a href="#"><img src="{{asset('public/home')}}/assets/images/client-logo-2.jpg" alt="Client Logo" /></a>
                    <div class="logo-overlay"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
                <div class="item">
                    <a href="#"><img src="{{asset('public/home')}}/assets/images/client-logo-3.jpg" alt="Client Logo" /></a>
                    <div class="logo-overlay"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
                <div class="item">
                    <a href="#"><img src="{{asset('public/home')}}/assets/images/client-logo-4.jpg" alt="Client Logo" /></a>
                    <div class="logo-overlay"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
                <div class="item">
                    <a href="#"><img src="{{asset('public/home')}}/assets/images/client-logo-5.jpg" alt="Client Logo" /></a>
                    <div class="logo-overlay"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
				<div class="item">
                    <a href="#"><img src="{{asset('public/home')}}/assets/images/islami-bank.jpg" height="135px" width="100%" alt="Client Logo" /></a>
                    <div class="logo-overlay"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
                <div class="item">
                    <a href="#"><img src="{{asset('public/home')}}/assets/images/mcash.png" alt="Client Logo" height="135px" width="100%" /></a>
                    <div class="logo-overlay"><i class="fa fa-plus" aria-hidden="true"></i></div>
                </div>
				
            </div>
        </div><!-- Container /- -->
    </div><!-- Client Section /- -->


@endsection