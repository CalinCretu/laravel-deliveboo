@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper">
            {{-- <div class="row justify-content-center"> --}}
            {{-- <div class="col-md-8"> --}}
            <div class="form-container">
                <div class="form-title">
                    <h2>Registra il tuo account</h2>
                </div>
                {{-- <div class=""> --}}
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                    onsubmit="return validateMyForm();">
                    @csrf
                    <div class="input">
                        <input id="business_name" type="text"
                            class="form-control @error('business_name') is-invalid @enderror" name="business_name"
                            value="{{ old('business_name') }}" required autocomplete="business_name" autofocus
                            placeholder="&nbsp">
                        @error('business_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="business_name" class="label-input">{{ __('Nome attività') }} *</label>
                    </div>
                    <div class="input">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="&nbsp">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="email" class="label-input">{{ __('Indirizzo email') }} *</label>
                    </div>
                    <div class="input">
                        <span id="password-error" class="inactive">Le password non corrispondono</span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="&nbsp">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="password" class="label-input">{{ __('Password') }} *</label>
                    </div>
                    <div class="input">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="&nbsp">
                        <label for="password-confirm" class="label-input">{{ __('Conferma Password') }} *</label>
                    </div>
                    <div class="input">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" value="{{ old('address') }}" required autocomplete="address"
                            placeholder="&nbsp">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label for="address" class="label-input">{{ __('Indirizzo') }} *</label>
                    </div>
                    <div class="input">
                        <input id="vat_id" type="text" class="form-control @error('vat_id') is-invalid @enderror"
                            name="vat_id" value="{{ old('vat_id') }}" required autocomplete="off" placeholder="&nbsp">
                        @error('vat_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>Partita IVA già presente</strong>
                            </span>
                        @enderror
                        <label for="vat_id" class="label-input">{{ __('Partita IVA') }} *</label>
                    </div>
                    <div class="input h-100-px d-flex flex-column flex-sm-row align-items-center gap-2">
                        <label for="restaurant_img" class="label-input-file">Aggiungi immagine *</label>
                        <input class="input-file" name="restaurant_img" required type="file" id="restaurant_img" onchange="PreviewImage();">
                        <img id="uploadPreview" class="inactive" style="width: 100px; height: 100px;" />
                    </div>

                    <p>Seleziona la Tipologia</p>
                    <div class="checkbox-wrapper">
                        @foreach ($types as $type)
                            <div class="checkbox-input">
                                <input class="my-checkbox" name="types[]" type="checkbox" value="{{ $type->id }}"
                                    id="type_{{ $type->id }}" @checked(in_array($type->id, old('types', [])))>
                                <label class="form-check-label" for="type_{{ $type->id }}">
                                    {{ $type->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary orange">
                        {{ __('Registra') }}
                    </button>
                </form>
                <p class="info">Se sei già registrato <a class="form-link" href="{{ route('login') }}">clicca qui</a>
                </p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        pwDomEl = document.getElementById('password');
        pwConfirmDomEl = document.getElementById('password-confirm');
        pwError = document.getElementById('password-error');
        imgPrevDomEl = document.getElementById("uploadPreview");
        imgDomEl = document.getElementById("restaurant_img");

        function validateMyForm() {
            console.log(imgDomEl);  
            if (pwDomEl.value != pwConfirmDomEl.value) {
                // alert("validation failed false");
                pwError.classList.remove('inactive');
                window.scrollTo(top);
                return false;
            }

            if (imgDomEl.value == null) {
                pwError.classList.remove('inactive');
                window.scrollTo(top);
                return false;
            }
            pwError.classList.add('inactive');
            // alert("validations passed");
            return true;
        }


        function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("restaurant_img").files[0]);
        oFReader.onload = function (oFREvent) {
            imgPrevDomEl.classList.remove('inactive');
            imgPrevDomEl.src = oFREvent.target.result;
        };
    };
    </script>

@endsection
