<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

use Doctrine\ORM\EntityManagerInterface;

final class DatabaseHealthCheckService implements HealthInterface
{
    const SERVICE_NAME = 'database';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function check(): bool
    {
        try {
            return $this->entityManager->getConnection()->connect();
        } catch (\Exception $e) {
            return false;
        }
    }
}
