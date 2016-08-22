<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Factory;

use Przelewy24\Authenticate\AuthInterface;
use Przelewy24\Exception\InvalidServiceAuthenticationException,
    Przelewy24\Exception\InvalidServiceTypeException;
use Przelewy24\Service\ServiceAbstract,
    Przelewy24\Service\ServiceInterface;
use Przelewy24\Environment\EnvironmentInterface;

class ServiceFactory implements ServiceFactoryInterface
{
    /**
     * @var array
     */
    protected static $availableTypes = [
        ServiceAbstract::P24_SERVICE     => 'Przelewy24\\Service\\Przelewy24',
        ServiceAbstract::P24_SERVICE_SMS => 'Przelewy24\\Service\\Sms',
    ];

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
        if (false === array_key_exists($type, self::$availableTypes)) {
            throw new InvalidServiceTypeException();
        }

        try {
            $service = self::buildReflection($auth, $type);
        } catch (\Exception $e) {
            throw new $e;
        }

        return $service->newInstanceArgs([$auth, $env]);
    }

    /**
     * @param AuthInterface $auth
     * @param string $serviceClassType
     *
     * @return \ReflectionClass
     *
     * @throws InvalidServiceAuthenticationException
     */
    private static function buildReflection(AuthInterface $auth, $serviceClassType)
    {
        $reflection = new \ReflectionClass(self::$availableTypes[$serviceClassType]);
        $parameters = $reflection->getConstructor()->getParameters();
        $authType = $parameters[0]->getClass()->getName();

        if (get_class($auth) !== $authType) {
            throw new InvalidServiceAuthenticationException();
        }

        return $reflection;
    }
}