<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google-site-verification" content="49P5M0E84fqIR7QfruVCBUsTLO6ffJnlYDj6oHidYVI" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="free, digitalcash, bangladesh, dreamploy, freecash, freemoney, earn money free, earn money, freelancing, advertising" />
    <meta name="description" content="Learn, Earn & Build your Dream" />
    <meta name='asg_verification' content='yUCqZZe5cFQ1VoUscXTnSprE'>
    <title>Dreamploy</title>

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('public/home')}}/assets/images/favicon.ico" />

    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/home')}}/assets/images/favicon.ico">

    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/home')}}/assets/images/favicon.ico">

    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="{{asset('public/home')}}/assets/images/favicon.ico">

    <!-- Library - Google Font Familys -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('public/home')}}/assets/revolution/css/settings.css">
    <!--link rel="stylesheet" type="text/css" href="{{asset('public/home')}}/assets/revolution/fonts/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/home')}}/assets/revolution/fonts/font-awesome/css/font-awesome.min.css"-->
    <!-- RS5.3 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/home')}}/assets/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/home')}}/assets/revolution/css/navigation.css">

    <!-- Library -->
    <link href="{{asset('public/home')}}/assets/css/lib.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/home')}}/assets/css/breakingNews.css"/>
    <!-- Custom - Common CSS -->
    <link href="{{asset('public/home')}}/assets/css/plugins.css" rel="stylesheet">
    <link href="{{asset('public/home')}}/assets/css/elements.css" rel="stylesheet">
    <link href="{{asset('public/home')}}/assets/css/rtl.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/home')}}/style.css">


    <!--[if lt IE 9]>
    <script src="js/html5/respond.min.js"></script>
    <![endif]-->

</head>

<body data-offset="200" data-spy="scroll" data-target=".ownavigation">
{{-- <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=880406995466478&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> --}}

<!-- Header Section -->
@include('frontEnd.include.header')


@yield('mainContent')

@include('frontEnd.include.footer')
<!-- JQuery v1.12.4 -->
<script src="{{asset('public/home')}}/assets/js/jquery-1.12.4.min.js"></script>

<!-- Library - Js -->
<script src="{{asset('public/home')}}/assets/js/lib.js"></script>

<!-- RS5.3`````` Core JS Files -->
<script type="text/javascript" src="{{asset('public/home')}}/assets/revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
<script type="text/javascript" src="{{asset('public/home')}}/assets/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>
<script type="text/javascript" src="{{asset('public/home')}}/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="{{asset('public/home')}}/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="{{asset('public/home')}}/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="{{asset('public/home')}}/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="{{asset('public/home')}}/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>

<!-- Library - Theme JS -->
<script src="{{asset('public/home')}}/assets/js/functions.js"></script>

<script src="{{asset('public/home')}}/assets/js/breakingNews.js"></script>
<script>
    $(window).load(function(e) {
        $("#bn1").breakingNews({
            effect		:"slide-h",
            autoplay	:true,
            timer		:3000,
            color		:"blue",
            border		:true
        });

    });

</script>
<script type="text/javascript">
        function ShowHide(){
            document.getElementById('hidden').style.display = "block";
        }
    </script>

    <script type="text/javascript">
        function Hide(){
            document.getElementById('hidden').style.display = "none";
        }
    </script>

<script type="text/javascript">
    function countFunction() {
        $.ajax({
            url: "{{url('/blog-youtube')}}",
            method: 'GET',
            success: function(data) {

            }
        });
    }
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125060245-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125060245-2');







  
</script>

@yield('script')


<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v10.0'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
  attribution="setup_tool"
  page_id="105095641108235">
</div>

</body>
</html>
