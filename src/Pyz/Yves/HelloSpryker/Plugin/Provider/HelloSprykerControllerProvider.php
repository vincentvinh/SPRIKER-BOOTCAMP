<?php

namespace Pyz\Yves\HelloSpryker\Plugin\Provider;

use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class HelloSprykerControllerProvider extends AbstractYvesControllerProvider
{

    const HELLOSPRYKER_INDEX = 'hellospryker-index';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/hello-spryker', static::HELLOSPRYKER_INDEX, 'HelloSpryker', 'Index', 'index');
    }

}
