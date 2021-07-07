<?php

namespace Pyz\Zed\HelloSpryker\Business\Reader;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\HelloSpryker\Persistence\HelloSprykerRepositoryInterface;

class StringReader implements StringReaderInterface
{
    /**
     * @var HelloSprykerRepositoryInterface
     */
    protected $helloSprykerRepository;

    /**
     * @param HelloSprykerRepositoryInterface $helloSprykerRepository
     */
    public function __construct(HelloSprykerRepositoryInterface $helloSprykerRepository)
    {
        $this->helloSprykerRepository = $helloSprykerRepository;
    }

    /**
     * @param HelloSprykerTransfer $helloSprykerTransfer
     *
     * @return HelloSprykerTransfer
     */
    public function findHelloSpryker(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        $helloSprykerTransfer = $this->helloSprykerRepository->findPyzHelloSprykerById($helloSprykerTransfer->getIdHelloSpryker());

        if (!$helloSprykerTransfer) {
            return new HelloSprykerTransfer();
        }

        return $helloSprykerTransfer;
    }
}
