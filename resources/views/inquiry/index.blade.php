@extends('layouts.common')

@section('title', 'ホーム画面')

@section('css')
@endsection

@section('script')
@endsection

@section('content')
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <div class="card-tools">
                <div class="container">
                  <section class="text-gray-600 body-font relative">
                    <div class="container px-2 py-8 mx-auto">
                      <x-flash-message status="session('status')" />
                      <div class="flex flex-col text-center w-full">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">お問い合わせフォーム</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">以下のフォームよりお気軽にお問合せください。ご質問やご要望ありましたら、お気軽にお問合せ下さい。</p>
                      </div>
                    <form method="POST" action="{{ route('inquiry.store') }}" enctype="multipart/form-data">
                        @csrf
                        <x-auth-validation-errors :errors="$errors" />
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="name" class="leading-7 text-sm text-gray-600">名前 ※必須</label>
                              <input type="text" id="name" name="name"  
                              required  class="w-full bg-gray-100 bg-opacity-50 rounded 
                              border border-gray-300 focus:bg-white focus:ring-2 text-base outline-none 
                              text-gray-700 py-1 px-3 leading-8 duration-200 ease-in-out" placeholder="aaaaa"  value="{{ $user->name }}">
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス ※必須</label>
                              <input type="email" id="email" name="email" required class="w-full bg-gray-100 
                              bg-opacity-50 rounded border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base 
                              outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="aaaaa" value="{{ $user->email }}" >
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="content" class="leading-7 text-sm text-gray-600">お問い合わせ内容 ※必須</label>
                              <textarea id="content" name="content" rows="3" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 
                              focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 
                              leading-8 transition-colors duration-200 ease-in-out"
                              placeholder="お問い合わせ内容を入力してください。" >{{ old('content', session('inquiry.content')) }}</textarea>
                            </div>
                          </div>

                          <div class="p-2 w-full flex justify-around mt-4">
                            <button type="button" onclick="location.href='{{ route('items.index')}}'" class="bg-gray-600 text-white 
                            border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-sm">商品一覧画面</button>

                            <button type="submit" class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none 
                            hover:bg-green-400 rounded text-sm">確認</button>                        
                          </div>
                        </div>
                      </div>
                    </form>
                    </div>
                  </section>     
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection