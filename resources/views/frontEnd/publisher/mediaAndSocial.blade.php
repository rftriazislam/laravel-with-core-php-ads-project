@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
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
                                <th>DT</th>
                                <th>DM</th>
                                <th>NP</th>
                                <th>SM</th>
                                <th>SMP</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td rowspan="2"><p><strong>G-01</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-02</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-03</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-04</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-05</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-06</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-07</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-08</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>

                            <tr>
                                <td rowspan="2"><p><strong>G-09</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>
                            <tr>
                                <td rowspan="2"><p><strong>G-10</strong></p></td>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                                <td rowspan="2"><p>D$ 0.072200</p></td>
                            </tr>

                            <tr>
                                <td>D$ 0.072200</td>
                                <td>D$ 0.072200</td>

                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-sm-1"></div>

        </div>
    </div>
@endsection
