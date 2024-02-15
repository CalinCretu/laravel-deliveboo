@extends('layouts.app')

@section('dashboard')
    <a class="dropdown-item" href="{{ route('dashboard', $user->slug) }}">{{ __('Dashboard') }}</a>
@endsection

@section('content')
    <div class="container row my-5 justify-content-center row-gap-5">
      <div class="col-12 d-flex justify-content-center align-items-center gap-4">
        <h1 class="">Statistiche Ordini {{$selectedYear}}</h1>
        <select name="year" id="yearSelect">
          @foreach ($years as $year)
              <option class="yearOption" value="{{ $year }}" @if ($year == $selectedYear) selected @endif>{{ $year }}</option>
          @endforeach
      </select>
      </div>
        <div class="col-10">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-10">
            <canvas id="Chart"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const yearSelect = document.getElementById('yearSelect');
        const ctx = document.getElementById('myChart');
        const dataArray = {!! json_encode($dataMonths) !!};
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
    </script>
@endsection
