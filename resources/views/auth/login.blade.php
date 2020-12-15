{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
@section('content')
    <div id="login-page" class="row">
        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="input-field col s12">
                        <h5 class="ml-4 center">{{ __('locale.auth.login.form-title') }} | {{ env('APP_NAME') }}</h5>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="card-alert card red lighten-5">
                        <div class="card-content red-text">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="center-align">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">email</i>
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email" class="center-align">{{ __('locale.Email') }}</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="material-icons prefix pt-2">lock_outline</i>
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password">
                        <label for="password">{{ __('locale.Password') }}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 ml-2 mt-1">
                        <p>
                            <label>
                                <input type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span> @lang('locale.auth.login.remember-me') </span>
                            </label>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit"
                                class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12"> @lang('locale.auth.login.login')
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a
                                    href="{{ route('register') }}"> @lang('locale.auth.login.register-now') </a></p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small">
                            <a href="{{ route('password.request') }}">@lang('locale.auth.login.forgot-password')</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
@endsection
