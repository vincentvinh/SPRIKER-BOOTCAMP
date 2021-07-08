<?php

namespace Pyz\Zed\StringReverser\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\StringReverser\Business\StringReverserFacade getFacade()
 * @method \Pyz\Zed\StringReverser\Communication\StringReverserCommunicationFactory getFactory()
 * @method \Pyz\Zed\StringReverser\Persistence\StringReverserQueryContainer getQueryContainer()
 */
class IndexController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        return $this->viewResponse([
            'test' => 'Greetings!',
        ]);
    }

}
