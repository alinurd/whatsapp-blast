<x-app-layout :assets="$assets ?? []">
   <div>
      {!! Form::open(['route' => ['product.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">   
         <div class="col-xl-9 col-lg-12"> 
            <div class="card">  
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Add Product</h4>
                  </div> 
                  <div class="card-action"> 
                        <a href="{{route('product.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div> 
               </div>   
               <div class="card-body">   
                  <div class="new-user-info"> 
                        <div class="row"> 
                           <div class="form-group col-md-12">
                              <label class="form-label" for="fname">Kategori: <span class="text-danger">*</span></label>
                              {{ Form::select('kategori', $kategori, "", ['class' => 'form-control', 'placeholder' => 'Select Kategori', 'id' => 'kategori']) }}
                           </div>
                           <div class="form-group col-md-12">
                                 <label class="form-label" for="jenis_product">Jenis Product: <span class="text-danger">*</span></label>
                                 <select name="jenis_product" class="form-control" required>
                                    <option value="">Pilih Jenis product</option>
                                    <option value="KTA">KTA</option>
                                    <option value="Kartu_Kredit">Kartu Kredit</option>
                                 </select>
                              </div>
                           <div class="form-group col-md-12"> 
                              <label class="form-label" for="nama_product">Nama Product: <span class="text-danger">*</span></label>
                              {!! Form::text('nama_product', old('nama_product'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Product']) !!}
                           </div> 
                           <div class="form-group col-md-12">
                              <label class="form-label" for="desk_detail">Detail Product: <span class="text-danger">*</span></label>
                              {!! Form::textArea('desk_detail', old('desk_detail'), ['class' => 'form-control', 'required', 'placeholder' => 'Detail Product']) !!}
                           </div>
                           <div class="form-group col-md-12">
                              <label class="form-label" for="gambar">Gambar: <span class="text-danger">*</span></label>
                              {!! Form::file('gambar', ['class' => 'form-control', 'required']) !!}
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add product</button>
                  </div>
               </div>   
            </div>  
         </div>
        </div>
      {!! Form::close() !!}
   </div> 
</x-app-layout>
