<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dreamploy</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
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

	<body>

		<div class="wrapper">
			<div class="inner">
  <?php 
	
	$p=uniqid();
	?>

				<form action="{{ url('/api/payment') }}" method="post">
                    {{-- <img class="img"src="{{ asset('payment_app/images/icon.png') }}"> --}}
					{{ csrf_field() }}
					
					<p style="text-align: left;"><b style="color: #b5fdcb;" >Training Fee: </b>  500 BDT (Bangladesh) or 10 US$ (Others)
						<br>
						<b style="color: #b5fdcb;" >	Duration: </b>  3 Months
						<br>
					<b style="color: #b5fdcb;" >	Medium: </b>  Online through Whatsapp.
						<br>
						After completing  payment You can get access & earn money.
						<br>
						<br>
					<b style="color: #b5fdcb;" >	N.B: </b>  It is non refundable & You have to submit your whatsapp number via referer.</p>	
					



<h4 style="text-align:center">Phone Number</h4>
<input class="input" style="color:black;margin-left:16%;height: 48px;" disabled type="text"  value="{{ $phone }}"/>
<input class="input" style="color:black;margin-left:16%;height: 48px;"  type="hidden" name="phone"  value="{{ $phone }}"/>
<p> {{ $email }}</p>

<input class="input" style="color:black;margin-left:16%;height: 48px;"  type="hidden" name="email"  value="{{ $email }}"/>

<input class="input" style="color:black;margin-left:16%;height: 48px;"  type="hidden" name="user_id"  value="{{ $id }}"/>

{{-- <input class="input" style="color:black;margin-left:16%" required  type="text" name="phone" pattern="[0-9]{11}" title="Only number & 11 digit" placeholder="017........."/> --}}

					
<button><a  style="color: white" >Next</a>
    <i class="zmdi zmdi-arrow-right"></i>
</button>


				</form>
			</div>
		</div>
		
	</body>
</html>