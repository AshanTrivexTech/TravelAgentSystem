@extends('layouts.app')
@section('content')
<div class="container">
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
            <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                <div class="m-login__container">
                    <div style="text-align: center;" class="m-login__logo" >

{{--                        <img width="45%" src="{{URL::asset('assets/app/media/img/logos/logo1.png')}}">--}}

                    </div>
                    <div class="m-login__signin">
                        <div class="m-login__head">
                            <h3 class="m-login__title">Sign In To Trivex Travel System</h3>
                        </div>
                        <form method="POST"   action="{{ route('login') }}"  class="m-login__form m-form" aria-label="{{ __('Login') }}">
                            {{csrf_field()}}
                            <div class="form-group m-form__group">

                        <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                         @endif
                            </div>
                            <div class="form-group m-form__group">

                              <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                              @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                            </div>
                            <div class="row m-login__form-sub">
                                <div class="col m--align-left m-login__form-left">
                                    <label class="m-checkbox  m-checkbox--focus">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                        <span>

                                        </span>
                                    </label>
                                </div>
                                <div class="col m--align-right m-login__form-right">
                                    <a href="{{ route('password.request') }}"  class="m-link">Forget Password ?</a>
                                </div>
                            </div>
                            <div class="m-login__form-action">
                                <button  class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                        {{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>



                    <div class="m-login__account">
                        <span class="m-login__account-msg">
                            Don't have an account yet ?
                        </span>&nbsp;&nbsp;
                    <a href="{{ route('register') }}"  class="m-link m-link--light m-login__account-link">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
