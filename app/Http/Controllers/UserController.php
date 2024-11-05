<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'telegram_id' => 'required|string',
            'first_name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
        ]);

        $user = User::where('telegram_id', $validatedData['telegram_id'])->first();

        if ($user) {
            return response()->json($user, 200);
        }

        $user = User::create([
            'telegram_id' => $validatedData['telegram_id'],
            'first_name' => $validatedData['first_name'],
            'username' => $validatedData['username'],
        ]);

        return response()->json($user, 201);
    }
}
