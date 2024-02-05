@extends('layouts.app')

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
                            value="{{ old('price') }}" required>
                        <label for="price" class="label-input">Prezzo</label>
                    </div>
                    <div class="input d-flex">
                        <label for="item_img" class="label-input-file">Aggiungi immagine</label>
                        <input class="input-file" name="item_img" type="file" id="item_img">
                    </div>
                    <div class="checkbox-wrapper">
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_vegan" id="is_vegan" value="1">
                            <label for="is_vegan">Vegano</label>
                        </div>
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_gluten_free" id="is_gluten_free"
                                value="1">
                            <label for="is_gluten_free">Senza glutine</label>
                        </div>
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_spicy" id="is_spicy" value="1">
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
@endsection
