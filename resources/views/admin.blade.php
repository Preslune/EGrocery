<link rel="stylesheet" href="../css/template.css">
<body class="adminpage">

@extends('template')

@section('title','Amazing E-Grocery')

@section('header')
    <div class="logout">
        <a href="{{route('logout')}}">{{__('lang.Logout')}}</a>
    </div>
@endsection

@section('navbar')
    @if (Auth::user()->roles_id == 1)
        <div class="navbartext">
        <a href="{{route('home_page')}}">{{__('lang.Home')}}</a>
        <a href="{{route('cart_page')}}">{{__('lang.Cart')}}</a>
        <a href="{{route('profile_page')}}">{{__('lang.Profile')}}</a>
        <a href="{{route('admin_page')}}">{{__('lang.Account Maintenance')}}</a>            
        </div>
    @else
        <div class="navbartext">
        <a href="{{route('home_page')}}">{{__('lang.Home')}}</a>
        <a href="{{route('cart_page')}}">{{__('lang.Cart')}}</a>
        <a href="{{route('profile_page')}}">{{__('lang.Profile')}}</a>
        </div>
    @endif
@endsection

@section('content')
<div class="table">
    <h1 class="title">{{__('lang.Account Management')}}</h1>
    <div class="tablecontent">
    @foreach ($user as $u)
        {{$u->firstname}} {{$u->lastname}} - {{$u->roles->role_name}}
        <div class="action">
            <a href="/admin/managerole/{{$u->id}}" class="update">{{__('lang.Update Role')}}</a>
            <form action="/admin/deleterole/{{$u->id}}" method="POST">
                @csrf
                <input type="submit" id="deletebutton" value="{{__('lang.Delete')}}">
            </form>
        </div>
        <br>
    @endforeach
    </div>
</div>
@endsection