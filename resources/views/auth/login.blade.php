<!DOCTYPE html>
<html lang="{{ html_helper()->languageCode(config('app.locale')) }}">
@include('layouts.includes.head')
<body>
<div class="layout-content">
    <noscript>
        <div class="noscript">
            <p>Sorry, JavaScript must be enabled.<br/>Change your browser options, then <a href="">try
                    again</a>.</p>
        </div>
    </noscript>
    <div class="content-scrollable">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-1">
                        <div class="card card-block">
                            <h3 class="card-title text-xs-center">{{ trans('auth.login') }}</h3>
                            <form class="form-horizontal card-text" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label for="email" class="control-label">{{ trans('auth.email') }}</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" autofocus>
                                    @if ($errors->has('email'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label for="password" class="control-label">{{ trans('auth.password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> {{ trans('auth.remember_me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ trans('auth.login') }}
                                    </button>
                                </div>
                                <div class="text-xs-center">

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        {{ trans('auth.forgot_password') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.includes.script')
</body>
</html>
