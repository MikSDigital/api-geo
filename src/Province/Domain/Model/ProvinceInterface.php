<?php
declare(strict_types = 1);

namespace App\Province\Domain\Model;

use App\Common\Domain\ValueObject\ResultWithPagination;

interface ProvinceInterface
{
    public function getAll(array $params): ResultWithPagination;
}
