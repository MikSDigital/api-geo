<?php
declare(strict_types = 1);

namespace App\Province\Responder;

use FOS\RestBundle\View\View;

final class GetAllResponder
{
    public function __invoke(array $data = []): View
    {
        return View::create($data);
    }
}
