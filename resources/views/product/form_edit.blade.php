<x-app-layout :assets="$assets ?? []">
   <div>
      <div class="row">
         <div class="col-xl-9 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Produk</h4>
                  </div>
                  <div class="card-action">
                     <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div>
               </div>
               <div class="card-body">
                  {!! Form::model($product, ['route' => ['product.update', $product->id], 'id' => 'form-wizard1', 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
                  <div class="new-user-info">
                     <div class="row"> 
                        <div class="form-group col-md-12">
                           <label class="form-label" for="kategori">Kategori: <span class="text-danger">*</span></label>
                           <select name="kategori" class="form-control" id="kategori">
                              <option value="">Select Kategori</option>
                              @foreach($ktg as $key => $kategori)
                              <option value="{{ $key }}" {{ $product->kategori_id == $key ? 'selected' : '' }}>{{ $kategori }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-12">
                           <label class="form-label" for="jenis_product">Jenis Produk: <span class="text-danger">*</span></label>
                           <select name="jenis_product" class="form-control" id="jenis_product">
                              <option value="">Pilih Jenis Produk</option>
                              <option value="KTA" {{ $product->jenis_produk == 'KTA' ? 'selected' : '' }}>KTA</option>
                              <option value="Kartu kredit" {{ $product->jenis_produk == 'Kartu_kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                           </select>
                        </div>
                        <div class="form-group col-md-12">
                           <label class="form-label" for="nama_product">Nama Produk: <span class="text-danger">*</span></label>
                           {!! Form::text('nama_product', old('nama_product', $product->nama_product), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Produk']) !!}
                        </div>
                        <div class="form-group col-md-12">
                           <label class="form-label" for="desk_detail">Detail Produk: <span class="text-danger">*</span></label>
                           {!! Form::textarea('desk_detail', old('desk_detail', $product->desk_detail), ['class' => 'form-control', 'required', 'placeholder' => 'Detail Produk']) !!}
                        </div>
                        <div class="form-group col-md-12">
                           <label class="form-label" for="gambar">Gambar: <span class="text-danger">*</span></label>
                           <div class="mb-3">
                              @if($product->gambar)
                                 <img src="{{ asset('storage/' . $product->gambar) }}" alt="Gambar Produk" class="img-thumbnail" style="max-height: 100px;">
                              @else
                                 <img src="{{ asset('images/no-image.jpg') }}" alt="No Image Available" class="img-thumbnail" style="max-height: 100px;">
                              @endif
                           </div>
                           {!! Form::file('gambar', ['class' => 'form-control']) !!}
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Update Produk</button>
                  </div>
                  {!! Form::close() !!}
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
