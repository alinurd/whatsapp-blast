<x-app-layout :assets="$assets ?? []">
   <div>
      {!! Form::model($campaign, [
         'route' => ['campaign.update', $campaign->id],
         'method' => 'POST',
         'enctype' => 'multipart/form-data'
      ]) !!}
      
      <div class="row">
         <div class="col-xl-9 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Update Grouping Campaign</h4>
                  </div>
                  <div class="card-action">
                     <a href="{{ route('campaign.index') }}" class="btn btn-sm btn-primary">Back</a>
                  </div>
               </div>
               
               <div class="card-body">
                  <div class="new-user-info">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label for="kode" class="form-label">Kode: <span class="text-danger">*</span></label>
                           {!! Form::text('kode', null, ['class' => 'form-control', 'required', 'placeholder' => 'kode campaign']) !!}
                        </div>

                        <div class="form-group col-md-12">
                           <label for="nama" class="form-label">Nama Campaign: <span class="text-danger">*</span></label>
                           {!! Form::text('nama', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nama']) !!}
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
