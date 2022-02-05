<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'news_categories';

    public function news() : HasMany
    {
        return $this->hasMany(News::class,'category_id','id');
    }
}
