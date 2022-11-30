@extends('layouts.common')

@section('title', 'ホーム画面')

@section('content')
<h3 class="p-2">商品編集画面</h3>
<div class="row">
    <div class="col-md-10">

    {{-- <x-auth-validation-errors :errors="$errors" /> --}}
    
    <div class="container">
        <div class="card card-primary">
            <form method="POST" action="{{ route('items.update', ['item' => $item->id]) }}">
                @csrf
                @method('PUT')

                <x-auth-validation-errors :errors="$errors" />
                
                <div class="card-body">
                    <div class="form-group ">
                        <label for="name">名前（商品）</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $item->name }}">
                    </div>

                    <div class="form-group">
                        <label for="type">種別</label>
                        <input type="number" class="form-control" id="type" name="type" required value="{{ $item->type }}">
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="number" class="form-control" id="price" name="price" required value="{{ $item->price }}">
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <textarea type="textarea" class="form-control" id="detail" name="detail" placeholder="商品説明" required>{{ $item->detail }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">画像</label>
                        <input type="file" class="form-control"  id="image" name="image" accept="image/png/jpeg,image/jpg">
                    </div>

                </div>
                <div class="card-footerb text-center m-4">
                    <a href="{{ url('items') }}" class="btn btn-secondary">戻る</a>
                    <button type="submit" class="btn btn-success">更新する</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

@endsection