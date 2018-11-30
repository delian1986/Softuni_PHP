<?php

namespace CarDealerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Parts
 *
 * @ORM\Table(name="parts")
 * @ORM\Entity(repositoryClass="CarDealerBundle\Repository\PartRepository")
 */
class Parts
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
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var Suppliers
     * @ORM\ManyToOne(targetEntity="CarDealerBundle\Entity\Suppliers", inversedBy="parts")
     * @ORM\JoinColumn("supplier_Id",referencedColumnName="id")
     */
    private $supplier;

    /**
     * @var ArrayCollection|Cars
     * @ORM\ManyToMany(targetEntity="CarDealerBundle\Entity\Cars", mappedBy="parts")
     * @ORM\JoinTable(name="parts_cars")
     */
    private $cars;

    public function __construct()
    {
        $this->cars=new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * @param mixed $supplier
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * @return mixed
     */
    public function getCars()
    {
        return $this->cars;
    }

    /**
     * @param mixed $cars
     * @return Parts
     */
    public function setCars($cars)
    {
        $this->cars[] = $cars;
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
     * @return Parts
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
     * Set price.
     *
     * @param string $price
     *
     * @return Parts
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity.
     *
     * @param int $quantity
     *
     * @return Parts
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
