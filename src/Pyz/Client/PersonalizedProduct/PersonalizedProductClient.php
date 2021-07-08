<?php

namespace Pyz\Client\PersonalizedProduct;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\PersonalizedProduct\PersonalizedProductFactory getFactory()
 */
class PersonalizedProductClient extends AbstractClient implements PersonalizedProductClientInterface
{
    /**
     * @param int $limit
     *
     * @return array
     */
    public function getPersonalizedProducts($limit)
    {
        $searchQuery = $this
                        ->getFactory()
               ->createPersonalizedProductsQueryPlugin($limit);
      $searchQueryFormatters = $this
               ->getFactory()
          ->getSearchQueryFormatters();

        return $this->getFactory()
                ->getSearchClient()
               ->search(
                       $searchQuery,
        $searchQueryFormatters
               );
    }
}
