<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

interface HealthInterface
{
    public function check(): bool;
}
