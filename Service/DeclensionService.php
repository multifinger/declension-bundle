<?php
/**
 * @author Maksim Borisov <maksim.i.borisov@gmail.com> 01.07.16 11:53
 */

namespace Multifinger\DeclensionBundle\Service;


use Doctrine\ORM\EntityManager;
use Multifinger\DeclensionBundle\Provider\ProviderInterface;

class DeclensionService
{

    /** @var ProviderInterface */
    protected $provider;

    public function __construct(ProviderInterface $provider)
    {

        $this->provider = $provider;
    }

    public function decline($name, $case)
    {
        $result = $this->provider->decline($name);

        return array_key_exists($case, $result) ? $result[$case] : false;
    }

}
