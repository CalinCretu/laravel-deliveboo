@extends('layouts.app')

@section('content')
<div class="section-dashboard my-5">
    <div class="container">
        <div class="dashboard-card-body p-0">
            <div class="card-img">
                @if ($user->restaurant_img)
                <img class="resturant-img" src="{{asset('storage/' . $user->restaurant_img)}}" alt="poster">
                @else
                <img class="resturant-img" src="{{Vite::asset('resources/img/dashboard.jpg')}}" alt="">
                    
                @endif

                
              
                
                <div class="user-detail-card"> 
                    <ul>
                        <li class="buisness-name">{{$user->business_name}}</></li>
                        <li class="user-detail">{{$user->email}}</></li>
                        <li class="user-detail">{{$user->address}}</></li>
                        <li class="user-detail">{{$user->vat_id}}</li>
                    </ul>
                </div>
            </div>
            <div class="shop-detail-card">
               
                    <h3 class="title-card">Ultimi piatti inseriti</h3>
                
                <div class="items-grid">
                    @foreach ($last_items as $item)
               
                    <div class="item">
                        <img class="item-img" src="{{asset('storage/' . $item->item_img)}}" alt="">
                        <span class="name">{{ $item->name }}</span>
                    </div>
                    {{-- <div class="col-4 p-1">
                        <img class="item-img" src="{{Vite::asset('resources/img/double-burger.jpg')}}" alt="">
                    </div>
                    <div class="col-4 p-1">
                        <img class="item-img" src="{{Vite::asset('resources/img/double-burger.jpg')}}" alt="">
                    </div>
                    <div class="col-4 p-1">
                        <img class="item-img" src="{{Vite::asset('resources/img/double-burger.jpg')}}" alt="">
                    </div>
                    <div class="col-4 p-1">
                        <img class="item-img" src="{{Vite::asset('resources/img/double-burger.jpg')}}" alt="">
                    </div> --}}
                    @endforeach
                    {{-- <div class="">
                            <img class="item-img item-img-blur" src="{{Vite::asset('resources/img/double-burger.jpg')}}" alt=""> --}}
                        <div class="show-more">
                            <a href="{{ route('admin.items.index', $user->slug) }}" class="btn">
                                Vai al menù completo
                                {{-- <i class="fa-solid fa-plus"></i> --}}
                            </a>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
            <div class="d-flex card-border justify-content-center align-items-center p-1 position-relative">
                <img class="statistic-img" src="{{Vite::asset('resources/img/Cattura.png')}}" alt="">
                <div class="show-more">
                    <a href="{{route('admin.items.statistics', ['slug'=> $user->slug, 'year'=> 2024 ])}}">
                        <i class="fa-solid fa-plus plus-dark"></i>
                    </a>
                </div>
            </div>
        </div>
        

                    
                
    </div>
</div>
@endsection