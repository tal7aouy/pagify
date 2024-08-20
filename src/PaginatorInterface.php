<?php

declare(strict_types=1);

namespace Tal7aouy\Pagify;

interface PaginatorInterface
{
    public function getCurrentPage(): int;
    public function getPerPage(): int;
    public function getTotalPages(): int;
    public function getPaginatedData(): array;
    public function toJson(): string;
}
