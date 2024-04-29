<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/crosstee_logo_2.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    <title>CTT Form</title>

    <script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script>

</head>
<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="{{ asset('img/crosstee_logo_2.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            </a>

            @if(session()->has('user'))
            <form class="d-flex" action="/logout" method="POST" onsubmit="switchVisible_2();">
                @csrf

                <div id="accept_button_2">
                    <button class="btn btn-outline-warning m-1" type="button"><a style="color: inherit; text-decoration: none;" onclick="switchVisible_2();" href="/view">View Records</a></button>

                    <button class="btn btn-outline-danger m-1" type="submit">Logout</button>
                </div>

                <button class="btn btn-primary" id="loading_button_2" style="display: none;" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
                    <span role="status">Loading...</span>
                </button>
            </form>
            @endif

        </div>
    </nav>