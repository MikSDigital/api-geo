<?php
declare(strict_types = 1);

namespace App\Common\Action;

use App\Common\Domain\Service\DatabaseHealthCheckService;
use App\Common\Responder\DefaultResponder;
use FOS\RestBundle\View\View;

final class HealthAction extends AbstractAction
{
    public function __invoke(
        DefaultResponder $responder,
        DatabaseHealthCheckService $databaseHealth
    ): View {
        return $responder([
            DatabaseHealthCheckService::SERVICE_NAME => $databaseHealth->check()
        ]);
    }
}
