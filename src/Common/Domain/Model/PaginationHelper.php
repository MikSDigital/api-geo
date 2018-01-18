<?php
declare(strict_types = 1);

namespace App\Common\Domain\Model;

final class PaginationHelper
{
    private $rowsCount;
    private $limit;
    private $page;

    public function __construct(int $rowsCount, int $limit, int $page)
    {
        $this->rowsCount = $rowsCount;
        $this->limit = $limit;
        $this->page = $page;
    }

    public function getPaginationData(): array
    {
        $totalPages = ceil($this->rowsCount / $this->limit);

        return [
            'totalRowsCount' => $this->rowsCount,
            'totalPages' => $totalPages,
            'currentPage' => $this->page,
            'rowsPerPage' => $this->limit,
            'hasNextPage' => $totalPages > $this->page
        ];
    }
}
