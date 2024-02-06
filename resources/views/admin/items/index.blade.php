@extends('layouts.app')

@section('content')
    {{-- <section class="main-section">
        <div class="container my-3">
            <div class="row gap-2">
                <h2 class="text-center">
                    Items
                </h2>
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th>
                                <a class="btn btn-success" href="{{ route('admin.items.create', ['slug'=>Auth::user()->slug]) }}">New Items</a>
                            </th>
                        </tr>
                    </thead>
                    @forelse ($items as $item)
                        <tbody>
                            <tr class="align-middle">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->image }}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <a class="btn btn-primary" href="{{ route('admin.items.show', ['slug'=>Auth::user()->slug, 'item'=>$item])}}">More
                                        Info</a>
                                    <a href="{{ route('admin.items.edit', ['slug'=>Auth::user()->slug, 'item'=>$item]) }}" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                        @empty
                            non ci sono risultati
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section> --}}

    <div class="container">
        <div class="wrapper-card-item">

            @foreach ($items as $item)
                
            <div class="card-item">
               

												
											
                <figure class="card-image"><img src="{{ asset('storage/' . $item->item_img) }}" alt="image"></figure>
                <div class="body-card">
                    <h4 class="body-card-title">{{$item->name}}</h4>
                    <h3 class="body-card-price">&euro; {{$item->price}}</h3>
                    <a class="btn btn-primary orange" href="{{ route('admin.items.show', ['slug'=>Auth::user()->slug, 'item'=>$item])}}">Dettagli</a>
                </div>
            </div>
            @endforeach
            
            
        </div>
    </div>
    @endsection

