<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Event;
use App\Models\News;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        // $data = [
        //     'community' => Community::first(),
        //     'news' => News::latest('published_at')->take(3)->get(),
        //     'events' => Event::latest('start_date')->take(3)->get(),
        //     'donationAccount' => DonationAccount::where('is_active', true)->first(),
        //     'contacts' => Contact::where('is_public', true)->get(),
        // ];
        return view('home', [
            'events' => Event::latest('start_date')->take(3)->get(),
            'community' => Community::first(),
            'news' => News::latest('published_at')->take(3)->get(),
            'partners' => Partner::all(), // Tambahkan ini
        ]);
    }
}
