<?php
declare(strict_types = 1);

namespace App\County\Domain\Model;

final class CountyFactory
{
    const DRIVER_DOCTRINE = 'doctrine';

    private $doctrine;

    public function __construct(CountyInterface $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function create(string $driver = self::DRIVER_DOCTRINE): CountyInterface
    {
        if (!isset($this->$driver)) {
            throw new \Exception(sprintf('Driver: %s does not exist', $driver));
        }

        return $this->$driver;
    }
}
