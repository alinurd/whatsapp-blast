<x-app-layout :assets="$assets ?? []">
   <div>
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Mustahiq</h4>
                  </div>
                  <div class="card-action">
                     <a href="{{route('mustahik.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div>
               </div>
               <div class="card-body">
                  <form id="form-wizard1" class="text-center mt-3" method="POST" action="{{ route('mustahik.store') }}" enctype="multipart/form-data">
                     @csrf
                     <ul id="top-tab-list" class="p-0 row list-inline">
                        <li class="col-lg-3 col-md-6 text-start mb-2 active" id="account">
                           <a href="javascript:void();">
                              <div class="iq-icon me-3">
                                 <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                 </svg>
                              </div>
                              <span>Biodata</span>
                           </a>
                        </li>
                        <li id="personal" class="col-lg-3 col-md-6 mb-2 text-start">
                           <a href="javascript:void();">
                              <div class="iq-icon me-3">
                                 <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                 </svg>
                              </div>
                              <span>Keuangan</span>
                           </a>
                        </li>
                        <li id="payment" class="col-lg-3 col-md-6 mb-2 text-start">
                           <a href="javascript:void();">
                              <div class="iq-icon me-3">
                                 <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                 </svg>
                              </div>
                              <span>Mustahiq</span>
                           </a>
                        </li>
                        <li id="confirm" class="col-lg-3 col-md-6 mb-2 text-start">
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
                                 <label class="form-label" for="rt_rw">RT/RW:</label>
                                 <select name="rt_rw" id="rt_rw" class="form-control">
                                    <option value="">Pilih RT/RW</option>
                                    <option value="RT.001/RW.001">RT.001/RW.001</option>
                                    <option value="RT.002/RW.002">RT.002/RW.002</option>
                                    <option value="RT.003/RW.003">RT.003/RW.003</option>
                                    <option value="RT.017/RW.005">RT.017/RW.005</option>
                                    <option value="RT.018/RW.006">RT.018/RW.006</option>
                                 </select>
                              </div>

                              <div class="form-group col-md-6">
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
                                 <input type="text" name="perkerjaan" id="perkerjaan" class="form-control" placeholder="Jumlah Bansos" required value="{{ old('perkerjaan')[0] ?? '' }}">

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
                              <div class="form-group col-md-4">
                                 <label class="form-label" for="status_tinggal">Status Tempat Tinggal: <span class="text-danger">*</span></label>
                                 <select name="status_tinggal" id="status_tinggal" class="form-control" required>
                                    <option value="">Pilih Status Tinggal</option>
                                    <option value="Kontrakan">Kontrakan</option>
                                    <option value="Menumpang">Menumpang</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                 </select>
                              </div>

                              <div class="form-group col-md-4">
                                 <label class="form-label" for="pengeluaran_listrik">Pengeluaran Listrik: </label>
                                 <input type="text" name="pengeluaran_listrik[]" id="pengeluaran_listrik" class="form-control" placeholder="Pengeluaran Listrik" value="{{ old('pengeluaran_listrik')[0] ?? '' }}">
                              </div>

                              <div class="form-group col-md-4">
                                 <label class="form-label" for="pengeluaran_kontrakan">Pengeluaran kontrakan: </label>
                                 <input type="text" name="pengeluaran_kontrakan[]" id="pengeluaran_kontrakan" class="form-control" placeholder="Pengeluaran kontrakan" value="{{ old('pengeluaran_kontrakan')[0] ?? '' }}">
                              </div>

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_hutang">Jumlah Hutang: <span class="text-danger">*</span></label>
                                 <input type="text" name="jml_hutang[]" id="jml_hutang" class="form-control" required placeholder="Jumlah Hutang" value="{{ old('jml_hutang')[0] ?? '' }}">
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="keperluan_hutang">Keperluan Hutang: <span class="text-danger">*</span></label>
                                 <input type="text" name="keperluan_hutang[]" id="keperluan_hutang" class="form-control" required placeholder="Jumlah Hutang" value="{{ old('keperluan_hutang')[0] ?? '' }}">

                                 <!-- {!! Form::text('keperluan_hutang', old('keperluan_hutang'), ['class' => 'form-control', 'required', 'placeholder' => 'Keperluan Hutang']) !!} -->
                              </div>

                           </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end next2" value="Next">Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous">Previous</button>
                     </fieldset>
                     <fieldset>
                        <div class="form-card text-start">
                           <div class="row">
                              <div class="col-7">
                                 <h4 class="mb-4">Mustahiq zakat:</h4>
                              </div>
                              <!-- <div class="col-5">
                                 <h2 class="steps">Step 3 - 4</h2>
                           </div> -->
                           </div>
                           <div class="row">

                              <div class="form-group col-md-6">

                                 <label class="form-label" for="kategori_mustahik">Kategori Mustahiq: <span class="text-danger">*</span></label>
                                 <select name="kategori_mustahik" id="kategori_mustahik" class="form-control" required>
                                    <option value="">Pilih Kategori Mustahiq</option>
                                    <option value="Fakir">Fakir</option>
                                    <option value="Miskin">Miskin</option>
                                    <option value="Gharim">Gharim</option>
                                    <option value="Ibnu Sabil">Ibnu Sabil</option>
                                    <option value="Mualaf">Mualaf</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="tgl_terima_zakat">Tanggal: <span class="text-danger">*</span></label>
                                 {!! Form::date('tgl_terima_zakat', old('tgl_terima_zakat'), ['class' => 'form-control', 'required', 'placeholder' => 'Tanggal Terima Zakat', 'id' => 'tgl_terima_zakat']) !!}
                              </div>
                              <div class="form-group col-md-3">
                                 <label class="form-label" for="kategori_zakat">Kategori Zakat Diterima: <span class="text-danger">*</span></label>
                                 {{ Form::select('kategori[]', $ktg, "", ['class' => 'form-control', 'placeholder' => 'Pilih Kategori Zakat', 'id' => 'kategorix']) }}
                              </div>
                              <div class="form-group col-md-3">
                                 <label class="form-label" for="jml_uang">Jumlah Uang: </label>
                                 <input type="text" name="jml_uang[]" class="form-control" placeholder="Jumlah uang" value="{{ old('jml_uang')[0] ?? '' }}">
                              </div>
                              <div class="form-group col-md-3">
                                 <label class="form-label" for="jml_beras">Jumlah Beras: </label>
                                 <input type="text" name="jml_beras[]" class="form-control" placeholder="Jumlah Beras" value="{{ old('jml_beras')[0] ?? '' }}">
                              </div>
                              <div class="form-group col-md-3">
                                 <label class="form-label" for="satuan_beras">Satuan Beras: </label>
                                 <select name="satuan_beras" class="form-control">
                                    <option value="">Pilih Satuan Beras</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Liter">Liter</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="keterangan">Keterangan:</label>
                                 {!! Form::text('keterangan', old('keterangan'), ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
                              </div>
                           </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary next action-button float-end next3" value="Submit">Submit</button>
                        <button type="button" name="previous" class="btn  btn-dark previous action-button-previous float-end me-1" value="Previous">Previous</button>
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
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

<script>
   $(document).ready(function() {
      $('.next1').prop('disabled', true);
      $('.next2').prop('disabled', true);
      $('.next3').prop('disabled', true);

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




      $('input, select').on('input change', function() {
         var kategori_mustahik = $('#kategori_mustahik').val();
         var tgl_terima_zakat = $('#tgl_terima_zakat').val();
         var kategorix = $('#kategorix').val();
         if (kategori_mustahik !== '' &&
            tgl_terima_zakat !== '' &&
            kategorix !== '' ) {
            $('.next3').prop('disabled', false);
         } else {
            $('.next3').prop('disabled', true);
         }
      });

   });
</script>