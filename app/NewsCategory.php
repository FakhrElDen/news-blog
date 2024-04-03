<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function listCategory()
    {
        return NewsCategory::get();
    }

    public function categoryName($id)
    {
        return NewsCategory::where('id', $id)->get();
    }
}
