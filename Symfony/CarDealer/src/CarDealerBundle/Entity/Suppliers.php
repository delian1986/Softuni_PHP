<?php

namespace CarDealerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Suppliers
 *
 * @ORM\Table(name="supplier")
 * @ORM\Entity(repositoryClass="CarDealerBundle\Repository\SupplierRepository")
 */
class Suppliers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="IsImporter", type="boolean")
     */
    private $isImporter;

    /**
     * @ORM\OneToMany(targetEntity="Parts.php", mappedBy="parts")
     */
    private $parts;


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
