<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SecondaryCategory;

class Item extends Model
{
    use HasFactory, SoftDeletes;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'type',
        'detail',
        'filename',
        'filename_one',
        'filename_two',
        'filename_three',
        'price',
        'secondary_category_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }

    // public function scopeAvailableItems($query)
    // {
    //     return $query
    //         ->join('secondary_categories', 'products.secondary_category_id', '=', 'secondary_categories.id')
    //         ->select('items.id as id', 'items.name as name', 'items.price'
    //         ,'items.detail', 'secondary_categories.name as category'
    //     );
    // }


    // public function scopeSortOrder($query, $sortOrder)
    // {
    //     if($sortOrder === null || $sortOrder === \Constant::SORT_ORDER['recommend']){
    //         return $query->orderBy('sort_order', 'asc') ;
    //     }
    //     if($sortOrder === \Constant::SORT_ORDER['higherPrice']){
    //         return $query->orderBy('price', 'desc') ;
    //     }
    //     if($sortOrder === \Constant::SORT_ORDER['lowerPrice']){
    //     return $query->orderBy('price', 'asc') ;
    //     }
    //     if($sortOrder === \Constant::SORT_ORDER['later']){
    //     return $query->orderBy('products.created_at', 'desc') ;
    //     }
    //     if($sortOrder === \Constant::SORT_ORDER['older']){
    //     return $query->orderBy('products.created_at', 'asc') ;
    //     }
    // }

    // public function scopeSelectCategory($query, $categoryId)
    // {
    //     if($categoryId !== '0')
    //     {
    //         return $query->where('secondary_category_id', $categoryId);
    //     } else {
    //         return ;
    //     }
    // }

    // public function scopeSearchKeyword($query, $keyword)
    // {
    //     if(!is_null($keyword))
    //     {
    //         //全角スペース半角に
    //         $spaceConvert = mb_convert_kana($keyword, 's');

    //         //空白で区切る
    //         $keywords = preg_split('/[\s]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);

    //         //単語をループで回す
    //         foreach($keywords as $word)
    //         {
    //             $query->where('products.name','like', '%' .$word.'%');
    //         }
    //     } else {
    //         return $query;
    //     }
    // }
}


