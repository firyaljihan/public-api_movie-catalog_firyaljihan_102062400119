<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $apiKey = env('OMDB_API_KEY');
        $inputSearch = trim($request->input('search'));

        $search = $inputSearch !== '' ? $inputSearch : null;
        if ($search) {
            $response = Http::get("http://www.omdbapi.com/", [
                'apikey' => $apiKey,
                's' => $search
            ]);
            $searchResults = $response->json()['Search'] ?? [];
            return view('movies.index', compact('searchResults', 'search'));
        }

        $actionMovies = Http::get("http://www.omdbapi.com/", ['apikey' => $apiKey, 's' => 'Action'])->json()['Search'] ?? [];
        $horrorMovies = Http::get("http://www.omdbapi.com/", ['apikey' => $apiKey, 's' => 'Horror'])->json()['Search'] ?? [];
        $animeMovies  = Http::get("http://www.omdbapi.com/", ['apikey' => $apiKey, 's' => 'Naruto'])->json()['Search'] ?? [];

        return view('movies.index', compact('actionMovies', 'horrorMovies', 'animeMovies', 'search'));
    }

    public function show($id)
    {
        $apiKey = env('OMDB_API_KEY');
        $response = Http::get("http://www.omdbapi.com/", [
            'apikey' => $apiKey,
            'i' => $id,
            'plot' => 'full'
        ]);

        $movie = $response->json();
        return view('movies.show', compact('movie'));
    }
}
