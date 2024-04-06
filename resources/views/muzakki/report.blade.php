<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Report Muzakki</h4>
                  
               </div>
               <a   href="{{route('muzakkireport')}}">
                     <span class="btn btn-primary float-end" id="export">Export to Excel</span>
                  </a>
            </div>
            <div class="card-body">
              
               <div class="table-responsive">
               <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                     <thead>
                        <tr>
                            <th>No</th>
                            <th>Code Invoice</th>
                           <th>dibayarkan oleh</th>
                           <th>Nama</th>
                           <th>kategori</th>
                           <th>Type</th>
                           <th>Satuan</th>
                           <th>Jumlah</th>
                        </tr>
                     </thead>
                     <tbody> 
                        <?php $no=1?>
                        @foreach($data['detail'] as $detail)
                        @foreach($data['header'] as $header)
                        @if($header->code == $detail->code)
                         <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $detail->code }}</td>
                           <td>{{ $header->user->nama_lengkap }}</td>
                           <td>{{ $detail->user->nama_lengkap }}</td>
                           <td>{{ $detail->kategori->nama_kategori }}</td>
                           <td>{{ $detail->type }}</td>
                           <td>{{ $detail->satuan }}</td> 
                           <td>{{ $detail->jumlah_bayar }}</td> 
                        </tr>    
                        @endif
                        @endforeach 
                        @endforeach 
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>  
 