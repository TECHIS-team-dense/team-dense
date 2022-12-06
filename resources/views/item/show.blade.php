@extends('layouts.common')

@section('title', 'ホーム画面')

@section('css')
<link href="{{ asset('css/slider.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/slider.js')}}"></script>
    <script src="{{ asset('js/confirm.js')}}"></script>
    <script src="{{ asset('js/slider.js')}}"></script>
@endsection

@section('content')
<h3 class="pl-5"></h3>
<div class="row">
  <div class="col-12">

      @php 
      if(session('status') === 'register'){ $bgColor = 'alert-info';} 
      @endphp 

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
                      <div class="flex flex-wrap -m-2">
                        <div class="">
                          <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center sm:text-left">

                            @if(empty($item->filename))
                                <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
                                object-center sm:mb-0 mb-4" src={{ asset("images/noimage3.png")}}>
                              @else
                                <img src="{{ asset('storage/items/' . $item->filename) }}">
                              @endif
                              
                                <div class="flex-grow sm:pl-8">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">名前：{{ $item->name }}</h1>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">種別：{{ $item->type }}</h1>
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">価格：{{ number_format($item->price) }}円</h1>
                                <p class="title-font text-lg font-medium text-gray-900 mb-3">詳細：{{ $item->detail }}</p>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <div class="p-2 w-full flex justify-around mt-4">
                        <button type="button" onclick="location.href='{{ route('items.index')}}'" class="bg-gray-600 text-white 
                        border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-sm">戻る</button>                  
                      </div>
                    </div>
                  </section>
                </div>
              </div>
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead>

                  </thead>
                  <tbody>
                      <tr>
                      </tr>
                  </tbody>
              </table>
            </div>
          </div>
      </div>
  </div>
</div>
<!-- スライダーのコンテナ -->
<div class="swiper">
  <!-- 必要に応じたwrapper -->
  <div class="swiper-wrapper">
  <!-- スライド -->
  <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
    object-center sm:mb-0 mb-4" src={{ asset("images/noimage3.png")}}></div>
  <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
    object-center sm:mb-0 mb-4" src={{ asset("images/tyesu.jpg")}}></div>
  <div class="swiper-slide"><img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover 
    object-center sm:mb-0 mb-4" src={{ asset("images/noimage3.png")}}></div>
  </div>
  <!-- 必要に応じてページネーション -->
  <div class="swiper-pagination"></div>
  <!-- 必要に応じてナビボタン -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>
@endsection




