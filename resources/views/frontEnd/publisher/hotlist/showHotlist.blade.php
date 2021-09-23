@extends('frontEnd.publisher.layouts.master')
@section('mainContent')

    <div>

        <div class="row">

            <div class="table_design" >


                    <table class="table table-bordered">
                        <h2 class="text-center">Latest Signup</h2>
                        <thead>

                        <th>Name</th>

                        <th>Country</th>

                        <th>Id</th>

                        </thead>

                        <tbody>
                        @foreach($latestSignups as $latestSignup)
                        <tr>
                            <td>{{$latestSignup->name}}</td>
                            <td>{{$latestSignup->country}}</td>
                            <td>{{$latestSignup->id}}</td>
                        </tr>
                            @endforeach
                        </tbody>

                    </table>

            </div>

        </div>
        <div class="row">

            <div class="table_design" >


                <table class="table table-bordered">
                    <h2 class="text-center">Maximum Teamsize</h2>
                    <thead>

                    <th>Name</th>

                    <th>Country</th>

                    <th>Id</th>
                    <th>Members</th>

                    </thead>

                    <tbody>
                    @foreach($maxTeams as $maxTeam)
                        <tr>
                            <td>{{$maxTeam->name}}</td>
                            <td>{{$maxTeam->country}}</td>
                            <td>{{$maxTeam->id}}</td>
                            <td>{{$maxTeam->total}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>

        </div>

        <div class="row">

            <div class="table_design" >


                <table class="table table-bordered">
                    <h2 class="text-center">Latest Achiver</h2>
                    <thead>

                    <th>Name</th>

                    <th>Country</th>

                    <th>Id</th>
                    <th>Rank</th>

                    </thead>

                    <tbody>
                    @foreach($ranks as $maxTeam)
                        <tr>
                            <td>{{$maxTeam->name}}</td>
                            <td>{{$maxTeam->country}}</td>
                            <td>{{$maxTeam->id}}</td>
                            <td style="text-transform: capitalize">{{$maxTeam->rank}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>

        </div>

    </div>


@endsection

