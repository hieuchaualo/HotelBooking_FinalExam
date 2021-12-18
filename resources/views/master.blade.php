<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="image/favicon.png" type="image/png">
        <title>Royal Hotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="royal-master/css/bootstrap.css">
        <link rel="stylesheet" href="royal-master/vendors/linericon/style.css">
        <link rel="stylesheet" href="royal-master/css/font-awesome.min.css">
        <link rel="stylesheet" href="royal-master/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="royal-master/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="royal-master/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="royal-master/vendors/owl-carousel/owl.carousel.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="royal-master/css/style.css">
        <link rel="stylesheet" href="royal-master/css/responsive.css">
    </head>
    <body>
   
        @include('header')


        <div class="rev-slider">
            @yield('content')
        </div>

        @include('footer')

        @include('script')
   
    </body>
</html>