<link rel="stylesheet" href="../css/template.css">
<body class="logoutpage">

@extends('template')

@section('title','Amazing E-Grocery')

@section('header')
    <div class="registerlogin">
        <a href="{{route('register_page')}}">{{__('lang.Register')}}</a>
        <a href="{{route('login_page')}}">{{__('lang.Login')}}</a>
    </div>
@endsection

@section('content')
<div class="circleflex">
    <div class="circle">
        {{__('lang.Log Out Success!')}}
    </div>
</div>
    
@endsection