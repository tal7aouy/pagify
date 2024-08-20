<?php

namespace Tal7aouy\Pagify;

use Tal7aouy\Pagify\Exceptions\PaginatorException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class JsonPaginator implements PaginatorInterface
{
    private Logger $logger;
    private array $items;
    private int $currentPage;
    private int $perPage;
    private int $totalItems;

    public function __construct(array $items, int $totalItems, int $currentPage = 1, int $perPage = 10)
    {
        $this->logger = new Logger('paginator');
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../../logs/paginator.log', Logger::DEBUG));

        if ($currentPage <= 0 || $perPage <= 0) {
            $this->logger->error("Invalid parameters: currentPage={$currentPage}, perPage={$perPage}");
            throw new PaginatorException("Page number and per page values must be greater than zero.");
        }

        $this->items = $items;
        $this->totalItems = $totalItems;
        $this->currentPage = $currentPage;
        $this->perPage = $perPage;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function getTotalPages(): int
    {
        return (int)ceil($this->totalItems / $this->perPage);
    }

    public function getPaginatedData(): array
    {
        $start = ($this->currentPage - 1) * $this->perPage;
        $data = array_slice($this->items, $start, $this->perPage);

        return [
            'current_page' => $this->currentPage,
            'last_page' => $this->getTotalPages(),
            'per_page' => $this->perPage,
            'total' => $this->totalItems,
            'data' => $data
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->getPaginatedData());
    }
}
