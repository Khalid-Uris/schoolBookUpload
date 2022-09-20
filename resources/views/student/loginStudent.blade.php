@extends('student.master')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Student</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form action="{{ Route('student.loginStudent') }}" method="get">
                    @csrf
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row">
                        {{-- <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div> --}}
                        <!-- /.col -->
                        <div class="col-4 float-right">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="{{ route('admin.adminView') }}" class="btn btn-block btn-primary">
                        Admin
                    </a>

                </div>
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
                <a href="{{ route('forget.password.get') }}">I forgot my password</a>
            </p> --}}
                <p class="mb-0">
                    <a href="{{ route('student.index') }}" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
