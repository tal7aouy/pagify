<?php

namespace Tal7aouy\Pagify;

class PaginatorFactory
{
    public static function createPaginator(array $items, int $totalItems, int $currentPage = 1, int $perPage = 10): PaginatorInterface
    {
        return new JsonPaginator($items, $totalItems, $currentPage, $perPage);
    }
}
