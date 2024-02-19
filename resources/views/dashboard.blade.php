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
            <div class="d-flex card-border justify-content-center align-items-center p-1 position-relative">
                {{-- <img class="statistic-img" src="{{Vite::asset('resources/img/Cattura.png')}}" alt=""> --}}
                <canvas id="Chart"></canvas>
                <div class="show-more">
                    <a href="{{route('admin.items.statistics', ['slug'=> $user->slug, 'year'=> 2024 ])}}">
                        <i class="fa-solid fa-plus plus-dark"></i>
                    </a>
                </div>
            </div>
        </div>
        

                    
                
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- <script>
        const yearSelect = document.getElementById('yearSelect');
        const ctx = document.getElementById('myChart');
        // const dataArray = {!! json_encode($dataMonths) !!};
        const dataAmountArray = {!! json_encode($totalSalesByMonth) !!};
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

        new Chart(
            document.getElementById('Chart'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Vendite per Mese',
                        data: dataAmountArray,
                        borderWidth: 2,
                        borderColor: '#FC8019',
                        backgroundColor: 'rgba(252, 128, 25, 0.3)',
                        // yAxisID: '€';
                    }]
                }
            }
        );

        yearSelect.addEventListener('change', function() {
            var selectedYear = yearSelect.value;
            var slug = "{{ $user->slug }}";
            window.location.href = "{{ route('admin.items.statistics', ['slug' => ':slug', 'year' => ':year']) }}"
                .replace(':slug', slug)
                .replace(':year', selectedYear);
        });
    </script> --}}
@endsection