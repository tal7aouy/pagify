<?php

use Tal7aouy\Pagify\JsonPaginator;
use Tal7aouy\Pagify\PaginatorFactory;
use Tal7aouy\Pagify\Exceptions\PaginatorException;

it('paginates data correctly', function () {
    $items = range(1, 100);
    $totalItems = count($items);
    $paginator = PaginatorFactory::createPaginator($items, $totalItems, 1, 10);

    expect($paginator->getCurrentPage())->toBe(1);
    expect($paginator->getPerPage())->toBe(10);
    expect($paginator->getTotalPages())->toBe(10);
    expect(json_decode($paginator->toJson())->data)->toHaveCount(10);
});

it('handles json output correctly', function () {
    $items = range(1, 100);
    $totalItems = count($items);
    $paginator = PaginatorFactory::createPaginator($items, $totalItems, 2, 10);

    $json = $paginator->toJson();
    $data = json_decode($json, true);

    expect($data['current_page'])->toBe(2);
    expect($data['per_page'])->toBe(10);
    expect($data['data'])->toHaveCount(10);
});

it('throws an exception for invalid page numbers', function () {
    $items = range(1, 100);
    $totalItems = count($items);

    PaginatorFactory::createPaginator($items, $totalItems, -1, 10);
})->throws(PaginatorException::class, 'Page number and per page values must be greater than zero.');
