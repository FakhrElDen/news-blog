<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'news_categories_id', 
        'title', 
        'body', 
        'image', 
        'important', 
        'tags'
    ];

    public $MediaUrl = "https://forex-steps.com/storage/app/public/";

    public function newsDetails($id)
    {
        $result = $this->where('id', $id)->get();

        foreach ($result as $image => $value) {
            $value['image'] = $this->MediaUrl . $value['image'];
        }

        $string = str_replace(" ", "", $result[0]['tags']);
        $string = strtolower($string);
        $arrTags = explode(",", $string);
        $result[0]['tags'] = $arrTags;
        return $result;
    }

    public function getImportantNews()
    {
        $result = $this->where('important', 1)->get();

        foreach ($result as $image => $value) {
            $value['image'] = $this->MediaUrl . $value['image'];
        }

        return $result;
    }

    public function relatedNews($id)
    {
        $result = $this->where('news_categories_id', $id)->orderBy('id', 'desc')->take(3)->get();
        
        foreach ($result as $image => $value) {
            $value['image'] =  $this->MediaUrl . $value['image'];
        }

        return $result;
    }

    public function similarNews($newsTitle)
    {
        $result = $this->where('title', 'LIKE', '%' . $newsTitle . '%')->orderBy('id', 'desc')->take(3)->get();
        
        foreach ($result as $image => $value) {
            $value['image'] = $this->MediaUrl . $value['image'];
        }

        return $result;
    }

    public function newsSameTag($tag)
    {
        $result = $this->where('tags', 'LIKE', '%' . $tag . '%')->get();
        
        foreach ($result as $image => $value) {
            $value['image'] =  $this->MediaUrl . $value['image'];
        }
        
        return $result;
    }

    public function getLatestNews()
    {
        return $this->latest()->orderBy('id', 'DESC')->get('title');
    }
}
