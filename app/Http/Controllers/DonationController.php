<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationAccount;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $accounts = DonationAccount::all();
        $donations = Donation::latest('created_at')->paginate(6);
        return view('donation', compact('accounts', 'donations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'donor_name' => 'nullable|string|max:255',
            'donor_whatsapp' => 'nullable|regex:/^(\+\s?)?6?2?08[1-9][0-9]{6,11}$/|max:255',
            'amount' => 'required|numeric|min:1',
            'proof' => 'required|image|max:2048',
            'note' => 'nullable|string',
        ]);

        if ($request->hasFile('proof')) {
            $data['proof'] = $request->file('proof')->store('donations/proof', 'public');
        }

        $data['donated_at'] = now();

        Donation::create($data);

        return back()->with('success', 'Donasi berhasil dicatat. Terima kasih!');
    }

}
