<x-app-layout :assets="$assets ?? []">
   <div>
      {!! Form::model($kategori, ['route' => ['kategori.update', $kategori->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">   
         <div class="col-xl-9 col-lg-12"> 
            <div class="card">  
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Kategori</h4>
                  </div> 
                  <div class="card-action"> 
                        <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div> 
               </div>   
               <div class="card-body">   
                  <div class="new-user-info">
                        <div class="row"> 
                           <div class="form-group col-md-12">
                              <label class="form-label" for="nama_kategori">Nama Kategori: <span class="text-danger">*</span></label>
                              {!! Form::text('nama_kategori', old('nama_kategori', $kategori->nama_kategori), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Kategori']) !!}
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Kategori</button>
                  </div>
               </div>   
            </div>  
         </div>
        </div>
      {!! Form::close() !!}
   </div> 
</x-app-layout>
