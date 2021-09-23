@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <div class="row">
        <div class="col-lg-12">
            @if(Session::get('message') != null)
                <div class="panel panel-danger text-center" style="margin-top:10px;">
                    <div class="panel-heading ">
                        {{ Session::get('message') }}
                    </div>
                </div>
            @endif
            {!! Form::open(['url'=>'/check-profile']) !!}

            <div class="col-md-offset-4 col-md-4">
                <div class="form-group" style="margin-top: 20%">
                    <input type="password" name="password" class="form-control" placeholder="Enter your account password">
                </div>
                <div class="form-group" style="margin-top: 5%">
                    <input type="submit" class="form-control btn btn-info" value="Submit">
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

