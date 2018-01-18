<?php
declare(strict_types = 1);

namespace App\Common\Domain\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractRepository extends EntityRepository
{
    protected function addSearchCriteria(Criteria $criteria, array $params, array $whitelist): Criteria
    {
        foreach ($params as $field => $value) {
            if (array_key_exists($field, $whitelist)) {
                $method = $whitelist[$field];
                $criteria->andWhere(Criteria::expr()->$method($field, $value));
            }
        }

        return $criteria;
    }

    protected function addPaginationCriteria(Criteria $criteria, int $page, int $limit): Criteria
    {
        $criteria->setMaxResults($limit);
        $criteria->setFirstResult($page * $limit - $limit);

        return $criteria;
    }

    protected function addOrderByParam(
        QueryBuilder $queryBuilder,
        array $params,
        array $whitelist,
        string $alias
    ):QueryBuilder {
        foreach ($params as $field => $sortType) {
            if (!in_array($field, $whitelist)) {
                break;
            }

            $queryBuilder->orderBy($alias . '.' . $field, $sortType);
            break;
        }

        return $queryBuilder;
    }

    protected function getAllRowsCount(Criteria $criteria, string $alias): int
    {
        return (int) $this->createQueryBuilder($alias)
            ->addCriteria($criteria)
            ->select(sprintf('count(%s)', $alias))
            ->getQuery()
            ->getSingleScalarResult();
    }
}
