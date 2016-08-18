<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Factory;

use Przelewy24\Authenticate\AuthInterface;
use Przelewy24\Environment\EnvironmentInterface;

interface ServiceFactoryInterface
{
    /**
     * @param AuthInterface        $auth
     * @param EnvironmentInterface $env
     * @param string               $type
     *
     * @return mixed
     */
    public static function create(AuthInterface $auth, EnvironmentInterface $env, $type);
}