<link rel="stylesheet" href="{{ asset('css/template.css') }}">
<body class="rolepage">

@extends('template')

@section('title','Amazing E-Grocery')

@section('header')
    
@endsection

@section('content')
<h1 class="roletitle"> {{$user->firstname}} {{$user->lastname}} </h1>
<div class="role">
    <form action="{{route('role_update', ['id'=>$user->id])}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="form">{{__('lang.Role')}}: 
                <select class="form-control" id="role" name="role">
                    <option value="User">User
                    </option>
                    <option value="Admin">Admin
                    </option>
                </select>
        </div>
        <div class="rolebutton"><input type="submit" value="{{__('lang.Save')}}"> </div>
    </form>
</div>
@endsection