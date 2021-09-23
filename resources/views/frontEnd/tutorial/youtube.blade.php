@extends('frontEnd.layouts.master')
@section('title')
    Youtube
@endsection
@section('mainContent')
    <style type="text/css">
        a{

            text-decoration: none;
            color:blue;
        }
        a:hover{
            text-decoration: none;
        }
        .link{
            color: black;
            text-decoration:none;
            color: black;
            font-weight: 700;

        }
        .link:hover{
            background-color: #588c7e;
            padding: 8px 20px 8px 20px;
            color: white;
        }

        .col-xs-3 img{
            min-height: 60px;
            min-width: 60px;
            width: 100%;
            height: 97%;
            padding:0px;
            margin: 0px;
        }
        #header{
            text-align: center;
            background-color: #588c7e;
            color: white;
            border-radius: 10px 10px 0px 0px;
            margin: 30px 0px 0px 0px;

        }
        #dashboard{
            background-color: #b8a9c9;
            padding-top: 5px;
            padding-bottom: 5px;
            margin:0px 0px 0px 0px;
            font-size: 16px;

        }
        #header h3{
            font-size: 40px;
            text-shadow:1px 1px 2px black,0 0 25px blue, 0 0 5px darkblue;
        }
        .col-xs-6{
            text-align: center;
        }

        #home{
            background-color: #b8a9c9;
            padding-top: 5px;
            padding-bottom: 5px;
            margin:0px 0px 0px 0px;
            border-right: 1px solid white;
            font-size: 16px;

        }
        #blogbg{
            background-color: #588c7e;
        }
        #condition{
            padding-left: 30%;
            padding-top: 4px;
            font-size: 20px;
            color: black;
            font-weight: 700px;
        }
        .col-sm-2{
            margin: 0px;
            padding: 0px;
        }
        #button{
            text-align: center;
            margin-bottom: 10px;
            background-color:#82b74b;
        }

        .click{

            padding: 9px 20px 9px 20px;
            color: #23527C;
        }
        .click:hover{
            background-color: #88c75b;
        }

        ul{
            margin-left: 0px;
            text-align: left;
            padding-left: 3px;
            margin-top: 5px;

        }
        .imagebody{
            padding:0px;
            margin:0px;
            background-color: white;
        }
        /* from here blog css started*/
        .mainrow{
            text-align:center;
            color:white;
            margin-bottom: 20px;
        }
        .train{
            background-color:#588c7e;
            min-height:30px;
            margin-top:30px;
            margin-left:5px;
            margin-right:5px;
            border-radius: 5px 5px 0px 0px;

        }

        .motiv{
            background-color:#588c7e;
            margin-top:30px;
            margin-left:5px;
            margin-right:5px;
            border-radius: 5px 5px 0px 0px;
        }
        .title h5{
            font-size: 40px;
            text-shadow:1px 1px 2px black,0 0 25px blue, 0 0 5px darkblue;

        }


        .Eng{

            min-height:30px;padding-left:0px;padding-right:0px;border-top:2px solid #3ffdae;
        }
        .Eng h4{
            padding:24px 0px;margin-left:0px;color:white;font-size: 20px;font-weight: 600;
        }
        .article{
            background-color:#8ca3a3;
            min-height:30px;border-top:2px solid #3ffdae;
            color: black;

        }
        .article h5{
            padding-top:5px;padding-bottom:5px;
            font-size: 24px;
            font-weight: 700;
        }
        .links h6{
            padding-top:5px;padding-bottom:5px;margin-left:-15px;margin-right:-15px;

        }
        .links{
            background-color:#838060;
        }
        .links a{
            color: black;
            font-size: 16px;
            font-weight: 500;
        }
        /*.links a:hover{
            background-color:green;
        }*/

        .BNG{

            min-height:30px;padding-left:0px;padding-right:0px;border-top:2px solid #3ffdae;
        }
        .BNG h4{
            padding:24px 0px;margin-left:0px;color:white;font-size: 20px;font-weight: 500;
        }
    </style>
    <div class="container">
        <div class="row mainrow">
            <div class="col-sm-12 train">
                <div class="title"><h5>Training</h5></div>
                @foreach($youtubeLinks as $youtubeLink)
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-4 Eng"><h4>Bangla </h4> </div>
                        <div class="col-xs-8 article"><h5>Video-{{$loop->index+1}}</h5>
                            <div class="row">
                                <div class="col-xs-12 links" id="{{$loop->index+1}}"><h6><a href="{{$youtubeLink->link}}" onmouseover="change({{$loop->index+1}})" onmouseout="reset({{$loop->index+1}})" onclick="countFunction()" target="_blank">{{$youtubeLink->title}}</a></h6></div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>
        </div>
    </div>

    <script type="text/javascript">
        function change(element){

            document.getElementById(element).style.background = "green";

        };
        function reset(orginal){

            document.getElementById(orginal).style.background = "#838060";
        };

    </script>
    @endsection
