@extends('layouts.common')

@section('title', 'ホーム画面')

@section('css')
@endsection

@section('script')
@endsection

@section('content')
<div class="jumbotron">
    <div class="container">
        <h2 class="display-5">送信内容の確認</h2>
        <p class="lead">
            以下の内容でメールを送信してよろしいですか？<br />
        </p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                <div class="container">
                    <form action="{{ route('confirm') }}" method="post">
                        @csrf
                    <div class="mx-auto overflow-auto table-bordered">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">FROM</th>
                                <td class="pl-3">{{ config('mail.from.name') }} &lt;{{ config('mail.from.address') }}&gt;</td>
                            </tr>

                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">TO</th>
                                <td class="pl-3">{{ session('inquiry.email') }}</td>
                            </tr>

                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-md bg-green-200">本文</th>
                                <td class="pl-3">{!! nl2br($message) !!}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="p-3 flex justify-around mt-2">
                        <button type="button" onclick="location.href='{{ route('inquiry.index')}}'" class="bg-gray-600 text-white 
                        border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-sm">戻る</button>

                        <button type="submit" class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none 
                        hover:bg-green-400 rounded text-sm">送信</button>                        
                    </div>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection