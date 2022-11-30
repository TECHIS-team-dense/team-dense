@extends('layouts.common')

@section('title', 'ホーム画面')

@section('content')
<h3 class="pl-5">商品一覧</h3>
<div class="row">
  
  <div class="col-12">

      {{-- <x-flash-message status="session('status')" /> --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      @php 
      if(session('status') === 'register'){ $bgColor = 'alert-info';} 
      @endphp 
          
      <script>
        @if (session('message'))
            $(function() {
                toastr.options = {
                  // "positionClass": "“toast-bottom-right”"
                }
                toastr.info('{{ session('message') }}');
            });
        @endif
    </script>

      <div class="card">
        <div class="text-center m-2 p-2">
          <a href="{{ url('items/create') }}" class="btn btn-success text-center">商品新規登録</a>
        </div>

          <div class="card-header">

              <div class="float - right ">
              </div>
              <div class="card-tools">
                      <div class="container">
                      
              </div>
          </div>
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                      {{-- <div class="text-center m-2 p-2">
                          <a href="{{ url('items/add') }}" class="btn btn-primary text-center">商品新規登録</a>
                      </div> --}}
                      <tr>
                          <th class="table-success">ID</th>
                          <th class="table-success">商品名</th>
                          <th class="table-success">種別</th>
                          <th class="table-success">価格（円）</th>
                          <th class="table-success">商品詳細</th>
                          <th class="table-success"></th>
                          <th class="table-success"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($items as $item)
                      <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->type }}</td>
                          <td>{{ number_format($item->price) }}</td>
                          <td>{{ $item->detail }}</td>
                          {{-- <td>
                              <x-image-thumbnail :filename="$item->filename" />
                          </td> --}}
                          <td>
                              <button onclick="location.href='{{ route('items.edit', ['item' => $item->id ]) }}'"  class="btn btn-info text-white"">編集</button>
                          </td>

                          <form id="delete_{{ $item->id }}" method="post" action="{{ route('items.destroy', ['item' => $item->id ]) }}">
                            @csrf
                            @method('delete')

                            <td>
                                <a href="#" data-id="{{ $item->id }}" onclick="deletePost(this)" class="btn btn-danger">削除</a>
                            </td>
                        </form>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
      </div>
      <div class="">
        {{ $items->links() }}
      </div>
  </div>

</div>
@endsection

<script>
  function deletePost(e) {
      'use strict';
      if (confirm('本当に削除してもいいですか?')) {
      document.getElementById('delete_' + e.dataset.id).submit();
      }
  }
</script>



