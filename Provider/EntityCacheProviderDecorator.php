<?php
/**
 * Created by PhpStorm.
 * User: makz
 * Date: 01.07.16
 * Time: 12:32
 */

namespace Multifinger\DeclensionBundle\Provider;


use Doctrine\ORM\EntityManager;
use Multifinger\DeclensionBundle\Entity\Cache;

class EntityCacheProviderDecorator implements ProviderInterface
{

    /** @var ProviderInterface  */
    private $inner;

    /** @var \Doctrine\ORM\EntityManager */
    protected $em;

    public function __construct(ProviderInterface $provider, EntityManager $em)
    {
        $this->inner = $provider;
        $this->em = $em;
    }

    public function decline($name)
    {
        /** @var Cache $cache */
        $cache = $this->em->getRepository('MultifingerDeclensionBundle:Cache')->findOneBy(array('name' => $name));

        if ($cache !== null) {
            return unserialize($cache->getData());
        }

        $result = $this->inner->decline($name);

        if (is_array($result) && sizeof($result)) {
            $cache = new Cache();
            $cache->setName($name);
            $cache->setData(serialize($result));

            $this->em->persist($cache);
            $this->em->flush();
        }

        return $result;
    }

}
