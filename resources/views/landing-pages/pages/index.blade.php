<x-app-layout layout="landing">
    <style>
        .toast {
            z-index: 9999; /* Menjadikan elemen paling atas */
            position: fixed; /* Memastikan elemen tetap di posisi yang sama saat digulir */
            top: 50%; /* Menggeser elemen ke tengah vertikal */
            left: 50%; /* Menggeser elemen ke tengah horizontal */
            transform: translate(-50%, -50%); /* Menengahkan elemen */
        }
    </style>

     @if (session('success'))
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
                <strong class="me-auto">Pengajuan Mustahiq</strong>
                <small class="text-muted text-success">Successfully</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            Pengajuan anda berhasil ditambahkan
            </div>
        </div>
    @endif

    <div class="container m-auto mt-4">
        <div class="iq-navbar-header" style="height: 100px;">
            <div>
                <img src="{{asset('images/dashboard/header.jpg')}}" style="width: 60%;">
            </div>
        </div>

        <div class="row">
                <div class="col-md-6">
                    <div class="card border-bottom border-4 border-0 border-info">
                        <div class="card mb-1" style="background: #118146;">
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
                                            <span class="badge bg-primary"><b class="h4 text-white">Rp{{ number_format($sisaPemasukanFitrah, 0) }}.-</b></span>
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
                        <div class="card mb-1" style="background: #118146;">
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
                                        <span class="badge bg-primary"><b class="h4 text-white">Rp{{ number_format($sisaPemasukanFidyah, 0) }}.-</b></span>
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
                        <div class="card mb-1" style="background: #118146;">
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
                                        <span class="badge bg-primary"><b class="h4 text-white">Rp{{ number_format($sisaPemasukanMaal, 0) }}.-</b></span>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-bottom border-4 border-0 border-info">
                        <div class="card mb-1" style="background: #118146;">
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
                                        <span class="badge bg-primary"><b class="h4 text-white">Rp{{ number_format($sisaPemasukanInfaq, 0) }}.-</b></span>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="card mt-1">
            <div class="card-body">
                <div class="d-flex flex-column">
                    <div class="mb-5">
                        <h6 style="color: #118145;">Area Distribusi dan Jumlah Mustahiq</h6>
                    </div>
                    <div class="border rounded">
                        <div id="extrachart"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="width: 97%; margin: 30px auto;">
            <div class="row">
                <div class="col-md-3" style="background: #118146; border-radius: 50px 0 0 50px;">
                    <a href="{{ route('uisheet') }}">
                        <h6 class="text-white text-center mt-3">Masjid Al Hasanah</h6> 
                    </a>
                </div>
                <div class="col-md-9 bg-light" style="border-radius: 0 50px 50px 0;">
                    <p class="mt-3" style="color: #118146;">Taman Meruya Ilir, Blok B13 No.1, Kembangan, Jakarta Barat | +6221 256 844 72</p>
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
        '#398439', '#449d44', '#5cb85c', '#5cb85c'
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



