@extends('layouts.common')

@section('title', 'ホーム画面')

@section('script')
  <script src="{{ asset('js/confirm.js')}}"></script>
@endsection

@section('content')
  <div class="row">
    <div class="col-12">

      <x-flash-message status="session('status')" />

        <div class="card">
            <div class="card-header">
                <div class="float - right ">
                </div>
                <div class="card-tools">
                  <div class="container">
                    <section class="text-gray-600 body-font">
                      <div class="container px-12 py-3 mx-auto">
                        <div class="flex flex-col text-center w-full mb-12">
                          <h2 class="text-3xl font-medium title-font text-gray-900">ゴミ箱（商品）</h2>
                        </div>
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                          <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                              <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200 rounded-tl rounded-bl">ID</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">商品名</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">価格（円）</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">メーカー</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">ラインナップ</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($expiredItems as $item)
                              <tr>
                                <td class="px-4 py-3">{{ $item->id }}</td>
                                <td class="px-4 py-3">{{ $item->name }}</td>
                                <td class="px-4 py-3">{{ number_format($item->price) }}</td>
                                <td class="px-4 py-3">{{  $item->category->primary->name  }}</td>
                                <td class="px-4 py-3">{{  $item->category->name  }}</td>

                                <form id="delete_{{ $item->id }}" method="post" action="{{ route('expired-items.destroy', ['item' => $item->id ]) }}">
                                  @csrf
                                  <td>
                                      <a href="#" data-id="{{ $item->id }}" onclick="deletePost(this)" class="btn btn-danger">完全削除</a>
                                  </td>
                              </form>
                              </form>
                              </tr>
                              @endforeach
                            </tbody>
                            
                          </table>
                        </div>
                      </div>
                    </section>    
                  </div>
                </div>
                <div class="text-center m-2 p-3">
                  <button type="button" onclick="location.href='{{ route('items.index')}}'" class="bg-gray-600 text-white 
                  border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-sm">商品一覧画面</button>
                </div>
            </div>
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



