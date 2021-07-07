<?php

namespace Pyz\Yves\HelloSpryker\Controller;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Yves\HelloSpryker\HelloSprykerFactory;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method HelloSprykerFactory getFactory()
 */
class IndexController extends AbstractController
{

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
                $helloSprykerTransfer = new HelloSprykerTransfer();
                $helloSprykerTransfer->setOriginalString("Hello Spryker!");

                $helloSprykerTransfer = $this->getClient()->reverseString($helloSprykerTransfer);

                $data = ['reversedString' => $helloSprykerTransfer->getReversedString()];

        return $this->view(
            $data,
            [],
            '@HelloSpryker/index/index.twig'
        );
    }

}
