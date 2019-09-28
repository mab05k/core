<?php


namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity\ExternalResource;

/**
 * Class ExternalResourceDataProvider
 * @package ApiPlatform\Core\Tests\Fixtures\TestBundle\DataProvider
 */
class ExternalResourceDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        return new ExternalResource($id);
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === ExternalResource::class;
    }

}
