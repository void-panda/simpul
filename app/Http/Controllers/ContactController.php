<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $contacts = Contact::all();
        return view('contact', compact('contacts'));
    }


    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Kirim ke email admin
        Mail::to('admin@yourcommunity.org')->send(new ContactMessage($validated));

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
