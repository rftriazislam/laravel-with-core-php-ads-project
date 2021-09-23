<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ asset('public/payment_app/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
		
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="{{ asset('public/payment_app/css/style.css') }}">


      <style> 
  .img{
          height: 77px;
  width: 79px;
  float: left;
  margin: auto 31%;
      }
  
    </style>
</head>

<body >

  <div class="wrapper"style="background: url({{ asset("public/payment_app") }}/images/14.jpg) no-repeat;  background: #d4f0f9a8;
  min-height: 100vh;
display: flex;
align-items: center;
background-size: cover;
" >
    <div class="inner" style="    background: #ffffff;color:black">

<h4>* Welcome to Dreamploy For Technical Support 
 <br>

 *  You can contact with us via message
</h4>
<br> 
<h6>Click the message button & ask your problem</h6>
<h6>Look bottom</h6>


<button style="background: #08ade4;"><a href="{{ url('/back') }}" style="color: white; background: #08ade4;" >Go Back</a>
  <i class="zmdi zmdi-arrow-right"></i>
</button>
    </div>
   
  </div>



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
