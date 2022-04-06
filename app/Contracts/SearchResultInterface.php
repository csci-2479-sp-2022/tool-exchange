<?php

namespace App\Contracts;

use App\Models\SearchResult;

interface SearchResultInterface
{
    public function getSearchResult(): array;

    public function getSearchResultById(int $id): ?SearchResult;
}