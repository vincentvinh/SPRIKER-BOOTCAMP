<?php

namespace Pyz\Client\Catalog;

use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Catalog\CatalogFactory as SprykerCatalogFactory;
use Spryker\Client\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Client\ProductStorage\ProductStorageClientInterface;

class CatalogFactory extends SprykerCatalogFactory
{
    /**
     * @throws ContainerKeyNotFoundException
     *
     * @return CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_CART);
    }

    /**
     * @throws ContainerKeyNotFoundException
        *
     * @return ProductStorageClientInterface
         */
    public function getProductStorageClient()
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_PRODUCT_STORAGE);
    }
}
