@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
   <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6">	
						<div class="well" style="width: 56%">
							<div class="text-success">
								You have checked ( {{$total}} ) valid captcha.
							</div>
						</div>			
					@if(\Illuminate\Support\Facades\Session::get('message') != null)
						<div class="well" style="width: 56%">
							<div class="text-success">
								{{\Illuminate\Support\Facades\Session::get('message')}}
							</div>
						</div>
					@endif
                {!! Form::open(['url'=>'/microworks-post']) !!}
                    <script type="text/javascript"
                            src="https://api-secure.solvemedia.com/papi/challenge.script?k=-pYHXndGFC0HhnWgXFmfU21M5xteD9KP">
                    </script>

                    <noscript>
                        <iframe src="https://api-secure.solvemedia.com/papi/challenge.noscript?k=-pYHXndGFC0HhnWgXFmfU21M5xteD9KP"
                                height="300" width="500" frameborder="0"></iframe><br/>
                        <textarea name="adcopy_challenge" rows="3" cols="40">
                        </textarea>
                        <input type="hidden" name="adcopy_response"
                               value="manual_challenge"/>
                    </noscript>
				{!! Form::close() !!}
            </div>
        </div>
		<br>
		
@endsection