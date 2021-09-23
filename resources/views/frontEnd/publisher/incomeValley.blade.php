@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <style type="text/css">
        td{
            height: 30px;
        }
        .income-valley table{
            text-align: center;
            margin: 0px;
            padding: 0px;
        }
        .income-valley table th{
            text-align: center;
            font-size: auto;
            padding: 5px;
            font-weight: 600;
            color: #fff;
        }
        .income-valley td p{
            font-size: auto;
            padding-top: 4px;
            padding-bottom: 0px;
        }
        .income-valley thead th:first-child{
            background-color: darkcyan;
        }
        .income-valley thead th:nth-child(2){
            background-color: blueviolet;
        }
        .income-valley thead th:nth-child(3){
            background-color: cornflowerblue;
        }
        .income-valley thead th:nth-child(4){
            background-color: darkolivegreen;
        }
        .income-valley thead th:nth-child(5){
            background-color: peru;
        }
        .income-valley thead th:nth-child(6){
            background-color: blueviolet;
        }

        .media{
            margin-top: 10px !important;
        }
        .media a{
            text-decoration: none;
        }
        .media img{
            width: 100%;
            height: auto;
        }
        .youtube-img img{
            height: 245px;
        }
        .media h3{
            border: 2px solid #000;
            margin-top: 10px;
            padding: 10px;
            text-align: center;
            width: 100%;
            font-size: 20px;
            margin-left: 0px;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-11">
                <div class="row">	
				
                    <div class="col-md-12 income-valley" style="margin-top:20px;">
                        @if(count($income_valley)  == 0)
                            <p>You or your referral are not work yet Income Valley </p>
                            @else
                        <table class="table table-striped table-bordered" id="table">
                            <thead>
                            <tr>
                                <th>Generation <br></th>
                                <th>Blog & Youtube  <br> ${{number_format($income_valley_amount->youtube_blog, 6)}}</th>
                                <th>PPD & WT  <br> ${{number_format($income_valley_amount->ppd_wt, 6)}}</th>
                                <th>Download & Survey  <br> ${{number_format($income_valley_amount->download_survey, 6)}}</th>
                                <th>Sign Up  <br> ${{number_format($income_valley_amount->signup, 6)}}</th>
                                <th>Total <br></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><p>Self</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->selfyoutube_blog/$income_valley_amount->youtube_blog)}}<br>{{$blogbalance =  $income_valley->selfyoutube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->selfppd_wt/$income_valley_amount->ppd_wt)}}<br>{{$ppdbalance= $income_valley->selfppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->selfdownload_survey/$income_valley_amount->download_survey)}}<br>{{$downloadbalance =$income_valley->selfdownload_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->selfsignup/$income_valley_amount->signup)}}<br>{{$signupbalance =$income_valley->selfsignup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>


                            <tr>
                                <td><p>G-01</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv1youtube_blog/$income_valley_amount->youtube_blog*100/40, 0)}}<br>{{$blogbalance =  $income_valley->lv1youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv1ppd_wt/$income_valley_amount->ppd_wt*100/40, 0)}}<br>{{$ppdbalance= $income_valley->lv1ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv1download_survey/$income_valley_amount->download_survey*100/40, 0)}}<br>{{$downloadbalance =$income_valley->lv1download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv1signup/$income_valley_amount->signup*100/40, 0)}}<br>{{$signupbalance =$income_valley->lv1signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            <tr>
                                <td><p>G-02</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv2youtube_blog/$income_valley_amount->youtube_blog*100/10, 0)}}<br>{{$blogbalance =  $income_valley->lv2youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv2ppd_wt/$income_valley_amount->ppd_wt*100/10, 0)}}<br>{{$ppdbalance= $income_valley->lv2ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv2download_survey/$income_valley_amount->download_survey*100/10, 0)}}<br>{{$downloadbalance =$income_valley->lv3download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv2signup/$income_valley_amount->signup*100/10, 0)}}<br>{{$signupbalance =$income_valley->lv2signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            <tr>
                                <td><p>G-03</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv3youtube_blog / $income_valley_amount->youtube_blog*100/10, 0)}}<br>{{$blogbalance =  $income_valley->lv3youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv3ppd_wt / $income_valley_amount->ppd_wt*100/10, 0)}}<br>{{$ppdbalance= $income_valley->lv3ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv3download_survey / $income_valley_amount->download_survey*100/10, 0)}}<br>{{$downloadbalance =$income_valley->lv3download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv3signup / $income_valley_amount->signup*100/10, 0)}}<br>{{$signupbalance =$income_valley->lv3signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            <tr>
                                <td><p>G-04</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv4youtube_blog/$income_valley_amount->youtube_blog*100/10, 0)}}<br>{{$blogbalance =  $income_valley->lv4youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv4ppd_wt/$income_valley_amount->ppd_wt*100/10, 0)}}<br>{{$ppdbalance= $income_valley->lv4ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv4download_survey/$income_valley_amount->download_survey*100/10, 0)}}<br>{{$downloadbalance =$income_valley->lv4download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv4signup/$income_valley_amount->signup*100/10, 0)}}<br>{{$signupbalance =$income_valley->lv4signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            <tr>
                                <td><p>G-05</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv5youtube_blog/$income_valley_amount->youtube_blog*100/5, 0)}}<br>{{$blogbalance =  $income_valley->lv5youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv5ppd_wt/$income_valley_amount->ppd_wt*100/5, 0)}}<br>{{$ppdbalance= $income_valley->lv5ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv5download_survey/$income_valley_amount->download_survey*100/5, 0)}}<br>{{$downloadbalance =$income_valley->lv5download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv5signup/$income_valley_amount->signup*100/5, 0)}}<br>{{$signupbalance =$income_valley->lv5signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            <tr>
                                <td><p>G-06</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv6youtube_blog/$income_valley_amount->youtube_blog*100/5, 0)}}<br>{{$blogbalance =  $income_valley->lv6youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv6ppd_wt/$income_valley_amount->ppd_wt*100/5, 0)}}<br>{{$ppdbalance= $income_valley->lv6ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv6download_survey/$income_valley_amount->download_survey*100/5, 0)}}<br>{{$downloadbalance =$income_valley->lv6download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv6signup/$income_valley_amount->signup*100/5, 0)}}<br>{{$signupbalance =$income_valley->lv6signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            <tr>
                                <td><p>G-07</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv7youtube_blog/$income_valley_amount->youtube_blog*100/5, 0)}}<br>{{$blogbalance =  $income_valley->lv7youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv7ppd_wt/$income_valley_amount->ppd_wt*100/5, 0)}}<br>{{$ppdbalance= $income_valley->lv7ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv7download_survey/$income_valley_amount->download_survey*100/5, 0)}}<br>{{$downloadbalance =$income_valley->lv7download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv7signup/$income_valley_amount->signup*100/5, 0)}}<br>{{$signupbalance =$income_valley->lv7signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>
                            </tr>

                            <tr>
                                <td><p>G-08</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv8youtube_blog/$income_valley_amount->youtube_blog*100/5, 0)}}<br>{{$blogbalance =  $income_valley->lv8youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv8ppd_wt/$income_valley_amount->ppd_wt*100/5, 0)}}<br>{{$ppdbalance= $income_valley->lv8ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv8download_survey/$income_valley_amount->download_survey*100/5, 0)}}<br>{{$downloadbalance =$income_valley->lv8download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv8signup/$income_valley_amount->signup*100/5, 0)}}<br>{{$signupbalance =$income_valley->lv8signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            <tr>
                                <td><p>G-09</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv9youtube_blog/$income_valley_amount->youtube_blog*100/5, 0)}}<br>{{$blogbalance =  $income_valley->lv9youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv9ppd_wt/$income_valley_amount->ppd_wt*100/5, 0)}}<br>{{$ppdbalance= $income_valley->lv9ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv9download_survey/$income_valley_amount->download_survey*100/5, 0)}}<br>{{$downloadbalance =$income_valley->lv9download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv9signup/$income_valley_amount->signup*100/5, 0)}}<br>{{$signupbalance =$income_valley->lv9signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            <tr>
                                <td><p>G-10</p></td>
                                @php
                                    $blogcount = $ppdcount = $downloadcount = $signupcount = 0;
                                    $blogbalance = $ppdbalance = $downloadbalance = $signupbalance = 0;
                                @endphp
                                <td>{{$blogcount = round($income_valley->lv10youtube_blog/$income_valley_amount->youtube_blog*100/5, 0)}}<br>{{$blogbalance =  $income_valley->lv10youtube_blog}}</td>
                                <td>{{$ppdcount = round($income_valley->lv10ppd_wt/$income_valley_amount->ppd_wt*100/5, 0)}}<br>{{$ppdbalance= $income_valley->lv10ppd_wt}}</td>
                                <td>{{ $downloadcount = round($income_valley->lv10download_survey/$income_valley_amount->download_survey*100/5, 0)}}<br>{{$downloadbalance =$income_valley->lv10download_survey}}</td>
                                <td>{{ $signupcount = round($income_valley->lv10signup/$income_valley_amount->signup*100/5, 0)}}<br>{{$signupbalance =$income_valley->lv10signup}}</td>
                                <td>{{$blogcount + $ppdcount + $downloadcount + $signupcount}}<br>{{round($blogbalance + $ppdbalance + $downloadbalance + $signupbalance, 6)}}</td>
                            </tr>

                            </tbody>
                        </table>
                            @endif
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="#"><img src="{{asset('public/images/game.png')}}" alt=""></a>
                            <a href="#"><h3>Game Download</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/web-traffic')}}"><img src="{{asset('public/images/website.png')}}" alt=""></a>
                            <a href="{{url('/web-traffic')}}"><h3>Website Traffic</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/captcha')}}"><img src="{{asset('public/images/data-mining.png')}}" alt=""></a>
                            <a href="{{url('/captcha')}}"><h3>Data Mining</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/apps-download')}}"><img src="{{asset('public/images/apps-download.png')}}" alt=""></a>
                            <a href="{{url('/apps-download')}}"><h3>Apps Download</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/ppd')}}"><img src="{{asset('public/images/ppd.png')}}" alt=""></a>
                            <a href="{{url('/ppd')}}"><h3>PPD</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="#"><img src="{{asset('public/images/survey.png')}}" alt=""></a>
                            <a href="#"><h3>Survey</h3></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
@endsection

@section('script')
		<script type="text/javascript">
				var uid = '188608';
				var wid = '403761';
			</script>
			<script type="text/javascript" src="//cdn.popcash.net/pop.js"></script>
@endsection

