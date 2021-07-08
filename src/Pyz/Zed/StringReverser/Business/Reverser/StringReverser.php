<?php

namespace Pyz\Zed\StringReverser\Business\Reverser;

use Generated\Shared\Transfer\StringReverserTransfer;

class StringReverser implements StringReverserInterface
{
    /**
     * @param StringReverserTransfer $stringReverserTransfer
     *
     * @return StringReverserTransfer
     */
    public function reverse(StringReverserTransfer $stringReverserTransfer): StringReverserTransfer
    {
        $reversedString = strrev($stringReverserTransfer->getOriginalString());
        $stringReverserTransfer->setReversedString($reversedString);

        return $stringReverserTransfer;
    }
}
