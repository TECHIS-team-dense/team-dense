@extends('layouts.common')

@section('title', 'ホーム画面')

@section('css')
@endsection

@section('script')
  <script src="{{ asset('js/confirm.js')}}"></script>
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
      <x-flash-message status="session('status')" />
        <div class="card">
          <div class="card-header">
                <div class="flex flex-col text-center w-full mb-5">
                  <h5 class="text-3xl font-medium title-font text-gray-700">ゴミ箱（商品）</h5>
                  <div class="text-center m-1 p-4"></div>
                  <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200 rounded-tl rounded-bl">ID</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">商品名</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">価格（円）</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">メーカー</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200"></th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($expiredItems as $item)
                          <tr>
                            <td class="px-4 py-3 text-gray-900 title-font font-medium border-gray-500 bg-gray-200 text-center">{{ $item->id }}</td>
                            <td class="text-gray-900 title-font text-lg font-medium border-gray-500 bg-gray-100">{{ $item->name }}</td>
                            <td class="text-gray-900 title-font text-lg font-medium border-gray-500 bg-gray-100">{{ number_format($item->price) }}</td>
                            <td class="text-gray-900 title-font text-lg font-medium border-gray-500 bg-gray-1">{{ $item->category->primary->name }}</td>
                            <td class="px-4 py-3">
                              <form method="post" action="{{route('expired-items.restore', ['item' => $item->id ])}}">
                                  @csrf
                                  @method('post')
                                  <button type=”submit” class="text-white bg-green-500 border-0 py-2 px-3
                                  focus:outline-none hover:bg-green-600 rounded text-sm">復元する</button>                                       
                              </form>
                            </td>
                            <td class="px-4 py-3">
                              <form id="delete_{{ $item->id }}" method="post" action="{{ route('expired-items.destroy', ['item' => $item->id ]) }}">
                                @csrf
                                  <a href="#" data-id="{{ $item->id }}" onclick="deletePost(this)" class="btn btn-danger">完全削除</a>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="text-center m-2 p-3">
                      <button type="button" onclick="location.href='{{ route('items.index')}}'" class="bg-gray-600 text-white 
                      border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-sm">商品一覧画面</button>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
  </div>
@endsection





