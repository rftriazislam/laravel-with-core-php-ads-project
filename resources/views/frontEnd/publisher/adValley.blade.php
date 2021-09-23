@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
<?php
	require_once('resources/views/frontEnd/publisher/totalmag.php');
?>
    <style type="text/css">

        td{
            height: 20px;
            padding: 0px;
        }
        table{
            text-align: center;
            margin: 0px;
            padding: 0px;
        }
        table th{
            text-align: center;
            font-size: auto;
            padding: 5px;
            font-weight: 600;
            color: #fff;
        }
        td:nth-child(even){
            background: #fff;
        }

        thead th:first-child{
            background-color: darkcyan;
        }
        thead th:nth-child(2){
            background-color: blueviolet;
        }
        thead th:nth-child(3){
            background-color: cornflowerblue;
        }
        thead th:nth-child(4){
            background-color: darkolivegreen;
        }
        thead th:nth-child(5){
            background-color: peru;
        }
        thead th:nth-child(6){
            background-color: greenyellow;
        }
        p{
            font-size: 14px;
            margin-top: 15px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-xs-12" style="margin-top:20px;">
                        <table class="table table-striped table-bordered" id="table">
                            <thead>
                            <tr>
                                <th>Generation</th>
                                <th>Google Ad</th>
                                <th>Dreamploy Ads</th>
                                <th>Video Ads</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td rowspan="2"><p><strong>Self</strong></p></td>
                                <td>{{$impression->selfgoogle_ad}}</td>
                                <td>{{$impression->selfdreamploy_ad}}</td>
                                <td>{{$impression->selfvideo_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->selfgoogle_ad * $amount->gad, 6)}}</td>
                                <td>${{number_format($impression->selfdreamploy_ad * $amount->dad, 6)}}</td>
                                <td>${{number_format($impression->selfvideo_ad * $amount->vad, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-01</strong></p></td>
                                <td>{{$impression->lv1google_ad}}</td>
                                <td>{{$impression->lv1dreamploy_ad}}</td>
                                <td>{{$impression->lv1video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv1google_ad * $amount->gad*.4, 6)}}</td>
                                <td>${{number_format($impression->lv1dreamploy_ad * $amount->dad * .4, 6)}}</td>
                                <td>${{number_format($impression->lv1video_ad * $amount->vad * .4, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-02</strong></p></td>
                                <td>{{$impression->lv2google_ad}}</td>
                                <td>{{$impression->lv2dreamploy_ad}}</td>
                                <td>{{$impression->lv2video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv2google_ad * $amount->gad*.1, 6)}}</td>
                                <td>${{number_format($impression->lv2dreamploy_ad * $amount->dad * .1, 6)}}</td>
                                <td>${{number_format($impression->lv2video_ad * $amount->vad * .1, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-03</strong></p></td>
                                <td>{{$impression->lv3google_ad}}</td>
                                <td>{{$impression->lv3dreamploy_ad}}</td>
                                <td>{{$impression->lv3video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv3google_ad * $amount->gad*.1, 6)}}</td>
                                <td>${{number_format($impression->lv3dreamploy_ad * $amount->dad * .1, 6)}}</td>
                                <td>${{number_format($impression->lv3video_ad * $amount->vad * .1, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-04</strong></p></td>
                                <td>{{$impression->lv4google_ad}}</td>
                                <td>{{$impression->lv4dreamploy_ad}}</td>
                                <td>{{$impression->lv4video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv4google_ad * $amount->gad*.1, 6)}}</td>
                                <td>${{number_format($impression->lv4dreamploy_ad * $amount->dad * .1, 6)}}</td>
                                <td>${{number_format($impression->lv4video_ad * $amount->vad * .1, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-05</strong></p></td>
                                <td>{{$impression->lv5google_ad}}</td>
                                <td>{{$impression->lv5dreamploy_ad}}</td>
                                <td>{{$impression->lv5video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv5google_ad * $amount->gad*.05, 6)}}</td>
                                <td>${{number_format($impression->lv5dreamploy_ad * $amount->dad * .05, 6)}}</td>
                                <td>${{number_format($impression->lv5video_ad * $amount->vad * .05, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-06</strong></p></td>
                                <td>{{$impression->lv6google_ad}}</td>
                                <td>{{$impression->lv6dreamploy_ad}}</td>
                                <td>{{$impression->lv6video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv6google_ad * $amount->gad*.05, 6)}}</td>
                                <td>${{number_format($impression->lv6dreamploy_ad * $amount->dad * .05, 6)}}</td>
                                <td>${{number_format($impression->lv6video_ad * $amount->vad * .05, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-07</strong></p></td>
                                <td>{{$impression->lv7google_ad}}</td>
                                <td>{{$impression->lv7dreamploy_ad}}</td>
                                <td>{{$impression->lv7video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv7google_ad * $amount->gad*.05, 6)}}</td>
                                <td>${{number_format($impression->lv7dreamploy_ad * $amount->dad * .05, 6)}}</td>
                                <td>${{number_format($impression->lv7video_ad * $amount->vad * .05, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-08</strong></p></td>
                                <td>{{$impression->lv8google_ad}}</td>
                                <td>{{$impression->lv8dreamploy_ad}}</td>
                                <td>{{$impression->lv8video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv8google_ad * $amount->gad*.05, 6)}}</td>
                                <td>${{number_format($impression->lv8dreamploy_ad * $amount->dad * .05, 6)}}</td>
                                <td>${{number_format($impression->lv8video_ad * $amount->vad * .05, 6)}}</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-09</strong></p></td>
                                <td>{{$impression->lv9google_ad}}</td>
                                <td>{{$impression->lv9dreamploy_ad}}</td>
                                <td>{{$impression->lv9video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv9google_ad * $amount->gad*.05, 6)}}</td>
                                <td>${{number_format($impression->lv9dreamploy_ad * $amount->dad * .05, 6)}}</td>
                                <td>${{number_format($impression->lv9video_ad * $amount->vad * .05, 6)}}</td>
                            </tr>


                            <tr>
                                <td rowspan="2"><p><strong>G-10</strong></p></td>
                                <td>{{$impression->lv10google_ad}}</td>
                                <td>{{$impression->lv10dreamploy_ad}}</td>
                                <td>{{$impression->lv10video_ad}}</td>
                            </tr>

                            <tr>
                                <td>${{number_format($impression->lv10google_ad * $amount->gad*.05, 6)}}</td>
                                <td>${{number_format($impression->lv10dreamploy_ad * $amount->dad * .05, 6)}}</td>
                                <td>${{number_format($impression->lv10video_ad * $amount->vad * .05, 6)}}</td>
                            </tr>
                            </tbody>
                        </table>
						<table class="table table-striped table-bordered">
							<tr>
							<td rowspan="1"><p><strong>Total Amount</strong></p></td>
                                <td>
								<?php
								echo '$' . number_format($adValleytotalgoogleads, 6);
								?>
								
								</td>
								<td><?php 

								echo '$' . number_format($adValleytotaldreamployads, 6);
								
								?></td>
								<td><?php 

								echo '$' . number_format($adValleytotalvideoads, 6);
								
								?></td>
							</tr>
							
							<tr>
							<td rowspan="1"><p><strong>Sub Total</strong></p></td>
							<td><?php 
							
							echo '$' . number_format($totalmag, 6);
							?></td>
							</tr>
							</table>
                    </div>

                </div>
            </div>
            <div class="col-sm-1"></div>

        </div>
    </div>
@endsection
