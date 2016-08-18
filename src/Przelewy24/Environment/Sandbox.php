<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Environment;

class Sandbox extends EnvironmentAbstract
{
    /**
     * Sandbox constructor.
     */
    public function __construct()
    {
        parent::__construct(self::SANDBOX_HOST, true);
    }
}