<link rel="stylesheet" href="../css/template.css">
<body class="successpage">

@extends('template')

@section('title','Amazing E-Grocery')

@section('header')
    <div class="logout">
        <a href="{{route('logout')}}">{{__('lang.Logout')}}</a>
    </div>
@endsection

@section('navbar')
    <div class="successtext">
        <a href="{{route('home_page')}}">{{__('lang.Click here to go back to home.')}}</a>
    </div>
@endsection


@section('content')
<div class="circleflex">
    <div class="circle">
        {{__('lang.Success! We will contact you 1x24 hours.')}}
    </div>
</div>
    
@endsection