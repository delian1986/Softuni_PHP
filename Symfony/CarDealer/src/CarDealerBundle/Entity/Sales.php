<?php

namespace CarDealerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sales
 *
 * @ORM\Table(name="sales")
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
     * @ORM\OneToOne(targetEntity="CarDealerBundle\Entity\Cars")
     * @ORM\JoinColumn(name="Car_Id", referencedColumnName="id")
     */
    private $car;

    /**
     * @var Customers
     * Many Sales have One Customers
     * @ORM\ManyToOne(targetEntity="CarDealerBundle\Entity\Customers", inversedBy="sales")
     * @ORM\JoinColumn(name="Customer_Id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @return Customers
     */
    public function getCustomer(): Customers
    {
        return $this->customer;
    }

    /**
     * @param Customers $customer
     */
    public function setCustomer(Customers $customer)
    {
        $this->customer = $customer;
    }



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
    public function setCar($car)
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
