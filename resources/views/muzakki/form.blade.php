<x-app-layout :assets="$assets ?? []">
   <div>
      <?php
      $id = $id ?? null;
      ?>
      @if(isset($id))
      {!! Form::model($data, ['route' => ['muzakki.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
      @else
      {!! Form::open(['route' => ['muzakki.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
      @endif

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
                     {{ Form::select('dibayarkan', $agt, "", ['class' => 'form-control', 'placeholder' => 'Select User Role', 'id' => 'dibayarkan']) }}
                  </div>
                  <div cs="form-group col-md-2">
                  </div>
               </div>
               <div class="row">
                  <span class="btn btn-info btn-sm float-right" id="addRow">Tambah Row</span>
                  <div class="form-group col-md-12">
                     <table class="table" id="muzakkiTable">
                        <thead>
                           <th>No</th>
                           <th>Nama</th>
                           <th>Kategori</th>
                           <th>Type Pembayaran</th>
                           <th>Jumlah</th>
                           <th>Satuan</th>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>
                                 {{ Form::select('user[]', $agt, "", ['class' => 'form-control', 'placeholder' => 'Select User ', 'id' => 'dibayarkan']) }}

                              </td>
                              <td>
                                 {{ Form::select('kategori[]', $ktg, "", ['class' => 'form-control', 'placeholder' => 'Select Kategri', 'id' => 'dibayarkan']) }}

                              </td>
                              <td>
                                 <input type="radio" name="type[0]" value="Beras" id="Beras0">
                                 <label for="Beras0">Beras</label>
                                 <input type="radio" name="type[0]" value="Uang" id="Uang0">
                                 <label for="Uang0">Uang</label>
                              </td>
                              <td>
                                 <input type="number"  name="jumlah[]" id="jumlah" class="form-control" required>
                              </td>
                              <td id="satuan0"></td>
                           </tr>

                        </tbody>
                        <hr>
                        <tr>
                        <td colspan="4" rowspan="2" class="text-end"><strong>Total:</strong></td>
<td class="text-star" colspan="2"><span id="ttlLiter">0</span> <i>Liter</i></td>
</tr>
<td class="text-star" colspan="2"><span id="ttlRupiah">0</span> <i>Rupiah</i></td>
</tr>

                     </table>
                  </div>
                  <button type="submit" class="btn btn-primary">{{$id !== null ? 'Update' : 'Add' }} Muzakki</button>
               </div>
            </div>
         </div>
      </div>

      {!! Form::close() !!}
   </div>
</x-app-layout>
<script>
   var agt = <?php echo json_encode($agt); ?>;
   var ktg = <?php echo json_encode($ktg); ?>;

   function generateOptions(data) {
      let options = '';
      Object.entries(data).forEach(([key, value]) => {
         options += `<option value="${key}">${value}</option>`;
      });
      return options;
   }

   document.getElementById('addRow').addEventListener('click', function() {
   var tableBody = document.querySelector('#muzakkiTable tbody');
   var rowCount = tableBody.rows.length;
   var newRow = tableBody.insertRow(rowCount);

   var cellCount = tableBody.rows[0].cells.length;
   for (var i = 0; i < cellCount; i++) {
      var newCell = newRow.insertCell(i);
      if (i == 0) {
         newCell.textContent = rowCount + 1;
      } else if (i == 2) {
         var select = document.createElement('select');
         select.name = 'kategori[]';
         select.className = 'form-control';
         select.placeholder = 'Select User Role';
         select.innerHTML = generateOptions(ktg);
         newCell.appendChild(select);
      } else if (i == 3) {
         var radio1 = document.createElement('input');
         radio1.type = 'radio';
         radio1.name = 'type[' + rowCount + ']';
         radio1.value = 'Beras';
         radio1.id = 'Beras' + rowCount;
         var label1 = document.createElement('label');
         label1.setAttribute('for', 'Beras' + rowCount);
         label1.textContent = 'Beras';
         var radio2 = document.createElement('input');
         radio2.type = 'radio';
         radio2.name = 'type[' + rowCount + ']';
         radio2.value = 'Uang';
         radio2.id = 'Uang' + rowCount;
         var label2 = document.createElement('label');
         label2.setAttribute('for', 'Uang' + rowCount);
         label2.textContent = 'Uang';
         newCell.appendChild(radio1);
         newCell.appendChild(label1);
         newCell.appendChild(radio2);
         newCell.appendChild(label2);
      } else if (i == 4) {
         var input = document.createElement('input');
         input.type = 'number';
         input.name = 'jumlah[]';
         input.className = 'form-control';
         input.required = true;
         input.addEventListener('input', calculateTotal); // Tambahkan event listener
         newCell.appendChild(input);
      } else if (i == 5) {
         newCell.textContent = '';
         newCell.id = 'satuan' + rowCount;
      } else {
         var selectUser = document.createElement('select');
         selectUser.name = 'user[]';
         selectUser.className = 'form-control';
         selectUser.placeholder = 'Select User Role';
         selectUser.innerHTML = generateOptions(agt);
         newCell.appendChild(selectUser);
      }
   }

   document.getElementById('Beras' + rowCount).addEventListener('change', function() {
      if (this.checked) {
         document.getElementById('satuan' + rowCount).textContent = 'Liter';
      }
   });

   document.getElementById('Uang' + rowCount).addEventListener('change', function() {
      if (this.checked) {
         document.getElementById('satuan' + rowCount).textContent = 'Rupiah';
      }
   });
});

document.getElementById('Beras0').addEventListener('change', function() {
      if (this.checked) {
         document.getElementById('satuan0').textContent = 'Liter';
      }
   });

   document.getElementById('Uang0').addEventListener('change', function() {
      if (this.checked) {
         document.getElementById('satuan0').textContent = 'Rupiah';
      }
   });

// Event listener untuk menghitung total ketika halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
   calculateTotal();
});

// Fungsi untuk menghitung total
function calculateTotal() {
   var totalLiter = 0;
   var totalRupiah = 0;

   var tableBody = document.querySelector('#muzakkiTable tbody');
   var rows = tableBody.rows;
   for (var i = 0; i < rows.length; i++) {
      var type = document.querySelector('input[name="type[' + i + ']"]:checked');
      if (type) {
         type = type.value;
      } else {
         continue; // Skip jika tidak ada radio button yang terpilih
      }
      var jumlah = parseInt(rows[i].querySelector('input[name="jumlah[]"]').value);

      if (type === 'Beras') {
         totalLiter += jumlah;
      } else if (type === 'Uang') {
         totalRupiah += jumlah;
      }
   }

   // Update total liter dan total rupiah di tabel
   document.getElementById('ttlLiter').textContent = totalLiter;
   document.getElementById('ttlRupiah').textContent = totalRupiah;
}

</script>