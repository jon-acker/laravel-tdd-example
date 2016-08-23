<?php

namespace App\Http\Controllers;

use Acme\Wiki\Highlighter;
use Acme\Wiki\HighlightingSearch;
use Acme\Wiki\HistoryHighlighter;
use Acme\Wiki\SearchHistory;
use Acme\Wiki\WebClient;
use App\SearchTerm;

class WelcomeController extends Controller
{
    public function search($term, HighlightingSearch $highlightingSearch)
    {
        return view('search', [
            'entry' => $term,
            'results' => $highlightingSearch->search($term)
        ]);
    }
}
