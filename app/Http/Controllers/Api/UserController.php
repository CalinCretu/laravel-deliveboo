<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index()
    {

        $users = User::with('types', 'items')->get();

        if (!$users) {
            return response()->json(['message' => 'Utente non trovato'], 404);
        }

        return response()->json([
            'success' => true,
            'results' => $users
        ]);
    }

    public function getItemsBySlug($slug)
    {
        // Trova l'utente con lo slug specificato
        $user = User::where('slug', $slug)->first();

        if (!$user) {
            return response()->json(['message' => 'Utente non trovato'], 404);
        }

        // Ritorna gli "items" dell'utente trovato
        $items = $user->items;

        return response()->json($items);
    }
}
