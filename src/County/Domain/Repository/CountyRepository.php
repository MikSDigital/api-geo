<?php
declare(strict_types = 1);

namespace App\County\Domain\Repository;

use App\Common\Domain\Repository\AbstractRepository;
use App\Common\Domain\ValueObject\ResultWithPagination;
use App\County\Domain\Model\CountyInterface;

final class CountyRepository extends AbstractRepository implements CountyInterface
{
    public function getAll(array $params): ResultWithPagination
    {
        // TODO: Implement getAll() method.
    }
}
