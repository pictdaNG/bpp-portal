@extends('layouts.auth')

@section('content')
    <a class="navbar-brand block" href="#">e-Procurement Portal</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
            <img height="150" src="{{ asset('images/logo.png') }}" />
        </header>
        <form method="POST" action="{{ route('register') }}">
        @csrf
          <div class="list-group">
            <div class="list-group-item">
              <input type="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Registered Business Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} no-border">
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
            <div class="list-group-item">
              <input type="name" name="cac" value="{{ old('cac') }}" required autofocus placeholder="CAC RC Number" class="form-control{{ $errors->has('cac') ? ' is-invalid' : '' }} no-border">
              @if ($errors->has('cac'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cac') }}</strong>
                </span>
              @endif
            </div>
            <div class="list-group-item">
              <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} no-border">
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="list-group-item">
              <input type="phone" name="phone" value="{{ old('phone') }}" required autofocus placeholder="Phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }} no-border">
              @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
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
            <div class="list-group-item">
               <input type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }} no-border">
               @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
          </div>
            <div class="checkbox m-b">
                <label>
                <input type="checkbox"> Agree the <a href="#">terms and policy</a>
                </label>
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>
            <div class="line line-dashed"></div>
            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a href="/login" class="btn btn-lg btn-default btn-block">Sign in</a>
        </form>
    </section>
@endsection