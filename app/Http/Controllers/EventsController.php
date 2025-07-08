<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $events = Event::latest('created_at')->paginate(6);
        $events = Event::query();

        if ($request->query('category')) {
            $events->where('status', $request->query('category'));
        }

        if ($request->query('search')) {
            $search = $request->query('search');
            $events->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $events = $events->latest('created_at')->paginate(6)->appends($request->query());
        return view('events.index', compact('events'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

}
