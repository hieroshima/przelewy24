<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Service;

use Przelewy24\Authenticate\SmsAuth;
use Przelewy24\Environment\EnvironmentInterface;

class Sms extends ServiceAbstract
{
    /**
     * @var SmsAuth $auth
     */
    private $auth;

    /**
     * @var EnvironmentInterface $env
     */
    private $env;

    /**
     * Przelewy24 constructor.
     *
     * @param SmsAuth              $auth
     * @param EnvironmentInterface $env
     */
    public function __construct(SmsAuth $auth, EnvironmentInterface $env)
    {
        $this->serviceType = ServiceAbstract::P24_SERVICE_SMS;
        $this->auth = $auth;
        $this->env = $env;
    }
}
