<?php

namespace App\Constants;

class Common
{
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