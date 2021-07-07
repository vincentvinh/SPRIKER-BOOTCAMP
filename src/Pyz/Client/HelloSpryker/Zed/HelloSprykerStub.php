<?php

namespace Pyz\Client\HelloSpryker\Zed;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Client\ZedRequest\Stub\ZedRequestStub;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class HelloSprykerStub extends ZedRequestStub implements HelloSprykerStubInterface
{
    /**
     * @var ZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param ZedRequestClientInterface $zedRequestClient
     */
    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer
     */
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        return $this->zedRequestClient->call('/hello-spryker/gateway/reverse-string', $helloSprykerTransfer);
    }
}
