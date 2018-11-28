<?php

namespace CarDealerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity(repositoryClass="CarDealerBundle\Repository\CustomerRepository")
 */
class Customers
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
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="datetime")
     */
    private $birthDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="isYoungDriver", type="boolean")
     */
    private $isYoungDriver;

    /**
     * One customer has many sales
     * @ORM\OneToMany(targetEntity="CarDealerBundle\Entity\Sales", mappedBy="customer")
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
