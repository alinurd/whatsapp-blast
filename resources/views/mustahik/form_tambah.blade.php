<x-app-layout :assets="$assets ?? []">
<div>
   <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Mustahik</h4>
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
                                 <span>Income</span>
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
                                 <span>Mustahik</span>
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
                     <!-- fieldsets -->
                     <fieldset>
                        <div class="form-card text-start">
                           <div class="row">
                           <div class="col-7">
                                 <h3 class="mb-4">Personal Information:</h3>
                           </div>
                           <!-- <div class="col-5">
                              <h2 class="steps">Step 1 - 4</h2>
                           </div> -->
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="nama_lengkap">Nama Lengkap: <span class="text-danger">*</span></label>
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
                                 <label class="form-label" for="rt_rw">RT/RW: <span class="text-danger">*</span></label>
                                 <select name="rt_rw" class="form-control" required>
                                    <option value="">Pilih RT/RW</option> 
                                    <option value="RT.001/RW.001">RT.001/RW.001</option>
                                    <option value="RT.002/RW.002">RT.002/RW.002</option>
                                    <option value="RT.003/RW.003">RT.003/RW.003</option>
                                    <option value="RT.017/RW.005">RT.017/RW.005</option>
                                    <option value="RT.018/RW.006">RT.018/RW.006</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="alamat">Alamat: <span class="text-danger">*</span></label>
                                 {!! Form::text('alamat', old('alamat'), ['class' => 'form-control', 'required', 'placeholder' => 'Alamat']) !!}
                              </div>  
                           </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end" value="Next" >Next</button>
                     </fieldset>
                     <fieldset>
                        <div class="form-card text-start">
                           <div class="row">
                           <div class="col-7">
                                 <h3 class="mb-4">Pendapatan:</h3>
                           </div>
                           <!-- <div class="col-5">
                              <h2 class="steps">Step 2 - 4</h2>
                           </div> -->
                           </div>
                           <div class="row">
                              <div class="form-group col-md-4">
                                 <label class="form-label" for="perkerjaan">Pekerjaan: <span class="text-danger">*</span></label>
                                 {!! Form::number('perkerjaan', old('perkerjaan'), ['class' => 'form-control', 'required', 'placeholder' => 'Pekerjaan']) !!}
                              </div>   
                              <div class="form-group col-md-4">
                                 <label class="form-label" for="jml_pendapatan">Jumlah Pendapatan: <span class="text-danger">*</span></label>

                                 {!! Form::text('jml_pendapatan', old('jml_pendapatan'), ['class' => 'form-control', 'required', 'placeholder' => 'Jumlah Pendapatan']) !!}
                              </div>    

                          
                              <div class="form-group col-md-4">
                                 <label class="form-label" for="jml_bansos">Jumlah Bansos Diterima: <span class="text-danger">*</span></label>
                                 {!! Form::number('jml_bansos', old('jml_bansos'), ['class' => 'form-control', 'required', 'placeholder' => 'Jumlah Bansos Diterima']) !!}
                              </div>  

                              <div class="form-group col-md-4">
                                 <label class="form-label" for="jml_anak">Jml Anak dlm Tanggungan: <span class="text-danger">*</span></label>
                                 {!! Form::number('jml_anak', old('jml_anak'), ['class' => 'form-control', 'required', 'placeholder' => 'Jml Anak dlm Tanggungan']) !!}
                              </div>   
                              <div class="form-group col-md-4">
                                 <label class="form-label" for="jml_bansos">Jumlah Bansos Diterima: <span class="text-danger">*</span></label>
                                 {!! Form::text('jml_bansos', old('jml_bansos'), ['class' => 'form-control', 'required', 'placeholder' => 'Jumlah Bansos Diterima']) !!}
                              </div>
                              <div class="form-group col-md-4">
                                 <label class="form-label" for="status_tinggal">Status Tempat Tinggal: <span class="text-danger">*</span></label>
                                 <select name="status_tinggal" class="form-control" required>
                                    <option value="">Pilih Status Tinggal</option>

                                    <option value="Kontrakan">Kontrakan</option>
                                    <option value="Menumpang">Menumpang</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>

                                 </select>
                              </div>
                              <div class="form-group col-md-4">
                                 <label class="form-label" for="pengeluaran_kontrakan">Pengeluaran Kontrakan: <span class="text-danger">*</span></label>
                                 {!! Form::number('pengeluaran_kontrakan', old('pengeluaran_kontrakan'), ['class' => 'form-control', 'required', 'placeholder' => 'Pengeluaran Kontrakan']) !!}
                              </div>  

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_hutang">Jumlah Hutang: <span class="text-danger">*</span></label>
                                 {!! Form::text('jml_hutang', old('jml_hutang'), ['class' => 'form-control', 'required', 'placeholder' => 'Jumlah Hutang']) !!}
                              </div>   
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="keperluan_hutang">Keperluan Hutang: <span class="text-danger">*</span></label>
                                 {!! Form::text('keperluan_hutang', old('keperluan_hutang'), ['class' => 'form-control', 'required', 'placeholder' => 'Keperluan Hutang']) !!}
                              </div>  
                             
                           </div> 
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-end" value="Next" >Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous" >Previous</button>
                     </fieldset>
                     <fieldset>
                        <div class="form-card text-start"> 
                           <div class="row">
                           <div class="col-7">
                                 <h3 class="mb-4">Mustahik:</h3>
                           </div>
                           <!-- <div class="col-5">
                                 <h2 class="steps">Step 3 - 4</h2>
                           </div> -->
                           </div>
                           <div class="row">

                              <div class="form-group col-md-4">
                                 <label class="form-label" for="jml_hutang">Jumlah Hutang: <span class="text-danger">*</span></label>
                                 {!! Form::number('jml_hutang', old('jml_hutang'), ['class' => 'form-control', 'required', 'placeholder' => 'Jumlah Hutang']) !!}
                              </div>   
                              <div class="form-group col-md-4">
                                 <label class="form-label" for="keperluan_hutang">Keperluan Hutang: <span class="text-danger">*</span></label>
                                 {!! Form::text('keperluan_hutang', old('keperluan_hutang'), ['class' => 'form-control', 'required', 'placeholder' => 'Keperluan Hutang']) !!}
                              </div>  
                              <div class="form-group col-md-4">

                                 <label class="form-label" for="kategori_mustahik">Kategori Mustahik: <span class="text-danger">*</span></label>
                                 <select name="kategori_mustahik" class="form-control" required>
                                    <option value="">Pilih Kategori Mustahik</option>
                                    <option value="Fakir">Fakir</option>
                                    <option value="Miskin">Miskin</option>
                                    <option value="Gharim">Gharim</option>
                                    <option value="Ibnu Sabil">Ibnu Sabil</option>
                                    <option value="Mualaf">Mualaf</option>
                                 </select>
                              </div>  
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="tgl_terima_zakat">Tanggal: <span class="text-danger">*</span></label>
                                 {!! Form::date('tgl_terima_zakat', old('tgl_terima_zakat'), ['class' => 'form-control', 'required', 'placeholder' => 'Tanggal Terima Zakat']) !!}
                              </div>    
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="kategori_zakat">Kategori Zakat Diterima: <span class="text-danger">*</span></label>
                                 {{ Form::select('kategori[]', $ktg, "", ['class' => 'form-control', 'placeholder' => 'Pilih Kategori Zakat', 'id' => 'dibayarkan']) }}
                              </div>   
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_diterima">Jumlah Diterima: <span class="text-danger">*</span></label>
                                 {!! Form::text('jml_diterima', old('jml_diterima'), ['class' => 'form-control', 'required', 'placeholder' => 'Jumlah Diterima']) !!}
                              </div>  
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="keterangan">Keterangan: <span class="text-danger">*</span></label>
                                 {!! Form::text('keterangan', old('keterangan'), ['class' => 'form-control', 'required', 'placeholder' => 'Keterangan']) !!}
                              </div>  
                             
                           </div> 
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary next action-button float-end" value="Submit" >Submit</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous" >Previous</button>
                     </fieldset>
                     <fieldset>
                        <div class="form-card">
                           <div class="row">
                           <!-- <div class="col-7">
                                 <h3 class="mb-4 text-left">Finish:</h3>
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
 