<?php
declare(strict_types = 1);

namespace App\Common\Domain\Model;

use FOS\RestBundle\Request\ParamFetcherInterface;

final class ParametersHandler
{
    const LIMIT_PER_PAGE = 50;

    public function handleRequestParams(ParamFetcherInterface $paramFetcher): array
    {
        return [
            '_search' => is_array($paramFetcher->get('_search')) ? $paramFetcher->get('_search') : [],
            '_sort' => is_array($paramFetcher->get('_sort')) ? $paramFetcher->get('_sort') : [],
            '_page' => (int)$paramFetcher->get('_page'),
            '_limit' => (int)$paramFetcher->get('_limit') <= self::LIMIT_PER_PAGE
                ? (int)$paramFetcher->get('_limit')
                : self::LIMIT_PER_PAGE,
        ];
    }
}
