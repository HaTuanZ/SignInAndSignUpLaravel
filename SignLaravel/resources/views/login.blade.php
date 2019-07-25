@extends('master')
@section('title', 'Login')
@section('content')
<div class="container">
        <div class="header">
            <h3>Simulor</h3>
            <div class="htext">Enter your email address and password to access admin panel</div>
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{$message}}</li>
                    </ul>
                </div>
            @endif
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{url('/checklogin')}}" method="POST">
            {{ csrf_field() }}
                <div>
                    <label for="email">Email address</label>
                    <input id="email" name="email" type="text" placeholder="Enter your email">
                </div>
                <div>
                    <label for="pw">Password</label>
                    <input id="pw" name="password" type="password" placeholder="Enter your password">
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="" id="check">
                    <label for="check">Remember me</label>
                </div>
                <div>
                    <input type="submit" name="login" value="Log in">
                </div>
            </form>
        </div>
        <div class="footer">
            <div><a href="">Forgot your password?</a></div>
        <div class="signUp">Don't have an account? <a href="{{Url('/register')}}">Sign Up</a></div>
        </div>
    </div>
@endsection
