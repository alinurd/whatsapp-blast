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
                              <label class="form-label" for="nama_product">Nama product: <span class="text-danger">*</span></label>
                              {!! Form::text('nama_product', old('nama_product'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama product']) !!}
                           </div> 
                           <div class="form-group col-md-12">
                              <label class="form-label" for="desk_detail">Detail Product: <span class="text-danger">*</span></label>
                              {!! Form::textArea('desk_detail', old('desk_detail'), ['class' => 'form-control', 'required', 'placeholder' => 'Detail Product']) !!}
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
