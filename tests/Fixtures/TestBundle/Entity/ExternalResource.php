<?php


namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(attributes={"externalResource"={"host"="external.com","scheme"="https","baseUrl"="/api"}})
 * @ORM\Entity
 */
class ExternalResource
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ExternalDummy", inversedBy="externalResource")
     */
    public $externalDummy;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
