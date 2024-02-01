<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/scss/partials/_show_item.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper">
        <div class="cards">
            <div class="card image-card">
                <img src="https://picsum.photos/200/150" class="card-img-top" alt="...">
            </div>
            <div class="card description-card">
                <h1>{{ $item->name }}</h1>
                <ul class="ps-0">
                    <li>{{ $item->description }}</li>
                    <li>&euro; {{ $item->price }}</li>
                </ul>
                <div class="flags">
                    <div style="{{ $item->is_spicy ? '' : 'display: none;' }}">Spicy</div>
                    <div style="{{ $item->is_vegan ? '' : 'display: none;' }}">Vegan</div>
                    <div style="{{ $item->is_gluten_free ? '' : 'display: none;' }}">Gluten Free</div>
                </div>
                <div class="buttons">
                    <a href="{{ route('admin.items.edit', ['slug' => Auth::user()->slug, 'item' => $item]) }}"
                        class="edit-btn">Edit</a>
                    <button id="myBtn" class="delete-btn">Delete</button>
                </div>
            </div>
        </div>
        <div id="bgForm" class="bg-form">
            <div class="d-flex gap-3 delete-form">
                <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-lg">Yes</button>
                </form>
                <button id="noBtn" class="btn btn-primary btn-lg">No</button>
            </div>
        </div>
    </div>
</body>

</html>
