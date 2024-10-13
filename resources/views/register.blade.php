<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | PratikCodeClub</title>
  <link rel="icon" type="image/png" href="{{ asset('admin/img/favicon-32x32.png') }}">
  <link rel="manifest" href="/manifest.json">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Pratik</b>CodeClub</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Register with PratikCodeClub</p>

      <form method="post" action="{{ route('register_post') }}">
        @csrf
        <div class="mb-3">
          <div class="input-group mb-1">
            <input type="text" class="form-control" placeholder="Name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-solid fa-user"></span>
              </div>
            </div>
          </div>
          @error('name')
              <div style="color:red; font-size: 14px;" class="ml-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <div class="input-group mb-1">
            <input type="text" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
              <div style="color:red; font-size: 14px;" class="ml-1">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <div class="input-group mb-1">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
            <div style="color:red; font-size: 14px;" class="ml-1">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <div class="input-group mb-1">
            <input type="password" class="form-control" placeholder="Re-enter Password" name="password2">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password2')
            <div style="color:red; font-size: 14px;" class="ml-1">{{ $message }}</div>
          @enderror
          @if (session()->has('loginError'))
            <div style="color:red; font-size: 14px;" class="ml-1">{{ session('loginError') }}</div>
          @endif
        </div>

        <div class="row">
          <div class="col-5">
            <input type="submit" class="btn btn-success btn-block" name="signin" value="Submit">
          </div>
          <div class="col-2"></div>
          <div class="col-5">
            <a wire:navigate href="/login" class="btn btn-primary btn-block">Back to Login</a>
          </div>
          <!-- <div class="col-7">
            <div class="icheck-primary">
              <label for="remember">
                <a href="forgot.php" style="color: black; font-size: 15px;">Forgot Password ?</a>
              </label>
            </div>
          </div> -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('layouts/scripts')