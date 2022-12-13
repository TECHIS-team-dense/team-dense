@extends('layouts.common')

@section('title', '商品一覧')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-12 mx-auto">
                            <div class="flex flex-wrap w-full mb-10 flex-col items-center text-center">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">ホーム</h1>
                                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">
                                    <h5>ようこそ</h5> 
                                    <h4>{{ $users->name }} さん</h4>
                                </p>
                            </div>
                            <div class="flex flex-wrap -m-4">
                                <div class="xl:w-1/3 md:w-1/2 p-4">
                                <div class="border border-gray-200 p-6 rounded-lg">
                                    <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 mb-4">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>
                                    </div>
                                    <a href="{{ route('items.index') }}"></a>
                                    <h2 class="text-lg text-gray-900 font-medium title-font mb-2"><a href="{{ route('items.index') }}">商品一覧画面</a></h2>
                                    <p class="leading-relaxed text-base">登録のある商品を一覧にて確認することができます。また商品名をクリックすると商品情報の編集することができます。</p>
                                </div>
                                </div>
                                <div class="xl:w-1/3 md:w-1/2 p-4">
                                    <div class="border border-gray-200 p-6 rounded-lg">
                                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 mb-4">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                            <circle cx="6" cy="6" r="3"></circle>
                                            <circle cx="6" cy="18" r="3"></circle>
                                            <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                                        </svg>
                                        </div>
                                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2"><a href="{{ route('items.create') }}">商品登録画面</a></h2>
                                        <p class="leading-relaxed text-base">商品の新規登録を行うことができます。</p>
                                    </div>
                                    </div>
                                    <div class="xl:w-1/3 md:w-1/2 p-4">
                                    <div class="border border-gray-200 p-6 rounded-lg">
                                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 mb-4">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        </div>
                                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2"><a href="{{ route('expired-items.index') }}">ゴミ箱（商品）</a></h2>
                                        <p class="leading-relaxed text-base">削除した商品を確認することができます。またデータ復元、完全削除することができます。</p>
                                    </div>
                                    </div>
                                    <div class="xl:w-1/3 md:w-1/2 p-4">
                                    <div class="border border-gray-200 p-6 rounded-lg">
                                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 mb-4">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                            <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1zM4 22v-7"></path>
                                        </svg>
                                        </div>
                                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">商品詳細画面</h2>
                                        <p class="leading-relaxed text-base">商品詳細は<a href="{{ route('items.index') }}">商品一覧画面</a>から商品を選択して詳細を確認することができます。</p>
                                    </div>
                                    </div>
                                    <div class="xl:w-1/3 md:w-1/2 p-4">
                                        <div class="border border-gray-200 p-6 rounded-lg">
                                            <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 mb-4">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                                    <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                                </svg>
                                            </div>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">商品編集画面</h2>
                                            <p class="leading-relaxed text-base">商品編集は<a href="{{ route('items.index') }}">商品一覧画面</a>から商品を選択して商品編集をすることができます。</p>
                                        </div>
                                    </div>
                                    <div class="xl:w-1/3 md:w-1/2 p-4">
                                        <div class="border border-gray-200 p-6 rounded-lg">
                                            <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 mb-4">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                                    <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                                </svg>
                                            </div>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2"><a href="{{ route('inquiry.index') }}">お問い合わせフォーム</a></h2>
                                            <p class="leading-relaxed text-base">商品に関するご質問ができます。ご不明な点等ございましたら、こちらにてお問い合わせください。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
