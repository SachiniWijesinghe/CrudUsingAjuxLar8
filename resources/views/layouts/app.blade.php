<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <!--1at public folder eke css js folders dekk hdl copy kla.dn ewage link dagna oni meke.meka hma ekema extend wena nisa meke css js danwa-->
    <!-- meke navbar includes krnna puluwn.me file eka extend klama meke tyena ewa e file ek penwa.meke yeild eke contend eka e e adala file eke section ekecontennt kyl dala liwwma hri.web eken cll krnne ara file eka. -->

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css')}}">  <!--mekth oni data table walt-->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}"> <!--here you can write your css.-->



    <!-- data table css -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"> -->
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/sc-2.2.0/datatables.min.css" rel="stylesheet"/>
</head>

<body>

    @include('layouts/includes/nav')
    <h4> this is above the content </h4>

    <div>
        @yield('content')
    </div>



    <h4>this is below the content </h4>



    <!--body eke tmy script tag danne-->
    <script src="{{asset('frontend/js/jquery-3.7.0.min.js')}}"></script>   <!--mekth oni data table wada krnna-->
    <script src="{{asset('frontend/js/bootstrap5.bundle.js')}}"></script>

    <!-- data table js -->
    <!-- <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/sc-2.2.0/datatables.min.js"></script>

   @yield('scripts')

</body>

</html>
