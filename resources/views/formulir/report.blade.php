<x-app-layout :assets="$assets ?? []">
<div>
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Data Pengajuan</h4>
               </div>
                <div class="card-action">
                    
                    <form action="{{ route('formulir.reportExcel') }}" method="GET" target="_blank">
                        <div class="input-group">
                            <!-- <input type="text" name="filter" autocomplete="off" value="{{ request()->filter }}" class="form-control" placeholder="Masukan nama/nomor/periode/tahun"> -->
                            {!! Form::select('kategori', $kategoris ,old('kategori'), ['class' => 'form-select', 'required', 'placeholder' => 'Pilih kategori', 'id' => 'kategori']) !!}

                            <div class="input-group-append ms-2">
                                <button type="submit" class="btn btn-success" type="button">
                                Export Excel
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- <a href="{{ route('formulir.reportExcel') }}" class="btn btn-sm btn-success" role="button" target="_blank">Export Excel</a> -->
                </div>
            </div>
            <div class="card-body px-0">
               <div class="table-responsive">
                <table class="table table-striped">
                    <tr class="text-center">
                        <td>No</td>
                        <td>Kategori</td>
                        <td>Soal</td>
                        <td>Jawaban</td>
                    </tr>
                    @foreach ($jawaban as $jwb)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jwb->formulir->parent->nama }}</td>
                            <td>{{ $jwb->variabel }}</td>
                            <td>
                                @if ($jwb->formulir->formulir_tipe == 'file')
                                    <a href="{{ asset('storage/upload/'.$jwb->jawaban) }}" target="_blank" rel="noopener noreferrer">{{ $jwb->jawaban }}</a>
                                @else
                                    {{ $jwb->jawaban != 1 ? $jwb->jawaban : $formulirOption[$jwb->checkbox_id] }}
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</x-app-layout>
