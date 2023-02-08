<link rel="stylesheet" href="../css/template.css">
<body class="loginpage">

@extends('template')

@section('title','Amazing E-Grocery')

@section('header')

@endsection

@section('content')
    <h1 class="loginheader">
        {{__('lang.Login')}}
    </h1>
    <div class="login">
    @if($errors->any())
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('login_account')}}" method="post">
        @csrf
        <div class="forms"><label>Email Address:<input type="text" id="email" placeholder="Email" name="email"> </div></label>
        <div class="forms"><label>{{__('lang.Password')}}:<input type="password" id="password" placeholder="Password" name="password"> </div></label>
        <div class="forms" id="loginbutton"><input type="submit" value="{{__('lang.Submit')}}"> </div>
    </form>
    @php
        $string = "Don't have an account? Click here to Sign Up"
    @endphp
    <div class="registerredirect"><a href="{{route('register_page')}}">{{__('lang.'.$string)}}</a></div>  
    </div>
@endsection