<x-app-layout :assets="$assets ?? []">
   <div>
      {!! Form::open(['route' => ['target.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">
         <div class="col-xl-9 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Add template</h4>
                  </div>
                  <div class="card-action">
                     <a href="{{route('template.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label" for="nama">Nomor Target: <span class="text-danger">*</span></label>
                           {!! Form::number('nomor', old('nomor'), ['class' => 'form-control', 'required', 'placeholder' => 'Nomor Target']) !!}
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Add Nomor</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {!! Form::close() !!}
   </div>
</x-app-layout>