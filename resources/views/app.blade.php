<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


    <!-- Styles -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" />

    {{-- <link href="{{ asset('css/vendor/aos.css') }}" rel="stylesheet"> --}}

    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script src="{{ asset('/js/vendor.js') }}"></script>
    <script src="{{ asset('/js/vendor/share.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('/js/functions.js') }}" type="text/javascript"></script> --}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @routes
</head>

<body> @inertia </body>

</html>