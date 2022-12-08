@extends('layouts.common')

@section('title', 'ホーム画面')

@section('script')
  <script src="{{ asset('js/preview.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header">
            <div class="card-tools">
              <div class="container">
                <x-auth-validation-errors :errors="$errors" />

                <section class="text-gray-600 body-font relative">
                  <div class="container px-2 py-8 mx-auto">
                    <div class="flex flex-col text-center w-full">
                      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">商品新規登録</h1>
                      <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p>
                    </div>
                  <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                      @csrf

                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                      <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-full">
                          <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">名前（商品）※必須</label>
                            <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded 
                            border border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 
                            text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="みかん" value="{{ old('name')}}">
                          </div>
                        </div>

                        <div class="p-2 w-full">
                          <div class="relative">
                            <label for="type" class="leading-7 text-sm text-gray-600">種別 ※必須</label>
                            <input type="number" id="type" name="type" required value="{{ old('type')}}" class="w-full bg-gray-100 bg-opacity-50 rounded border 
                            border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base 
                            outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="1">
                          </div>
                        </div>

                        <div class="p-2 w-full">
                          <div class="relative">
                            <label for="price" class="leading-7 text-sm text-gray-600">価格（円）※必須</label>
                            <input type="number" id="price" name="price" required value="{{ old('price')}}" class="w-full bg-gray-100 bg-opacity-50 rounded border 
                            border-gray-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base 
                            outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="500">
                          </div>
                        </div>

                        <div class="p-2 w-full">
                          <div class="relative">
                            <label for="detail" class="leading-7 text-sm text-gray-600">商品詳細 ※必須</label>
                            <textarea id="detail" name="detail" rows="3" required class="w-full bg-gray-100 bg-opacity-50 rounded border
                            border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 
                            py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="商品説明" value="{{ old('detail')}}"></textarea>
                          </div>
                      </div>

                        <div class="p-2 w-full">
                          <div class="relative">
                            <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                            <input type="file" class="form-control"  id="image" name="image" accept="image/png/jpeg,image/jpg" onChange="imgPreView(event)" >
                            <label for="image1" class="leading-7 text-sm text-gray-600">画像</label>
                            <input type="file" class="form-control"  id="image1" name="image1" accept="image/png/jpeg,image/jpg" onChange="imgPreView(event) ">
                            <label for="image2" class="leading-7 text-sm text-gray-600">画像</label>
                            <input type="file" class="form-control"  id="image2" name="image2" accept="image/png/jpeg,image/jpg" onChange="imgPreView(event)">
                            {{-- <p id="preview" class="pt-3">選択画像プレビュー</p> --}}
                          </div>
                        </div>
                        <div class="p-2 w-full flex justify-around mt-4">
                          <button type="button" onclick="location.href='{{ route('items.index')}}'" class="bg-gray-600 text-white 
                          border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-sm">戻る</button>

                          <button type="submit" class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none 
                          hover:bg-green-400 rounded text-sm">更新する</button>                        
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

{{-- <script>
    
  function imgPreView(event) {
      var file = event.target.files[0];
      var reader = new FileReader();
      var preview = document.getElementById("preview");
      var previewImage = document.getElementById("previewImage");
      
      if(previewImage != null) {
          preview.removeChild(previewImage);
      }
      reader.onload = function(event) {
          var img = document.createElement("img");
          img.setAttribute("src", reader.result, );
          img.setAttribute("width", "100px");
          img.setAttribute("width", "150px");
          img.setAttribute("id", "previewImage");
          preview.appendChild(img);
      };
      
      reader.readAsDataURL(file);
  }
  
  </script> --}}

