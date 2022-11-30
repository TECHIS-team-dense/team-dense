@props(['status' => 'register']) 

@php 
  if(session('status') === 'register'){ $bgColor = 'alert-primary';} 
  if(session('status') === 'alert'){$bgColor = 'alert-danger';} 
  if(session('status') === 'Restoration'){$bgColor = 'alert-success';} 
@endphp 

@if(session('message')) 
  <h4 class="{{ $bgColor }} text-center alert col-md-5 m-4 text-white"> 
    {{ session('message' )}} 
  </h4> 
@endif




{{-- <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    An example success alert with an icon
  </div>
</div> --}}
