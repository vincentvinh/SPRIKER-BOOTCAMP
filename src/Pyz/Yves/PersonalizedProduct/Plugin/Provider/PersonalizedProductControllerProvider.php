<?php

namespace Pyz\Yves\PersonalizedProduct\Plugin\Provider;

use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class PersonalizedProductControllerProvider extends AbstractYvesControllerProvider
{

    const PERSONALIZEDPRODUCT_INDEX = 'personalizedproduct-index';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/personalized-product', static::PERSONALIZEDPRODUCT_INDEX, 'PersonalizedProduct', 'Index', 'index');
    }

}
