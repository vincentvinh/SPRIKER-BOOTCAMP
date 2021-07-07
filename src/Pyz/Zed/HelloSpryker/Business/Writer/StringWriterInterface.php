<?php

namespace Pyz\Zed\HelloSpryker\Business\Writer;

use Generated\Shared\Transfer\HelloSprykerTransfer;

interface StringWriterInterface
{
    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer
     */
    public function createHelloSprykerEntity(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer;
}
