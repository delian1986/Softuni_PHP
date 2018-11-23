<?php

namespace CarDealerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="CarDealerBundle\Repository\CustomerRepository")
 */
class Customers
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
     * @var \DateTime
     *
     * @ORM\Column(name="BirthDate", type="date")
     */
    private $birthDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="IsYoungDriver", type="boolean")
     */
    private $isYoungDriver;

    /**
     * One customer has many sales
     * @ORM\OneToMany(targetEntity="Sales.php", mappedBy="customer")
     */
    private $sales;


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
     * @return Customers
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
     * Set birthDate.
     *
     * @param \DateTime $birthDate
     *
     * @return Customers
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate.
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set isYoungDriver.
     *
     * @param bool $isYoungDriver
     *
     * @return Customers
     */
    public function setIsYoungDriver($isYoungDriver)
    {
        $this->isYoungDriver = $isYoungDriver;

        return $this;
    }

    /**
     * Get isYoungDriver.
     *
     * @return bool
     */
    public function getIsYoungDriver()
    {
        return $this->isYoungDriver;
    }
}
