@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <div class="container">
        <div class="row">
          <br><br>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-4">
                <h2>Pay Using bKash Account</h2>
                <ul class="list-group">
                  <li class="list-group-item">Dial *247#</li>
                  <li class="list-group-item">Choose Option: Send Money</li>
                  <li class="list-group-item">bKash No: 01923554750 (Personal)</li>
                  <li class="list-group-item">Enter Ammount: 500 TK</li>
                  <li class="list-group-item">Enter your pin and complete transaction</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Pay Using bKash Account</h2>
                <ul class="list-group">
                  <li class="list-group-item">Dial *247#</li>
                  <li class="list-group-item">Choose Option: Send Money</li>
                  <li class="list-group-item">bKash No: 01910642150 (Personal)</li>
                  <li class="list-group-item">Enter Ammount: 500 TK</li>
                  <li class="list-group-item">Enter your pin and complete transaction</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Pay Using Nagad Account</h2>
                <ul class="list-group">
                  <li class="list-group-item">Dial *167#</li>
                  <li class="list-group-item">Choose Option: Send Money</li>
                  <li class="list-group-item">bKash No: 01611328179 (Personal)</li>
                  <li class="list-group-item">Enter Ammount: 500 TK</li>
                  <li class="list-group-item">Enter your pin and complete transaction</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Pay Using Rocket Account</h2>
                <ul class="list-group">
                  <li class="list-group-item">Dial *322#</li>
                  <li class="list-group-item">Choose Option: Send Money</li>
                  <li class="list-group-item">Rocket No: 017169670509 (Personal)</li>
                  <li class="list-group-item">Enter Ammount: 500 TK</li>
                  <li class="list-group-item">Enter your pin and complete transaction</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h2>Pay Using Paypal Account</h2>
                <ul class="list-group">
                  <li class="list-group-item">Choose Option: Send Money</li>
                  <li class="list-group-item">Account No: noorcivil117@gmail.com</li>
                  <li class="list-group-item">Enter Ammount: $10</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3 text-center">
                <h2>Now Fill Up This Form</h2>
                <form action="{{ route('postAccAct') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="number" class="form-control" placeholder="Bkash/Rocket/Paypal Account Number">
                    </div>
                    <div class="form-group">
                        <input type="text" name="txnid" class="form-control" placeholder="Transaction Id? For Paypal leave it.">
                    </div>
                    <div class="form-group">
                    	<label>Leader User ID:</label>
                        <input type="text" name="leader" class="form-control" placeholder="Who Trained/motivated You? Use his/her user ID.">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
