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
                        $gen1per = calcultePercentage($gen1, $level1active);
                        $gen2per = calcultePercentage($gen2, $level2active);
                        $gen3per = calcultePercentage($gen3, $level3active);
                        $gen4per = calcultePercentage($gen4, $level4active);
                        $bronzper = calcultePercentage($bronz, $current_bronze);
                        $totalteamPer = calcultePercentage( $totalTeam, $total);
                        $totalEarningPer = calcultePercentage( $totalEarning, ($refTot + $other));
                        $overall = round(($gen1per+$gen2per+$gen3per+$totalteamPer+$gen4per+$totalEarningPer)/6);

                    function calcultePercentage($need, $have){
                        $cal = (100*$have)/$need;
                        if ($cal >= 100){
                            return 100;
                        }else{
                            return round($cal);
                        }
                    }
                    ?>
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
                            <td>Generation 4: {{$gen4}} / {{$level4active}} </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$gen4per}}%">
                                        {{$gen4per}}%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Bronze: {{$bronz}} / {{$current_bronze}} </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                                         aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$bronzper}}%">
                                        {{$bronzper}}%
                                    </div>
                                </div>
                            </td>
                        </tr>

                    <tr>
                        <td>Total referral: {{$totalTeam}} / {{$total}} </td>
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
                        <td>Total Income: ${{$totalEarning}} / {{round($refTot + $other)}} </td>
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
                                    {{$overall}}%
                                </div>
                            </div>
                        </td>
                    </tr>


                </table>

            </div>

        </div>

    </div>


@endsection

