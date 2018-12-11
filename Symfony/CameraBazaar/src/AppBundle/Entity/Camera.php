<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Camera
 *
 * @ORM\Table(name="camera")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CameraRepository")
 */
class Camera
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
     * @ORM\Column(name="make", type="string", length=255)
     */
    private $make;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

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
     * @var int
     *
     * @ORM\Column(name="minShutterSpeed", type="integer")
     */
    private $minShutterSpeed;

    /**
     * @var int
     *
     * @ORM\Column(name="maxShutterSpeed", type="integer")
     */
    private $maxShutterSpeed;

    /**
     * @var int
     *
     * @ORM\Column(name="minISO", type="integer")
     */
    private $minISO;

    /**
     * @var int
     *
     * @ORM\Column(name="maxISO", type="integer")
     */
    private $maxISO;

    /**
     * @var bool
     *
     * @ORM\Column(name="isFullFrame", type="boolean")
     */
    private $isFullFrame;

    /**
     * @var string
     *
     * @ORM\Column(name="videoResolution", type="text")
     */
    private $videoResolution;

    /**
     * @var string
     *
     * @ORM\Column(name="lightMetering", type="string", length=255)
     */
    private $lightMetering;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="imageUrl", type="string", length=255)
     */
    private $imageUrl;


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
     * Set make.
     *
     * @param string $make
     *
     * @return Camera
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make.
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set model.
     *
     * @param string $model
     *
     * @return Camera
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model.
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set price.
     *
     * @param string $price
     *
     * @return Camera
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
     * @return Camera
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

    /**
     * Set minShutterSpeed.
     *
     * @param int $minShutterSpeed
     *
     * @return Camera
     */
    public function setMinShutterSpeed($minShutterSpeed)
    {
        $this->minShutterSpeed = $minShutterSpeed;

        return $this;
    }

    /**
     * Get minShutterSpeed.
     *
     * @return int
     */
    public function getMinShutterSpeed()
    {
        return $this->minShutterSpeed;
    }

    /**
     * Set maxShutterSpeed.
     *
     * @param int $maxShutterSpeed
     *
     * @return Camera
     */
    public function setMaxShutterSpeed($maxShutterSpeed)
    {
        $this->maxShutterSpeed = $maxShutterSpeed;

        return $this;
    }

    /**
     * Get maxShutterSpeed.
     *
     * @return int
     */
    public function getMaxShutterSpeed()
    {
        return $this->maxShutterSpeed;
    }

    /**
     * Set minISO.
     *
     * @param int $minISO
     *
     * @return Camera
     */
    public function setMinISO($minISO)
    {
        $this->minISO = $minISO;

        return $this;
    }

    /**
     * Get minISO.
     *
     * @return int
     */
    public function getMinISO()
    {
        return $this->minISO;
    }

    /**
     * Set maxISO.
     *
     * @param int $maxISO
     *
     * @return Camera
     */
    public function setMaxISO($maxISO)
    {
        $this->maxISO = $maxISO;

        return $this;
    }

    /**
     * Get maxISO.
     *
     * @return int
     */
    public function getMaxISO()
    {
        return $this->maxISO;
    }

    /**
     * Set isFullFrame.
     *
     * @param bool $isFullFrame
     *
     * @return Camera
     */
    public function setIsFullFrame($isFullFrame)
    {
        $this->isFullFrame = $isFullFrame;

        return $this;
    }

    /**
     * Get isFullFrame.
     *
     * @return bool
     */
    public function getIsFullFrame()
    {
        return $this->isFullFrame;
    }

    /**
     * Set videoResolution.
     *
     * @param string $videoResolution
     *
     * @return Camera
     */
    public function setVideoResolution($videoResolution)
    {
        $this->videoResolution = $videoResolution;

        return $this;
    }

    /**
     * Get videoResolution.
     *
     * @return string
     */
    public function getVideoResolution()
    {
        return $this->videoResolution;
    }

    /**
     * Set lightMetering.
     *
     * @param string $lightMetering
     *
     * @return Camera
     */
    public function setLightMetering($lightMetering)
    {
        $this->lightMetering = $lightMetering;

        return $this;
    }

    /**
     * Get lightMetering.
     *
     * @return string
     */
    public function getLightMetering()
    {
        return $this->lightMetering;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Camera
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageUrl.
     *
     * @param string $imageUrl
     *
     * @return Camera
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
}
