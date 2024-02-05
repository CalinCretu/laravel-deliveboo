@extends('layouts.app')

@section('content')
<div class="section-dashboard my-5">
    <div class="container d-flex gap-2">
        <div class="sidebar">
            @include('admin.partials.sidebar')
        </div>
        <div class="dashboard-card-body p-0">
            <div class="card-img">
                <img class="resturant-img" src="{{Vite::asset('resources/img/dashboard.jpg')}}" alt="">
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
                <div class="d-flex flex-wrap card-border">
                    <div class="col-4 p-1">
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
                    </div>
                    <div class="col-4 p-1">
                        <img class="item-img" src="{{Vite::asset('resources/img/double-burger.jpg')}}" alt="">
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center p-1 position-relative">
                            <img class="item-img item-img-blur" src="{{Vite::asset('resources/img/double-burger.jpg')}}" alt="">
                        <div class="show-more">
                            <a href="{{ route('admin.items.index', $user->slug, ) }}">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex card-border">
                <img class="statistic-img" src="{{Vite::asset('resources/img/Cattura.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection