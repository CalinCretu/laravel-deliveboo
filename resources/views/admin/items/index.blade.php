@extends('layouts.app')

@section('dashboard')
    <a class="dropdown-item" href="{{ route('dashboard', $user->slug) }}">{{ __('Dashboard') }}</a>
@endsection

@section('content')
    <div class="container index-container">
        <div class="wrapper-card-item">
            <div class="card-item green-item">
                <figure class="card-image"><img src="{{ asset('storage/default_img/pasta-pesto.jpg') }}" alt="image"></figure>
                <div class="body-card">
                    <a class="btn btn-primary create"
                            href="{{ route('admin.items.create', ['slug' => Auth::user()->slug]) }}">Aggiungi Piatto</a>
                </div>
            </div>
            @foreach ($items as $item)
                <div class="card-item orange-item">
                    <figure class="card-image"><img src="{{ asset('storage/' . $item->item_img) }}" alt="image"></figure>
                    <div class="body-card">
                        <h4 class="body-card-title">{{ $item->name }}</h4>
                        <h3 class="body-card-price">&euro; {{ $item->price }}</h3>
                        <a class="btn btn-primary orange"
                            href="{{ route('admin.items.show', ['slug' => Auth::user()->slug, 'item' => $item]) }}">Dettagli</a>
                    </div>
                    <div class="buttons">
                        <a href="{{ route('admin.items.edit', ['slug' => Auth::user()->slug, 'item' => $item]) }}"
                            class="edit-btn">Modifica</a>
                        <button class="delete-btn">Elimina</button>
                    </div>
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
            @endforeach
        </div>
    </div>

    <script>
        const deleteDomEl = document.querySelectorAll(".delete-btn");
        const formDomEl = document.querySelectorAll(".bg-form");
        const noBtnDomEl = document.querySelectorAll(".return-btn");

        for (let i = 0; i < deleteDomEl.length; i++) {
            deleteDomEl[i].addEventListener('click', function() {
                // console.log('delete');
                formDomEl[i].classList.add("active")
            })
        }
        for (let i = 0; i < deleteDomEl.length; i++) {
            noBtnDomEl[i].addEventListener('click', function() {
                formDomEl[i].classList.remove("active");
            })
        }
    </script>
@endsection
