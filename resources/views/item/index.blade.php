@extends('layouts.common')

@section('title', 'ホーム画面')

@section('content')

<div class="row">
  <div class="col-12">

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

      {{-- <div class="card">
          <div class="card-header">
              <div class="card-tools">
                <div class="container"> --}}
                  {{-- <div class="justify-content-center"> --}}
                  {{-- <section class="text-gray-600 body-font"> --}}
                    {{-- <div class="container py-3"> --}}
                      
                      <div class="flex flex-col text-center w-full mb-8">
                        <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900">商品一覧</h1>
                        <div class="text-center m-1 p-4">
                          <a href="{{ url('items/create') }}" class="text-white bg-green-500 border-0 py-3 px-6
                          focus:outline-none hover:bg-green-600 rounded text-sm">商品登録する</a>
                        </div>
                      </div>
                      <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200 rounded-tl rounded-bl">ID</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">商品名</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">種別</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">価格（円）</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200"></th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200"></th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($items as $item)
                            <tr>
                              <td class="px-4 py-3 text-gray-900 title-font font-medium border-gray-200">{{ $item->id }}</td>
                              <td><a href="{{ route('items.show', ['item' => $item->id]) }}">{{ $item->name }}</a></td>
                              <td class="text-gray-900 title-font text-lg font-medium">{{ $item->type }}</td>
                              <td class="text-gray-900 title-font text-lg font-medium">{{ number_format($item->price) }}</td>
                              <td>
                                <button onclick="location.href='{{ route('items.edit', ['item' => $item->id ]) }}'"  class="text-white bg-green-500 border-0 py-2 px-3
                                  focus:outline-none hover:bg-green-600 rounded text-sm"">編集</button>
                            </td>
                              <form id="delete_{{ $item->id }}" method="post" action="{{ route('items.destroy', ['item' => $item->id ]) }}">
                                @csrf
                                @method('delete')
    
                                <td class="pl-3">
                                    <a href="#" data-id="{{ $item->id }}" onclick="deletePost(this)" class="text-white bg-red-500 border-0 py-2 px-3
                                      focus:outline-none hover:bg-red-600 rounded text-sm">削除</a>
                                </td>
                            </form>
                            </tr>
                            @endforeach
                          </tbody>

                        </table>
                        <div class="text-center">
                          {{ $items->links() }}
                        </div>
                      </div>
                    </div>
                  {{-- </section>    
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
  </div> --}}

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



