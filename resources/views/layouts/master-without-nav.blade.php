<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <title> @yield('title') | Qamar Foundation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="Author: Abdul Wahab Qarizada" name="description" />
  <meta content="Abdul Wahab Qarizada" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
  <!-- Bootstrap Css -->
  <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
  <!-- OrphanGrid Css-->
  <link href="{{ URL::asset('/assets/css/mystyle/OrphanGrid.css') }}" rel="stylesheet" type="text/css" />
  @include('sweetalert::alert')
</head>
@yield('body')
@yield('content')
@include('Layouts.vendor-scripts')
</body>
</html>