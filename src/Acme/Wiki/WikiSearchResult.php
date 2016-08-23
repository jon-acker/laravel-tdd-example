<?php

namespace Acme\Wiki;

class WikiSearchResult implements SearchResult
{
    private $highlighted = false;
    /**
     * @var
     */
    private $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function highlight()
    {
        $this->highlighted = true;
    }

    public function matches(array $terms) : bool
    {
        foreach ($terms as $term) {
            if (preg_match("/\b$term\b/i", strtolower($this->getTitle()))) {
                return true;
            }
        }

        return false;
    }

    public function isHighlighted()
    {
        return $this->highlighted;
    }

    public function getTitle()
    {
        return $this->result['title'];
    }

    public function getSnippet()
    {
        return $this->result['snippet'];
    }
}
