<?php

namespace CarDealerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sales
 *
 * @ORM\Table(name="sale")
 * @ORM\Entity(repositoryClass="CarDealerBundle\Repository\SaleRepository")
 */
class Sales
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
     * @var float
     *
     * @ORM\Column(name="Discount", type="float")
     */
    private $discount;

    /**
     * One car is sold in One Sales
     * @ORM\OneToOne(targetEntity="Cars.php")
     * @ORM\JoinColumn(name="Car_Id", referencedColumnName="id")
     */
    private $car;

    /**
     * Many Sales have One Customers
     * @ORM\ManyToOne(targetEntity="Customers.php", inversedBy="sales")
     * @ORM\JoinColumn(name="Customer_Id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car): void
    {
        $this->car = $car;
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
     * Set discount.
     *
     * @param float $discount
     *
     * @return Sales
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount.
     *
     * @return float
     */
    public function getDiscount()
    {
        return $this->discount;
    }
}
