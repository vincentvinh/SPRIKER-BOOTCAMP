<?php

namespace Pyz\Zed\HelloSpryker\Communication\Controller;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\HelloSpryker\Business\HelloSprykerFacade getFacade()
 * @method \Pyz\Zed\HelloSpryker\Communication\HelloSprykerCommunicationFactory getFactory()
 * @method \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerQueryContainer getQueryContainer()
 */
class IndexController extends AbstractController
{

    /**
     * @method \Pyz\Zed\HelloSpryker\Business\HelloSprykerFacadeInterface getFacade()
     */
    public function indexAction()
    {

        $helloSprykerTransfer = new HelloSprykerTransfer();
        $helloSprykerTransfer->setOriginalString("Hello Spryker!");
        $helloSprykerTransfer = $this->getFacade()->reverseString($helloSprykerTransfer);
         // Create new row in DB.
        $helloSprykerTransfer = $this->getFacade()->createHelloSprykerEntity($helloSprykerTransfer);
        // Retrieve data from DB.
        $helloSprykerTransfer = $this->getFacade()->findHelloSpryker($helloSprykerTransfer);

        return ['string' => $helloSprykerTransfer->getReversedString()];
    }

}
