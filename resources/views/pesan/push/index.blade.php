<x-app-layout :assets="$assets ?? []">
    {!! Form::open(['route' => ['push.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
    @csrf

    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">Push Pesan</h4>
                            <div class="form-group col-md-12">
                           <label class="form-label" for="fname">Kategori : <span class="text-danger">*</span></label>
                           {{ Form::select('tenplate', $t, "", ['class' => 'form-control', 'placeholder' => 'Select tenplate Pesan', 'id' => 'Kategori']) }}
                        </div>                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th data-bs-toggle="tooltip" title="Ceklis jika ingin mengirim pesan" class="text-center"><input class="form-check-input " disabled type="checkbox" data-bs-toggle="tooltip" title="Edit target"></th>
                                        <th data-bs-toggle="tooltip" title="pesan terkirim jika nomornya diawali dengan 62">Nomor Target</th>
                                        <th>Jumlah Psuh</th>
                                        <!-- <th>Aksi</th> -->
                                    </tr>
                                <tbody>
                                    @php $n = 1; @endphp
                                    @foreach ($nomor as $p)
                                    <tr>
                                        <td>{{ $n++ }}</td>
                                        <td class="text-center" data-bs-toggle="tooltip" title="Ceklis jika ingin mengirim pensan ke nomor {{ $p->nomor }}">
                                            @if (substr($p->nomor, 0, 2) !== '62')
                                            <input class="form-check-input" type="checkbox" id="" name="pushnomor[]" value="{{ $p->id }}" disabled>
                                            @else
                                            <input class="form-check-input" type="checkbox" id="" name="pushnomor[]" value="{{ $p->id }}">
                                            @endif
                                            <input class="form-check-input" type="hidden" id="" name="type1[]" value="1">
                                        </td>
                                        <td>{{ $p->nomor }}</td>
                                        <td data-bs-toggle="tooltip" title="nomor {{ $p->nomor }} sudah dikirim pesan seabanyak {{ $p->push }} kali">{{ $p->push }}</td>

                                    </tr>
                                    @endforeach


                                </tbody>


                            </table>
                            <div class="text-center">

                                <button class="btn btn-md btn-primary">
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Push Pesan
                                </button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
         var checkboxes = document.querySelectorAll('input[name="pushnomor[]"]');

        var idSet = 1;
 
        checkboxes.forEach(function(checkbox) { 
            if (idSet[checkbox.value]) {
                checkbox.checked = true;
            } else {
                idSet[checkbox.value] = true;
            }
        });
    });
</script> 