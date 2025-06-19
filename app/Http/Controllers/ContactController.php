<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Notifications\NewContactNotification;
use App\Models\User;

class ContactController extends Controller
{
    // Menyimpan data pesan dari form
    public function store(Request $request)
{
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    $contact = Contact::create($validated);

    // 🔑 Kirim notifikasi ke admin
     // Kirim notifikasi ke admin (misal ke semua user dengan is_admin = true)
    User::where('is_admin', true)->each(function ($admin) use ($contact) {
        $admin->notify(new NewContactNotification($contact));
    });

    return redirect()->route('home')->with('success', 'Pesan berhasil dikirim!');
}

    // Admin lihat daftar pesan
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }
}
