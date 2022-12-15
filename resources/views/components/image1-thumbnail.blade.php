@if(empty($item->filename_one))
  <img src="{{ asset('images/noimage3.png') }}" width="100" height="100" >
@else
  <img src="{{ asset('storage/items/'. $item->filename_one) }}" width="100" height="100" >
@endif