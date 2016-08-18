<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-18
 */

namespace Tests\Przelewy24\Factory;

use Przelewy24\Factory\EnvironmentFactory;

final class EnvironmentTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatingEnvironmentByFactoryMethods()
    {
        $this->assertInstanceOf(
            'Przelewy24\\Environment\\Live',
            EnvironmentFactory::create('live')
        );
        $this->assertInstanceOf(
            'Przelewy24\\Environment\\Sandbox',
            EnvironmentFactory::create('sandbox')
        );
    }

    /**
     * @expectedException \Przelewy24\Exception\InvalidEnvironmentTypeException
     */
    public function testInvalidEnvironmentTypePassedToFactory()
    {
        EnvironmentFactory::create('test');
    }

    public function testPrzelewy24HostApi()
    {
        $test = EnvironmentFactory::create('sandbox');
        $live = EnvironmentFactory::create('live');

        $this->assertEquals('https://secure.przelewy24.pl/', $live->getHost());
        $this->assertEquals('https://sandbox.przelewy24.pl/', $test->getHost());
    }

    public function testIsEnvironmentTestMode()
    {
        $test = EnvironmentFactory::create('sandbox');
        $live = EnvironmentFactory::create('live');

        $this->assertFalse($live->isTestMode());
        $this->assertTrue($test->isTestMode());
    }

    public function testGetCurrentPrzelewy24ApiVersion()
    {
        $test = EnvironmentFactory::create('sandbox');
        $live = EnvironmentFactory::create('live');

        $this->assertEquals('3.2', $test->getApiVersion());
        $this->assertEquals('3.2', $live->getApiVersion());
    }
}