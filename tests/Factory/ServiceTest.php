<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-18
 */

namespace Tests\Przelewy24\Factory;

use Przelewy24\Authenticate\ClassicAuth;
use Przelewy24\Authenticate\SmsAuth;
use Przelewy24\Factory\EnvironmentFactory;
use Przelewy24\Factory\ServiceFactory;

final class ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatingPrzelewy24Service()
    {
        $env = EnvironmentFactory::create('sandbox');
        $auth = new ClassicAuth();

        $this->assertInstanceOf(
            'Przelewy24\\Service\\Przelewy24',
            ServiceFactory::create($auth, $env, 'classic')
        );
    }

    public function testCreatingSmsService()
    {
        $env = EnvironmentFactory::create('sandbox');
        $auth = new SmsAuth();

        $this->assertInstanceOf(
            'Przelewy24\\Service\\Sms',
            ServiceFactory::create($auth, $env, 'sms')
        );
    }

    /**
     * @expectedException \Przelewy24\Exception\InvalidServiceAuthenticationException
     */
    public function testInvalidAuthenticationForPrzelewy24Service()
    {
        $env = EnvironmentFactory::create('sandbox');
        $auth = new SmsAuth();

        ServiceFactory::create($auth, $env, 'classic');
    }

    /**
     * @expectedException \Przelewy24\Exception\InvalidServiceAuthenticationException
     */
    public function testInvalidAuthenticationForSmsService()
    {
        $env = EnvironmentFactory::create('sandbox');
        $auth = new ClassicAuth();

        ServiceFactory::create($auth, $env, 'sms');
    }

    /**
     * @expectedException \Przelewy24\Exception\InvalidServiceTypeException
     */
    public function testUndefinedService()
    {
        $env = EnvironmentFactory::create('sandbox');
        $auth = new SmsAuth();

        ServiceFactory::create($auth, $env, 'przelewy24');
    }
}