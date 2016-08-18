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

final class Przelewy24Test extends \PHPUnit_Framework_TestCase
{
    public function testGettingServiceType()
    {
        $env = EnvironmentFactory::create('sandbox');
        $auth = new ClassicAuth();
        $p24 = ServiceFactory::create($auth, $env, 'classic');

        $this->assertEquals('classic', $p24->getServiceType());
    }
}