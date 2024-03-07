<x-app-layout :assets="$assets ?? []">
   <div>
      <?php
      $id = $id ?? null;
      ?>
      @if(isset($id))
      {!! Form::model($data, ['route' => ['users.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
      @else
      {!! Form::open(['route' => ['users.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      @endif
      <div class="row">

         <div class="col-xl-9  col-md-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">{{$id !== null ? 'Update' : 'New' }} Muzakki</h4>
                  </div>
                  <div class="card-action">
                     <a href="#" class="mt-lg-0 mt-md-0 mt-3 btn btn-secondary btn-icon" data-bs-toggle="tooltip" data-modal-form="form" data-icon="person_add" data-size="small" data--href="{{ route('muzakkiCreate') }}" data-app-title="Add user muzakki" data-placement="top" title="New Muzakki">
                        <i class="btn-inner">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                           </svg>
                        </i>
                        <span>New User Muzakki</span>
                     </a>
                     <a href="{{route('muzakki.index')}}" class="btn  btn-primary" role="button">Back</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="new-user-info">
                     <div class="row">
                        <div class="form-group col-md-10">
                           <label class="form-label" for="fname">Di bayarkan oleh <span class="text-danger">*</span></label>
                           {{ Form::select('dibayarkan', $agt, "", ['class' => 'form-control', 'placeholder' => 'Select User Role', 'id' => 'dibayarkan']) }}                        </div>
                        <div cs="form-group col-md-2">
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-12">
                           <span class="btn btn-info btn-sm float-right">Tambah Row</span>
                        </div>
                        <div class="form-group col-md-12">
                           <label class="form-label" for="cname">Zakat Fitrah:</label>
                           {{ Form::text('userProfile[company_name]', old('userProfile[company_name]'), ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group col-sm-12">
                           <label class="form-label" id="country">Zakat Maal/Harta:</label>
                           {{ Form::text('userProfile[country]', old('userProfile[country]'), ['class' => 'form-control', 'id' => 'country']) }}

                        </div>
                        <div class="form-group col-sm-12">
                           <label class="form-label" for="mobno">Fidyah:</label>
                           {{ Form::text('userProfile[phone_number]', old('userProfile[phone_number]'), ['class' => 'form-control', 'id' => 'mobno']) }}
                        </div>
                        <div class="form-group col-sm-12">
                           <label class="form-label" for="altconno">Infaq/Shadaqoh:</label>
                           {{ Form::text('userProfile[alt_phone_number]', old('userProfile[alt_phone_number]'), ['class' => 'form-control', 'id' => 'altconno']) }}
                        </div>
                        <div class="form-group col-sm-12">
                           <label class="form-label" for="altconno">Keterangan:</label>
                           {{ Form::text('userProfile[alt_phone_number]', old('userProfile[alt_phone_number]'), ['class' => 'form-control', 'id' => 'altconno']) }}
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">{{$id !== null ? 'Update' : 'Add' }} Muzakki</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {!! Form::close() !!}
   </div>
</x-app-layout>






<form id="myForm" action="{{ route('muzakkiUserStore') }}" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-label">nama_lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" id="nama-lengkap" placeholder="Nama Lengkap" required>
    </div>
    <div class="form-group">
        <label class="form-label">jenis_kelamin</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" id="Laki-laki">
        <label for="laki-laki">Laki-laki</label>
        <input type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan">
        <label for="perempuan">Perempuan</label>
    </div>
    <div class="form-group">
        <label class="form-label">nomor_telp</label>
        <input type="number" name="nomor_telp" class="form-control" id="nomor-telp" placeholder="Nomor Telepon" required>
    </div>
    <div class="form-group">
        <label class="form-label">alamat</label>
        <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" required></textarea>
    </div>
    <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
</form>

<script>
    document.getElementById('saveBtn').addEventListener('click', function() {
        var form = document.getElementById('myForm');
        var formData = new FormData(form);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                alert("Data berhasil disimpan.");
                // Ambil data terbaru untuk $agt
                var xhrGetLatestData = new XMLHttpRequest();
                xhrGetLatestData.onreadystatechange = function() {
                    if (xhrGetLatestData.readyState == XMLHttpRequest.DONE && xhrGetLatestData.status == 200) {
                        var newData = JSON.parse(xhrGetLatestData.responseText);
                        var selectElement = document.getElementById('dibayarkan');
                        selectElement.innerHTML = ""; // Kosongkan pilihan yang sudah ada

                        // Tambahkan pilihan baru dari data terbaru
                        newData.forEach(function(user) {
                            var option = document.createElement('option');
                            option.value = user.id;
                            option.text = user.nama_lengkap;
                            selectElement.appendChild(option);
                        });
                    }
            // Clear form input
            form.reset();
            // Close modal
            var modal = document.getElementById('myModal');
            var modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide();
            // Reload or update your page content here
            } else {
                // Handle error response here
                console.error('Failed to save data.');
            }
        };
        xhr.send(formData);
    });
</script>
