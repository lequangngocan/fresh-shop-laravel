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
      <form class="login-form" method="post" action="login-front-end" id="formLogin">
      @csrf
          <h1><b>Sign In</b></h1><br>
          <input type="text" placeholder="Username" name="user_name"/>
          <input type="password" placeholder="Password" name="password" />
          <button type="submit">login</button>
          <p class="message">Not registered? <a href="register-front-end">Create an account</a></p>
          <p class="message"><a href="forgot-password">Forgot Password</a></p>
      </form>
      @if (\Session::has('success'))
        <div class="alert alert-danger">
          <ul>
            <li>{!! \Session::get('success') !!}</li>
          </ul>
        </div>
      @endif
    </div>
  </div>
@endsection
