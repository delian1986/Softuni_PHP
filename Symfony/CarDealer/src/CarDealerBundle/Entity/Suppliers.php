<?php

namespace CarDealerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Suppliers
 *
 * @ORM\Table(name="suppliers")
 * @ORM\Entity(repositoryClass="CarDealerBundle\Repository\SupplierRepository")
 */
class Suppliers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="isImporter", type="boolean")
     */
    private $isImporter;

    /**
     * @var ArrayCollection|Parts
     * @ORM\OneToMany(targetEntity="CarDealerBundle\Entity\Parts", mappedBy="supplier")
     */
    private $parts;

    public function __construct()
    {
        $this->parts=new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getParts()
    {
        return $this->parts;
    }

    /**
     * @param Parts
     * @return Suppliers
     */
    public function setParts(Parts $parts)
    {
        $this->parts[] = $parts;

        return $this;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Suppliers
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isImporter.
     *
     * @param bool $isImporter
     *
     * @return Suppliers
     */
    public function setIsImporter($isImporter)
    {
        $this->isImporter = $isImporter;

        return $this;
    }

    /**
     * Get isImporter.
     *
     * @return bool
     */
    public function getIsImporter()
    {
        return $this->isImporter;
    }
}
