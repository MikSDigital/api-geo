<?php
declare(strict_types = 1);

namespace App\Common\Responder;

use FOS\RestBundle\View\View;

final class DefaultResponder
{
    public function __invoke(array $data = []): View
    {
        return View::create($data);
    }
}
