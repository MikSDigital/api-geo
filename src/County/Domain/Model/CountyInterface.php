<?php
declare(strict_types = 1);

namespace App\County\Domain\Model;

use App\Common\Domain\ValueObject\ResultWithPagination;

interface CountyInterface
{
    public function getAll(array $params): ResultWithPagination;
}
