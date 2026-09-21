<?php

namespace App\Http\Controllers;

use App\Services\WhatsAppService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $whatsappUrl = WhatsAppService::url(WhatsAppService::generalMessage());

        return view('contact.index', compact('whatsappUrl'));
    }

    public function submit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'message' => 'required|string|max:1000',
        ]);

        $customMessage = "Hello Best Bali Driver,\n\n" .
            "New inquiry from website:\n" .
            "• Name: {$validated['name']}\n" .
            ($validated['email'] ? "• Email: {$validated['email']}\n" : "") .
            "• Message: {$validated['message']}\n\n" .
            "Thank you!";

        $redirectUrl = WhatsAppService::url($customMessage);

        return redirect()->away($redirectUrl);
    }
}
