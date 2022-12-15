@if(empty($item->filename_two))
  <img src="{{ asset('images/noimage3.png') }}" width="100" height="100" >
@else
  <img src="{{ asset('storage/items/'. $item->filename_two) }}" width="100" height="100" >
@endif