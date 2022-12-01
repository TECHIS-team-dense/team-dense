@extends('layouts.common')

@section('title', 'ホーム画面')

@section('content')
<h3 class="pl-5"></h3>
<div class="row">
  
  <div class="col-12">

      {{-- <x-flash-message status="session('status')" /> --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      @php 
      if(session('status') === 'register'){ $bgColor = 'alert-info';} 
      @endphp 
          
      <script>
        @if (session('message'))
            $(function() {
                toastr.options = {
                  // "positionClass": "“toast-bottom-right”"
                }
                toastr.info('{{ session('message') }}');
            });
        @endif
    </script>

      <div class="card">
        {{-- <div class="text-center m-2 p-2">
          <a href="{{ url('items/create') }}" class="btn btn-success text-center">商品新規登録</a>
        </div> --}}

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
@endsection

<script>
  function deletePost(e) {
      'use strict';
      if (confirm('本当に削除してもいいですか?')) {
      document.getElementById('delete_' + e.dataset.id).submit();
      }
  }
</script>