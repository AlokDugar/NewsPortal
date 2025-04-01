<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\NewsCategory;
use App\Models\NewsDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categoriesCount=NewsCategory::count();
        $categories = NewsCategory::withCount('news')
        ->orderByDesc('news_count')
        ->get();
        $ads=Advertisement::all();
        $activeAds=Advertisement::where('status','Active')->count();
        $totalArticles = NewsDetails::count();
        $publishedArticles = NewsDetails::where('state', 'Published')->count();
        $unpublishedArticles = NewsDetails::where('state', 'Unpublished')->count();
        $recentArticles = NewsDetails::latest()->take(3)->get();

        return view('index', compact('totalArticles','ads','recentArticles', 'categoriesCount','categories','activeAds','publishedArticles', 'unpublishedArticles'));
    }
}
