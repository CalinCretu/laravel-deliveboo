@extends('layouts.app')

@section('dashboard')
    <a class="dropdown-item" href="{{ route('dashboard', $user->slug) }}">{{ __('Dashboard') }}</a>
@endsection

@section('content')
    <section class="items-show">
        <div class="wrapper">
            <div class="cards">
                <div class="buttons">
                    <a href="{{ route('admin.items.edit', ['slug' => Auth::user()->slug, 'item' => $item]) }}"
                        class="edit-btn">Modifica</a>
                    <button id="myBtn" class="delete-btn">Elimina</button>
                </div>
                <div class="card image-card col-auto">
                    <img src="{{ asset('storage/' . $item->item_img) }}" class="" alt="">
                </div>
                <div class="card description-card col-auto">
                    <div class="item-name">{{ $item->name }}</div>
                    <ul class="ps-0">
                        <li>{{ $item->description }}</li>
                        <li class="price">&euro; {{ $item->price }}</li>
                    </ul>
                    <div class="flags">
                        <div class="label-spicy" style="{{ $item->is_spicy ? '' : 'display: none;' }}"><i
                                class="fa-solid fa-pepper-hot"></i>Piccante</div>
                        <div class="label-veg" style="{{ $item->is_vegan ? '' : 'display: none;' }}"><i
                                class="fa-solid fa-seedling"></i>Vegano</div>
                        <div class="label-gf" style="{{ $item->is_gluten_free ? '' : 'display: none;' }}"><i
                                class="fa-solid fa-wheat-awn-circle-exclamation"></i>Senza Glutine</div>
                    </div>
                </div>
                <a class="next-item"
                    href="{{ route('admin.items.show', ['slug' => Auth::user()->slug, 'item' => $nextItemId]) }}">&rsaquo;</a>
                <a class="previous-item"
                    href="{{ route('admin.items.show', ['slug' => Auth::user()->slug, 'item' => $previousItemId]) }}">&lsaquo;</a>
            </div>
            <div id="bgForm" class="bg-form">
                <div class="delete-form">
                    <h4>Confermi di voler eliminare {{ $item->name }}?</h4>
                   <div class="bg-form-buttons">
                        <form action="{{ route('admin.items.destroy', ['item' => $item]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">Si</button>
                        </form>
                        <button class="return-btn">No</button>
                   </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const deleteDomEl = document.getElementById("myBtn");
        const formDomEl = document.getElementById("bgForm");
        const noBtnDomEl = document.querySelector(".return-btn");
        const anotherItemBtn = document.getElementById("anotherItemBtn");

        // console.log(formDomEl);

        deleteDomEl.addEventListener('click', function() {
            console.log('delete');
            formDomEl.classList.add("active")
        })

        noBtnDomEl.addEventListener('click', function() {
            formDomEl.classList.remove("active");
        })
    </script>
@endsection
