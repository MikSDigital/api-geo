<?php
declare(strict_types = 1);

namespace App\Province\Action;

use App\Common\Action\AbstractAction;
use App\Common\Domain\Model\PaginationHelper;
use App\Common\Domain\Model\ParametersHandler;
use App\Province\Domain\Model\ProvinceFactory;
use App\Province\Responder\GetAllResponder;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\View;

final class GetAllAction extends AbstractAction
{
    /**
     * @QueryParam(
     *     name="_search",
     *     map=true,
     *     default={}
     * )
     * @QueryParam(
     *     name="_sort",
     *     default={}
     * )
     * @QueryParam(
     *     name="_page",
     *     default=1,
     *     requirements="^[1-9]\d*$"
     * )
     * @QueryParam(
     *     name="_limit",
     *     default=10,
     *     requirements="^[1-9]\d*$"
     * )
     */
    public function __invoke(
        ParamFetcherInterface $paramFetcher,
        ParametersHandler $parametersHandler,
        ProvinceFactory $provinceFactory,
        GetAllResponder $responder
    ): View {
        $params = $parametersHandler->handleRequestParams($paramFetcher);

        try {
            $result = $provinceFactory
                ->create()
                ->getAll($params);

            $paginationHelper = new PaginationHelper($result->getRowsCount(), $params['_limit'], $params['_page']);

            $responseData = [
                'data' => $result->getResult(),
                'pagination' => $paginationHelper->getPaginationData()
            ];
        } catch (\Exception $exception) {
            $responseData = [
                'error' => $exception->getMessage()
            ];
        }

        return $responder($responseData);
    }
}
