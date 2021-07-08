<?php

namespace Pyz\Zed\StringReverser\Business;

use Generated\Shared\Transfer\StringReverserTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method StringReverserBusinessFactory getFactory()
 */
class StringReverserFacade extends AbstractFacade implements StringReverserFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param StringReverserTransfer $stringReverserTransfer
     *
     * @return StringReverserTransfer
     * @api
     *
     */
    public function reverseString(StringReverserTransfer $stringReverserTransfer): StringReverserTransfer
    {
        return $this->getFactory()
            ->createStringReverser()
            ->reverse($stringReverserTransfer);
    }
}
