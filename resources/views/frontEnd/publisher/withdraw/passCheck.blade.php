@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-condensed">
                <tbody>
                <tr>
                    <td>Id</td>
                    <td>{{\Illuminate\Support\Facades\Auth::user()->id}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{\Illuminate\Support\Facades\Auth::user()->name}}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{\Illuminate\Support\Facades\Auth::user()->email}}</td>
                </tr>
                <tr>
                    <td>Account No/ Email</td>
                    <td>{{\Illuminate\Support\Facades\Session::get('account_no')}}</td>
                </tr>
                <tr>
                    <td>Amount</td>
                    <td>{{\Illuminate\Support\Facades\Session::get('amount')}}$</td>
                </tr>
                <tr>
                    <td>You will get (After deduction 15% tax + sc)</td>
                    <td>{{\Illuminate\Support\Facades\Session::get('amount') - \Illuminate\Support\Facades\Session::get('amount')*.15}}$</td>
                </tr>
                <tr>
                    <td>In BDT (1$ = 78Tk)</td>
                    <td>{{(\Illuminate\Support\Facades\Session::get('amount') - \Illuminate\Support\Facades\Session::get('amount')*.15) * 78}} Tk</td>
                </tr>

                </tbody>
            </table>
            @if(Session::get('message') != null)
                <div class="panel panel-danger text-center" style="margin-top:10px;">
                    <div class="panel-heading ">
                        {{ Session::get('message') }}
                    </div>
                </div>
            @endif
            {!! Form::open(['url'=>'/withdraw-success']) !!}

            <div class="col-md-offset-4 col-md-4">
                <div class="form-group" style="margin-top: 20%">
                    <input type="password" name="password" class="form-control" placeholder="Enter your account password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group" style="margin-top: 5%">
                    <input type="submit" class="form-control btn btn-info" value="Submit">
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

