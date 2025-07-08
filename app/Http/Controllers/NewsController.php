<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = News::query();

        if ($request->query('category')) {
            $news->where('category', $request->query('category'));
        }

        if ($request->query('search')) {
            $search = $request->query('search');
            $news->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $news = $news->latest('published_at')->paginate(6)->appends($request->query());
        return view('news.index', compact('news'));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }
}
