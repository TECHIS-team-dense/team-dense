@extends('layouts.common')

@section('title', 'ホーム画面')

@section('css')
@endsection

@section('script')
@endsection

@section('content')
  <section class="text-gray-600 body-font relative" _msthidden="8">
    <div class="container px-5 py-16 mx-auto" _msthidden="8">
      <div class="flex flex-col text-center w-full mb-12" _msthidden="2">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900" _msthash="572611"
        _msttexthash="132405" _msthidden="1">お問い合わせ完了しました。</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base" _msthash="541463" _msttexthash="3498859"
        _msthidden="1">お問い合わせいただき、ありがとうございます<br>
        お問い合わせ頂いた内容については、確認の上、ご返信させていただきます。</p>
        <a href="{{ route('items.index') }}">商品一覧画面</a>
      </div>
    </div>
  </section>
@endsection