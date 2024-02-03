@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper">
        {{-- <div class="col-md-8"> --}}
            <div class="form-container">
                <div class="form-title">{{ __('Login') }}</div>

                {{-- <div class="card-body"> --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input">
                            

                            
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="email" class="label-input">{{ __('email') }}</label>
                            
                        </div>

                        <div class="input">
                            
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="password" class="label-input">{{ __('Password') }}</label>
                            
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        
                                <button type="submit" class="btn btn-primary orange">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <p class="info">
                                    <a class="form-link" href="{{ route('password.request') }}">
                                        {{ __('Hai dimenticato la password?') }}
                                    </a>
                                </p>
                                @endif
                            
                        
                    </form>
                {{-- </div> --}}
            </div>
        {{-- </div> --}}
    </div>
</div>
@endsection
