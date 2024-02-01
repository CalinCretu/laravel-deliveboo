<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js'])

</head>

<body>
    <div class="container">
        <form action="{{ route('admin.items.update', $item) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="item Name"
                    value="{{ old('name', $item->name) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="item Description">{!! old('description', $item->description) !!}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="item price"
                    value="{{ old('price', $item->price) }}">
            </div>
            <div class="mb-3">
                <label for="item_img" class="form-label">Image</label>
                <input type="text" class="form-control" name="item_img" id="item_img" placeholder="item Image"
                    value="{{ old('item_img', $item->item_img) }}">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-warning" value="Save">
            </div>
        </form>
    </div>
</body>

</html>
