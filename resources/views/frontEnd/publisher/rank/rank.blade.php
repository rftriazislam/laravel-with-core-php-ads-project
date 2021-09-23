@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
<?php
	require_once('resources/views/frontEnd/publisher/totalmag.php');
?>
    <div>
        <div class="row">
            <div class="table_design" >
                <table class="table table-bordered">
                    <?php
                    $gen1per =calcultePercentage($gen1, $level1active);
                    $gen2per =calcultePercentage($gen2, $level2active);
                    $gen3per =calcultePercentage($gen3, $level3active);
                    $totalteamPer =calcultePercentage( $totalTeam, $totalActive);
                    $othersEarningPer =calcultePercentage( $othersEarning, $totalEarningForRank);
                    $totalEarningPer =calcultePercentage( $totalEarning, ($refTot + $other));
                    $overall = round(($gen1per+$gen2per+$gen3per+$totalteamPer+$totalEarningPer)/5);

                    function calcultePercentage($need, $have){
                        $cal = (100*$have)/$need;
                        if ($cal >= 100){
                            return 100;
                        }else{
                            return round($cal);
                        }
                    }
                    ?> <!-- 901442 -->
                    <tr> 
                        <td>My Rank:- {{$myrank->rank}}</td>
                        <td>Target Rank:- {{$myrank->target_rank}}</td>
                    </tr>
                    <tr>
                        <td>Condition </td>
                        <td>Achived</td>
                    </tr>
                    <tr>
                        <td>Generation 1: {{$gen1}} / {{$level1active}} </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{ $gen1per }}%">
                                    {{$gen1per}}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Generation 2: {{$gen2}} / {{$level2active}} </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$gen2per}}%">
                                    {{$gen2per}}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Generation 3: {{$gen3}} / {{$level3active}} </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$gen3per}}%">
                                    {{$gen3per}}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Total referral: {{$totalTeam}} / {{$totalActive}} </td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$totalteamPer}}%">
                                    {{$totalteamPer}}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Income: ${{$totalEarning}} / {{ round($refTot + $other) }}</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$totalEarningPer}}%">
                                    {{$totalEarningPer}}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Overall Achived:</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$overall }}%">
                                    {{$overall?$overall : 0}}%
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>

            </div>

        </div>

    </div>


@endsection

