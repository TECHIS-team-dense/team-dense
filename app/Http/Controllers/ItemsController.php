<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 商品一覧取得
        $items = Item::select('id', 'name', 'type', 'price', 'detail')
        ->paginate(8);

        return view('item.index', compact('items'));
    }


    public function create()
    {

        return view('item.create');
    }


    public function store(Request $request)
    {
        // dd($request);
        // バリデーション
        $this->validate($request, [
            'name' => 'required|max:30',
            'type' => 'required|max:30',
            'price' => 'required|numeric',
            'detail' => 'required|max:100',
        ]);

        Item::create([
            'owner_id' => Auth::id(),
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
            'price' => $request->price,
        ]);

        return redirect('/items')
        ->with(['message' => '商品登録が完了しております。']);

        return view('item.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
