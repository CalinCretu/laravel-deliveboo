@extends('layouts.app')

@section('dashboard')
    <a class="dropdown-item" href="{{ route('dashboard', $user->slug) }}">{{ __('Dashboard') }}</a>
@endsection

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="form-container">
                <div class="form-title">
                    <h2>Modifica il piatto</h2>
                </div>
                <form action="{{ route('admin.items.update', $item) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input">
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $item->name) }}">
                        <label for="name" class="label-input">Nome</label>
                    </div>
                    <div class="input">
                        <textarea type="text" class="description" name="description" id="description">{!! old('description', $item->description) !!}</textarea>
                        <label for="description" class="label-input">Descrizione</label>
                    </div>
                    <div class="input">
                        <input type="number" class="form-control" name="price" id="price"
                            value="{{ old('price', $item->price) }}" step="0.01">
                        <label for="price" class="label-input">Prezzo</label>
                    </div>
                    <div class="input d-flex">
                        <label for="item_img" class="label-input-file">Modifica immagine</label>
                        <input class="input-file" name="item_img" value="{{ old('item_img', $item->item_img) }}"
                            type="file" id="item_img">
                    </div>
                    <div class="checkbox-wrapper">
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_vegan" id="is_vegan"
                                @checked(old('is_vegan', $item->is_vegan))>
                            <label for="is_vegan">Vegano</label>
                            <span>Value: {{ $item->is_vegan }}</span>
                        </div>
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_gluten_free" id="is_gluten_free"
                                @checked(old('is_gluten_free', $item->is_gluten_free))>
                            <label for="is_gluten_free">Senza glutine</label>
                            <span>Value: {{ $item->is_gluten_free }}</span>
                        </div>
                        <div class="checkbox-input">
                            <input class="my-checkbox" type="checkbox" name="is_spicy" id="is_spicy"
                                @checked(old('is_spicy', $item->is_spicy))>
                            <label for="is_spicy">Piccante</label>
                            <span>Value: {{ $item->is_spicy }}</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary orange" value="Modifica">
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

<body>

</body>

</html>
