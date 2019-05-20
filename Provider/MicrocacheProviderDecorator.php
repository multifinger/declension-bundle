<?php
/**
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 01.07.16 12:23
 */

namespace Multifinger\DeclensionBundle\Provider;


class MicrocacheProviderDecorator implements ProviderInterface
{

    /** @var ProviderInterface  */
    private $inner;

    static $cache = array();

    public function __construct(ProviderInterface $provider)
    {
        $this->inner = $provider;
    }

    public function decline($name)
    {
        if (array_key_exists($name, self::$cache)) {
            return self::$cache[$name];
        }

        return self::$cache[$name] = $this->inner->decline($name);
    }

}
