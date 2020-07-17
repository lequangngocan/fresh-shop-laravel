@extends('front-end.layouts.base')
@section('title','Home | Lê Quang Ngọc An')
@section('css')
  <style>

  .login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
  }
  .form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }
  .form input {
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
  }
  .form button {
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #4CAF50;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
  }
  .form button:hover,.form button:active,.form button:focus {
    background: #43A047;
  }
  .form .message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 12px;
  }
  .form .message a {
    color: #4CAF50;
    text-decoration: none;
  }
  body {
    background: #76b852; /* fallback for old browsers */
    background: -webkit-linear-gradient(right, #76b852, #8DC26F);
    background: -moz-linear-gradient(right, #76b852, #8DC26F);
    background: -o-linear-gradient(right, #76b852, #8DC26F);
    background: linear-gradient(to left, #76b852, #8DC26F);
    font-family: "Roboto", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;      
  }
  </style>
@endsection
@section('content')
  <div class="login-page">
    <div class="form">
    <form class="login-form" method="post">
    @csrf
        <h1><b>Register</b></h1><br>
        <input type="text" class="form-control" placeholder="Username" name="user_name" value="{{old('user_name')}}">
        @if($errors->has('user_name'))
            <span style="color:red;font-size:15px">{{$errors->first('user_name')}}</span>
        @endif
        <input type="text" class="form-control" placeholder="Full name" name="full_name" value="{{old('full_name')}}">
        @if($errors->has('full_name'))
            <span style="color:red;font-size:15px">{{$errors->first('full_name')}}</span>
        @endif
        <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
        @if($errors->has('password'))
            <span style="color:red;font-size:15px">{{$errors->first('password')}}</span>
        @endif
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
        @if($errors->has('email'))
            <span style="color:red;font-size:15px">{{$errors->first('email')}}</span>
        @endif
        <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address')}}">
        @if($errors->has('address'))
            <span style="color:red;font-size:15px">{{$errors->first('address')}}</span>
        @endif
        <input type="text" class="form-control" placeholder="Phone number" name="phone_number" value="{{old('phone_number')}}">
        @if($errors->has('phone_number'))
            <span style="color:red;font-size:15px">{{$errors->first('phone_number')}}</span>
        @endif
        <button>create</button>
        <p class="message">Already registered? <a href="login-front-end">Sign In</a></p>
      </form>
      @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
            <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    </div>
  </div>
@endsection