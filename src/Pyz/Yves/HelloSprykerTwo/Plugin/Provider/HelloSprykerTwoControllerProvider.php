<?php

namespace Pyz\Yves\HelloSprykerTwo\Plugin\Provider;

use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class HelloSprykerTwoControllerProvider extends AbstractYvesControllerProvider
{

    const HELLOSPRYKERTWO_INDEX = 'hellosprykertwo-index';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/hello-spryker-two', static::HELLOSPRYKERTWO_INDEX, 'HelloSprykerTwo', 'Index', 'index');
    }

}
