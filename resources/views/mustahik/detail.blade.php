<x-app-layout :assets="$assets ?? []">
<div>
   <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Detail Mustahik</h4>
                        <h5>#{{ $mustahik->code }}</h5>
                         <i style="font-size: 11px;">Jakarta, <?= $mustahik->tanggal; ?></i>
                    </div>
                    <div class="card-action">
                        <a href="{{route('mustahik.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                    </div> 
                </div>  
                <br>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <div class="mt-2">
                                <h6 class="mb-1">Nama:</h6>
                                <p>{{ $mustahik->nama_lengkap }}</p>
                            </div>  
                            <div class="mt-2">
                                <h6 class="mb-1">Jenis Kelamin:</h6>
                                <p>{{ $mustahik->jenis_kelamin }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">No Handphone:</h6>
                                <p>{{ $mustahik->nomor_telp }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Status Perkawinan:</h6> 
                                <p>{{ $mustahik->status_perkawinan }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">RT/RW:</h6>
                                <p>{{ $mustahik->rt_rw }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Alamat:</h6>
                                <p>{{ $mustahik->alamat }}</p>
                            </div>
                        </div>      
                        <div class="form-group col-md-4">
                            <div class="mt-2">
                                <h6 class="mb-1">Pekerjaan:</h6>
                                <p>{{ $mustahik->pekerjaan }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Jumlah Pendapatan:</h6>
                                <p>{{ $mustahik->jumlah_pendapatan }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Jumlah Anak dalam Tanggungan:</h6>
                                <p>{{ $mustahik->jumlah_anak_dalam_tanggungan }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Jumlah Bansos Diterima:</h6>
                                <p>{{ $mustahik->jumlah_bansos_diterima }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Status Tempat Tinggal:</h6>
                                <p>{{ $mustahik->status_tempat_tinggal }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Pengeluaran Listrik & Kontrakan:</h6>
                                <p>{{ $mustahik->pengeluaran_kontrakan }}</p>
                            </div>
                        </div>  
                        <div class="form-group col-md-4">
                            <div class="mt-2">
                                <h6 class="mb-1">Jumlah Hutang:</h6>
                                <p>{{ $mustahik->jumlah_hutang }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Keperluan Hutang:</h6>
                                <p>{{ $mustahik->keperluan_hutang }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Kategori Mustahik:</h6>
                                <p>{{ $mustahik->kategori_mustahik }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Kategori Zakat Diterima:</h6>
                                @if(isset($mustahik->kategori))
                                    <p>{{ $mustahik->kategori->nama_kategori }}</p>
                                @else
                                    <p>N/A</p>
                                @endif
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Jumlah Uang Diterima:</h6>
                                <p>{{ $mustahik->jumlah_uang_diterima }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Jumlah Beras Diterima:</h6>
                                <p>{{ $mustahik->jumlah_beras_diterima }}</p>
                            </div>
                            <div class="mt-2">
                                <h6 class="mb-1">Keterangan:</h6>
                                <p>{{ $mustahik->keterangan }}</p>
                            </div>
                        </div>  
                    </div> 
                </div>
            </div>
         </div>
   </div>
</div>
</x-app-layout>
 