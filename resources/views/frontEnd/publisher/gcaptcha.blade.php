<html>
<head>

    <title>spicedinc </title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body style="font-family:Verdana;">
<h1>Google reCAPTHA Demo</h1>
<form id="comment_form" action="{{url('/gcaptcha-post')}}" method="post">
    
    {{csrf_field()}}
    <div class="g-recaptcha" data-sitekey="6LduojgUAAAAAAlXyVHhA5CrNpoNj2W2-JqcPfzu"></div>
	<input type="submit" name="submit" value="Post comment"><br><br>

</form>
</body>

</html>