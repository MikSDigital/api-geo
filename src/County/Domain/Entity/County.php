<?php
declare(strict_types = 1);

namespace App\County\Domain\Entity;

use App\Province\Domain\Entity\Province;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\County\Domain\Repository\CountyRepository")
 * @ORM\Table(name="county")
 */
class County
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Province\Domain\Entity\Province")
     * @ORM\JoinColumn(name="province_id", referencedColumnName="id")
     */
    private $province;

    /**
     * @ORM\Column(name="terc", type="string", length=7)
     */
    private $terc;

    /**
     * @ORM\Column(name="type", type="smallint", length=2)
     */
    private $type;

    /**
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(name="unit", type="string", length=64)
     */
    private $unit;

    /**
     * @ORM\Column(name="state_by_day", type="date")
     */
    private $stateByDay;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTerc(): string
    {
        return $this->terc;
    }

    public function setTerc(string $terc): void
    {
        $this->terc = $terc;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    public function getStateByDay(): \DateTime
    {
        return $this->stateByDay;
    }

    public function setStateByDay(\DateTime $stateByDay): void
    {
        $this->stateByDay = $stateByDay;
    }

    public function getProvince(): Province
    {
        return $this->province;
    }

    public function setProvince(Province $province): void
    {
        $this->province = $province;
    }
}
