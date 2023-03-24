<?php

namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

class ProductSearchEntity
{

    /**
     * @var string
     */
    private ?string $name = null; 


    /**
     * Get the value of name
     *
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }


    /**
     * Set the value of name
     *
     * @param ?string $name
     *
     * @return self
     */
    public function setName(?string $name): ProductSearchEntity
    {
        $this->name = $name;

        return $this;
    }
}
