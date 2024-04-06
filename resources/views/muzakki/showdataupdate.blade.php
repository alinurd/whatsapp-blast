<x-app-layout layout="landing">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="iq-timeline m-0 d-flex align-items-center justify-content-between position-relative">
                  <ul class="list-inline p-0 m-0 w-100">
                     <h6 class="text-center mb-4"><b><u>{{$data[0]->code}}</u></b></h6>
                     @foreach($data as $q)
                     @php
                     $changes = json_decode($q->changes, true);
                     @endphp
                     <li>
                       @if( $q->method=="update")
                        <div class="time bg-warning">
                           <span>{{ $q->user }}</span>
                        </div>
                        <div class="content">
                           <div class="timeline-dots new-timeline-dots border-warning"></div>
                           <h6 class="mb-1">{{ $q->updated_at }}</h6>
                           <div class="d-inline-block w-100">
                              <p><strong>Changes {{ $q->method }}</strong></p>
                              <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Field</th>
                                       <th>Before</th>
                                       <th>After</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($changes as $field => $values)
                                    @if(is_array($values))
                                    <tr>
                                       <td>{{ $field }}</td>
                                       <td>{{ $values['before'] }}</td>
                                       <td>{{ $values['after'] }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>

                        </div>
                       @else
                       <div class="time bg-success">
                           <span>{{ $q->user }}</span>
                        </div>
                        <div class="content">
                           <div class="timeline-dots new-timeline-dots border-success"></div>
                           <h6 class="mb-1">{{ $q->updated_at }}</h6>
                           <div class="d-inline-block w-100">
                              <p><strong>Changes {{ $q->method }}</strong></p>
                              {{dd($q->changes)}}
                              <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Field</th>
                                       <th>Value</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($changes as $field => $values)
                                      <tr>
                                       <td>{{ $field }}</td>
                                       <td>{{ $values }}</td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                              </table>
                           </div>

                        </div>
                        @endif
                     </li>
                     @endforeach

                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

</x-app-layout>