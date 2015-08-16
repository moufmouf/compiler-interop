<?php

namespace Interop\Container\Compiler;

/**
 * Objects implementing the DefinitionInterface represent a definition of a container entry.
 * They can be "rendered" to PHP code using the toPhpCode() method.
 */
interface DefinitionInterface
{
    /**
     * Returns a string of PHP code generating the container entry.
     *
     * The PHP code MUST be a closure or a PHP expression that evaluates to the value of the item.
     *
     * If the PHP code is a closure, then that closure MUST take one argument that is a
     * Interop\Container\ContainerInterface object.
     * The function MUST return the entry generated.
     *
     * For instance, this is a valid PHP string:
     *
     * "function(Interop\Container\ContainerInterface $container) {
     *     $service = new MyService($container->get('my_dependency'));
     *     return $service;
     * }"
     *
     * If the PHP code is a PHP expression, then the PHP expression must evaluate to the value returned for the
     * container entry.
     *
     * These are valid PHP expressions:
     *
     * "'localhost'" (a string)
     * "CONST_VAR" (a constant)
     * "array(42, 12)" (an array)
     * "12 + 32" (any valid PHP statement that evaluates to something)
     *
     * @return string
     */
    public function toPhpCode();
}
