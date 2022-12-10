<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\PrimaryCategory;
use App\Models\SecondaryCategory;
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

    public function index(Request $request)
    {

        // $category = SecondaryCategory::findOrFail(1);
        // dd($category);
        // $primary = $category->where('primary_category_id');
        // dd($primary);
        // $primary = PrimaryCategory::findOrFail($category->primary_category_id);
        // dd($primary);

        // $primary = SecondaryCategory::findOrFail(1);
        // dd($primary->primary->name);

        $primary = SecondaryCategory::with('primary')
        ->get();
        // dd($primary->name);

        //検索に使う
        $categories = PrimaryCategory::with('secondary')
        ->get();


        // 商品一覧取得
        $items = Item::select('id', 'name', 'type', 'price', 'detail', 'secondary_category_id')
        ->paginate(7);

        return view('item.index', compact('items','categories', 'primary'));
    }


    public function create()
    {
        //イーガーローディング、リレーション
        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('item.create', compact('categories'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $fileNameToStore = null;
        $fileNameToStore_one = null;
        $fileNameToStore_two = null;
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|string|max:30',
                'price' => 'required|integer',
                'detail' => 'required|string|max:500',
                'category' => 'required|exists:secondary_categories,id',
            ]);

            $imageFile = $request->image;
            // dd($imageFile);
            if(!is_null($imageFile) && $imageFile->isValid() ) {
                $fileName = uniqid(rand(). '_');
                // dd($fileName);
                $extension = $imageFile->extension();
                $fileNameToStore = $fileName. '.'. $extension; //ファイル名
    
                $resizedImage = InterventionImage::make($imageFile)
                ->resize(300, 300)
                ->encode();

                // dd($fileNameToStore, $resizedImage);
    
                Storage::put('public/items/' . $fileNameToStore, $resizedImage); //取得したファイル名を保存
            }

            $imageFile_one = $request->image1;

            if(!is_null($imageFile_one) && $imageFile_one->isValid() ) {
                $fileName_one = uniqid(rand(). '_');
                $extension = $imageFile_one->extension();
                $fileNameToStore_one = $fileName_one. '.'. $extension; //ファイル名
    
                $resizedImage_one = InterventionImage::make($imageFile_one)
                ->resize(300, 300)
                ->encode();

                Storage::put('public/items/' . $fileNameToStore_one, $resizedImage_one); //取得したファイル名を保存
            }

            $imageFile_two = $request->image2;

            if(!is_null($imageFile_two) && $imageFile_two->isValid() ) {
                $fileName_two = uniqid(rand(). '_');
                $extension = $imageFile_two->extension();
                $fileNameToStore_two = $fileName_two. '.'. $extension; //ファイル名
    
                $resizedImage_two = InterventionImage::make($imageFile_two)
                ->resize(300, 300)
                ->encode();

                Storage::put('public/items/' . $fileNameToStore_two, $resizedImage_two); //取得したファイル名を保存
            }

        Item::create([
            // 'owner_id' => Auth::id(),
            'name' => $request->name,
            'detail' => $request->detail,
            'price' => $request->price,
            'secondary_category_id' => $request->category,
            'filename' => $fileNameToStore,
            'filename_one' => $fileNameToStore_one,
            'filename_two' => $fileNameToStore_two,
        ]);

        return redirect('/items')
        ->with(['message' => '商品登録が完了しました。',
        'status' => 'info']);
        }
        // return view('items.create');
    }


    public function show($id)
    {
        $item = Item::findOrFail($id);

        
        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('item.show', compact('item', 'categories'));
    }


    public function edit($id)
    {
        $item = Item::findOrFail($id);
        // dd($item);
        $categories = PrimaryCategory::with('secondary')
        ->get();

        return view('item.edit', compact('item', 'categories'));
    }


    public function update(UploadImageRequest $request, $id)
    {

    $this->validate($request, [
        'name' => 'required|string|max:30',
        'price' => 'required|integer',
        'detail' => 'required|string|max:500',
        'category' => 'required|exists:secondary_categories,id',
    ]);

    //画像 アップデート兼リサイズ
    $imageFile = $request->image;
    if(!is_null($imageFile) && $imageFile->isValid() ) {
        $fileName = uniqid(rand(). '_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName. '.'. $extension;
        $resizedImage = InterventionImage::make($imageFile)
        ->resize(500, 500)
        ->encode();

        Storage::put('public/items/' . $fileNameToStore, $resizedImage);
        }

        $imageFile_one = $request->image1;

        if(!is_null($imageFile_one) && $imageFile_one->isValid() ) {
            $fileName_one = uniqid(rand(). '_');
            $extension = $imageFile_one->extension();
            $fileNameToStore_one = $fileName_one. '.'. $extension; //ファイル名

            $resizedImage_one = InterventionImage::make($imageFile_one)
            ->resize(500, 500)
            ->encode();

            Storage::put('public/items/' . $fileNameToStore_one, $resizedImage_one); //取得したファイル名を保存
        }

        $imageFile_two = $request->image2;

        if(!is_null($imageFile_two) && $imageFile_two->isValid() ) {
            $fileName_two = uniqid(rand(). '_');
            $extension = $imageFile_two->extension();
            $fileNameToStore_two = $fileName_two. '.'. $extension; //ファイル名

            $resizedImage_two = InterventionImage::make($imageFile_two)
            ->resize(300, 300)
            ->encode();

            Storage::put('public/items/' . $fileNameToStore_two, $resizedImage_two); //取得したファイル名を保存
        }

        $item = Item::findOrFail($id);
            $item->name = $request->name;
            $item->price = $request->price;
            $item->detail = $request->detail;
            $item->secondary_category_id = $request->category;
            if(!is_null($imageFile) && $imageFile->isValid()){
                $item->filename = $fileNameToStore;
            }
            if(!is_null($imageFile_one) && $imageFile_one->isValid()){
                $item->filename_one = $fileNameToStore_one;
            }
            if(!is_null($imageFile_two) && $imageFile_two->isValid()){
                $item->filename_two = $fileNameToStore_two;
            }
            $item->save();

        return redirect('/items')
        ->with(['message' => '商品編集が完了しました。',
        'status' => 'info']);

    }

    
    public function destroy($id)
    {
        Item::findOrFail($id)->delete();

        return redirect('/items')
        ->with(['message' => '商品を削除しました。',
        'status' => 'alert']);
    }

    public function expiredItemIndex(){ 
        $expiredItems = Item::onlyTrashed()->get(); 
        return view('item.expired-items', compact('expiredItems')); 
    }

    public function expiredItemRestore($id){
        //復元
        Item::onlyTrashed()->whereId($id)->restore();
        return redirect('items')
        ->with(['message' => '商品情報を復元しました。',
        'status' => 'info']);
    }


    public function expiredItemDestroy($id){ 

        Item::onlyTrashed()->findOrFail($id)->forceDelete(); 
        return redirect('expired-items/index')
        ->with(['message' => '商品を完全に削除しました。',
        'status' => 'alert']);
    }
}
