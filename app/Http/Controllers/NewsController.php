<?php

namespace App\Http\Controllers;

use App\Ad;
use App\News;
use App\Status;
use App\NewsCategory;

class NewsController extends Controller
{
    protected $news;
    protected $ad;
    protected $newsCategory;

    public function __construct(News $news, Ad $ad, NewsCategory $newsCategory)
    {
        $this->news = $news;
        $this->ad = $ad;
        $this->newsCategory = $newsCategory;
    }

    public function getImportantNews()
    {
        return $this->mergeStatus($this->news->getImportantNews(), 200);
    }

    public function relatedNews($id)
    {
        return $this->mergeStatus($this->news->relatedNews($id), 200);
    }

    public function newsDetails($id)
    {
        $newsDetails = $this->news->newsDetails($id);
        $relatedNews = $this->news->relatedNews($newsDetails[0]['news_categories_id']);
        $similarNews = $this->news->similarNews($newsDetails[0]["title"]);
        $newsAds = $this->ad->relatedAds($newsDetails[0]['news_categories_id']);

        return $this->mergeStatus([
            'newsDetails' => $newsDetails,
            'relatedNews' => $relatedNews,
            'similarNews' => $similarNews,
            'newsAds' => $newsAds,
        ], 200);
    }

    public function similarNews($id)
    {
        $newsDetails = $this->news->newsDetails($id);
        return $this->mergeStatus($this->news->similarNews($newsDetails[0]["title"]), 200);
    }

    public function listCategory()
    {
        return $this->mergeStatus($this->newsCategory->listCategory(), 200);
    }

    public function categoriesAndNews()
    {
        $arrCategory = $this->newsCategory->listCategory();
        foreach ($arrCategory as &$objCategory) {
            $relatedNews = $this->news->relatedNews($objCategory['id']);
            $relatedAds = $this->ad->relatedAds($objCategory['id']);
            $objCategory['relatedNews'] = $relatedNews;
            $objCategory['relatedAds'] = $relatedAds;
        }
        return $this->mergeStatus(['data' => $arrCategory], 200);
    }

    public function relatedAds($id)
    {
        return $this->mergeStatus($this->ad->relatedAds($id), 200);
    }

    public function newsSameTag($tag)
    {
        return $this->mergeStatus($this->news->newsSameTag($tag), 200);
    }

    public function getLatestNews()
    {
        return $this->mergeStatus($this->news->getLatestNews(), 200);
    }

    protected function mergeStatus($data, $statusCode)
    {
        return Status::mergeStatus(['data' => $data], $statusCode);
    }
}
