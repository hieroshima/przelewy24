<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Environment;

class Live extends EnvironmentAbstract
{
    /**
     * Live constructor.
     */
    public function __construct()
    {
        parent::__construct(self::LIVE_HOST, false);
    }
}
