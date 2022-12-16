@extends('layouts.common')

@section('title', 'ホーム画面')

@section('css')
  <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
  <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
@endsection

@section('script')
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
  <script src="{{ asset('js/slider.js')}}"></script>
  <script src="{{ asset('js/modal.js')}}"></script>
@endsection

@section('content')
<h3 class="pl-5"></h3>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header">
            <div class="float - right ">
            </div>
              <div class="card-tools">
                <div class="container">
                  <section class="text-gray-600 body-font">
                    <div class="container px-1 py-8 mx-auto">
                      <div class="flex flex-col text-center w-full mb-3">
                        <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">商品詳細</h1>
                      </div>
                      <div class="border-b pb-5 mb-5 border-gray-600">
                        <div class="">
                          <div class="h-full flex sm:flex-row flex-col items-center justify-center sm: text-center">

                              <div class="swiper">
                                <div class="swiper-wrapper">
                                  @if(!empty($item->filename))
                                    <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
                                      object-center sm:mb-0 mb-4" src="{{ asset("storage/items/" . $item->filename )}}">
                                    </div>
                                  @else
                                    <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
                                      object-center sm:mb-0 mb-4" src="{{ asset('images/noimage3.png') }}">
                                    </div>
                                  @endif

                                  @if(!empty($item->filename_one))
                                    <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
                                      object-center sm:mb-0 mb-4" src="{{ asset("storage/items/" . $item->filename_one )}}">
                                    </div>
                                  @else
                                    <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
                                      object-center sm:mb-0 mb-4" src="{{ asset('images/noimage3.png') }}">
                                    </div>
                                  @endif

                                  @if(!empty($item->filename_two))
                                    <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
                                      object-center sm:mb-0 mb-4" src="{{ asset("storage/items/" . $item->filename_two )}}">
                                    </div>
                                  @else
                                    <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
                                      object-center sm:mb-0 mb-4" src="{{ asset('images/noimage3.png') }}">
                                    </div>
                                  @endif
                                  </div>
                                  <!-- 必要に応じてページネーション -->
                                  <div class="swiper-pagination"></div>
                                  <!-- 必要に応じてナビボタン -->
                                  <div class="swiper-button-prev"></div>
                                  <div class="swiper-button-next"></div>
                              </div>
                            </div>

                              <div class="flex-grow sm:pl-8 text-center pt-2">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">名前：{{ $item->name }}</h1>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">価格：{{ number_format($item->price) }}円</h1>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">メーカー：{{ $item->category->primary->name }}</h1>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">ラインナップ：{{  $item->category->name }}</h1>
                                  <section class="section">
                                      <button type="button" data-micromodal-trigger="modal-1" class="text-white bg-green-500 border-0 py-2 px-3
                                      focus:outline-none hover:bg-green-600 rounded text-sm">詳細</button>
                                      <x-modal :item="$item" />
                                  </section>
                              </div>
                          </div>
                        </div>
                    @if( Auth::user()->role == 1 )
                        <div class="p-2 w-full flex justify-around mt-4 ">
                          <button type="button" onclick="location.href='{{ route('items.edit', ['item' => $item->id ]) }}'" class="text-white bg-green-500 border-0 py-2 px-3
                            focus:outline-none hover:bg-green-600 rounded text-sm ">編集する</button>                  
                        </div>
                    @endif
                        <div class="p-2 w-full flex justify-around mt-4 ">
                          <button type="button" onclick="location.href='{{ route('items.index')}}'" class="bg-gray-600 text-white 
                            py-2 px-8  focus:outline-none hover:bg-gray-500 rounded text-sm">商品一覧画面</button>                  
                        </div>
                    </div>
                    

                        <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col" _msthidden="3">
                          <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0" _msthidden="3">
                          </div>
    
                        </div>
                  </section>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection




