@extends('layouts.auth')

@section('content')
    <div class="col-md-12  padding-0 margin-0 row">
        <div class="col-md-5 flex-center padding vh100">
            <div class="col-md-8">
    <a class="navbar-brand padding-0 block" href="#">e-Procurement Portal</a>
      <section class="m-b-lg padding-0">
        <header class="wrapper text-center">
            <img height="150" src="{{ asset('images/logo.png') }}" />
        </header>
        <form method="POST" action="{{ route('post_login') }}">
        @csrf
          <div class="list-group">
            <div class="list-group-item">
              <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} no-border">
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="list-group-item">
               <input type="password" name="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} no-border">
               @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            @if(session('error'))
                <div class="alert alert-danger" role="alert">

                    <p>{{ session('error') }}</p>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-danger" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
          </div>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
          <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="/register" class="btn btn-lg btn-default btn-block">Create an account</a>
        </form>

          <!-- footer -->
          <footer class="m-t-lg" id="footer">
              <div class="text-center padder">
                  <p>
                      <small>Powered by PICTDA<br>&copy; 2019</small>
                  </p>
              </div>
          </footer>
          <!-- / footer -->
    </section>
            </div>
        </div>
        <div class="col-md-7 position-relative padding-0 bg-right vh100">
            <img src="<?php echo e(asset('images/bgLogin.jpg')); ?>" />
            <div class="content flex-center w-100">
                <div class="col-md-7">
                    <h2>Lorem ipsum dolor.</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, libero.∑</p>
                </div>
            </div>
        </div>
    </div>
@endsection
