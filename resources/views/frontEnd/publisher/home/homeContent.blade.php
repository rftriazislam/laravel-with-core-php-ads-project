@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    @php
    use App\Unit;
    @endphp


    <!-- <div class="row">
              <div class="col-sm-12"> -->

    <div class="row" id="tab">
        <div class="col-sm-3"><i class="fa fa-home" aria-hidden="true" style="color: #A28AD8;"></i> <a
                href="{{ url('/home') }}" style="color:#61CA71; text-decoration: none;">Home</a></div>
        <div class="col-sm-3"><i class="fa fa-tachometer" aria-hidden="true" style="color: #A28AD8;"></i> <a
                href="{{ url('/dashboard') }}" style="color:#61CA71; text-decoration: none;">Dashboard</a></div>
        <div class="col-sm-3"><i class="fa fa-users" aria-hidden="true" style="color: #A28AD8;"></i> <a
                href="{{ url('/my-team/1/' . Auth::user()->id) }}"
                style="color:#61CA71; text-decoration: none;">Referrals</a>
        </div>
        <div class="col-sm-3"><i class="fa fa-arrow-up" aria-hidden="true" style="color: #A28AD8;"></i> <a
                href="{{ url('/upline') }}" style="color:#61CA71; text-decoration: none;">Upline</a></div>
    </div>

    <!--   </div>
                </div> -->
    <div class="row" id="tab">
    <div class="col-sm-4" style="color:#2081D3;">Name:{{ Auth::user()->name }}@if (Auth::user()->active == 1) <i class="fa fa-check-circle" aria-hidden="true"></i>@else<div></div>
            @endif
        </div>
        <div class="col-sm-4"> </div>
        <div class="col-sm-4" style="color: #2081D3;">ID:{{ Auth::user()->id }}</div>
    </div>
    <div class="row" id="tab">
        <p>N.B: If you face any problem, we recommend to contact with your upline 1. Find your upline 1 from "Upline"</p>
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-sm-1">

        </div>
        <div class="col-sm-10">
            <table class="table table-striped table-bordered" id="table">
                <thead>
                    <tr style="color:white">
                        <th>Source</th>
                        <th>Today</th>
                        <th>Total Earn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Referrals</td>
                        <td>$ {{ number_format($todatTotalEarn, 6) }}</td>
                        <td>$ {{ round($referral_income->referral_income, 6) }}</td>
                    </tr>
                    <tr>
                        <td>Ad Valley</td>
                        <td>0.000000</td>
                        <td>$ {{ number_format($adVallyTotalAmount, 6) }}</td>
                    </tr>
                    <tr>
                        <td>Income Valley</td>
                        <td>0.000000</td>
                        <td>$ {{ number_format($others_income->income_valley, 6) }}</td>
                    </tr>
                    <tr>
                        <td>Earn More</td>
                        <td>0.000000</td>
                        <td>0.000000</td>
                    </tr>
                    <tr>
                        <td>Shopping</td>
                        <td>0.000000</td>
                        <td>$ {{ number_format($shopping, 6) }}</td>
                    </tr>
                    <tr>
                        <td>Freelancing</td>
                        <td>0.000000</td>
                        <td>0.000000</td>
                    </tr>
                    <tr>
                        <td>Media & Social Network</td>
                        <td>$ {{ number_format(Unit::get(Auth::id()) ? Unit::get(Auth::id())->unit : 0, 6) }}</td>
                        <td>$
                            {{ number_format($others_income->media_and_social + (Unit::get(Auth::id()) ? Unit::get(Auth::id())->unit : 0), 6) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Orbittimes</td>
                        <td>$ 0.000000</td>
                        <td>$ {{ number_format($others_income->orbittimes, 6) }}</td>
                    </tr>
                    <tr>
                        <td>D-Blog</td>
                        <td>$ 0.000000</td>
                        <!-- <td>$ 0.000000</td> -->
                        <td>$ {{ number_format($others_income->blog, 6) }}</td>
                    </tr>
                    <tr>
                        <td>Microworks</td>
                        <td>$ {{ number_format($micro, 6) }}</td>
                        <td>$ {{ number_format($micro, 6) }}</td>
                    </tr>
                    <tr>
                        <td>RP Income</td>
                        <td>$ {{ number_format($rpincome->rpincome + $rpincome->add_rpincome, 6) }}</td>
                        <td>$ {{ number_format($rpincome->rpincome + $rpincome->add_rpincome + $email_price, 6) }}</td>
                    </tr>
                    <tr>
                        <td>Rank Bonus</td>
                        <td>0.000000</td>
                        <td>0.000000</td>
                    </tr>
                    <!--<tr>
                                <td>NP</td>
                 @if (Auth::id())
                                <td>$ {{ Unit::get(Auth::id()) ? Unit::get(Auth::id())->unit : 0 }}</td>
    @else
                                <td>$ 0.000000</td>
                @endif
                 @if (Auth::id())
                                <td>$ {{ Unit::get(Auth::id()) ? Unit::get(Auth::id())->unit : 0 }}</td>
    @else
                                <td> $0.000000</td>
                @endif
                            </tr>-->
                    <tr>
                        <td>Dreamploy Total Earning</td>
                        <td>$
                            {{ number_format($todatTotalEarn + $micro + $rpincome->rpincome + $rpincome->add_rpincome, 6) }}
                        </td>
                        <td>$
                            {{ number_format($referral_income->referral_income + $micro + $rpincome->rpincome + $email_price + $adVallyTotalAmount + $shopping + $others_income->income_valley + $rpincome->add_rpincome + $others_income->media_and_social + $others_income->orbittimes + $others_income->blog, 6) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-1">

        </div>
    </div>


@endsection
