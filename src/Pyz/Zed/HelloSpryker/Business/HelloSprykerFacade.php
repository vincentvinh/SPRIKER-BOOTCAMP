<?php

namespace Pyz\Zed\HelloSpryker\Business;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\HelloSpryker\Persistence\HelloSprykerEntityManagerInterface;
use Pyz\Zed\HelloSpryker\Persistence\HelloSprykerRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method HelloSprykerEntityManagerInterface getEntityManager()
 * @method HelloSprykerRepositoryInterface getRepository()
 */
class HelloSprykerFacade extends AbstractFacade implements HelloSprykerFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer
     * @api
     *
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        return $this->getFactory()
            ->createStringReverser()
            ->reverseString($helloSprykerTransfer);
    }
    /**
        * @inheritDoc
     *
        * @param HelloSprykerTransfer $helloSprykerTransfer
     *
         * @return HelloSprykerTransfer
     * @api
     *
     */
    public function createHelloSprykerEntity(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        return $this->getFactory()->createStringWriter()->createHelloSprykerEntity($helloSprykerTransfer);
    }

    /**
     * @inheritDoc
     *
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer
     * @api
     *
     */
    public function findHelloSpryker(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
            return $this->getFactory()->createStringReader()->findHelloSpryker($helloSprykerTransfer);
    }

}
