<?php

namespace Pyz\Yves\PersonalizedProduct\Controller;

use Pyz\Yves\PersonalizedProduct\PersonalizedProductFactory;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Spryker\Yves\Kernel\View\View;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method PersonalizedProductFactory getFactory()
 */
class IndexController extends AbstractController
{

    /**
     * @param Request $request
     *
     * @return View
     */
    public function indexAction($limit)
    {
        $searchResults = $this->getClient()->getPersonalizedProducts($limit);

                return $this->view(
                    $searchResults,
                    [],
            '@PersonalizedProduct/index/index.twig'
               );
        }

}
