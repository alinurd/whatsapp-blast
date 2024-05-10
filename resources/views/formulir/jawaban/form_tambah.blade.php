<x-app-layout layout="landing">
   <div class="container mt-3 ">
      <!-- @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif -->

      <div class="card-body">
         {!! Form::open(['route' => ['formulir.store_formulir'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
         <div class="row">
            <div class="col-xl-12 col-lg-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <div class="card-action">
                           <a href="{{route('uisheet')}}" class="btn btn-sm btn-secondary" role="button">
                              <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M11.8585 17.4101C12.0925 17.2839 12.2384 17.0438 12.2384 16.7827V12.7173H20.2657C20.671 12.7173 21 12.396 21 12C21 11.6041 20.671 11.2828 20.2657 11.2828H12.2384V7.21731C12.2384 6.95527 12.0925 6.71523 11.8585 6.58995C11.6245 6.46275 11.3386 6.47136 11.1125 6.61003L3.34267 11.3927C3.12924 11.5247 3 11.7533 3 12C3 12.2468 3.12924 12.4753 3.34267 12.6073L11.1125 17.39C11.2319 17.4627 11.368 17.5 11.5041 17.5C11.6255 17.5 11.7479 17.4694 11.8585 17.4101Z" fill="currentColor"></path>
                              </svg>
                              Landing Page</a>
                        </div>
                     </div>

                  </div>
                  <center>
                     <br>
                     <h4 class="card-title">Formulir Pengajuan</h4>
                  </center>
                  <div class="card-body">
                     <div class="new-user-info">
                        @php
                        $tipes = [
                        'text' => 'Text',
                        'checkbox' => 'Checkbox',
                        'file' => 'File',
                        ];
                        $requireds = [
                        1 => 'Wajib',
                        0 => 'Tidak Wajib',
                        ];
                        @endphp
                        <div class="row">
                           <div class="form-group col-md-12">
                              <label class="form-label" for="Kategori">Pilih Product: <span class="text-danger">*</span></label>
                              {!! Form::select('kategori', $kategoris ,old('kategori'), ['class' => 'form-select', 'required', 'placeholder' => 'Pilih product', 'id' => 'kategori']) !!}

                           </div>
                        </div>

                        <div id="template_container"></div>

                        <div class="d-flex justify-content-end mt-3">
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         {!! Form::close() !!}
      </div>
   </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>


<script>    
   $(document).ready(function() {
      $('#kategori').on('change', function() {
         let kategori = $(this).val();
         
         if (kategori != '') {
            $('#template_container').empty();
            
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN' : '{{ csrf_token() }}',
               },
               url: '/template_formulir',
               type: 'post',
               data: {
                  kategori,
               },
               complete: function(res) {
                  $('#template_container').append(res.responseJSON);
               },
            });
         }
      });
   });
</script> 