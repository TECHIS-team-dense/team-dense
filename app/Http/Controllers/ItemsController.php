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
        ->paginate(7);

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
        ->with(['message' => '商品登録が完了しております。',
        'status' => 'register']);

        return view('item.index');
    }


    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('item.show', compact('item'));
    }


    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return view('item.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->type = $request->type;
        $item->price = $request->price;
        $item->detail = $request->detail;
        $item->save();

        $this->validate($request, [
            'name' => 'required|max:30',
            'type' => 'required|max:30',
            'price' => 'required|numeric',
            'detail' => 'required|max:100',
        ]);

        return redirect('/items')
        ->with(['message' => '商品編集が完了しました。']);

    }

    
    public function destroy($id)
    {
        Item::findOrFail($id)->delete();

        return redirect('/items')
        ->with(['message' => 'オーナ情報を削除しました。']);
    }

    public function expiredItemIndex(){ 
        $expiredItems = Item::onlyTrashed()->get(); 
        return view('item.expired-items', compact('expiredItems')); 
    } 


    public function expiredItemDestroy($id){ 

        Item::onlyTrashed()->findOrFail($id)->forceDelete(); 
        return redirect('expired-items/index')
        ->with(['message' => '完全に削除しました。']);
    }
}
