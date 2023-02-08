<link rel="stylesheet" href="../css/template.css">
<body class="detailpage">

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
<div class="detailmenu">
   <div class="detailimage">
    {{__('lang.'.$detail->item_name)}}
    <img src="../storage/images/3058995.png" alt="">
    </div>
    <div class="detailtext">
        {{__('lang.Price')}}: Rp. {{$detail->price}}
        <br>
        <br>
        {{__('lang.'.$detail->item_desc)}}
    </div>
</div>
<form method="POST" action="/buyitems/{{$detail->id}}">
    @csrf
    <div class="buybutton">
        <input type="submit" value="Buy">
    </div>
</form>
@endsection