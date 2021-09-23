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
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/ppd/music')}}"><img src="{{asset('public/images/music.png')}}" alt=""></a>
                            <a href="{{url('/ppd/music')}}"><h3>Music</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/ppd/book')}}"><img src="{{asset('public/images/book.png')}}" alt=""></a>
                            <a href="{{url('/ppd/book')}}"><h3>Book</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/ppd/fun_video')}}"><img src="{{asset('public/images/fun-video.png')}}" alt=""></a>
                            <a href="{{url('/ppd/fun_video')}}"><h3>Fun Videos</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/ppd/video_song')}}"><img src="{{asset('public/images/video-song.png')}}" alt=""></a>
                            <a href="{{url('/ppd/video_song')}}"><h3>Video Song</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/ppd/poem')}}"><img src="{{asset('public/images/poem.png')}}" alt=""></a>
                            <a href="{{url('/ppd/poem')}}"><h3>Poem</h3></a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <a href="{{url('/ppd/others')}}"><img src="{{asset('public/images/others.png')}}" alt=""></a>
                            <a href="{{url('/ppd/others')}}"><h3>Others</h3></a>
                        </div>
                    </div>
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