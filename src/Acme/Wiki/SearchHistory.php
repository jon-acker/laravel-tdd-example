<?php

namespace Acme\Wiki;

interface SearchHistory
{

    public function track(string $term);

    public function findAll() : array;
}
