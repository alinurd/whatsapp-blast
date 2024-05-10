<x-app-layout :assets="$assets ?? []">
   <div>
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="card-title">Edit Product</h4>
                  </div>
                  <div class="card-action">
                     <a href="{{route('product.index')}}" class="btn btn-sm btn-primary" role="button">Back</a>
                  </div>
               </div>
               <div class="card-body">
                 
               </div>
            </div>
         </div> 
      </div>
   </div>
</x-app-layout>
