<x-app-layout :assets="$assets ?? []">
   <div>
      {!! Form::open(['route' => ['kategori.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">   
         <div class="col-xl-9 col-lg-12"> 
            <div class="card">  
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Add Kategori</h4>
                  </div> 
                  <div class="card-action"> 
                        <a href="{{route('kategori.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div> 
               </div>   
               <div class="card-body">   
                  <div class="new-user-info">
                        <div class="row"> 
                           <div class="form-group col-md-12">
                              <label class="form-label" for="nama_kategori">Nama Kategori: <span class="text-danger">*</span></label>
                              {!! Form::text('nama_kategori', old('nama_kategori'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Kategori']) !!}
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Kategori</button>
                  </div>
               </div>   
            </div>  
         </div>
        </div>
      {!! Form::close() !!}
   </div> 
</x-app-layout>
