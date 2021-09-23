@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <style type="text/css">
        .media{
            margin-top: 10px !important;
        }
        .media a{
            text-decoration: none;
        }
        .media img{
            width: 100px;
            height: 100px;
            align-items: center;
            margin-left: 37%;
        }
        .media h3{
            border: 2px solid #019;
            margin-top: 10px;
            padding: 10px;
            text-align: center;
            width: 51%;
            font-size: 16px;
            margin-left: 25%;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-11">
                <div class="row">
                    @if(count($links) == 0)
                        <div class="col-md-6 col-md-offset-2">
                            <div class="well">
                                <p class="text-center text-danger">
                                    There Is No Downloadable link, try again after some times. Thanks
                                </p>
                            </div>
                        </div>
                        @else
                        @foreach($links as $link)
							<div class="col-md-4">
								<div class="media">
									<a href="{{$link->link}}" target="_blank" onclick="anotherCount()"><img src="{{asset('public/images/apps-download.png')}}" alt=""></a>
									<a href="{{$link->link}}" target="_blank" onclick="anotherCount()"><h3>Link- {{$loop->index+1}}</h3></a>
								</div>
							</div>
                        @endforeach

                   @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function anotherCount() {
            $.ajax({
                url: "{{url('/ppd-count')}}",
                method: 'GET',
                success: function(data) {

                }
            });
        }
    </script>
@endsection