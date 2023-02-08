<link rel="stylesheet" href="../css/template.css">
<body class="cartpage">

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
    @php
        $sum = 0;
    @endphp
    <h1 class="cartheader">
        Cart
    </h1>
        <div>
            @foreach($cart as $c)
                @foreach ($c->orders as $order)
                <div class="cartcontent">
                    <img src="../storage/images/3058995.png" alt="">
                    <div>{{__('lang.'.$order->items->item_name)}}</div> 
                    <div>Rp. {{$order->price}}</div>
                    @php
                        $sum = $sum + $order->price
                    @endphp
                    <div>
                        <form action="/cancelitem/{{$order->id}}" method="POST">
                            @csrf
                            <input type="submit" id="deletebutton" value="{{__('lang.Delete')}}">
                        </form>
                    </div>
                </div>  
                   <br>
                @endforeach
            @endforeach
        </div>
    <div class="totalsum">
        <div class="sumtext">TOTAL: Rp {{$sum}}</div>
        <div class="checkout">
            <form action="/checkout" method="POST">
                @csrf
                <input type="submit" id="checkoutbutton" value="Check out">
            </form>
        </div>
    </div>
@endsection