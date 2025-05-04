<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="container-fluid iq-container">

         <div class="row g-3">
            {{-- Card 1 --}}
            <div class="col-lg-2 col-md-6">
               <div class="card bg-soft-primary">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="bg-soft-primary rounded p-3">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                           </svg>
                        </div>
                        <div class="text-end">
                           <h2 class="counter mb-0">{{$data['ttlPengajuan']}}</h2>
                           <small>Pengajuan</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            {{-- Card 2 --}}
            <div class="col-lg-2 col-md-6">
               <div class="card bg-soft-primary">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="bg-soft-primary rounded p-3">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                           </svg>
                        </div>
                        <div class="text-end">
                           <h2 class="counter mb-0">{{$data['ttlNomor']}}</h2>
                           <small>Nomor</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            {{-- Card 3 --}}
            <div class="col-lg-2 col-md-6">
               <div class="card bg-soft-primary">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="bg-soft-primary rounded p-3">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                           </svg>
                        </div>
                        <div class="text-end">
                           <h2 class="counter mb-0">{{$data['ttlCampaign']}}</h2>
                           <small>Total Campaign</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            {{-- Card 4 --}}
            <div class="col-lg-2 col-md-6">
               <div class="card bg-soft-primary">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="bg-soft-primary rounded p-3">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                           </svg>
                        </div>
                        <div class="text-end">
                           <h2 class="counter mb-0">{{$data['lainnya']}}</h2>
                           <small>Total Campaign</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            {{-- Card 5 --}}
            <div class="col-lg-4 col-md-6">
               <div class="card shadow-sm rounded-lg bg-soft-info">
                  <div class="card-body">
                     <div class="d-flex justify-content-between align-items-center">
                        <div class="bg-soft-info rounded p-4 shadow-sm text-center">
                           <small class="text-uppercase text-muted">Aktifasi Serve</small>
                           <small class=" d-block text-primary"><span class="fw-bold">{{$server['start']}}</span> s/d <span class="fw-bold">{{$server['exp']}}</span></small>
                           <small class="text-countdown d-block mt-2" style=" font-size: 15px; font-weight: bold; color: #6c757d;" id="countdown">Menghitung...</small>
                        </div>

                        <div class="text-end">
                           <small class=" d-block"><span class="fw-bold">{{$kredit['total']}}</span> <i>kredit</i> s/d {{$kredit['exp']}}</small>
                           <small class=" text-danger d-block">terpakai: <span class="fw-bold">{{$kredit['terpakai']}}</span> kredit</small>




                           <div class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$kredit['total']-$kredit['terpakai']}} Kredit siap pakai">

                              <h2 class="counter mb-0 m-2 text-success"><span class="fw-bold">{{$kredit['total']-$kredit['terpakai']}}</span> </h2>
                              <small><i>kredit</i></small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>



         </div>

         {{-- Filter dan Status --}}
         <div class="row card border-bottom border-4 border-0 border-info p-1">
            <div class="col-12 d-flex flex-wrap justify-content-between align-items-center gap-2">
               {{-- Filter Tanggal --}}
               <div class="input-group" style="max-width: 280px;">
                  <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                  <input type="text" class="form-control" value="05/04/2025 - 05/04/2025">
                  <button class="btn btn-info">Search</button>
               </div>

               {{-- Tombol Status --}}
               <div class="d-flex flex-wrap gap-2">
                  <button class="btn d-flex align-items-center" style="background-color:#00bcd4; color:white;"
                     data-bs-toggle="modal" data-bs-target="#statusModal" data-status="SENT">
                     <span class="bg-primary  rounded text-white px-2 py-1 fw-bold">S</span>
                     <span class="px-2">SENT</span>
                  </button>

                  <button class="btn d-flex align-items-center" style="background-color:#4caf50; color:white;"
                     data-bs-toggle="modal" data-bs-target="#statusModal" data-status="DELIVERED">
                     <span class="bg-success  rounded text-white px-2 py-1 fw-bold">D</span>
                     <span class="px-2">DELIVERED</span>
                  </button>

                  <button class="btn d-flex align-items-center" style="background-color:#2e7d32; color:white;"
                     data-bs-toggle="modal" data-bs-target="#statusModal" data-status="READ">
                     <span class="bg-success  rounded text-white px-2 py-1 fw-bold">R</span>
                     <span class="px-2">READ</span>
                  </button>

                  <button class="btn d-flex align-items-center" style="background-color:#e53935; color:white;"
                     data-bs-toggle="modal" data-bs-target="#statusModal" data-status="FAILED">
                     <span class="bg-danger  rounded text-white px-2 py-1 fw-bold">F</span>
                     <span class="px-2">FAILED</span>
                  </button>

                  <button class="btn d-flex align-items-center" style="background-color:#fb8c00; color:white;"
                     data-bs-toggle="modal" data-bs-target="#statusModal" data-status="ABORTED">
                     <span class="bg-warning  rounded text-white px-2 py-1 fw-bold">A</span>
                     <span class="px-2">ABORTED</span>
                  </button>
                  <button class="btn d-flex align-items-center gap-2 px-3 py-2 btn-light">
                     <span class="fw-semibold">Sinkron</span>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>


   <script>
      var countDownDate = new Date("{{ $server['exp'] }}T00:00:00").getTime();

      var x = setInterval(function() {
         var now = new Date().getTime();
         var distance = countDownDate - now;

         if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Kadaluarsa";
            return;
         }

         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
         var seconds = Math.floor((distance % (1000 * 60)) / 1000);

         document.getElementById("countdown").innerHTML =
            days + "d : " + hours + "h : " + minutes + "m : " + seconds + "s";
      }, 1000);
   </script> 
</x-app-layout>