@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="" style="width: 150px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading" style="margin-left: 0px;color: black;">
                        Step 1:- Download and install the app. <a href="https://play.google.com/store/apps/details?id=com.lessonray.elearning" target="_blank"><strong>DOWNLOAD</strong></a>
                    </h4>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="{{ url('public/challenge/first-img.png') }}" style="width: 150px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading" style="margin-left: 0px;color: black;">
                        Step 2:- If you are a new user then Click Sign Up.
                    </h4>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="{{ url('public/challenge/second-img.png') }}" style="width: 150px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading" style="margin-left: 0px;color: black;">
                        Step 3:- Fill up the form and click the register button.
                    </h4>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="{{ url('public/challenge/third-img.png') }}" style="width: 150px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading" style="margin-left: 0px;color: black;">
                        Step 4:- Provide a copy of your recent picture and other informations.Click update.
                    </h4>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="{{ url('public/challenge/fourth-img.png') }}" style="width: 150px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading" style="margin-left: 0px;color: black;">
                        Step 5:- Click the "Courses" button to get Course list.
                    </h4>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="{{ url('public/challenge/fifth-img.jpg') }}" style="width: 150px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading" style="margin-left: 0px;color: black;">
                        Step 6:- Select Dreamploy Course from Offered Course List.
                    </h4>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="{{ url('public/challenge/sixth-img.png') }}" style="width: 150px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading" style="margin-left: 0px;color: black;">
                        Step 7:- Click Continue.
                    </h4>
                  </div>
                </div>
                <div class="media">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img class="media-object" src="{{ url('public/challenge/eight-img.jpeg') }}" style="width: 150px">
                    </a>
                    <a href="#">
                      <img class="media-object" src="{{ url('public/challenge/seventh-img.png') }}" style="width: 150px">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading" style="margin-left: 0px;color: black;">
                        Step 8:- Complete your payment and take TXNID from text message sent by Operator. <br><br> Then provide Dreamploy Id, Bkash or Rocket Number and TrxID. Then confirm subscription. Done!!!!
                    </h4>
                  </div>
                </div>
                <br><br><br>
            </div>
        </div>
    </div>

@endsection
