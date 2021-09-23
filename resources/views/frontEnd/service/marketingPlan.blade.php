@extends('frontEnd.layouts.master')
@section('title')
    Our Service
    @endsection

@section('mainContent')
    <div id="page-content-wrapper" style="margin-top: 20px">
            <div class="container-fluid" style="background-color:white;">
				<div class="row">
					<div class="col-sm-6">
						<div class="well" style="padding: 0px 20px;">
						<h3 style="text-align:center;color:blue">Basic</h3>
							<ul class="list-group" style="font-size:20px">
								  <li class="list-group-item"><a href="{{ url('marketing-plan-signup') }}">Signup</a></li>
								  <li class="list-group-item"><a href="{{ url('marketing-plan-withdraw') }}">Withdraw</a></li>
								  <li class="list-group-item"><a href="{{ url('marketing-plan-chart') }}">Commission Chart</a></li>
								  <li class="list-group-item"><a href="{{ url('marketing-plan-activation') }}">Activation</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="well">
						<h3 style="text-align:center;color:blue">Marketing Plan </h3>
							<ul class="list-group" style="font-size:20px">
							  <li class="list-group-item">30 days plan</li>
							  <li class="list-group-item">Promotion</li>
							  <li class="list-group-item">Team Build Up</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="well">
						<h3 style="text-align:center;color:blue">Income Sector</h3>
							<ul class="list-group" style="font-size:20px">
								<li class="list-group-item"><a href="{{ url('marketing-plan-video') }}">Video Watching</a></li>
								<li class="list-group-item"><a href="{{ url('marketing-plan-orbit') }}">Orbit Times</a></li>
								<li class="list-group-item"><a href="{{ url('marketing-plan-captcha') }}">Captcha Solving</a></li>
								<li class="list-group-item"><a href="{{ url('marketing-plan-unistag') }}">Unistag</a></li>
								<li class="list-group-item"><a href="{{ url('marketing-plan-youtube') }}">Youtube</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="well">
						<h3 style="text-align:center;color:blue">Connectivity</h3>
								<ul class="list-group" style="font-size:20px">
								  <li class="list-group-item"><a href="{{ url('marketing-plan-facebook') }}">Facebook Fan Page</a></li>
								  <li class="list-group-item"><a href="{{ url('marketing-plan-fbgroup') }}">Facebook Group</a></li>
								  <li class="list-group-item"><a href="{{ url('marketing-plan-youtube-channel') }}">Youtube</a></li>
								  <li class="list-group-item"><a href="{{ url('marketing-plan-whatsapp') }}">Whatsapp</a></li>
								  <li class="list-group-item"><a href="{{ url('marketing-plan-hotline') }}">Hotline</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection