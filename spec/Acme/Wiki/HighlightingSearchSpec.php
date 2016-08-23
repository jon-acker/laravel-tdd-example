<?php

namespace spec\Acme\Wiki;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Wiki\SearchResult;
use Acme\Wiki\SearchHistory;
use Acme\Wiki\Client;

class HighlightingSearchSpec extends ObjectBehavior
{
    function let(SearchHistory $searchHistory, Client $client, SearchResult $searchResult)
    {
        $client->searchFor('laravel')->willReturn([$searchResult]);

        $searchHistory->findAll()->willReturn(['laravel', 'framework']);

        $searchHistory->track('laravel')->willReturn();

        $searchResult->matches(Argument::any())->willReturn(false);

        $this->beConstructedWith($searchHistory, $client);
    }

    function it_tracks_search_history(SearchHistory $searchHistory)
    {
        $searchHistory->track('laravel')->shouldBeCalled();

        $this->search('laravel');
    }

    function it_returns_an_array_of_search_results(SearchResult $searchResult)
    {
        $this->search('laravel')->shouldReturn([$searchResult]);
    }

    function it_highlights_search_results_that_match_historic_terms(SearchResult $searchResult)
    {
        $searchResult->matches(['framework'])->willReturn(true);

        $searchResult->highlight()->shouldBeCalled();

        $this->search('laravel');
    }

    function it_does_not_highlight_search_results_when_history_is_empty(SearchHistory $searchHistory, SearchResult $searchResult)
    {
        $searchHistory->findAll()->willReturn([]);

        $searchResult->highlight()->shouldNotBeCalled();

        $this->search('laravel');
    }

    function it_does_not_highlight_search_results_that_dont_match_historic_terms(SearchResult $searchResult)
    {
        $searchResult->matches(['framework'])->willReturn(false);

        $searchResult->highlight()->shouldNotBeCalled();

        $this->search('laravel');
    }

    function it_ignores_the_current_search_term(SearchResult $searchResult)
    {
        $searchResult->matches(['framework'])->shouldBeCalled();

        $this->search('laravel');
    }
}
