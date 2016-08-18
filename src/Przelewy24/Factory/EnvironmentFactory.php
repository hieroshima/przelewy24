<?php
/**
 * @author: Kamil Kowalski <hieroshima@gmail.com>
 * @created: 2016-08-10
 */

namespace Przelewy24\Factory;

use Przelewy24\Environment\EnvironmentInterface;
use Przelewy24\Exception\InvalidEnvironmentTypeException;

/**
 * Class EnvironmentFactory
 * @package Przelewy24\Factory
 */
class EnvironmentFactory implements EnvironmentFactoryInterface
{
    /**
     * Creating environment
     *
     * @param string $envType live|sandbox
     *
     * @return EnvironmentInterface
     *
     * @throws InvalidEnvironmentTypeException
     */
    public static function create($envType)
    {
        $envClass = "Przelewy24\\Environment\\" . ucfirst($envType);

        if (false === class_exists($envClass)) {
            throw new InvalidEnvironmentTypeException();
        }

        return new $envClass;
    }
}
