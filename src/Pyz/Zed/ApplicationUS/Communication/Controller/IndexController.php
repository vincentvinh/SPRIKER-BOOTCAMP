<?php

namespace Pyz\Zed\ApplicationUS\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\IndexController as SprykerIndexController;

class IndexController extends SprykerIndexController
{
    /**
     * @return string
     */
    public function indexAction()
    {
        return 'Hello AT Store!';
    }
}
