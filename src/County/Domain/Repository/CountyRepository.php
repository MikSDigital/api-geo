<?php
declare(strict_types = 1);

namespace App\County\Domain\Repository;

use App\Common\Domain\Exception\NotFoundException;
use App\Common\Domain\Repository\AbstractRepository;
use App\Common\Domain\ValueObject\ResultWithPagination;
use App\County\Domain\Model\CountyInterface;
use Doctrine\Common\Collections\Criteria;

final class CountyRepository extends AbstractRepository implements CountyInterface
{
    const ALIAS = 'county';
    const WHITELIST_SEARCH_PARAMS = [];
    const WHITELIST_ORDER_PARAMS = [
        'name' => 'eq',
        'province_id' => 'eq'
    ];

    public function getAll(array $params): ResultWithPagination
    {
        $criteria = $this->addSearchCriteria(
            Criteria::create(),
            $params['_search'],
            self::WHITELIST_SEARCH_PARAMS
        );

        $criteria = $this->addPaginationCriteria($criteria, $params['_page'], $params['_limit']);

        $queryBuilder = $this->createQueryBuilder(self::ALIAS)->addCriteria($criteria);
        $query = $this->addOrderByParam($queryBuilder, $params['_sort'], self::WHITELIST_ORDER_PARAMS, self::ALIAS);

        $result = $query->getQuery()->getResult();
        if (empty($result)) {
            throw new NotFoundException();
        }

        return new ResultWithPagination($result, $this->getAllRowsCount($criteria, self::ALIAS));
    }
}
