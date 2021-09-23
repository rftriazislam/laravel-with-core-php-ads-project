@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <div class="row">
        @if(Session::get('message') != null)
            <div class="panel panel-success text-center" style="margin-top:10px;">
                <div class="panel-heading ">
                    {{ Session::get('message') }}
                </div>
            </div>
        @endif
        <div class="col-lg-12">

            {!! Form::open(['url'=>'/update-profile', 'enctype'=>'multipart/form-data','name'=>'user_profile']) !!}


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="row">
                <div class="col-sm-12 card-box">
                    <div class="col-sm-6" style="margin-top:10px;">
                        <strong>Ref ID :</strong> {{$userDeatils->userid}}
                    </div>
                    <div class="col-sm-6" style="margin-top:10px;">
                        <strong>Upline ID :</strong>{{$userDeatils->sponsorid}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-xs-4 card-box" style="height:120px; border:1px solid #ccc;">
                        @if($userDeatils->image == '')

                            <img src="{{asset('public/frontEnd')}}/images/default-user-image.png" class="pull-left img-responsive img-rounded" style="max-width:75px;">
                        @else

                            <img src="{{asset($userDeatils->image)}}" class="pull-left img-responsive img-rounded" style="max-width:75px;">
                        @endif
                        <span>
                                <input type="hidden" name="previousImg" value="{{$userDeatils->image}}">
                            {!! Form::file('image', ['accept'=>'image/*']) !!}

                            </span>
                    </div>
                    <div class="col-xs-8 card-box" >
                        <strong >Name:</strong>
                        <input class="form-control" id="firstname" name="name" type="text" value="{{$userDeatils->name}}"><br>
                        <strong>Phone Number:</strong>
                        <input class="form-control" id="mobile" name="phonenumber" placeholder="Mobile Number" type="text" value="{{$userDeatils->phonenumber}}">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12 card-box">

                    <div class="col-xs-6">

                        <strong>Joining :{{$totalTeam->total}}</strong>

                    </div>

                    <div class="col-xs-6">

                        <strong>Earning : ${{number_format($totalEarn->joining_income+$totalEarn->referral_income+$totalEarn->others_income)}}</strong>

                    </div>

                </div>

            </div>
            <div class="row ">

                <div class="col-md-12 card-box">

                    <input class="form-control" id="loginid"  type="text" value="{{$userDeatils->email}}" disabled>

                </div>

                <div class="col-md-12 card-box">
                    <strong>Country:</strong>
                    <input class="form-control" id="loginid"  type="text" name="country" value="{{$userDeatils->country}}">

                </div>

            </div>
            <div class="row card-box">

                <div class="col-md-7">

                    <strong>District/City:</strong>

                    <input type="text" class="form-control" value="{{$userDeatils->city}}" placeholder="Enter City" name="city">

                </div>

                <div class="col-md-5">

                    <strong>Thana/ Upazila/ Town:</strong>

                    <input type="text" class="form-control" placeholder="Enter Police Station/Town" value="{{$userDeatils->town}}" name="town">

                </div>



            </div>
            <div class="row card-box">

                <div class="col-md-8">

                    <strong>Village/Road:</strong>

                    <input type="text" class="form-control" placeholder="Enter Village/Road" value="{{$userDeatils->village}}" name="village">

                </div>

                <div class="col-md-4">

                    <strong>House:</strong>

                    <input type="text" class="form-control" value="{{$userDeatils->house}}" placeholder="Enter House" name="house">

                </div>



            </div>
            <div class="row card-box">

                <div class="col-md-12">

                    <strong>Division:</strong>

                    <input type="text" class="form-control" value="{{$userDeatils->division}}" placeholder="Enter Division" name="division">

                </div>



            </div>
            <div class="row card-box">

                <div class="col-md-3">


                    <strong>Birth Date:</strong>

                    <input type="text" id="datepicker" class="form-control" name="birthday" value="{{date($userDeatils->birthday)}}">

                </div>

                <div class="col-md-9">

                    <strong>NID:</strong>

                    <input type="text" class="form-control" value="{{$userDeatils->nid}}" name="nid" placeholder="Enter NID">

                </div>



            </div>
            <div class="row card-box">

                <div class="col-md-3">

                    <strong><center>Gender:</center></strong>



                </div>

                <div class="col-md-9">
                    <input type="radio" name="gender" value="0" checked><strong>  Male</strong>
                    <input type="radio" name="gender" value="1"><strong> Female</strong>
                </div>



            </div>
            <div class="row card-box">
                <div class="col-md-12">
                    @if($userDeatils->phone_no_visivility == 1)
                        <strong>Phone Number visible to other </strong><input type="checkbox" name="phone_no_visivility" value="1" checked>
                    @else
                        <strong>Phone Number visible to other </strong><input type="checkbox" name="phone_no_visivility" value="1">
                    @endif

                </div>





            </div>
            <div class="row ">

                <div class="col-md-12 card-box">



                    <strong> Nominee</strong> <input class="form-control" id="nominee" value="{{$userDeatils->nominee}}" name="nominee" type="text" placeholder="Enter Nominee">



                </div>

            </div>
            <div class="row ">

                <div class="col-md-12 card-box">



                    <strong> Relation with Nominee</strong> <input class="form-control" id="nominee" value="{{$userDeatils->relation}}" name="relation" type="text" placeholder="Enter Relation With Nominee" value="{{$userDeatils->relation}}">



                </div>

            </div>
            <div class="row">

                <div class="col-md-12 card-box">
                    <div class="text-center">

                        <input type="submit" id="btn_update" value="Update Profile" class="btn-block btn-lg btn-group btn-warning" style="background:#0099CC; border:0px solid #fff;">

                    </div>

                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script>
        document.forms['user_profile'].elements['gender'].value={{$userDeatils->gender}};
    </script>
@endsection

