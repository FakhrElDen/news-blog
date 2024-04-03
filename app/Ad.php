<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'news_categories_id', 'link', 'image',
    ];

    public $MediaUrl = "http://forex-steps.com/storage/app/public/";

    public function relatedAds($id)
    {
        $result = $this->where('news_categories_id', $id)->latest()->take(1)->get();
        foreach ($result as $value) {
            $value['image'] = $this->MediaUrl . $value['image'];
        }
        return $result;
    }
}
