<?php
namespace Acme\Wiki;

class WebClient implements Client
{

    public function searchFor(string $term) : array
    {
        $response = $this->query('list=search&srlimit=10&srsearch='.$term);
        $searchResults = $response->query->search;

        return array_map(function($result) {
            return new WikiSearchResult((array)$result);
        }, $searchResults);
    }

    /**
     * @return string
     */
    private function query($query)
    {
        $response = file_get_contents('https://en.wikipedia.org/w/api.php?format=json&action=query&'.$query);

        return json_decode($response);
    }
}
