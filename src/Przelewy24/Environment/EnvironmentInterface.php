<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Environment;

interface EnvironmentInterface
{
    public function getHost();
    public function isTestMode();
    public function getApiVersion();
}