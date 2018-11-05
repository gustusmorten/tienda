@extends('layouts.shopTemplate')
@section('title')
@endsection
@section('contenido')

            <div class="panel width:auto " style="max-width:500px;margin-left:auto;margin-right:auto;">
                <div class="panel-heading">{{ __('Login') }}</div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('cliente.login.submit') }}">
                        @csrf

                        <div>
                            <label for="email" class="form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div >
                            <label for="password" class="form-label text-md-right">{{ __('Password') }}</label>

                            <div >
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>

                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                        </div>

                        <div>
                                <button type="submit" class="btn btn-primary">
                                   {{ __('Login') }}
                                 </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                        </div>
                    </form>
                </div>
            </div>


@endsection
