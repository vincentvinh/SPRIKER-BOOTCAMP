<?php

namespace Pyz\Zed\HelloSpryker\Business\Writer;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\HelloSpryker\Persistence\HelloSprykerEntityManagerInterface;

class StringWriter implements StringWriterInterface
{
    /**
     * @var HelloSprykerEntityManagerInterface
     */
    protected $helloSprykerEntityManager;

    /**
     * @param HelloSprykerEntityManagerInterface $helloSprykerEntityManager
     */
    public function __construct(HelloSprykerEntityManagerInterface $helloSprykerEntityManager)
    {
        $this->helloSprykerEntityManager = $helloSprykerEntityManager;
    }

    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer
     */
    public function createHelloSprykerEntity(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        return $this->helloSprykerEntityManager->saveHelloSprykerEntity($helloSprykerTransfer);
    }
}
