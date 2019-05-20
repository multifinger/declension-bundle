<?php

namespace Multifinger\DeclensionBundle\Entity;

/**
 * Cache
 */
class Cache
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $data;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Cache
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set data
     *
     * @param string $data
     *
     * @return Cache
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

}
