<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Report Mustahiq</h4>
               </div>
            </div>
            <div class="card-body">
               <div class="mb-3">
                  <span class="btn btn-info">Cari</span>
                  <a href="{{route('mustahikreport')}}">
                     <span class="btn btn-primary float-end" id="export">Export to Excel</span>
                  </a>
               </div>
               <div class="table-responsive">
               <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Code Invoice</th>
                           <th>Nama</th>
                           <th>Kategori Mustahiq</th>
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
 