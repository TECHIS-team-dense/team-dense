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
            <div class="card-tools">
              <div class="container">
                {{-- <form method="get" action="{{ route('items.index') }}">
                  <div class="lg:flex lg:justify-around">
                    <div class="lg:flex items-center">
                      <select name="category" class="mb-2 lg:mb-0 custom-select">
                        <option value="">全て</option>
                        @foreach ($categories as $category)
                        <option value="primary:{$category->id}">{{ $category->name }}</option>
                          @foreach ($category->secondary as $secondary)
                            <option value="secondary:{{ $secondary->id }}">{{ $secondary->name }}</option>
                          @endforeach
                        @endforeach
                      </select>
                      <div class="flex space-x-2 item-center">
                        <div><input name="keyword" class="border border-gray-500 py-2" placeholder="キーワードを入力"></div>
                        <div><button class="text-white bg-green-500 border-0 py-2 px-3
                          focus:outline-none hover:bg-green-600 rounded text-sm">検索</button></div>
                      </div>
                    </div>
                  </div>
                </form> --}}

                <form class="form-inline" method="GET" action="{{ route('items.index') }}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select class="custom-select" name="category">
                                <option value="">全て</option>
                                @foreach ($categories as $category)
                                    <option value="primary:{{$category->id}}" class="font-weight-bold">{{$category->name}}</option>
                                    @foreach ($category->secondary as $secondary)
                                        <option value="secondary:{{$secondary->id}}">{{$secondary->name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <input type="text" name="keyword" class="form-control" aria-label="Text input with dropdown button" placeholder="キーワード検索">
                        <div class="input-group-append">
                            <button type="submit" class="text-white bg-green-500 border-0 py-2 px-3
                            focus:outline-none hover:bg-green-600 rounded text-sm ">
                                <i>検索</i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="flex flex-col text-center w-full mb-8">
                  <h1 class="sm:text-4xl text-3xl font-medium title-font text-gray-900">商品一覧</h1>
                  <div class="text-center m-1 p-4">
                    <a href="{{ url('items/create') }}" class="text-white bg-green-500 border-0 py-3 px-6
                    focus:outline-none hover:bg-green-600 rounded text-sm">商品登録</a>
                  </div>
                </div>
                  <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <tr>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200 rounded-tl rounded-bl"></th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">ID</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">商品名</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">価格（円）</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">メーカー</th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200"></th>
                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200"></th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($items as $item)
                          <tr>
                            <td class="bg-gray-100 text-center">
                              <a href="{{ route('items.show', ['item' => $item->id]) }}" class="text-green-500 inline-flex items-center" _msthidden="1">
                                <font _mstmutation="1" _msthash="1047869" _msttexthash="130533" _msthidden="1">詳細</font>
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M5 12h14"></path>
                                  <path d="M12 5l7 7-7 7"></path>
                                </svg>
                              </a>
                            </td>
                            <td class="px-4 py-3 text-gray-900 title-font font-medium border-gray-500 bg-gray-200 text-center">{{ $item->id }}</td>
                            <td class="text-gray-900 title-font text-lg font-medium border-gray-500 bg-gray-100">{{ $item->name }}</td>
                            <td class="text-gray-900 title-font text-lg font-medium border-gray-500 bg-gray-100">{{ number_format($item->price) }}</td>
                            <td class="text-gray-900 title-font text-lg font-medium border-gray-500 bg-gray-1">{{ $item->category->primary->name }}</td>
                            <td class="text-center bg-gray-100">
                                <button onclick="location.href='{{ route('items.edit', ['item' => $item->id ]) }}'"  class="text-white bg-green-500 border-0 py-2 px-3
                                  focus:outline-none hover:bg-green-600 rounded text-sm ">編集</button>
                            </td>
                            <td class="pl-3 text-center bg-gray-100">
                              <form id="delete_{{ $item->id }}" method="post" action="{{ route('items.destroy', ['item' => $item->id ]) }}">
                                @csrf
                                @method('delete')
                                    <a href="#" data-id="{{ $item->id }}" onclick="deletePost(this)" class="text-white bg-red-500 border-0 py-2 px-3
                                    focus:outline-none hover:bg-red-600 rounded text-sm">削除</a>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  <div class="text-center">
                  {{ $items->links() }}
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection




