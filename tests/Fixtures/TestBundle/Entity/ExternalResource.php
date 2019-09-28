<?php


namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Class ExternalResource
 * @package ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity
 * @ApiResource(
 *     itemOperations={"get"={"method"="get"}},
 *     collectionOperations={},
 *     attributes={
 *          "externalResource"={
 *              "scheme"="https",
 *              "host"="external.com",
 *              "absoluteUrl"=true
 *          }
 *     }
 * )
 */
class ExternalResource
{
    /**
     * @var null|int|string
     * @ApiProperty(identifier=true)
     */
    public $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }
}
