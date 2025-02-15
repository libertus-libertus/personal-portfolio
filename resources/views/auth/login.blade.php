@extends('layouts.auth')
@section('title')
Log In
@endsection

@section('content')
<!-- /.login-logo -->
<div class="login-box-body">
    <p class="login-box-msg">Log In untuk menajemen akun-Mu</p>

    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Masukkan alamat email" autofocus>
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
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ingat saya
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div style="margin-top: 15px" class="text-center">
        Belum memiliki akun? <a href="{{ route('register') }}" class="text-center">Daftar dulu yuk!</a>
    </div>

</div>
<!-- /.login-box-body -->
@endsection
