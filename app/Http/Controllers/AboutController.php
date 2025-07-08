<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\News;
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

        return view('about', compact('community', 'trendingNews'));
    }
}
