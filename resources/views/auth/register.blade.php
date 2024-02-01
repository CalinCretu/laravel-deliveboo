@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper">
        {{-- <div class="row justify-content-center"> --}}
            {{-- <div class="col-md-8"> --}}
                <div class="form-container">
                    <div class="form-title"><h2>Registra il tuo account</h2></div>
    
                    {{-- <div class=""> --}}
                        <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                            @csrf
    
                            <div class="input">
                                <label for="business_name" class="label-input">{{ __('Nome attività') }}</label>
    
                                <div class="">
                                    <input id="business_name" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{ old('business_name') }}" required autocomplete="business_name" autofocus>
    
                                    @error('business_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo email') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="restaurant_img" class="col-md-4 col-form-label text-md-right">Aggiungi immagine</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="restaurant_img" type="file" id="restaurant_img">
                                </div>
                            </div>
    
                            <p>Seleziona la Tipologia</p>
                            <div class="checkbox-wrapper">
                                @foreach ($types as $type)
                                <div class="checkbox-input">
                                    <input class="my-checkbox" name="types[]" type="checkbox" value="{{ $type->id }}" id="type_{{$type->id}}" @checked( in_array($type->id, old('types', [])))>
                                    <label class="form-check-label" for="type_{{$type->id}}">
                                    {{$type->name}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
    
                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>
    
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
    
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="vat_id" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}</label>
    
                                <div class="col-md-6">
                                    <input id="vat_id" type="text" class="form-control @error('address') is-invalid @enderror" name="vat_id" value="{{ old('vat_id') }}" required autocomplete="vat_id">
    
                                    @error('vat_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  {{-- </div> --}}
              @endif
                    </div>
                </div>
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
</div>
@endsection
