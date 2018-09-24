<?php


namespace Mordor;


class Mage
{
    private $mood;  //string
    private $happiness = 0; //int

    private function setHappiness(int $modifier)
    {
        $this->happiness += $modifier;
    }

    private function getHappiness(): int
    {
        return $this->happiness;
    }

    private function setMood(string $mood)
    {
        $this->mood = $mood;
    }

    private function getMood(): string
    {
        $this->defineMood();
        return $this->mood;
    }

    public function eat(string $food)
    {
        $food = strtolower($food);
        $this->modifyHappiness($food);
    }

    private function modifyHappiness($food)
    {
        switch ($food) {
            case "cram":
                $this->setHappiness(2);
                break;
            case "lembas":
                $this->setHappiness(3);
                break;
            case "apple":
                $this->setHappiness(1);
                break;
            case "melon":
                $this->setHappiness(1);
                break;
            case "honeycake":
                $this->setHappiness(5);
                break;
            case "mushrooms":
                $this->setHappiness(-10);
                break;
            default:
                $this->setHappiness(-1);
                break;
        }
    }

    private function defineMood()
    {
        $currHappiness = $this->getHappiness();
        switch ($currHappiness) {
            case $currHappiness < -5:
                $this->setMood("Angry");
                break;
            case $currHappiness < 0:
                $this->setMood("Sad");
                break;
            case $currHappiness < 15:
                $this->setMood("Happy");
                break;
            default:
                $this->setMood("PHP");
                break;
        }
    }

    public function __toString()
    {
        $currHappiness=$this->getHappiness();
        $currMood=$this->getMood();
        $result="$currHappiness\n";
        $result.="$currMood\n";

        return $result;
    }
}