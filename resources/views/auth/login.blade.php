@extends('layouts.auth')

@section('content')
    <a class="navbar-brand block" href="#">e-Procurement Portal</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
            <img height="150" src="{{ url('images/logo.png') }}" />
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
    </section>
@endsection
