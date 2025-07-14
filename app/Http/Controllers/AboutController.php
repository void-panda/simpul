<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\News;
use App\Models\Partner;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $community = Community::first();
        $trendingNews = News::latest('published_at')->take(3)->get();
        $partners = Partner::all();


        return view('about', compact('community', 'trendingNews', 'partners'));
    }
}
