@extends('layouts.auth')
@section('title')
Register
@endsection

@section('content')
<div class="register-box-body">
    <p class="login-box-msg">Daftar sebagai member baru</p>

    <form action="{{ route('register') }}" method="post">
        @csrf

        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nama kamu" autofocus>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Alamat email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi kata sandi">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div style="margin-top: 15px" class="text-center">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-center">Log In Disini</a>
    </div>
</div>
@endsection
