<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard || DREAMPLOY</title>
    <link href="{{asset('public/frontEnd')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/frontEnd')}}/css/simple-sidebar.css" rel="stylesheet">
    <link href="{{asset('public/frontEnd')}}/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


<script type="text/javascript" src="http://veohclick.com/dashboard/adb.php?tag=36859efb0c7618da165&width=320&height=50">
</script>

</head>
<body>
 
<div id="wrapper">
@include('frontEnd.publisher.layouts.sidebar')
    <div id="page-content-wrapper">

        <div class="container-fluid">
            <div class="head" style="height:60px; background:#fff; box-shadow: 0px 2px 3px rgba(0,0,0,0.3); margin-bottom: 3px;">

                <div class="logobar">
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger"></span></a>

                </div>

            </div>
			<div class="text-center">
                <style>#M572710ScriptRootC883189 {min-height: 300px;}</style> 
                <!-- Composite Start --> 
                    <div id="M572710ScriptRootC883189"> 
                    </div> 
                    <script src="https://jsc.mgid.com/d/r/dreamploy.com.883189.js
               " async> 
                    </script> 
                <!-- Composite End -->
            </div>
            {{-- <script type="text/javascript" src="http://veohclick.com/dashboard/adb.php?tag=36859efb0c7618da165&width=320&height=50"></script> --}}
           </div>
            @yield('mainContent')
			<div class="text-center">
                <style>#M572710ScriptRootC883189 {min-height: 300px;}</style> 
                <!-- Composite Start --> 
                    <div id="M572710ScriptRootC883189"> 
                    </div> 
                    <script src="https://jsc.mgid.com/d/r/dreamploy.com.883189.js
                " async> 
                    </script> 
                <!-- Composite End -->
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{asset('public/frontEnd')}}/js/jquery.min.js"><\/script>')
</script>
    <script src="{{asset('public/frontEnd')}}/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    var elems = $('div#sorted');

    elems.sort(function(a, b) {
        return a.getAttribute('data-order') < b.getAttribute('data-order')
    }).appendTo(elems.parent());        
</script>


<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

</script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1900:+0'
        });
    } );
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-101239790-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#pa').hide();
        $('#pay').hide();
		 $('#rk').hide();
		 $('#bk').hide();
        $('#select-processor').on('change', function () {
             var selectValue =$('#select-processor').val();
            if (selectValue.match("payza")){
                $('#pa').show();
                $('#mc').hide();
                $('#pay').hide();
			    $('#rk').hide();
				$('#bk').hide();
            }else if (selectValue == "payoneer"){
                $('#pay').show();
                $('#pa').hide();
                $('#mc').hide();
				$('#rk').hide();
				$('#bk').hide();
            }else if (selectValue == "mcash"){
                $('#mc').show();
                $('#pa').hide();
                $('#pay').hide();
				$('#rk').hide();
				$('#bk').hide();
            }else if (selectValue == "bkash"){
                $('#bk').show();
                $('#pa').hide();
				 $('#rk').hide();
                $('#pay').hide();
				$('#mc').hide();
            }else if (selectValue == "rocket"){
                $('#rk').show();
                $('#pa').hide();
                $('#pay').hide(); 
				$('#bk').hide();
				 $('#mc').hide();
            }
        });
    });
</script>
<!--passback-->
<script type="application/javascript"> 
            ACPuzzleOptions = window.ACPuzzleOptions || {}; 
            ACPuzzleOptions.passback = myPassback; // The function itself, not the string name.
			 function myPassback(result, pubIndex) { 
                if ( typeof result !== 'object' ) { 
                    result = { code: 0, reason: '', success: false, stage: 'acUnknown' }; 
                } 
 
                var stage   = result.stage    || ''; 
                var code    = result.code     || 0; 
                var reason  = result.reason   || ''; 
                var success = result.success; 
                var vhash   = result.hash     || ''; 
 
                console.log && console.log('%s: { code: %d, reason: "%s", success: %s, hash: "%s" }', 
                    stage, code, reason, success, vhash); 
            } 
        </script>

<script type="application/javascript"> 
            var acPuzzle; 
            var acSites = [ // Replace with your actual publisher-id and ckeys from publisher/site setup. 
                { "pub_id" : "OfaH9cMNrdEDrmPm", "ckey" : "-pYHXndGFC0HhnWgXFmfU21M5xteD9KP", "name" : "Ronstra Dev Passback @ 1.50" }, 
                { "pub_id" : "UlwC9ctMrdedRMPv", "ckey" : "-pYHXndGFC0HhnWgXFmfU21M5xteD9KP", "name" : "Ronstra Dev Passback @ 0.50" } 
            ]; 
 
            
            function acPassback(result, pubIndex) { 
                if ( !result ) { 
                    result = { code: 0, reason: '', success: false, stage: 'acUnknown' }; 
                } 
 
                var stage   = result.stage    || ''; 
                var code    = result.code     || 0; 
                var reason  = result.reason   || ''; 
                var success = result.success; 
                var vhash   = result.hash     || ''; 
 
                console.log && console.log('%s: { code: %d, reason: "%s", success: %s, hash: "%s" }', 
                    stage, code, reason, success, vhash); 
 
                if ( stage === 'acVerify' ) { 
                    if ( success ) { 
                        acVerifySuccess(result, pubIndex); 
                    } 
                    else if ( code === 429 ) { 
                        // Alert of too many failed attempts, then reload 
                        // the puzzle widget. 
 
                        alert("Too many tries.  Reloading..."); 
 
                        if ( acPuzzle ) { 
                            acPuzzle.reload(); 
                        } 
                    } 
                    else { 
                        // Wrong!  Do it again! 
                    } 
                } 
                else if ( stage !== 'acPuzzle' ) { 
                    // We debugged it above, and don't otherwise care. 
                } 
                else if ( typeof pubIndex === 'undefined' ) { 
                    // Normal if we didn't start through acTrySite. 
                } 
                else if ( success ) { 
                    acPuzzleSuccess(result, pubIndex); 
                } 
                else { 
                    acPuzzleFailure(result, pubIndex); 
                } 
            } 
 
 
            /** Handle the case where the user correctly solved a puzzle. 
             * 
             * 
             *  @param {Object}  result   - Status object passed by Solve scripts. 
             *  @param {Integer} pubIndex - Index into our acSites list of publisher info. 
             */ 
            function acVerifySuccess(result, pubIndex) { 
                var button, hidden; 
 
                // Pop a congratulatory message, because we're just so 
                // gosh-darn excited for you!!!1 
 
                alert("You appear to be human.  Yay!"); 
 
                // Disable the #ac-verify-submit button to prevent further 
                // submissions.  One could also change its onClick to notify 
                // the user of her prior success.  Or get rid of it.  Really, 
                // do whatever you want. 
 
                if ( button = document.getElementById('ac-verify-submit') ) { 
                    button.disabled = true; 
                }  
                
                if ( hidden = document.getElementById('ac-verify-result') ) { 
                    hidden.value = result.hash + ';' + result.code + ';' 
                        + acSites[pubIndex].pub_id; 
                } 
  
            } 
            
            function acPuzzleSuccess(result, pubIndex) { 
                var root, button; 
 
                // Success, so show the puzzle that was loaded within our 
                // #ac-root container. 
 
                if ( root = document.getElementById('ac-root') ) { 
                    root.style.display = 'block'; 
                } 
 
                // We have a puzzle, so associate a click on the #ac-verify-submit 
                // button to a call to the verification function. 
 
                if ( button = document.getElementById('ac-verify-submit') ) { 
                    button.onclick = function() { ACPassback.callVerify(); }; 
                } 
 
                console.log && console.log("Pub «" + acSites[pubIndex].name + "» got a puzzle!"); 
            }; 
             
            function acPuzzleFailure(result, pubIndex) { 
                var root; 
 
                // Failure, so ensure our #ac-root puzzle container is hidden. 
 
                if ( root = document.getElementById('ac-root') ) { 
                    root.style.display = 'none'; 
                } 
 
                console.log && console.log("Pub «" + acSites[pubIndex].name + "» did not get a puzzle."); 
                acTrySite(pubIndex+1); 
            }; 
 
            /** Attempt to get a puzzle from the publisher info indexed by the given integer. 
             * 
             *  @param {Integer} pubIndex - Index into our acSites list of publisher info. 
             */ 
            function acTrySite(pubIndex) { 
                console.log && console.log("acTrySite(%d) ...", pubIndex); 
 
                if ( pubIndex >= acSites.length ) { // Give up. 
                    console.log && console.log("Ran out of pub accounts after " + pubIndex + " tries.  Giving up."); 
                    return; 
                } 
 
                // Destroy any previously created puzzle object, e.g. a widget 
                // without an ad. 
 
                if ( acPuzzle ) { 
                    acPuzzle.destroy(); 
                    acPuzzle = undefined; 
                } 
 
                // Create a closure around our passback function to carry 
                // through the current pubIndex. 
 
                var pbFunc = function(result) { acPassback(result, pubIndex); }; 
 
                // Save the result of the createPuzzle() call in our acPuzzle 
                // global. 
 
                acPuzzle = ACPassback.createPuzzle( 
                    acSites[pubIndex].ckey,  // Public key of the pub we're trying. 
                    'ac-captcha',            // Element #ID that will hold a served puzzle. 
                    { passback: pbFunc }     // Options. Just the passback func here. 
                ); 
            }; 
 
            /** Start trying sites from our array of publisher keys. 
             */ 
            function acRunWaterfall() { acTrySite(0); }; 
 
            /* Start the waterfall when the page loads. */ 
            window.addEventListener('load', acRunWaterfall); 
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
