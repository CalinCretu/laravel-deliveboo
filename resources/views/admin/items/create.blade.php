@extends('layouts.app')

@section('dashboard')
    <a class="dropdown-item" href="{{ route('dashboard', $user->slug) }}">{{ __('Dashboard') }}</a>
@endsection

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="form-container">
                <div class="form-title">
                    <h2>Aggiungi un nuovo piatto</h2>
                </div>
                <form action="{{ route('admin.items.store', ['slug' => $user->slug]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input">
                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                            value="{{ old('name') }}" required>
                        <label for="name" class="label-input">Nome</label>
                    </div>
                    <div class="input">
                        <textarea type="text" class="description" name="description" id="description" autocomplete="off"
                            value="{{ old('description') }}" required></textarea>
                        <label for="description" class="label-input">Descrizione</label>
                    </div>
                    <div class="input">
                        <input type="number" class="form-control" name="price" id="price" autocomplete="off"
                            value="{{ old('price') }}" required step="0.01" min="0">

                        <label for="price" class="label-input">Prezzo</label>
                    </div>
                    <div class="input h-100-px d-flex flex-column flex-sm-row align-items-center gap-4">
                        <label for="item_img" class="label-input-file">Aggiungi immagine</label>
                        <input class="input-file" name="item_img" type="file" id="item_img" required
                            onchange="PreviewImage();">
                        {{-- <input class="input-file" name="restaurant_img" required type="file" id="restaurant_img"> --}}
                        <img id="uploadPreview" class="inactive" style="width: 80px; height: 80px;" />
                    </div>
                    <div class="checkbox-wrapper">
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_vegan" id="is_vegan">
                            <label for="is_vegan">Vegano</label>
                        </div>
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_gluten_free" id="is_gluten_free">
                            <label for="is_gluten_free">Senza glutine</label>
                        </div>
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_spicy" id="is_spicy">
                            <label for="is_spicy">Piccante</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary orange" value="Aggiungi">
                    </div>
                </form>
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

    <script>
        imgPrevDomEl = document.getElementById("uploadPreview");
        
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("item_img").files[0]);
            oFReader.onload = function(oFREvent) {
                imgPrevDomEl.classList.remove('inactive');
                imgPrevDomEl.src = oFREvent.target.result;
            };
        }
    </script>
@endsection
