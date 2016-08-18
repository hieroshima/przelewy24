<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Environment;

abstract class EnvironmentAbstract implements EnvironmentInterface
{
    const LIVE_HOST = "https://secure.przelewy24.pl/";
    const SANDBOX_HOST = "https://sandbox.przelewy24.pl/";

    /**
     * @var string
     */
    protected $host;

    /**
     * @var bool
     */
    protected $testMode;

    /**
     * @var string
     */
    protected $apiVersion = '3.2';

    /**
     * EnvironmentAbstract constructor.
     *
     * @param string  $host
     * @param boolean $testMode
     */
    public function __construct($host, $testMode)
    {
        $this->host = $host;
        $this->testMode = $testMode;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return bool
     */
    public function isTestMode()
    {
        return $this->testMode;
    }

    /**
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }
}