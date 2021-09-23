@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="well" style="margin-top: 10px">
                    {!! Form::open(['url'=>'withdraw-post', 'class'=>'form-horizontal']) !!}
                        
                        @if(Session::has('message'))
                        <div class="alert alert-warning">
                            {{Session::get('message')}}
                        </div>
                        @endif
                    <div class="form-group">
						<label class="control-label col-md-1" for="email">Balance Type:</label>
						  <div class="col-md-11">
							<select name="account_type" id="" class="form-control">
								<option value="referral">
                                    Refferel Income <!--(${{$balance->referral_income}})-->
                                    (${{app(App\Http\Controllers\frontEnd\DashboardController::class)->showDashboard()->approveMediaTotal - $affdraw }})
                                </option>
								<option value="others_income">
                                    Other's Income ( ${{($advelly_income + $others_incomes->media_and_social + $others_incomes->orbittimes + $others_incomes->blog + $micro + $others_incomes->income_valley + $shoping)-$withdraw}} )
                                </option>
								<option value="rpincome">
                                    rpincome (${{number_format($rpincome->rpincome+$rpincome->add_rpincome,6)}})
                                </option>
							</select>
						 </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="email">Payment Processor:</label>
                            <div class="col-md-11">
                                <select name="payment_processor" id="select-processor" class="form-control">
                                    <option value="mcash">MCash</option>
                                    <option value="payza">Payza</option>
                                    <option value="payoneer">Payoneer</option>
									<option value="bkash">Bkash</option>
									<option value="rocket">Rocket</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group" id="mc">
                            <label class="control-label col-md-1" for="email">MCash Account No:</label>
                            <div class="col-md-11">
                                <input type="number" class="form-control" name="acc_number" id="email" placeholder="Enter Mcash Account No">
                                @if ($errors->has('acc_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						 <div class="form-group" id="bk">
                            <label class="control-label col-md-1" for="bkash">Bkash Account No:</label>
                            <div class="col-md-11">
                                <input type="number" class="form-control" name="bkash_number" id="bkash" placeholder="Enter Bkash Account No">
                                @if ($errors->has('acc_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						 <div class="form-group" id="rk">
                            <label class="control-label col-md-1" for="rocket">Rocket Account No:</label>
                            <div class="col-md-11">
                                <input type="number" class="form-control" name="rocket_number" id="rocket" placeholder="Enter Rocket Account No">
                                @if ($errors->has('acc_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" id="pa">
                            <label class="control-label col-md-1" for="email">Payza Email:</label>
                            <div class="col-md-11">
                                <input type="email" name="acc_email" class="form-control" id="email" placeholder="Enter email">
                                @if ($errors->has('acc_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" id="pay">
                            <label class="control-label col-md-1" for="email">Payoneer Email:</label>
                            <div class="col-md-11">
                                <input type="email" name="pay_acc_email" class="form-control" id="email" placeholder="Enter email">
                                @if ($errors->has('pay_acc_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pay_acc_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-1" for="email">Amount:</label>
                            <div class="col-md-11">
                                <input type="number" name="amount" class="form-control" id="email" placeholder="Enter Amount" min="5">
								<p class="help-block" style="color:red">Minimum Limit: Refrral Income=$10 Others income=$10 and RPincome=$10</p>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-1">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>

@endsection
