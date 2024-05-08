<x-app-layout :assets="$assets ?? []">
   <div>
      {!! Form::open(['route' => ['formulir.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">   
         <div class="col-xl-9 col-lg-12"> 
            <div class="card">  
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Add Formulir</h4>
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
                              {!! Form::select('kategori', $kategoris ,old('kategori'), ['class' => 'form-select', 'required', 'placeholder' => 'Pilih Kategori']) !!}

                           </div>
                        </div>
                        <div class="row"> 
                           <div class="form-group col-md-12">
                              <label class="form-label" for="nama_formulir">Nama Formulir: <span class="text-danger">*</span></label>
                              {!! Form::text('nama_formulir', old('nama_formulir'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Formulir']) !!}
                           </div>
                        </div>
                        <div class="row"> 
                           <div class="form-group col-md-12">
                              <label class="form-label" for="deskripsi">Deskripsi: <span class="text-danger">*</span></label>
                              {!! Form::textarea('deskripsi', old('deskripsi'), ['class' => 'form-control', 'required', 'placeholder' => 'Deskripsi']) !!}
                           </div>
                        </div>

                        
                        <div class="row mt-2"> 
                           <div class="form-group col-md-12 text-end">
                              <a href="#" class="btn btn-info" id="add_field">Add Field</a>
                           </div>
                        </div>
                        
                        <div id="field_container">
                           <div class="my_field">
                              <div class="row"> 
                                 <div class="form-group col-md-4">
                                    {!! Form::text('nama_field[]', old('nama_field'), ['class' => 'form-control', 'required', 'placeholder' => 'Nama Field']) !!}

                                 </div>
                                 
                                 <div class="form-group col-md-3">
                                    {!! Form::select('required[]', $requireds ,old('required'), ['class' => 'form-select', 'required']) !!}
                                 </div>
                                 <div class="form-group col-md-3">
                                    {!! Form::select('tipe[]', $tipes ,old('tipe'), ['class' => 'form-select tipe', 'required']) !!}
                                 </div>
                                 <div class="form-group col-md-1">
                                    <a href="#" class="delete_field btn btn-danger" >
                                       <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>                                <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>                                </svg>                            
                                    </a>
                                 </div>
                              </div>

                              <div class="checkbox_container">
                                    <ol type="1" class="checkbox_content col-md-5">
                                       
                                    </ol>
                              </div>
                           </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Formulir</button>
                  </div>
               </div>   
            </div>  
         </div>
        </div>
      {!! Form::close() !!}
   </div> 
</x-app-layout>

@push('scripts')
<script src="{{ asset('js/plugins/jquery.min.js') }}" defer></script>
@endpush
<script>
   $(document).ready(function() {
      $('#add_field').on('click', function(event) {
         event.preventDefault();

         let firstChild = $('#field_container').children().first();
         let copyContent = firstChild.clone(true);
         
         $('#field_container').append(copyContent);
      });

      $('.delete_field').on('click', function(event) {
         event.preventDefault();
         event.stopPropagation();

         // let elm = this.parentNode.parentNode;
         // elm.remove();
         $(this).closest('.my_field').remove();
      });

      $('.tipe').on('change', function() {
         let value = $(this).val();
         if (value != 'checkbox') {
            $(this).closest('.my_field').find('.btn_option').remove();
            $(this).closest('.my_field').find('.checkbox_content').empty();
            return false;
         }
         let svg = `<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>                                <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>                                </svg>`;
         let btnDelete = `<div class="form-group col-md-1">
                              <a href="#" class="delete_option btn btn-danger" >
                              ${svg}
                              </a>
                           </div>`;
         
         let btnAdd = `<div class="form-group col-md-5 text-end btn_option">
                           <a href="#" class="btn btn-info add_option" >Add Option</a>
                        </div>`;
         $(this).closest('.my_field').find('.checkbox_container').prepend(btnAdd);

         let index = $(this).closest('.my_field').index();
         let elm = `<li><input type="text" name="checkbox_option[${index}][]" class="form-control" />${btnDelete}</li>`;
         $(this).closest('.my_field').find('.checkbox_content').append(elm); 
      });

      $(document).on('click', '.delete_option', function(event) {
         event.preventDefault();
         event.stopPropagation();

         let liElement = $(this).closest('li'); // Get the closest <li> element
         let olElement = $(this).closest('.checkbox_container').find('ol'); // Get the <ol> element containing the <li>
         
         liElement.remove();
      });

      $(document).on('click', '.add_option', function(e) {
         e.preventDefault();
         e.stopPropagation();
         
         
         let svg = `<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>                                <path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>                                </svg>`;
         let btnDelete = `<div class="form-group col-md-1">
                              <a href="#" class="delete_option btn btn-danger" >
                              ${svg}
                              </a>
                           </div>`
         
         let index = $(this).closest('.my_field').index();
         let elm = `<li><input type="text" name="checkbox_option[${index}][]" class="form-control" />${btnDelete}</li>`;
         $(this).closest('.my_field').find('.checkbox_content').append(elm); 

      });
   });
   document.addEventListener('DOMContentLoaded', function() {
      // document.getElementById('add_field').addEventListener('click', function() {
      //    event.preventDefault();
      //    // let jumlah = document.getElementById('field_container').children.length;
      //    // Get the first child of #field_container
      //    let firstChild = document.getElementById('field_container').firstElementChild;

      //    // Clone the first child
      //    let copyContent = firstChild.cloneNode(true);

      //    // Append the cloned content to #copy_container
      //    document.getElementById('field_container').appendChild(copyContent);
      // });

      // document.getElementsByClassName('delete_field').addEventListener('click', function() {
      //    event.preventDefault();
      //    let elm = this.parentNode;
      //    console.log(elm);
      // });
      // Get all elements with the class 'delete_field'
      // let deleteButtons = document.querySelectorAll('.delete_field');

      // Add a click event listener to each delete button
      // deleteButtons.forEach(function(deleteButton) {
      //    deleteButton.addEventListener('click', function(event) {
      //       event.preventDefault();
      //       event.stopPropagation();
      //       let elm = this.parentNode.parentNode;
      //       console.log(elm);
      //    });
      // });

      // document.addEventListener('click', function(event) {
      //    if (event.target.classList.contains('delete_field')) {
      //       event.preventDefault();
      //       event.stopPropagation();
      //       let elm = event.target.closest('.my_field');
      //       elm.remove();
      //    }
      // });
   });
</script>
