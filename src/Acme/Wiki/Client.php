<?php

namespace Acme\Wiki;

interface Client
{
    public function searchFor(string $term);
}
