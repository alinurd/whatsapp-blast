<x-app-layout layout="simple">
    <div class="container mt-3">
         @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif
        <div class="card m-2">
            <div class="card-body">
                <div class="row">
                <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h3 class="card-title">Pengajuan Mustahiq</h3>
                  </div> 
                  <div class="card-action">
                        <a href="{{route('uisheet')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div>   
               </div>  
               <div class="card-body"> 
               <form id="form-wizard1" class="text-center mt-3" method="POST" action="{{ route('mustahikuser.store') }}" enctype="multipart/form-data">
                     @csrf
                     <ul id="top-tab-list" class="p-0 row list-inline">
                        <li class="col-lg-4 col-md-6 text-start mb-2 active" id="account">
                           <a href="javascript:void();">
                              <div class="iq-icon me-3">
                                 <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                 </svg>
                              </div>
                              <span>Biodata</span>
                           </a>
                        </li>
                        <li id="personal" class="col-lg-4 col-md-6 mb-2 text-start">
                           <a href="javascript:void();">
                              <div class="iq-icon me-3">
                                 <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z" fill="currentColor"></path>                           
                                 </svg>                        
                              </div>
                              <span>Keuangan</span>
                           </a>
                        </li>
                        <li id="confirm" class="col-lg-4 col-md-6 mb-2 text-start">
                           <a href="javascript:void();">
                              <div class="iq-icon me-3">
                                 <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                 </svg>
                              </div>
                              <span>Finish</span>
                           </a>
                        </li>
                     </ul>
                      <!-- fieldsets 1-->
                      <fieldset>
                        <div class="form-card text-start">
                           <div class="row">
                              <div class="col-7">
                                 <h4 class="mb-4">Biodata Mustahiq:</h4>
                              </div>
                              <!-- <div class="col-5">
                              <h2 class="steps">Step 1 - 4</h2>
                           </div> -->
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="nama_lengkap">Nama: <span class="text-danger">*</span></label>
                                 {!! Form::text('nama_lengkap', old('nama_lengkap'), ['class' => 'form-control', 'placeholder' => 'Nama Lengkap', 'required']) !!}
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jenis_kelamin">Jenis Kelamin: <span class="text-danger">*</span></label>
                                 <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="no_phone">No Handphone <span class="text-danger">*</span></label>
                                 {!! Form::number('no_phone', old('no_phone'), ['class' => 'form-control', 'required', 'placeholder' => 'No Handphone']) !!}
                              </div>

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="status_kawin">Status Perkawinan: <span class="text-danger">*</span></label>
                                 <select name="status_kawin" class="form-control" required>
                                    <option value="">Pilih Status Perkawinan</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Janda Cerai">Janda Cerai</option>
                                    <option value="Janda Wafat">Janda Wafat</option>
                                 </select>
                              </div>

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="rt_rw_selection">Apakah merupakan warga RW04?:</label>
                                 <select name="rt_rw_selection" id="rt_rw_selection" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                 </select>
                              </div>

                              <div id="rt_rw_dropdown" class="form-group col-md-6" style="display: none;">
                                 <label class="form-label" for="rt_rw">RT/RW:</label>
                                 <select name="rt_rw" id="rt_rw" class="form-control">
                                 <option value="">Pilih RT/RW</option>
                                 <option value="1">RT.001/RW.004</option>
                                 <option value="2">RT.002/RW.004</option>
                                 <option value="3">RT.003/RW.004</option>
                                 <option value="4">RT.004/RW.004</option>
                                 <option value="5">RT.005/RW.004</option>
                                 <option value="6">RT.006/RW.004</option>
                                 <option value="7">RT.007/RW.004</option>
                                 <option value="8">RT.008/RW.004</option>
                                 <option value="9">RT.009/RW.004</option>
                                 <option value="10">RT.010/RW.004</option> 
                                 <option value="11">RT.011/RW.004</option>
                                 <option value="12">RT.012/RW.004</option>
                                 <option value="13">RT.013/RW.004</option>
                                 <option value="14">RT.014/RW.004</option> 
                                 <option value="15">RT.015/RW.004</option> 
                                 <option value="16">RT.016/RW.004</option>
                                 <option value="17">RT.017/RW.004</option>
                                 <!-- Daftar RT/RW lainnya -->
                                 </select>
                              </div>

                              <div id="wilayah_lainnya" class="form-group col-md-6" style="display: none;">
                                 <label class="form-label" for="nama_wilayah">Wilayah lainnya: </label>
                                 <input type="text" name="nama_wilayah" id="nama_wilayah" class="form-control" placeholder="Wilayah Lainnya">
                              </div>
                               
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="alamat">Alamat: <span class="text-danger">*</span></label>
                                 <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required>
                              </div>
                           </div>
                        </div>

                        <button type="button" name="next" class="btn next1 btn-primary next action-button float-end" value="Next">Next</button>

                     </fieldset>
                     <fieldset>
                        <div class="form-card text-start">
                           <div class="row">
                              <div class="col-7">
                                 <h4 class="mb-4">Keuangan Mustahiq:</h4>
                              </div>
                              <!-- <div class="col-5">
                              <h2 class="steps">Step 2 - 4</h2>
                           </div> -->
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="perkerjaan">Pekerjaan: <span class="text-danger">*</span></label>
                                 <input type="text" name="perkerjaan" id="perkerjaan" class="form-control" placeholder="Pekerjaan" required value="{{ old('perkerjaan')[0] ?? '' }}">

                                 <!-- {!! Form::text('perkerjaan', old('perkerjaan'), ['class' => 'form-control', 'required', 'placeholder' => 'Pekerjaan']) !!} -->
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_pendapatan">Jumlah Pendapatan: <span class="text-danger">*</span></label>
                                 <input type="text" name="jml_pendapatan[]" id="jml_pendapatan" class="form-control" required placeholder="Jumlah pendapatan" value="{{ old('jml_pendapatan')[0] ?? '' }}">
                              </div>

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_anak">Jml Anak dlm Tanggungan: <span class="text-danger">*</span></label>
                                 {!! Form::number('jml_anak', old('jml_anak'), ['class' => 'form-control', 'required', 'placeholder' => 'Jml Anak dlm Tanggungan']) !!}
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_bansos">Jumlah Bansos Diterima: <span class="text-danger">*</span></label>
                                 <input type="text" name="jml_bansos[]" id="jml_bansos" class="form-control" placeholder="Jumlah Bansos" required value="{{ old('jml_bansos')[0] ?? '' }}">
                              </div>
                              
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="status_tinggal">Status Tempat Tinggal: <span class="text-danger">*</span></label>
                                 <select name="status_tinggal" id="status_tinggal" class="form-control" required>
                                    <option value="">Pilih Status Tinggal</option>
                                    <option value="Kontrakan">Kontrakan</option>
                                    <option value="Menumpang">Menumpang</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                 </select>
                              </div>

                              <div class="form-group col-md-6" id="pengeluaran_listrik_section">
                                 <label class="form-label" for="pengeluaran_listrik">Pengeluaran Listrik: </label>
                                 <input type="text" name="pengeluaran_listrik[]" id="pengeluaran_listrik" class="form-control" placeholder="Pengeluaran Listrik" value="{{ old('pengeluaran_listrik')[0] ?? '' }}">
                              </div>

                              <div class="form-group col-md-6" id="pengeluaran_kontrakan_section" style="display: none;">
                                 <label class="form-label" for="pengeluaran_kontrakan">Pengeluaran Listrik & Kontrakan: </label>
                                 <input type="text" name="pengeluaran_kontrakan[]" id="pengeluaran_kontrakan" class="form-control" placeholder="Pengeluaran Kontrakan" value="{{ old('pengeluaran_kontrakan')[0] ?? '' }}">
                              </div>

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_hutang">Jumlah Hutang: <span class="text-danger">*</span></label>
                                 <input type="text" name="jml_hutang[]" id="jml_hutang" class="form-control" required placeholder="Jumlah Hutang" value="{{ old('jml_hutang')[0] ?? '' }}">
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="keperluan_hutang">Keperluan Hutang: <span class="text-danger">*</span></label>
                                 <input type="text" name="keperluan_hutang" id="keperluan_hutang" class="form-control" required placeholder="Keperluan Hutang">

                                 <!-- {!! Form::text('keperluan_hutang', old('keperluan_hutang'), ['class' => 'form-control', 'required', 'placeholder' => 'Keperluan Hutang']) !!} -->
                              </div>

                              <input type="hidden" name="status" id="status" value="1">

                           </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary next action-button float-end next2" value="Submit">Submit</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous">Previous</button>
                     </fieldset>
                     <fieldset>
                        <div class="form-card">
                           <div class="row">
                              <!-- <div class="col-7">
                                 <h4 class="mb-4 text-left">Finish:</h4>
                           </div>
                           <div class="col-5">
                                 <h2 class="steps">Step 4 - 4</h2>
                           </div> -->
                           </div>
                           <h2 class="text-success text-center"><strong>SUCCESS !</strong></h2>
                           <br>
                           <div class="row justify-content-center">
                              <div class="col-3"> <img src="{{asset('images/pages/img-success.png')}}" class="img-fluid" alt="fit-image"> </div>
                           </div>
                           <br><br>
                           <div class="row justify-content-center">
                              <div class="col-7 text-center">
                                 <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                              </div>
                           </div>
                        </div>
                     </fieldset>
               </form> 
               </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Ketika nilai dropdown "Apakah merupakan warga RW04?" berubah
        $('#rt_rw_selection').on('change', function() {
            var selectedOption = $(this).val();
            // Jika dipilih "Ya"
            if (selectedOption === 'Ya') {
                $('#rt_rw_dropdown').show(); // Tampilkan dropdown RT/RW
                $('#wilayah_lainnya').hide(); // Sembunyikan form wilayah lainnya
            }
            // Jika dipilih "Tidak"
            else if (selectedOption === 'Tidak') {
                $('#rt_rw_dropdown').hide(); // Sembunyikan dropdown RT/RW
                $('#wilayah_lainnya').show(); // Tampilkan form wilayah lainnya
            }
            // Jika belum dipilih
            else {
                $('#rt_rw_dropdown').show(); // Tampilkan dropdown RT/RW
                $('#wilayah_lainnya').hide(); // Sembunyikan form wilayah lainnya
            }
        });

        // Tampilkan dropdown RT/RW jika belum ada pilihan yang dipilih
        if ($('#rt_rw_selection').val() === '') {
            $('#rt_rw_dropdown').show();
        }
    });

    $(document).ready(function() {
        // Ketika nilai dropdown "Status Tempat Tinggal" berubah
        $('#status_tinggal').on('change', function() {
            var selectedOption = $(this).val();
            // Sembunyikan semua section terlebih dahulu
            $('#pengeluaran_listrik_section').hide();
            $('#pengeluaran_kontrakan_section').hide();
            
            // Jika dipilih "Kontrakan"
            if (selectedOption === 'Kontrakan') {
                $('#pengeluaran_kontrakan_section').show(); // Tampilkan form Pengeluaran Listrik & Kontrakan
            }
            // Jika dipilih "Menumpang" atau "Milik Sendiri"
            else if (selectedOption === 'Menumpang' || selectedOption === 'Milik Sendiri') {
                $('#pengeluaran_listrik_section').show(); // Tampilkan form Pengeluaran Listrik
            }
            // Jika belum dipilih
            else {
                $('#pengeluaran_listrik_section').show(); // Tampilkan form Pengeluaran Listrik
            }
        });

        // Tampilkan form Pengeluaran Listrik jika belum ada pilihan yang dipilih
        if ($('#status_tinggal').val() === '') {
            $('#pengeluaran_listrik_section').show();
        }
    });

    $(document).ready(function() {
      $('.next1').prop('disabled', true);
      $('.next2').prop('disabled', true);

      $('input, select').on('input change', function() {
         var namaLengkap = $('#nama_lengkap').val();
         var jenisKelamin = $('#jenis_kelamin').val();
         var noPhone = $('#no_phone').val();
         var statusKawin = $('#status_kawin').val();
         var rtRw = $('#rt_rw').val();
         var namaWilayah = $('#nama_wilayah').val();
         var alamat = $('#alamat').val();
         if (namaLengkap !== '' &&
            jenisKelamin !== '' &&
            noPhone !== '' &&
            statusKawin !== '' &&
            alamat !== '' &&
            (rtRw !== '' || namaWilayah !== '')) {
            $('.next1').prop('disabled', false);
         } else {
            $('.next1').prop('disabled', true);
         }
      });

      $('input, select').on('input change', function() {
         var perkerjaan = $('#perkerjaan').val();
         var jml_pendapatan = $('#jml_pendapatan').val();
         var jml_anak = $('#jml_anak').val();
         var status_tinggal = $('#status_tinggal').val();
         var pengeluaran_listrik = $('#pengeluaran_listrik').val();
         var pengeluaran_kontrakan = $('#pengeluaran_kontrakan').val(); // Corrected ID
         var jml_hutang = $('#jml_hutang').val();
         var keperluan_hutang = $('#keperluan_hutang').val();
         if (perkerjaan !== '' &&
            jml_pendapatan !== '' &&
            jml_anak !== '' &&
            status_tinggal !== '' &&
            keperluan_hutang !== '' &&
            jml_hutang !== '') {
            $('.next2').prop('disabled', false);
         } else {
            $('.next2').prop('disabled', true);
         }
      });

   });
</script> 