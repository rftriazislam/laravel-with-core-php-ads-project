<!DOCTYPE html>
<html lang="en">
<head>
    <title>Withdraw Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            font-family: 'Barlow Condensed', sans-serif;
        }
    </style>
</head>
<body>

<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/home')}}/assets/images/logo.png" alt="logo"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="mailto:info@dreamploy.com">info@dreamploy.com</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container" style="position: relative; top: 100px;">

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h3 id="tables">Withdraw Info:- </h3>
            </div>

            <div class="bs-component">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>{{$user->name}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table-info">
                        <td>Email</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr class="table-success">

                        <td>Account No</td>
                        <td>{{$withdraw->account_no}}</td>
                    </tr>
                    <tr class="table-danger">

                        <td>Amount</td>
                        <td>{{$withdraw->amount}}$</td>
                    </tr>
                    <tr class="table-warning">
                        <td>You will get after deduction 15% tax & sc</td>
                        <td>{{$withdraw->amount - $withdraw->amount*.15}}$</td>
                    </tr>
                    <tr class="table-active">
                        <td>You will get in BDT (1$ = 78Tk)</td>
                        <td>{{($withdraw->amount - $withdraw->amount*.15)*78}}tk</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="bs-component">
                <blockquote class="blockquote">
                    <p class="text-warning">Dear {{$user->name}},</p>
                    <p>Your withdraw is successfully completed. You will get your payment from AC:- 017113281796. We are checking it manually. That's why it will take 15-20 days. After transection we will notify by another email. Thanks for being with us. Stay connected with Dreamploy</p>
                    <footer class="blockquote-footer" style="float: right">--Team <cite title="https://dreamploy.com">Dreamploy</cite></footer>
                </blockquote>
            </div>
    </div>
    </div>
</div>
</body>
</html>