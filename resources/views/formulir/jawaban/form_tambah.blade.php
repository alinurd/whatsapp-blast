<x-app-layout layout="simple">
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
                     <div class="col-xl-9 col-lg-12"> 
                        <div class="card">  
                           <div class="card-header d-flex justify-content-between">
                              <div class="header-title">
                                 <h4 class="card-title">Isi Formulir</h4>
                              </div> 
                              <div class="card-action"> 
                                    <a href="{{route('formulir.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                              </div> 
                           </div>   
                           <div class="card-body">   
                              <div class="new-user-info">
                                 @php
                                    $tipes = [
                                       'text'     => 'Text',
                                       'checkbox' => 'Checkbox',
                                       'file'     => 'File',
                                    ];
                                    $requireds = [
                                       1 => 'Wajib',
                                       0 => 'Tidak Wajib',   
                                    ];
                                 @endphp
                                    <div class="row"> 
                                       <div class="form-group col-md-12">
                                          <label class="form-label" for="Kategori">Kategori: <span class="text-danger">*</span></label>
                                          {!! Form::select('kategori', $kategoris ,old('kategori'), ['class' => 'form-select', 'required', 'placeholder' => 'Pilih Kategori', 'id' => 'kategori']) !!}

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