<?php
/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService\Services;

use Coccoc\ShippingService\Contracts\ProviderInterface;
use Coccoc\ShippingService\Contracts\ServiceInterface;
use Coccoc\ShippingService\Exceptions\ShippingServiceException;

class ShippingService implements ServiceInterface
{

    protected $provider;

    /**
     * ShippingService constructor.
     *
     * @param ProviderInterface $provider
     */
    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     *
     *
     * @return float|mixed
     * @throws ShippingServiceException
     */
    public function getPrice()
    {
        try {
            return $this->provider->getShippingFee();
        } catch (\Exception $e)
        {
            throw new ShippingServiceException($e->getMessage());
        }
    }

}