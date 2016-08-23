<?php

namespace App;

use Acme\Wiki\SearchHistory;
use Illuminate\Database\Eloquent\Model;

class StoredHistory extends Model implements SearchHistory
{
    protected $table = 'search_terms';

    public $timestamps = false;

    public function track(string $term)
    {
        if (!$this->contains($term)) {
            $this->searchTerm = strtolower($term);
            $this->save();
        }
    }

    private function contains($term)
    {
        return self::where('searchTerm', $term)->count() > 0;
    }

    public function findAll() : array
    {
        return array_map(function($value) {
            return $value['searchTerm'];
        }, self::all()->toArray());
    }
}
