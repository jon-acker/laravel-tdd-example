<?php

namespace Acme\Wiki;

interface SearchResult
{
    public function highlight();

    public function matches(array $term) : bool;
}
