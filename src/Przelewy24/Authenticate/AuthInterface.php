<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Authenticate;

interface AuthInterface
{
    public function getEnvironment();
    public function getAuthData();
}