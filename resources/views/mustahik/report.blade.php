@push('scripts')
<script src="{{asset('vendor/sortable/Sortable.js')}}"></script>
<script src="{{asset('js/plugins/kanban.js')}}"></script>
@endpush
<x-app-layout :assets="$assets ?? []">
<div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-between flex-wrap">
                  <form class="form-horizontal mt-1" method="GET" action="{{ route('mustahikreport.index') }}">
                     <div class="form-group row">
                        <label class="control-label col-sm-6 align-self-center mb-0">Filter Wilayah:</label>
                        <div class="col-sm-6">
                        <select name="rt_rw" id="rt_rw" class="form-control">
                           <option value="">Pilih RT/RW</option>
                           <option value="RT.001/RW.001">RT.001/RW.001</option>
                           <option value="RT.002/RW.002">RT.002/RW.002</option>
                           <option value="RT.003/RW.003">RT.003/RW.003</option>
                           <option value="RT.017/RW.005">RT.017/RW.005</option>
                           <option value="RT.018/RW.006">RT.018/RW.006</option>
                           <option value="lainnya">lainnya</option>
                        </select> 
                        </div>
                     </div>
                     <button type="submit" class="btn btn-danger">Cari</button>
                  </form>
               </div>
            </div>
        </div>
      </div>

      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Report Mustahiq</h4>
                  </div>
                  <div class="card-action">
                     <a href="{{route('mustahikreport')}}">
                        <span class="btn btn-primary float-end" id="export">Export to Excel</span>
                     </a> 
                  </div> 
            </div>   
            <div class="card-body">
               <div class="table-responsive">
               <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Code Invoice</th>
                           <th>Nama</th>
                           <th>Kategori Mustahiq</th>
                           <th>Informasi Wilayah</th>
                           <th>Kategori Zakat Diterima</th>
                           <th>Jumlah Uang</th>
                           <th>Jumlah Beras</th>
                        </tr>
                     </thead>
                     <tbody> 
                        <?php $no=1?>
                        @foreach($data['detail'] as $detail)
                        @if($detail->code)
                         <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $detail->code }}</td>
                           <td>{{ $detail->nama_lengkap }}</td>
                           <td>{{ $detail->kategori_mustahik }}</td>
                           <td>
                                 @if($detail->rt_rw || $detail->wilayah_lain)
                                    @if($detail->rt_rw) 
                                       {{ $detail->rt_rw }}
                                    @else
                                       {{ $detail->wilayah_lain }}
                                    @endif
                                 @else
                                    Tidak ada informasi
                                 @endif
                           </td>
                           <td>{{ $detail->kategori->nama_kategori }}</td>
                           <td>{{ $detail->jumlah_uang_diterima }}</td>
                           <td>{{ $detail->jumlah_beras_diterima }} {{ $detail->satuan_beras }}</td>
                        </tr>    
                        @endif
                        @endforeach 
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>

</div>
</x-app-layout>

