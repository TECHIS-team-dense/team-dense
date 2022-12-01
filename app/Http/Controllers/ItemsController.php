<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 商品一覧取得
        $items = Item::select('id', 'name', 'type', 'price', 'detail', 'filename')
        ->paginate(7);

        return view('item.index', compact('items'));
    }


    public function create()
    {

        return view('item.create');
    }


    public function store(Request $request)
    {
        $fileNameToStore = null;
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:30',
                'type' => 'required|max:30',
                'price' => 'required|numeric',
                'detail' => 'required|max:100',
            ]);

            $imageFile = $request->image;
            // dd($imageFile);
            if(!is_null($imageFile) && $imageFile->isValid() ) {
                $fileName = uniqid(rand(). '_');
                $extension = $imageFile->extension();
                $fileNameToStore = $fileName. '.'. $extension; //ファイル名
    
                $resizedImage = InterventionImage::make($imageFile)
                ->resize(150, 150)
                ->encode();
    
                Storage::put('public/items/' . $fileNameToStore, $resizedImage); //取得したファイル名を保存
            }

        Item::create([
            'owner_id' => Auth::id(),
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
            'price' => $request->price,
            'filename' => $fileNameToStore,

            // if(is_null($fileNameToStore)){
            //     'filename' = $fileNameToStore;
            // } else {
            //     return null;
            // }
            
        ]);

        return redirect('/items')
        ->with(['message' => '商品登録が完了しております。',
        'status' => 'register']);

        }
        return view('items.create');
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


    public function update(UploadImageRequest $request, $id)
    {

    //画像 アップデート兼リサイズ
    $imageFile = $request->image;
    if(!is_null($imageFile) && $imageFile->isValid() ) {
        $fileName = uniqid(rand(). '_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName. '.'. $extension;

        $resizedImage = InterventionImage::make($imageFile)
        ->resize(200, 200)
        ->encode();

        Storage::put('public/items/' . $fileNameToStore, $resizedImage);
        
        }

        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->type = $request->type;
        $item->price = $request->price;
        $item->detail = $request->detail;
        if(!is_null($imageFile) && $imageFile->isValid()){
            $item->filename = $fileNameToStore;
        }
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
