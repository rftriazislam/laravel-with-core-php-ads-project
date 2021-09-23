@extends('frontEnd.layouts.master')
@section('title')
    Publisher Register
    @endsection
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default"  style="margin-top: 10px;">
                    <div class="panel-body">
                        {!! Form::open(['ulr'=>'/register','class'=>'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('sponsorid') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Sponsor Id</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="sponsorid" required autofocus>

                                    @if ($errors->has('sponsorid'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sponsorid') }}</strong>
                                        </span>
                                    @endif
                                    <small>if you don't have any Sponsor ID Email us: info@dreamploy.com or Call us at: +8801716967050</small>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Country</label>
                            <div class="col-md-6">
                                <?php
                                $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
                                echo '<h5>'.$xml->geoplugin_countryName.'</h5>' ;
                                function getRealIpAddr()
                                {
                                    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
                                    {
                                        $ip=$_SERVER['HTTP_CLIENT_IP'];
                                    }
                                    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
                                    {
                                        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
                                    }
                                    else
                                    {
                                        $ip=$_SERVER['REMOTE_ADDR'];
                                    }
                                    return $ip;
                                }
                                ?>
                                    <input type="hidden" class="form-control" name="countryname" value="{{$xml->geoplugin_countryName}}">
                            </div>
                            
                        </div>

                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <label for="phonenumber" class="col-md-4 control-label" placeholder="Enter Mobile No with Country Code">Mobile No</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" required>

                                @if ($errors->has('phonenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="check"> I agree with terms & condition
                                    </label>
                                    @if ($errors->has('check'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('check') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection