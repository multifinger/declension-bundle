<?php

namespace Multifinger\DeclensionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'multi__declension__cache')]
class Cache
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    private ?string $name = null;

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $data = null;

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setData(?string $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

}
