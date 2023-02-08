<link rel="stylesheet" href="../css/template.css">
<body class="profilepage">

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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="profile">
            <img src="{{asset('storage/images/'.$user->display_picture_link)}}" alt="">
            <form action="{{route('profile_update')}}" enctype="multipart/form-data" method="post">
            @csrf
                <div class="form">{{__('lang.First Name')}}: <input type="text" value="{{$user->firstname}}" name="firstname"> </div>
                <div class="form">{{__('lang.Last Name')}}: <input type="text" value="{{$user->lastname}}" name="lastname"> </div>
                <div class="form">Email: <input type="text" value="{{$user->email}}" name="email"> </div>
                <div class="form">{{__('lang.Role')}}: {{$role->role_name}} </div>
                <div class="genderform">
                    {{__('lang.Gender')}}: <input type="radio" class="form-check-input" name="gender" id="male"
                    value="1" {{Auth::user()->genders_id=="1" ? 'checked' : '' }}>
                    <label class="form-check-label" for="male">{{__('lang.Male')}}</label>
                    <input type="radio" class="form-check-input" name="gender" id="female"
                    value="2" {{Auth::user()->genders_id=="2" ? 'checked' : '' }}>
                    <label class="form-check-label" for="female">{{__('lang.Female')}}</label>
                </div>
                <div>
                    {{__('lang.Display Picture')}}: <input type="file" accept="image/*" id="display_picture" placeholder="Browse" name="display_picture">
                </div>
                <div>{{__('lang.Password')}}: <input type="password" placeholder="Password" name="password"> </div>
                <div>{{__('lang.Confirm Password')}}: <input type="password" placeholder="Confirm Password" name="password_confirmation"> </div>
                <div class="profilebutton"><input type="submit" value="{{__('lang.Save')}}"> </div>
            </form>
        </div>
@endsection