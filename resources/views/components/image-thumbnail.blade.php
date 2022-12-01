<div class="">
  @if(empty($filename))
      <img src="{{ asset('images/noimage3.png') }}" width="100" height="100" >
  @else
      <img src="{{ asset('storage/items/'. $filename) }}" width="100" height="100" >
  @endif
</div>