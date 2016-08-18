<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Service;

use Przelewy24\Authenticate\ClassicAuth;
use Przelewy24\Environment\EnvironmentInterface;

class Przelewy24 extends ServiceAbstract
{
    /**
     * @var ClassicAuth $auth
     */
    private $auth;

    /**
     * @var EnvironmentInterface $env
     */
    private $env;

    /**
     * Przelewy24 constructor.
     *
     * @param ClassicAuth          $auth
     * @param EnvironmentInterface $env
     */
    public function __construct(ClassicAuth $auth, EnvironmentInterface $env)
    {
        $this->serviceType = ServiceAbstract::P24_SERVICE;
        $this->auth = $auth;
        $this->env = $env;
    }
}
