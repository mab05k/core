<?php


namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity
 */
class ExternalDummy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var ExternalResource
     * @ORM\Column(type="external_resource_type")
     */
    public $externalResource;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
