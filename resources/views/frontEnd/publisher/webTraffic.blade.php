@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
   <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
			<p class="text-center">
			  <a href="{{url('/web-traffic')}}"><button type="button" class="btn btn-info">Station 1</button></a> 
               <a href="{{url('/station-two')}}"><button type="button" class="btn btn-success">Station 2</button></a>	
               <a href="{{url('/station-three')}}"><button type="button" class="btn btn-primary">Station 3</button></a>
              </p>			   
			   
				<!-- Start of FullTraffic Ad Code -->
					<script async defer data-zid="65468306" type="text/javascript" src="//ad.fulltraffic.net/init.js"></script>
					<!-- End of FullTraffic Ad Code -->
            </div>			
          </div>
        </div>
	<br>
		
@endsection