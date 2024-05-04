<x-app-layout :assets="$assets ?? []">
   <div>
   {!! Form::open(['route' => ['template.update',$old[0]->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">
         <div class="col-xl-9 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Update template [ {{$old[0]->nama}} ]</h4>
                  </div>
                  <div class="card-action">
                     <a href="{{route('template.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label" for="nama">Nama template: <span class="text-danger">*</span></label>
                           {!! Form::text('nama', $old[0]->nama, ['class' => 'form-control', 'required', 'placeholder' => 'Nama template']) !!}
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label" for="fname">Kategori : <span class="text-danger">*</span></label>
                           {{ Form::select('Kategori', $k, $old[0]->kategori, ['class' => 'form-control', 'placeholder' => 'Select User Role', 'id' => 'Kategori']) }}
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label" for="pesan">Nama template: <span class="text-danger">*</span></label>
                           {!! Form::textArea('pesan', $old[0]->pesan, ['class' => 'form-control', 'required', 'placeholder' => 'Nama template']) !!}
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Add template</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {!! Form::close() !!}
   </div>
</x-app-layout>