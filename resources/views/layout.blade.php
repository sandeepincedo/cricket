<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        

            <div class="content">

                <div class="container well">
                    <div class="page-header"><h1>Circket Assignment (US Tech Solutions)</h1></div>
                </div>
                <div class="container">  
                    @yield('mainContent')
                </div>
     
            </div>
        </div>
    </body>
<script>
$(document).ready(function() {

    //Get point tooltip
    $(".tool").tooltip();

    //Get Point Ajax
    $("a.getpoint").on('click',function(){
        var id = $(this).attr('id');
        $(this).html("Getting Points....");
        $.ajax({
            url:'/teams/getpoints',
            type: "POST",
            data:{
                    id:id,
                    "_token": $('#csrf-token')[0].content},
            success: function(data){
                $("#teampoint_"+id).html(data);
            }
        })
    })

    //Match fixture JS
    $('.fix_match').on('click', function() {
        $('html, body').animate({
             scrollTop: $("#winner").offset().top
        }, 1000);
        var team1 = $( "#team1" ).val();
        var team2 = $( "#team2" ).val();
        var teamVal1 = team1.split("_");
        var teamVal2 = team2.split("_");
        var matcheteams = [teamVal1,teamVal2];

        if(team1 == team2){
            alert("Both Teams selection should be different");
        }else{
            $("#winner").css('display','block');
            $("#team1radio").val(teamVal1[1]);
            $("#team1Id").val(teamVal1[1]);
            $("#teamName1").html(teamVal1[0]);
            $("#team2radio").val(teamVal2[1]);
            $("#team2Id").val(teamVal2[1]);
            $("#teamName2").html(teamVal2[0]);
        }
    });
});
</script>
</html>
