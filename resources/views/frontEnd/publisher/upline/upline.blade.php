@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <style type="text/css">
        /*Business Card Css */
        .business-card {
            border: 1px solid #cccccc;
            background: #f8f8f8;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .profile-img {
            height: 120px;
            background: white;
        }
        .job {
            color: #666666;
            font-size: 17px;
        }
        .mail {
            font-size: 16px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="text-wrapper">
        
            @php
            $upline1_user = \Illuminate\Support\Facades\DB::table('users')
            ->join('ranks', 'ranks.userid', '=', 'users.id')
            ->join('user_details', 'user_details.userid', '=', 'users.id')
            ->where('users.id', Auth::user()->sponsorid)
            ->first();
            @endphp
            @if($upline1_user != '')
            <div class="col-sm-6 col-sm-offset-3" id="sorted" data-order='1'>
                <p style="color: #000; margin-top: 10px;" class="text-center">Upline 1</p>
                <div class="business-card">
                    <div class="media">
                        <div class="media-left">
                            @if($upline1_user->image != '')
                            <img class="media-object img-circle profile-img" src="{{asset($upline1_user->image)}}">
                            @else
                            <img class="media-object img-circle profile-img" src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png">
                                @endif
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading">Name: {{$upline1_user->name   }}</h2>
                            <div class="job">User Id: {{$upline1_user->userid}}</div>
                            <div class="job">Rank: {{$upline1_user->rank}}</div>
                            @if($upline1_user->phone_no_visivility ==1)
                            <div class="mail">Mobile: {{$upline1_user->phonenumber}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                @endif

            @php
            function check($upline1_user){
                $upline2_user = \Illuminate\Support\Facades\DB::table('users')
                ->join('ranks', 'ranks.userid', '=', 'users.id')
                ->join('user_details', 'user_details.userid', '=', 'users.id')
                ->where('users.id', $upline1_user->sponsorid)
                ->first();
                return $upline2_user;
            }

            @endphp
            @for ($i=0; $i<9; $i++)
            @php
                $upline2_user = check($upline1_user);
            @endphp
            @if($upline2_user != '')
                    @php

                        $upline1_user = (object) $upline2_user;
                    @endphp
                <div class="col-sm-6 col-sm-offset-3"  id="sorted" data-order='{{$i+2}}'>
                    <p style="color: #000; margin-top: 10px;" class="text-center">Upline {{$i+2}}</p>
                    <div class="business-card">
                        <div class="media">
                            <div class="media-left">
                                @if($upline2_user->image != '')
                                    <img class="media-object img-circle profile-img" src="{{asset($upline2_user->image)}}">
                                @else
                                    <img class="media-object img-circle profile-img" src="https://s3.amazonaws.com/37assets/svn/765-default-avatar.png">
                                @endif
                            </div>
                            <div class="media-body">
                                <h2 class="media-heading">Name: {{$upline2_user->name   }}</h2>
                                <div class="job">User Id: {{$upline2_user->userid}}</div>
                                <div class="job">Rank: {{$upline2_user->rank}}</div>
                                @if($upline2_user->phone_no_visivility ==1)
                                    <div class="mail">Mobile: {{$upline2_user->phonenumber}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
                @endfor
                </div>
        </div>
    </div>
    
@endsection