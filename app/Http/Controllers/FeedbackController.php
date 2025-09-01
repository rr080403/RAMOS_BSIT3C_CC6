<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FeedbackController extends Controller
{
    public function view()
    {
        return view('feedback');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string'
        ]);

        $response = Http::post('https://hook.eu2.make.com/hc01ahkq5ef1ikofgdn3yc98i9ydj7fc', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message']
        ]);

        return response()->json([
            'message' => $response->successful()
                ? 'Sankyuu, homie!' : 'Bruh sumthin wong here..',
            'success' => $response->successful()
        ], $response->status());
    }
}
