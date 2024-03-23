<x-app-layout layout="landing">
    <div class="container mt-3">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <h3>Selamat datang di {{ env('APP_INISIAL') }}</h3>
                                <p>sebagai media transfaransi pengelolaan zakat {{ env('APP_SUBNAME') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="{{asset('images/dashboard/top-header.png')}}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{asset('images/dashboard/top-header1.png')}}" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{asset('images/dashboard/top-header2.png')}}" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{asset('images/dashboard/top-header3.png')}}" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{asset('images/dashboard/top-header4.png')}}" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                <img src="{{asset('images/dashboard/top-header5.png')}}" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
            </div>
        </div>
        <div class="card m-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-bottom border-4 border-0 border-info">
                        <div class="card bg-success mb-1">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="h3 p-3 rounded bg-soft-light text-white">
                                            Fitrah
                                        </div>
                                    </div>
                                    <div>
                                        <div class="badge m-3">
                                            <span class="h4 text-white">Uang:</span>
                                            <span class="badge bg-primary"><b class="h4 text-white">Rp.{{ number_format($sisaPemasukanFitrah, 0) }}.-</b></span>
                                        </div>
                                        <h6 class="text-white">Beras: {{ number_format($totalSaldoBerasLFitrah, 1) }} Liter &amp; {{ number_format($totalSaldoBerasKgFitrah, 0) }} Kg</h6>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-bottom border-4 border-0 border-info">
                        <div class="card bg-success mb-1">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="h3 p-3 rounded bg-soft-light text-white">
                                            Fidyah
                                        </div>
                                    </div>
                                    <div>
                                        <div class="badge m-3">
                                            <span class="h4 text-white">Uang:</span>
                                        </div>
                                        <span class="badge bg-primary"><b class="h4 text-white">Rp.{{ number_format($sisaPemasukanFidyah, 0) }}.-</b></span>
                                        <h6 class="text-white">Beras: {{ number_format($totalSaldoBerasKgFidyah, 1) }} Liter &amp; {{ number_format($totalSaldoBerasLFidyah, 0) }} Kg</h6>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-bottom border-4 border-0 border-info">
                        <div class="card bg-success mb-1">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="h3 p-3 rounded bg-soft-light text-white">
                                            Maal
                                        </div>
                                    </div>
                                    <div>
                                        <div class="badge m-3">
                                            <span class="h4 text-white">Uang:</span>
                                        </div>
                                        <span class="badge bg-primary"><b class="h4 text-white">Rp.{{ number_format($sisaPemasukanMaal, 0) }}.-</b></span>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-bottom border-4 border-0 border-info">
                        <div class="card bg-success mb-1">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="h3 p-3 rounded bg-soft-light text-white">
                                            Infaq
                                        </div>
                                    </div>
                                    <div>
                                        <div class="badge m-3">
                                            <span class="h4 text-white">Uang:</span>
                                        </div>
                                        <span class="badge bg-primary"><b class="h4 text-white">Rp.{{ number_format($sisaPemasukanInfaq, 0) }}.-</b></span>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="mb-3">
                                <h4>Area Distribusi dan Jumlah Mustahiq</h4>
                            </div>
                            <div class="border rounded">
                                <div id="extrachart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>
            <span class="badge rounded-pill bg-success text-start"> Masjid Alhasanah <span class="badge rounded-pill bg-light text-dark m-3"> Taman Meruya III, Blok B13 No.1, Kembangan, Jakarta Barat | +6221 256 844 72</span></span>
            </h3>
        </div>
    </div>
    </div>

    </div>
    </div>

</x-app-layout>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div id="extrachart"></div>

@php
    $greenColors = [
        '#5cb85c', '#4cae4c', '#449d44', '#398439', '#2e732e',
        '#256625', '#1b541b', '#104410', '#0a330a', '#032203',
        '#0a330a', '#104410', '#1b541b', '#256625', '#2e732e',
        '#398439', '#449d44', '#5cb85c' 
    ];
@endphp

<script>
    $(document).ready(function() {
        let seriesData = [];

        @php
            $colorIndex = 0;
        @endphp

        @foreach($rtData as $index => $data)
            @if($index < count($rtLabels) - 1)
                seriesData.push({
                    name: 'RT{{ str_pad($index + 1, 3, "0", STR_PAD_LEFT) }}',
                    data: [{{ $data }}],
                    color: '{{ $greenColors[$colorIndex++] }}'
                });
            @endif
        @endforeach

        seriesData.push({
            name: 'Wilayah Lainnya',
            data: [{{ end($rtData) }}],
            color: '{{ $greenColors[count($rtLabels) - 1] }}' 
        });

        const options = {
            series: seriesData,
            chart: {
                type: 'bar',
                height: 500,
                sparkline: {
                    enabled: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '58%',
                    borderRadius: 6,
                },
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                show: true,
                width: 2,
                curve: 'smooth',
                colors: ['transparent']
            },
            xaxis: {
                categories: ['JUMLAH MUSTAHIQ BERDASARKAN AREA '],
            },
            yaxis: {
                title: {
                    text: ''
                },
                max: 100, // Batas tinggi grafik
                tickAmount: 5 // Jumlah label pada sumbu y
            },
            fill: {
                opacity: 1,
                colors: @json($greenColors)
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "" + val + " Jiwa"
                    }
                }
            }
        };
        
        const chart = new ApexCharts(document.querySelector("#extrachart"), options);
        chart.render();
    }); 
</script>



