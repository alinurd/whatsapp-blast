<x-app-layout :assets="$assets ?? []">
   <div>
      {!! Form::model($old, ['route' => ['target.update', $old->target_id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">
         <div class="col-xl-9 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Update Nomor Target [ {{ $old->nomor }} ]</h4>
                  </div>
                  <div class="card-action">
                     <a href="{{ route('target.index') }}" class="btn btn-sm btn-primary">Back</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label class="form-label">Campaign: <span class="text-danger">*</span></label>
                           {!! Form::select('kode[]', $c, $selectedCampaign ?? [], [
                           'class' => 'form-control',
                           'multiple' => 'multiple'
                           ]) !!}
                        </div>
                        <div class="form-group col-md-12">
                           <label class="form-label">Nama Target: <span class="text-danger">*</span></label>
                           {!! Form::text('nama', $old->target_nama, ['class' => 'form-control', 'required', 'placeholder' => 'Nama Target']) !!}
                        </div>
                        <div class="form-group col-md-12">
                           <label class="form-label">Nomor Target: <span class="text-danger">*</span></label>
                           {!! Form::number('nomor', $old->nomor, ['class' => 'form-control', 'required', 'placeholder' => 'Nomor Target']) !!}
                        </div>
                        <div class="form-group col-md-12">
                           <label class="form-label">Keterangan: </label>
                           {!! Form::textarea('ket', $old->ket, ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Update Nomor</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {!! Form::close() !!}
   </div>
</x-app-layout>