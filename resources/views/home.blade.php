<link rel="stylesheet" href="../css/template.css">
<body class="homepage">

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
    <div class="homemenu">
        @foreach ($vegetable as $item)
            <div class="homeitem">
                <img src="../storage/images/3058995.png" alt="">
                <figcaption class="itemtext">{{__('lang.'.$item->item_name)}}</figcaption>  
                <figcaption class="itemtext"><a href="/items/{{$item->id}}">Detail</a></figcaption>
            </div>
        @endforeach    
    </div>    

    <div class="homepaginate">{{$vegetable->links()}}</div>
@endsection