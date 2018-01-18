<?php
declare(strict_types = 1);

namespace App\Common\Domain\ValueObject;

final class ResultWithPagination
{
    private $result;
    private $rowsCount;

    public function __construct(array $result, int $rowsCount)
    {
        $this->result = $result;
        $this->rowsCount = $rowsCount;
    }

    public function getResult(): array
    {
        return $this->result;
    }

    public function getRowsCount(): int
    {
        return $this->rowsCount;
    }
}
