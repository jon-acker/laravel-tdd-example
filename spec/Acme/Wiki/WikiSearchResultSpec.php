<?php

namespace spec\Acme\Wiki;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WikiSearchResultSpec extends ObjectBehavior
{
    function let()
    {
        $result = [
            'title' => 'My result title'
        ];

        $this->beConstructedWith($result);
    }

    function it_is_not_highlighted_by_default()
    {
        $this->isHighlighted()->shouldReturn(false);
    }

    function it_can_be_highlighted()
    {
        $this->highlight();

        $this->isHighlighted()->shouldReturn(true);
    }

    function it_has_a_title()
    {
        $this->getTitle()->shouldReturn('My result title');
    }

    function it_does_not_match_if_historic_terms_are_empty()
    {
        $historicTerms = [];

        $this->matches($historicTerms)->shouldReturn(false);
    }

    function it_matches_if_one_historic_terms_matches_title()
    {
        $historicTerms = ['result'];

        $this->matches($historicTerms)->shouldReturn(true);
    }

    function it_does_not_match_if_none_of_the_historic_terms_match()
    {
        $historicTerms = ['blah', 'blah'];

        $this->matches($historicTerms)->shouldReturn(false);
    }

    function it_only_matches_if_full_terms_match()
    {
        $historicTerms = ['res'];

        $this->matches($historicTerms)->shouldReturn(false);

    }

}
