@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <div class="myteam">
        <div class="well">
            <div class="text-center">
                Genaration {{$level}}
            </div>
        </div>

        <table class="table table-responsive">
            <tbody>
            <tr>
                <td>
                    @foreach($users as $user)

                        <div class="my_team_members" style="background: linear-gradient(45deg, rgba(202,138,234,1) 0%,rgba(41,137,216,1) 50%,rgba(32,124,202,1) 78%,rgba(134,142,227,1) 100%); box-shadow:0px 2px 3px rgba(0,0,0,0.1); border-radius:4px; font-weight:bold; margin-bottom:5px; padding: 20px; border-bottom: 4px solid rgba(49,52,69,0.4);">

                            <a href="{{url('/my-team/'.($level+1).'/'.$user->id)}}" data-toggle="tooltip" title="Press for watching user refference id....">

                                <div class="row" style="text-align:left;">

                                    <div class="col-sm-4">

                                        <span class="fa fa-users" style="color:#000;"> User Name: {{ strtoupper($user->name) }}</span>@if($user->active == 1) <i class="fa fa-check-circle" style="color:green;"></i>@else<div></div>@endif</div>

                                    <div class="col-sm-4">

                                        <span class="glyphicon glyphicon-briefcase" style="color:#000;"> Country: {{ $user->country }}</span></div>

                                    <div class="col-sm-4">

                                        <span class="glyphicon glyphicon-usd" style="color:#000;"> Total Team: {{$user->total}} </span></div>

                                </div>

                                <div class="row" style="text-align:left;">

                                    <div class="col-sm-4">

                                        <span class="fa fa-users" style="color:#000;"> User Id:{{ $user->id }}</span></div>

                                    <div class="col-sm-4">
                                        @php
                                        $userdetails = \App\UserDetails::where('userid', $user->id)
                                        ->first();
                                        @endphp
                                        @if($userdetails['phone_no_visivility'] == 0)
                                        <span class="glyphicon glyphicon-briefcase" style="color:#000;"> Mobile: Invisible</span></div>
                                    @else
                                        <span class="glyphicon glyphicon-briefcase" style="color:#000;"> Mobile: {{$user->phonenumber}}</span></div>
                                @endif

                                    <div class="col-sm-4">

                                        <span class="glyphicon glyphicon-usd" style="color:#000;"> Total Earn: ${{number_format($user->referral_income+$user->others_income+$user->joining_income, 6)}}</span></div>

                                </div>

                                <div class="row" style="text-align:left;">

                                    <div class="col-sm-4">

                                        <span class="glyphicon glyphicon-user" style="color:#000;"> Sponsor Id:{{$user->sponsorid}}</span>

                                    </div>

                                    <div class="col-sm-4" style="text-align:left;">

                                        <span class="glyphicon glyphicon-phone" style="color:#000;"> Joining Date: {{$user->created_at}}</span></div>

                                    <div class="col-sm-4">

                                        <span class="glyphicon glyphicon-star" style="color:#000;"> Rank: Member</span></div>

                                </div>

                            </a>

                        </div>

                    @endforeach
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection