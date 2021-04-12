<?php
/**
 * @copyright Copyright (c) 2021
 * @author Thang Nguyen
 * @since 1.0
 */

namespace Coccoc\ShippingService\Services;

use Coccoc\ShippingService\Contracts\ProviderInterface;
use Coccoc\ShippingService\Contracts\ServiceInterface;

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
     * Handle get shipping fee
     *
     * @return float|mixed
     */
    public function handle()
    {
        return $this->provider->getShippingFee();
    }

}