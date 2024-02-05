@extends('layouts.app')

@section('dashboard')
    <a class="dropdown-item" href="{{ route('dashboard', $user->slug) }}">{{ __('Dashboard') }}</a>
@endsection

@section('content')
    <div class="container my-4">
        <div class="row justify-content-between row-gap-4">
            <div class="col-12 col-md-5">
                <div class="card-orders">
                    <div class="orders-title">I miei ordini</div>
                    <div class="orders-filter d-flex flex-column flex-md-row">
                        <button class="filter-button date-button">Più recenti</button>
                        <button class="filter-button price-button">Per Prezzo</button>
                    </div>
                    <div class="orders-content">
                        @foreach ($orders as $index => $order)
                            <button type="button" class="btn-order date-orders">
                                <div class="orders-details flex-column flex-md-row">
                                    <div class="order-id">
                                        <div>Ordine #{{ $order->id }}</div>
                                        <div class="order-date">{{ date('d/m/Y H:i:s', strtotime($order->order_date)) }}
                                        </div>
                                    </div>
                                    <div class="order-price">&euro;&nbsp;{{ $order->total_price }}</div>
                                </div>
                            </button>
                        @endforeach
                        @foreach ($orders_amount as $index => $order)
                            <button type="button" class="btn-order price-orders inactive">
                                <div class="orders-details flex-column flex-md-row">
                                    <div class="order-id">
                                        <div>Ordine #{{ $order->id }}</div>
                                        <div class="order-date">{{ date('d/m/Y H:i:s', strtotime($order->order_date)) }}
                                        </div>
                                    </div>
                                    <div class="order-price">&euro;&nbsp;{{ $order->total_price }}</div>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-order card-date">
                    @foreach ($orders as $index => $order)
                        <div class="order-info-date inactive">
                            <div class="order-info">
                                <div class="order-title">Dettagli Ordine</div>
                                <div class="title-or">Ordine #{{ $order->id }}</div>
                                <div class="order-line order-section ">
                                    <div>Data Ordine: {{ date('d/m/Y', strtotime($order->order_date)) }}</div>
                                    <div>Orario Ordine: {{ date('H:i:s', strtotime($order->order_date)) }}</div>
                                </div>
                                <div class="title-or">Info Cliente</div>
                                <div class="order-line"><span>Indirizzo di consegna </span>{{ $order->client_address }}
                                </div>
                                <div class="order-line"><span>Nome Cliente</span> {{ $order->client_name }}</div>
                                <div class="order-line"><span>Telefono Cliente</span> {{ $order->client_phone }}</div>
                                <div class="order-line order-section"><span>Email Cliente</span> {{ $order->client_email }}
                                </div>
                                <div class="title-or">Contenuto Ordine</div>
                                <div class="order-section order-menu">
                                    @foreach ($order->items as $item)
                                        <div class="order-line">
                                            <div>{{ $item->name }} x{{ $item->pivot->quantity }}</div>
                                            <div>&euro;&nbsp;{{ $item->pivot->partial_price }}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="order-line title-or"><span>Totale
                                        Ordine</span>&euro;&nbsp;{{ $order->total_price }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-order card-price inactive">
                    @foreach ($orders_amount as $index => $order)
                        <div class="order-info-price inactive">
                            <div class="order-info">
                                <div class="order-title">Dettagli Ordine</div>
                                <div class="title-or">Ordine #{{ $order->id }}</div>
                                <div class="order-line order-section ">
                                    <div>Data Ordine: {{ date('d/m/Y', strtotime($order->order_date)) }}</div>
                                    <div>Orario Ordine: {{ date('H:i:s', strtotime($order->order_date)) }}</div>
                                </div>
                                <div class="title-or">Info Cliente</div>
                                <div class="order-line"><span>Indirizzo di consegna </span>{{ $order->client_address }}
                                </div>
                                <div class="order-line"><span>Nome Cliente</span> {{ $order->client_name }}</div>
                                <div class="order-line"><span>Telefono Cliente</span> {{ $order->client_phone }}</div>
                                <div class="order-line order-section"><span>Email Cliente</span> {{ $order->client_email }}
                                </div>
                                <div class="title-or">Contenuto Ordine</div>
                                <div class="order-section order-menu">
                                    @foreach ($order->items as $item)
                                        <div class="order-line">
                                            <div>{{ $item->name }} x{{ $item->pivot->quantity }}</div>
                                            <div>&euro;&nbsp;{{ $item->pivot->partial_price }}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="order-line title-or"><span>Totale
                                        Ordine</span>&euro;&nbsp;{{ $order->total_price }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        let currentOrder = 0;
        let dateFilter = true;
        const ordersDateDomEl = document.querySelectorAll(".order-info-date");
        const ordersPriceDomEl = document.querySelectorAll(".order-info-price");
        const dateFilterDomEl = document.querySelector(".date-button");
        const priceFilterDomEl = document.querySelector(".price-button");
        const dateOrdDomEl = document.querySelectorAll(".date-orders");
        const priceOrdDomEl = document.querySelectorAll(".price-orders");
        const cardDateDomEl = document.querySelector(".card-date");
        const cardPriceDomEl = document.querySelector(".card-price");
        const orderContentDomEl = document.querySelector(".orders-content");

        dateOrdDomEl[0].classList.add('selected');
        ordersDateDomEl[0].classList.remove('inactive');
        dateFilterDomEl.classList.add('filtered')

        for (let i = 0; i < dateOrdDomEl.length; i++) {
            dateOrdDomEl[i].addEventListener("click", function() {
                ordersDateDomEl[currentOrder].classList.add('inactive')
                dateOrdDomEl[currentOrder].classList.remove('selected')
                currentOrder = i;
                ordersDateDomEl[currentOrder].classList.remove('inactive')
                dateOrdDomEl[currentOrder].classList.add('selected')
            });
        }

        for (let i = 0; i < priceOrdDomEl.length; i++) {
            priceOrdDomEl[i].addEventListener("click", function() {
                ordersPriceDomEl[currentOrder].classList.add('inactive')
                priceOrdDomEl[currentOrder].classList.remove('selected')
                currentOrder = i;
                ordersPriceDomEl[currentOrder].classList.remove('inactive')
                priceOrdDomEl[currentOrder].classList.add('selected')
            });
        }

        dateFilterDomEl.addEventListener("click", function() {
            if (dateFilter == false) {
                orderContentDomEl.scroll({
                    top: 0,
                    behavior: 'smooth'
                });
                ordersPriceDomEl[currentOrder].classList.add('inactive')
                priceOrdDomEl[currentOrder].classList.remove('selected')
                currentOrder = 0;
                ordersDateDomEl[currentOrder].classList.remove('inactive')
                dateOrdDomEl[currentOrder].classList.add('selected')
                priceFilterDomEl.classList.remove('filtered');
                dateFilter = true;
                dateFilterDomEl.classList.add('filtered');
                dateOrdDomEl.forEach(element => {
                    element.classList.remove('inactive')
                });
                priceOrdDomEl.forEach(element => {
                    element.classList.add('inactive')
                });
                cardDateDomEl.classList.remove('inactive');
                cardPriceDomEl.classList.add('inactive');
            }
        });


        priceFilterDomEl.addEventListener("click", function() {
            if (dateFilter) {
                orderContentDomEl.scroll({
                    top: 0,
                    behavior: 'smooth'
                });
                ordersDateDomEl[currentOrder].classList.add('inactive')
                dateOrdDomEl[currentOrder].classList.remove('selected')
                currentOrder = 0;
                ordersPriceDomEl[currentOrder].classList.remove('inactive')
                priceOrdDomEl[currentOrder].classList.add('selected')
                dateFilterDomEl.classList.remove('filtered');
                dateFilter = false;
                priceFilterDomEl.classList.add('filtered');
                dateOrdDomEl.forEach(element => {
                    element.classList.add('inactive')
                });
                priceOrdDomEl.forEach(element => {
                    element.classList.remove('inactive')
                });
                cardDateDomEl.classList.add('inactive');
                cardPriceDomEl.classList.remove('inactive');
            }
        });
    </script>
@endsection
