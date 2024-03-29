<x-app-layout :assets="$assets ?? []">
   <div>
      <div class="row">   
         <div class="col-xl-12 col-lg-12"> 
            <div class="card">  
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title"> 
                     <h4 class="card-title">Approval Mustahiq - {{ $mustahik->nama_lengkap }}</h4>
                  </div> 
                  <div class="card-action"> 
                        <a href="{{ route('mustahikuser.index') }}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div> 
               </div>    
               <div class="card-body">    
                  <form id="form-wizard1" class="text-center mt-3" method="POST" action="{{ route('mustahikuser.update', ['id' => $mustahik->id]) }}" enctype="multipart/form-data">
                     @method('PUT') 
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
                        <li id="payment" class="col-lg-4 col-md-6 mb-2 text-start">
                           <a href="javascript:void();">
                              <div class="iq-icon me-3">
                                 <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>
                                    <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>
                                 </svg> 
                              </div>
                              <span>Approval Mustahiq</span>
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
                           </div>
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="nama_lengkap">Nama: </label>
                                 <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control bg-light text-black" required readonly value="{{ old('nama_lengkap', $mustahik->nama_lengkap) }}">
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jenis_kelamin">Jenis Kelamin: </label>
                                 <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control bg-light text-black" required readonly value="{{ old('jenis_kelamin', $mustahik->jenis_kelamin) }}">
                              </div> 
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="no_phone">No Handphone </label>
                                 <input type="text" name="no_phone" id="no_phone" class="form-control bg-light text-black" required readonly value="{{ old('no_phone', $mustahik->nomor_telp) }}">
                              </div>

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="status_kawin">Status Perkawinan: </label>
                                 <input type="text" name="status_kawin" id="status_kawin" class="form-control bg-light text-black" required readonly value="{{ old('status_kawin', $mustahik->status_perkawinan) }}">
                              </div>

                              @if($mustahik->rw_id || $mustahik->wilayah_lain)
                                    @if($mustahik->rw_id) 
                                    <div class="form-group col-md-6">
                                       <label class="form-label" for="rt_rw">Informasi Wilayah:</label>
                                       <input type="hidden" name="rt_rw" id="rt_rw" class="form-control bg-light text-black" required readonly value="{{ old('rt_rw', $mustahik->rw_id) }}"></input>
                                       <input type="text" name="rt" id="rt" class="form-control bg-light text-black" required readonly value="{{ old('rt', $mustahik->rw->rt) }}"></input>
                                    </div>
                                    @else
                                    <div class="form-group col-md-6">
                                       <label class="form-label" for="nama_wilayah">Informasi Wilayah: </label>
                                       <input type="text" name="nama_wilayah" id="nama_wilayah" class="form-control bg-light text-black" required readonly value="{{ old('nama_wilayah', $mustahik->wilayah_lain) }}">
                                    </div>
                                    @endif
                              @else
                                    <p>Tidak ada informasi</p>
                              @endif
                               
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="alamat">Alamat: </label>
                                 <input type="text" name="alamat" id="alamat" class="form-control bg-light text-black" required readonly value="{{ old('alamat', $mustahik->alamat) }}">
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
                           </div>
                           <div class="row"> 
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="perkerjaan">Pekerjaan: </label>
                                 <input type="text" name="pekerjaan" id="pekerjaan" class="form-control bg-light text-black" required readonly value="{{ old('pekerjaan', $mustahik->pekerjaan) }}">
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_pendapatan">Jumlah Pendapatan: </label>
                                 <input type="text" name="jml_pendapatan[]" id="jml_pendapatan" class="form-control bg-light text-black" value="{{ $mustahik->jumlah_pendapatan }}" required readonly>
                              </div>

                              <div class="form-group col-md-6"> 
                                 <label class="form-label" for="jml_anak">Jml Anak dlm Tanggungan: </label>
                                 <input type="text" name="jml_anak" id="jml_anak" class="form-control bg-light text-black" value="{{ $mustahik->jumlah_anak_dalam_tanggungan }}" required readonly>
                              </div> 
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_bansos">Jumlah Bansos Diterima: </label>
                                 <input type="text" name="jml_bansos[]" id="jml_bansos" class="form-control bg-light text-black" value="{{ $mustahik->jumlah_bansos_diterima }}" required readonly>
                              </div>
                              
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="status_tinggal">Status Tempat Tinggal: </label>
                                 <input type="text" name="status_tinggal" id="status_tinggal" class="form-control bg-light text-black" required readonly value="{{ $mustahik->status_tempat_tinggal }}">
                              </div>

                              @if($mustahik->status_tempat_tinggal === 'Kontrakan')
                              <div class="form-group col-md-6" id="pengeluaran_kontrakan_section">
                                 <label class="form-label" for="pengeluaran_kontrakan">Pengeluaran Listrik & Kontrakan: </label>
                                 <input type="text" name="pengeluaran_kontrakan[]" id="pengeluaran_kontrakan" class="form-control bg-light text-black" value="{{ $mustahik->pengeluaran_kontrakan }}" required readonly>
                              </div>
                              @else
                              <div class="form-group col-md-6" id="pengeluaran_listrik_section">
                                 <label class="form-label" for="pengeluaran_listrik">Pengeluaran Listrik: </label>
                                 <input type="text" name="pengeluaran_listrik[]" id="pengeluaran_listrik" class="form-control bg-light text-black" value="{{ $mustahik->pengeluaran_listrik }}" required readonly>
                              </div> 
                              @endif

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="jml_hutang">Jumlah Hutang: </label>
                                 <input type="text" name="jml_hutang[]" id="jml_hutang" class="form-control  bg-light text-black" value="{{ $mustahik->jumlah_hutang }}" required readonly>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="keperluan_hutang">Keperluan Hutang: </label>
                                 <input type="text" name="keperluan_hutang" id="keperluan_hutang" class="form-control bg-light text-black" required readonly value="{{ old('keperluan_hutang', $mustahik->keperluan_hutang) }}">
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
                                 <h4 class="mb-4">Approval Mustahiq:</h4>
                              </div>
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
                                 <label class="form-label" for="jml_uang">Jumlah Uang: <span class="text-danger">*</span></label>
                                 <input type="number" name="jml_uang[]" id="jml_uang" class="form-control" placeholder="Jumlah uang" value="{{ old('jml_uang')[0] ?? '' }}">
                              </div>
                              <div class="form-group col-md-3">
                                 <label class="form-label" for="jml_beras">Jumlah Beras: <span class="text-danger">*</span></label>
                                 <input type="text" name="jml_beras[]" id="jml_beras" class="form-control" placeholder="Jumlah Beras" value="{{ old('jml_beras')[0] ?? '' }}">
                              </div>
                              <div class="form-group col-md-3">
                                 <label class="form-label" for="satuan_beras">Satuan Beras: <span class="text-danger">*</span></label>
                                 <select name="satuan_beras" class="form-control" id="satuan_beras">
                                    <option value="">Pilih Satuan Beras</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Liter">Liter</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="status">Update Status: <span class="text-danger">*</span></label>
                                 <select name="status" class="form-control" id="status" >
                                    <option value="">Pilih Status</option>
                                    <option value="2">Setujui</option>
                                    <option value="3">Tolak</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="keterangan">Keterangan:</label>
                                 {!! Form::text('keterangan', old('keterangan'), ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
                              </div>

                              <input type="hidden" name="status" id="status" value="2">

                           </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary next action-button float-end next3" value="Submit">Update</button>
                        <button type="button" name="previous" class="btn  btn-dark previous action-button-previous float-end me-1" value="Previous">Previous</button>
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
      $('.next3').prop('disabled', true);

      $('input, select').on('input change', function() {
         var kategori_mustahik = $('#kategori_mustahik').val();
         var tgl_terima_zakat = $('#tgl_terima_zakat').val();
         var kategorix = $('#kategorix').val();
         var jml_uang = $('#jml_uang').val();
         var jml_beras = $('#jml_beras').val();
         var satuan_beras = $('#satuan_beras').val();
         var status = $('#status').val();
         if (kategori_mustahik !== '' &&
            tgl_terima_zakat !== '' &&
            kategorix !== '' &&
            jml_uang !== '' &&
            jml_beras !== '' &&
            satuan_beras !== '' &&
            status !== '') {
            $('.next3').prop('disabled', false);
         } else {
            $('.next3').prop('disabled', true);
         }
      });

   });
</script> 