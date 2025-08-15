@extends('layouts.app')
@section('content')
<div class="container">
        <div class="m-grid m-grid--hor m-grid--root m-page">
                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
                    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                        <div class="m-login__container">
                                <div class="m-login__logo">
                                        <a href="">
                                        <img width="45%" src="{{URL::asset('assets/app/media/img//logos/logo1.png')}}">
                                        </a>
                                    </div>
    <div class="m-login__head">
        <h3 class="m-login__title">Sign Up</h3>
        <div class="m-login__desc">Enter your details to create your account:</div>
    </div>
    <form class="m-login__form m-form" id="aak" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            @csrf
        <div class="form-group m-form__group">
           
                <input id="name" type="text" placeholder="Full Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-group m-form__group">
           
                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
        <div class="form-group m-form__group">
               
                        <input id="password-confirm"  placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                 
        </div>
        <div class="row form-group m-form__group m-login__form-sub">
            <div class="col m--align-left">
                <label class="m-checkbox m-checkbox--focus">
                    <input required type="checkbox" name="agree">I Agree the
                    <a href="" class="m-link m-link--focus">terms and conditions</a>.
                    <span></span>
                </label>
                <span class="m-form__help"></span>
            </div>
        </div>
        <div class="m-login__form-action">
            
            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
                    {{ __('Register') }}
          </button>
         
        <a href="{{route('login')}}"> <button type="button"  class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">Cancel</button> </a>
        </div>
    </form>
                        </div>
                    </div>
                </div>
        </div>  
</div>
@endsection