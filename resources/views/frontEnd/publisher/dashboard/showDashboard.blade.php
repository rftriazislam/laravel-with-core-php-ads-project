@extends('frontEnd.publisher.layouts.master')
@section('mainContent')

    <div class="margin" style="margin-top:20px; ">

        <div class="logo" style="height:40px; background:#fff;">



        </div>

        <div class="row">

            <div class="table_design" >

                <div class="container">

                    <table class="table table-bordered">

                        <thead>

                        <th>Generation</th>

                        <th>Referrals</th>

                        <th>T.Earning</th>
                        <th>Active</th>

                        <th>Approved</th>

                        <th>Achieved</th>

                        </thead>

                        <tbody>
                        <tr>
                            <td>Generation 1</td>
                            <td>{{ $levels->level1 }}</td>
                            <td>{{number_format($levels->level1*$level1_percent, 6)}}</td>
                            <td>{{$level1active}}</td>
                            <td>{{number_format($approveLevel1)}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">Bronze:0</div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Generation 2</td>
                            <td>{{ $levels->level2 }}</td>
                            <td>{{number_format($levels->level2*$level2_4_percent, 6)}}</td>
                            <td>{{$level2active}}</td>
                            <td>{{$approveLevel2}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">Silver:0</div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Generation 3</td>
                            <td>{{ $levels->level3 }}</td>
                            <td>{{number_format($levels->level3*$level2_4_percent, 6)}}</td>
                            <td>{{$level3active}}</td>
                            <td>{{$approveLevel3}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">Gold:0</div>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>Generation 4</td>
                            <td>{{ $levels->level4 }}</td>
                            <td>{{number_format($levels->level4*$level2_4_percent, 6)}}</td>
                            <td>{{$level4active}}</td>
                            <td>{{$approveLevel4}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">Platinum:0</div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Generation 5</td>
                            <td>{{ $levels->level5 }}</td>
                            <td>{{number_format($levels->level5*$level5_10_percent, 6)}}</td>
                            <td>{{$level5active}}</td>
                            <td>{{$approveLevel5}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">Diamond:0</div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Generation 6</td>
                            <td>{{ $levels->level6 }}</td>
                            <td>{{number_format($levels->level6*$level5_10_percent, 6)}}</td>
                            <td>{{$level6active}}</td>
                            <td>{{$approveLevel6}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">Ambassador:0</div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Generation 7</td>
                            <td>{{ $levels->level7 }}</td>
                            <td>{{number_format($levels->level7*$level5_10_percent, 6)}}</td>
                            <td>{{$level7active}}</td>
                            <td>{{$approveLevel7}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;"> B Ambassador:0</div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Generation 8</td>
                            <td>{{ $levels->level8 }}</td>
                            <td>{{number_format($levels->level8*$level5_10_percent, 6)}}</td>
                            <td>{{$level8active}}</td>
                            <td>{{$approveLevel8}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">R Ambassador:0</div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Generation 9</td>
                            <td>{{ $levels->level9 }}</td>
                            <td>{{number_format($levels->level9*$level5_10_percent, 6)}}</td>
                            <td>{{$level9active}}</td>
                            <td>{{$approveLevel9}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">C Ambassador:0</div>
                                </div>
                            </td>

                        </tr>

                        <tr>
                            <td>Generation 10</td>
                            <td>{{ $levels->level10 }}</td>
                            <td>{{number_format($levels->level10*$level5_10_percent, 6)}}</td>
                            <td>{{$level10active}}</td>
                            <td>{{$approveLevel10}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-12" style="text-align:left; border-right:2px solid #000;">Crown:0</div>
                                </div>
                            </td>

                        </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    @php
        $count1 = $levels->level1;
        $count2 = $levels->level2 + $levels->level3 + $levels->level4;
        $count3 = $levels->level5 + $levels->level6 + $levels->level7 + $levels->level8 + $levels->level9 + $levels->level10;
        $countAll = $count1 + $count2 + $count3;

        $totalEarningFromRef = ($count1*$level1_percent) + ($count2*$level2_4_percent) +($count3*$level5_10_percent);

    @endphp


    <div class="row">

        <div class="table_design">

            <div class="container">
                <div class="col-md-6">

                    <table class="table table-bordered">

                        <tr>

                            <th></th>

                            <th>Referrals</th>
                            <th>T.Earning</th>
                            <th>Active</th>
                            <th>Approved</th>

                        </tr>

                        <tr>


                            <td>Today Total</td>

                            <td>{{$todayTotalCount}}</td>

                            <td>{{number_format($todatTotalEarn, 6)}}</td>

                            <td>0</td>

                            <td>0.000000</td>

                        </tr>

                        <tr>


                            <td>This Month Total</td>

                            <td>{{$monthTotalCount}}</td>

                            <td>{{number_format($monthTotalEarn, 6)}}</td>

                            <td>0</td>

                            <td>0.000000</td>

                        </tr>

                        <tr>


                            <td>All Time Total</td>

                            <td>{{$countAll}}</td>

                            <td>{{number_format($totalEarningFromRef, 6)}}</td>

                            <td>0</td>

                            <td>0.000000</td>

                        </tr>

                    </table>

                </div>
                <div class="col-md-6">
				  <div class="table table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>Withdraw</th>
                            <th>Balance {{$level1active}}</th>
                        </tr>
                        <tr>
                            <td>Referrals Income</td>
                            <td>{{$approveMediaTotal}}</td>
                            {{-- <td>{{number_format($referral_income->approved_income, 6)}}</td> --}}
                            <td>0.000000</td>
                            <td>{{number_format($referral_income->approved_income, 6) + $level1active * 1 - $level1active * 0.15555}}</td>
                            {{-- <td>{{number_format($referral_income->approved_income, 6)}}</td> --}}
                        </tr>
                        <tr>
                            <td>Other's Income</td>
                            <td>$ {{number_format($advelly_income + $others_incomes->media_and_social +$micro + $others_incomes->income_valley + $others_incomes->orbittimes,6)}}</td>
                            <td>0.000000</td>
                            <td>$ {{number_format($advelly_income + $others_incomes->media_and_social +$micro + $others_incomes->income_valley + 1,6)}}</td>
                        </tr>
						<tr>
    						<td>RP Income</td>
    						<td>$ {{number_format($rpincome->rpincome + $rpincome->add_rpincome,6)}}</td>
    						<td>0.000000</td>
    						<td>$ {{number_format($rpincome->rpincome + $rpincome->add_rpincome,6)}}</td>
						</tr>
                        <tr>
                            <td>Total</td>
                            <td>$ {{number_format(($referral_income->approved_income)+($rpincome->rpincome + $rpincome->add_rpincome)+($advelly_income + $others_incomes->media_and_social +$micro + $others_incomes->income_valley + 1) + $level1active * 1 - $level1active * 0.15555, 6)}}</td>

                            {{-- <td>$ {{number_format(($referral_income->approved_income)+($rpincome->rpincome + $rpincome->add_rpincome)+($advelly_income + $others_incomes->media_and_social +$micro + $others_incomes->income_valley + 1), 6)}}</td> --}}
                            
                            <td>0.000000</td>
                            <td>$ {{number_format(($referral_income->approved_income)+($rpincome->rpincome + $rpincome->add_rpincome)+($advelly_income + $others_incomes->media_and_social +$micro + $others_incomes->income_valley + 1) + $level1active * 1 - $level1active * 0.15555, 6)}}</td>

                            {{-- <td>$ {{number_format(($referral_income->approved_income)+($rpincome->rpincome + $rpincome->add_rpincome)+($advelly_income + $others_incomes->media_and_social +$micro + $others_incomes->income_valley + 1), 6)}}</td> --}}
                        </tr>
                    </table>
                  </div>
                </div>
             </div>
          </div>
       </div>
@endsection

