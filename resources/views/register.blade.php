<link rel="stylesheet" href="../css/template.css">
<body class="registerpage">

@extends('template')

@section('title','Amazing E-Grocery')

@section('header')
    
@endsection

@section('content')
<h1 class="registerheader">
    {{__('lang.Register')}}
</h1>
<div class="register">
    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    <form action="{{route('register_account')}}" enctype="multipart/form-data" method="post">
    @csrf
        <div class="form">{{__('lang.First Name')}}: <input type="text" placeholder="First Name" name="firstname"> 
        @error('firstname')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
        <div class="form">{{__('lang.Last Name')}}: <input type="text" placeholder="Last Name" name="lastname"> 
            @error('lastname')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
        <div class="form">Email: <input type="text" placeholder="Email" name="email"> 
            @error('email')
            <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
        <div class="form">{{__('lang.Role')}}: 
                <select class="form-control" id="role" name="role">
                    <option value="User">User
                    </option>
                    <option value="Admin">Admin
                    </option>
                </select>
        </div>
        <div class="genderform">
            {{__('lang.Gender')}}: <input type="radio" class="form-check-input" name="gender" id="male"
            value="1">
            <label class="form-check-label" for="male">{{__('lang.Male')}}</label>
            <input type="radio" class="form-check-input" name="gender" id="female"
            value="2">
            <label class="form-check-label" for="female">{{__('lang.Female')}}</label>
        </div>
        <div>
            {{__('lang.Display Picture')}}: <input type="file" accept="image/*" id="display_picture" placeholder="Browse" name="display_picture">
        @error('display_picture')
        <div class="text-danger">{{$message}}</div>
        @enderror
        </div>
        <div>{{__('lang.Password')}}: <input type="password" placeholder="Password" name="password"> 
            @error('password')
            <div class="text-danger">{{$message}}</div>
        @enderror
        </div>
        <div>{{__('lang.Confirm Password')}}: <input type="password" placeholder="Confirm Password" name="password_confirmation"> 
            @error('password_confirmation')
            <div class="text-danger">{{$message}}</div>
        @enderror
        </div>
        <div class="registerbutton"><input type="submit" value="{{__('lang.Submit')}}"> </div>
    </form>
    <div class="loginredirect"><a href="{{route('login_page')}}">{{__('lang.Already have an account? Click here to Login')}}</a></div>  
</div>
@endsection