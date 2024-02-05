@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper">
        <div class="form-container">
            <div class="form-title"><h2>Modifica il piatto</h2></div>

            <form action="{{ route('admin.items.update', $item) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="input">
                    <input type="text" class="form-control" name="name" id="name" 
                    value="{{ old('name', $item->name) }}">
                    <label for="name" class="label-input">Nome</label>
                </div>
                <div class="input">
                    <textarea type="text" class="description" name="description" id="description" >{!! old('description', $item->description) !!}</textarea>
                    <label for="description" class="label-input">Description</label>
                </div>
                <div class="input">
                    <input type="number" class="form-control" name="price" id="price" 
                    value="{{ old('price', $item->price) }}">
                    <label for="price" class="label-input">Prezzo</label>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="item_img" id="item_img" placeholder="item Image"
                    value="{{ old('item_img', $item->item_img) }}">
                    <label for="item_img" class="form-label">Image</label>
                </div>

                <div class="checkbox-wrapper">
                    <div class="checkbox-input">
                        <input class="my-checkbox" type="checkbox" name="is_vegan" id="is_vegan" value="{{ old('is_vegan', $item->is_vegan) }}">
                        <label for="is_vegan">Vegano</label>
                    </div>

                    <div class="checkbox-input">
                        <input class="my-checkbox" type="checkbox" name="is_gluten_free" id="is_gluten_free" value="{{ old('is_gluten_free', $item->is_gluten_free) }}">
                        <label for="is_gluten_free">Senza glutine</label>
                    </div>

                    <div class="checkbox-input">
                        <input class="my-checkbox" type="checkbox" name="is_spicy" id="is_spicy" value="{{ old('is_spicy', $item->is_spicy) }}">
                        <label for="is_spicy">Piccante</label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary orange" value="Modifica">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<body>
    
</body>

</html>
