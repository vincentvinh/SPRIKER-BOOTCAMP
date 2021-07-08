<?php

namespace Pyz\Zed\StringReverser\Business;

use Generated\Shared\Transfer\StringReverserTransfer;

interface StringReverserFacadeInterface
{
    /**
     * Specification:
     * - Reverses string.
     *
     * @param StringReverserTransfer $stringReverserTransfer
     *
     * @return StringReverserTransfer
     * @api
     *
     */
    public function reverseString(StringReverserTransfer $stringReverserTransfer): StringReverserTransfer;
}
