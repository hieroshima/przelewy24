<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Service;

abstract class ServiceAbstract implements ServiceInterface
{
    const P24_SERVICE = 'przelewy24';
    const P24_SERVICE_SMS = 'sms';

    /**
     * @var string $serviceType
     */
    protected $serviceType;

    /**
     * Method return service type
     *
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }
}