<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PrimaryCategory;

class SecondaryCategory extends Model
{
    use HasFactory;
    protected $table = 'secondary_categories';

    public function primary()
    {
        return $this->belongsTo(PrimaryCategory::class, 'primary_category_id');

    }
}
