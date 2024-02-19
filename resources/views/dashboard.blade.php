@extends('layouts.app')

@section('content')
<div class="section-dashboard my-5">
    <div class="container">
        <div class="dashboard-card-body">
            <div class="card-img">
                @if ($user->restaurant_img)
                <img class="resturant-img" src="{{asset('storage/' . $user->restaurant_img)}}" alt="poster">
                @else
                <img class="resturant-img" src="{{Vite::asset('resources/img/dashboard.jpg')}}" alt="">
                    
                @endif

                
              
                
                <div class="user-detail-card"> 
                    <ul>
                        <li class="business-name">{{$user->business_name}}</></li>
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
                    
                    @endforeach
                    
                        <div class="show-more">
                            <a href="{{ route('admin.items.index', $user->slug) }}" class="btn">
                                Vai al menù completo
                                
                            </a>
                        </div>
                   
                </div>
            </div>
            <div class="statistics-card">
                <h3 class="title-card">Statistiche ordini</h3>
                {{-- <img class="statistic-img" src="{{Vite::asset('resources/img/Cattura.png')}}" alt=""> --}}
                <canvas id="my-chart"></canvas>
                <div class="btn-statistics">
                    <a href="{{route('admin.items.statistics', ['slug'=> $user->slug, 'year'=> 2024 ])}}">
                        Vedi tutte le statistiche
                    </a>
                </div>
            </div>
        </div>
        

                    
                
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
       
        const ctx = document.getElementById('my-chart');
        const dataArray = {!! json_encode($dataMonths) !!};
       
        const labels = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ordini per Mese',
                    data: dataArray,
                    borderWidth: 1,
                    borderColor: '#FC8019',
                    backgroundColor: '#FC8019',
                    fill: false,
                    tension: 0.1
                }]
            },

            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });

       

       
       
    </script>
@endsection