<?php

namespace Acme\Wiki;

class HighlightingSearch
{
    /**
     * @var SearchHistory
     */
    private $searchHistory;
    /**
     * @var Client
     */
    private $client;

    public function __construct(SearchHistory $searchHistory, Client $client)
    {
        $this->searchHistory = $searchHistory;
        $this->client = $client;
    }

    public function search(string $term)
    {
        $this->searchHistory->track($term);

        $results = $this->client->searchFor($term);

        $historicTerms = $this->removeTerm($term, $this->searchHistory->findAll());

        if (empty($historicTerms)) {
            return $results;
        }

        foreach ($results as $result) {
            if ($result->matches($historicTerms)) {
                $result->highlight();
            }
        }

        return $results;
    }

    /**
     * @param string $term
     * @param $historicTerms
     * @return array
     */
    private function removeTerm(string $term, $historicTerms)
    {
        $historicTerms = array_values(array_diff($historicTerms, [$term]));
        return $historicTerms;
    }
}
