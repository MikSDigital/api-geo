<?php
declare(strict_types = 1);

namespace App\Province\Domain\Model;

final class ProvinceFactory
{
    const DRIVER_DOCTRINE = 'doctrine';

    private $doctrine;

    public function __construct(ProvinceInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function create(string $driver = self::DRIVER_DOCTRINE): ProvinceInterface
    {
        if (!isset($this->$driver)) {
            throw new \Exception(sprintf('Driver: %s does not exist', $driver));
        }

        return $this->$driver;
    }
}
