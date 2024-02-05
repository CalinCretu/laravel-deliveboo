@extends('layouts.app')

@section('content')
    <section class="items-show">
        <div class="wrapper">
            <div class="cards">
                <div class="card image-card col-auto">
                    <img src="{{ asset( 'storage/' . $item->item_img)}}" class="" alt="">
                </div>
                <div class="card description-card col-auto">
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
                <a class="next-item"
                    href="{{ route('admin.items.show', ['slug' => Auth::user()->slug, 'item' => $nextItemId]) }}">&rsaquo;</a>
                <a class="previous-item"
                    href="{{ route('admin.items.show', ['slug' => Auth::user()->slug, 'item' => $previousItemId]) }}">&lsaquo;</a>
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
    </section>

    <script>
        const deleteDomEl = document.getElementById("myBtn");
        const formDomEl = document.getElementById("bgForm");
        const noBtnDomEl = document.getElementById("noBtn");
        const anotherItemBtn = document.getElementById("anotherItemBtn");

        // console.log(formDomEl);

        deleteDomEl.addEventListener('click', function() {
            // console.log('delete');
            formDomEl.classList.add("active")
        })

        noBtnDomEl.addEventListener('click', function() {
            formDomEl.classList.remove("active");
        })
    </script>
@endsection
