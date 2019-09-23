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
     * @ORM\OneToOne(targetEntity="ExternalResource", mappedBy="externalDummy", cascade={"PERSIST"})
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
