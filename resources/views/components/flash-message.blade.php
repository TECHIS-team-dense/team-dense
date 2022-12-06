@props(['status' => 'info'])

@php
  if(session('status') === 'info'){$bgColor = 'bg-green-400';}
  if(session('status') === 'alert'){$bgColor = 'bg-red-500';}
@endphp

@if (session('message'))
  <div class="{{ $bgColor }} text-center w-1/2 mx-auto p-2 my-4 text-white">
    {{ session('message') }}
  </div>
@endif




{{-- <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    An example success alert with an icon
  </div>
</div> --}}
