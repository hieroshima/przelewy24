<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Factory;

use Przelewy24\Authenticate\AuthInterface,
    Przelewy24\Authenticate\ClassicAuth,
    Przelewy24\Authenticate\SmsAuth;
use Przelewy24\Exception\InvalidServiceAuthenticationException,
    Przelewy24\Exception\InvalidServiceTypeException;
use Przelewy24\Service\Przelewy24,
    Przelewy24\Service\Sms,
    Przelewy24\Service\ServiceAbstract,
    Przelewy24\Service\ServiceInterface;
use Przelewy24\Environment\EnvironmentInterface;

class ServiceFactory implements ServiceFactoryInterface
{
    /**
     * Factory for creating service
     *
     * @param AuthInterface        $auth
     * @param EnvironmentInterface $env
     * @param                      $type
     *
     * @return ServiceInterface
     *
     * @throws InvalidServiceAuthenticationException
     * @throws InvalidServiceTypeException
     */
    public static function create(AuthInterface $auth, EnvironmentInterface $env, $type)
    {
        //@TODO: Refactor if statements by changing type strings to `przelewy24` and `sms` instead of currently `classic` and `sms`
        if ($type !== ServiceAbstract::P24_SERVICE && $type !== ServiceAbstract::P24_SERVICE_SMS) {
            throw new InvalidServiceTypeException();
        }

        if ($type === ServiceAbstract::P24_SERVICE && !$auth instanceof ClassicAuth) {
            throw new InvalidServiceAuthenticationException('Classic service need ClassicAuth authentication');
        }

        if ($type === ServiceAbstract::P24_SERVICE_SMS && !$auth instanceof SmsAuth) {
            throw new InvalidServiceAuthenticationException('SMS service need SmsAuth authentication');
        }

        $serviceInstance = $type === ServiceAbstract::P24_SERVICE ? new Przelewy24($auth, $env) : new Sms($auth, $env);

        return $serviceInstance;
    }
}