<?php
declare(strict_types = 1);

namespace App\County\Action;

use App\Common\Action\AbstractAction;
use App\Common\Domain\Model\ParametersHandler;
use App\Common\Responder\DefaultResponder;
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
        DefaultResponder $responder
    ): View {
        $params = $parametersHandler->handleRequestParams($paramFetcher);

        return $responder();
    }
}
