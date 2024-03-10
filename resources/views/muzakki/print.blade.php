<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-lg-12">
         <div class="card rounded">
            <button type="button" class="btn btn-success float-end" id="print">Print</button>
            <div class="card-body">
               <div class="row">
                  <div class="col-sm-12">
                     <br><br><br>
                     <h4 class="mb-2">Invoice <span class="float-end"><b>#{{$data['header'][0]['code']}}</b> <br><i  style="font-size: 11px;">Jakarta, <?= date("d-m-Y"); ?></i></span></h4>
                     <h5 class="mb-3">Hello, {{$data['header'][0]['user']['nama_lengkap']}} </h5>
                     <p>terima kasih sudah membayarkan zakat</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12 mt-4">
                     <div class="table-responsive-sm">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th class="text-center">No</th>
                                 <th scope="col">Nama</th>
                                 <th class="text-center" scope="col">Kategori</th>
                                 <th class="text-center" scope="col">Type</th>
                                 <th class="text-center" scope="col">Jumlah</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $no = 0; ?>
                              @foreach ($data['detail'] as $item)
                              <tr>
                                 <td class="text-center">{{++$no}}</td>
                                 <td>
                                    <h6 class="mb-0">{{$item['user']['nama_lengkap']}}</h6>
                                 </td>
                                 <td class="text-center">{{$item['kategori']['nama_kategori']}}</td>
                                 <td class="text-center">{{$item['type']}}</td>
                                 <td class="text-center">{{$item['jumlah_bayar']}}</td>
                              </tr>
                              @endforeach
                              <tr>
                                 <td colspan="4" rowspan="2">
                                    <h6 class="mb-0 float-end"><strong>Total:</strong></h6>
                                 </td>
                                 <td class="text-center"> <span id="ttlBeras">0</span> <i>Liter</i></td>
                              </tr>
                              <tr>
                                 <td class="text-center"> <span id="ttlUang">0</span> <i>Rupiah</i></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="mt-3">

                     <div class="">
                     <table style="margin: 0 auto;"> 
                        <tr>
                           <td>Dibayarkan Oleh</td>
                           <td style="width: 200px; height: 200px;"></td> <!-- Jarak untuk tanda tangan -->
                           <td>Diterima Oleh</td>
                        </tr>
                        <tr>
                           <td>{{$data['header'][0]['user']['nama_lengkap']}}</td>
                           <td></td>
                           <td>Panitia</td>
                        </tr>
                     </table>
                  </div>
               </div><br><br><br>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
<script>
   document.addEventListener('DOMContentLoaded', function() {
      var totalBeras = 0;
      var totalUang = 0;

      @foreach($data['detail'] as $item)
      @if($item['type'] === 'Beras')
      totalBeras += parseFloat({{ $item['jumlah_bayar'] }});
      @elseif($item['type'] === 'Uang')
      totalUang += parseFloat({{ $item['jumlah_bayar'] }});
      @endif
      @endforeach

      document.getElementById('ttlBeras').textContent = totalBeras.toLocaleString();
      document.getElementById('ttlUang').textContent = formatRupiah(totalUang);
   });

   function formatRupiah(angka) {
      var number_string = angka.toString().replace(/[^,\d]/g, ''),
         split = number_string.split(','),
         sisa = split[0].length % 3,
         rupiah = split[0].substr(0, sisa),
         ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

      if (ribuan) {
         separator = sisa ? '.' : '';
         rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return rupiah;
   }


   document.addEventListener('DOMContentLoaded', function() {
    // Memanggil fungsi print ketika tombol Print di klik
    document.getElementById('print').addEventListener('click', function() {
        var printContents = document.querySelector('.card-body').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    });
});


</script>
