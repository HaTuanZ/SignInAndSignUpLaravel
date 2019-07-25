@extends('master')
@section('title', 'Register')
@section('content')
<div class="container">
        <div class="header">
            <h3>Simulor</h3>
            <div class="htext">Don't have an account? Create free account</div>
            @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{url('/create')}}" method="POST">

                <div>
                    <label for="name">Full Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter your name">
                </div>
                <div>
                    <label for="email">Email address</label>
                    <input id="email" name="email" type="text" placeholder="Enter your email">
                </div>
                <div>
                    <label for="pw">Password</label>
                    <input id="pw" name="password" type="password" placeholder="Enter your password">
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="check" id="check">
                    <label for="check"><b>I accept &nbsp</b>Terms and Conditions</label>
                </div>
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{$message}}</li>
                        </ul>
                    </div>
                @endif
                {{ csrf_field() }}
                <div>
                    <input type="submit" name="register" value="Sign up">
                </div>
            </form>
        </div>
        <div class="footer">
        <div class="signUp">Already have account? <a href="{{url('/login')}}">Sign Up</a></div>
        </div>
    </div>
@endsection
