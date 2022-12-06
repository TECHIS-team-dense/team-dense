@extends('layouts.common')

@section('title', 'ホーム画面')

@section('css')
<link href="{{ asset('css/slider.css') }}" rel="stylesheet">
<link
rel="stylesheet"
href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
@endsection

@section('script')
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="{{ asset('js/slider.js')}}">
  </script>
@endsection

@section('content')
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




