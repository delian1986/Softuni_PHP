<?php


namespace Mankind;

class Student extends Human
{
    private $facultyNumber;

    public function __construct(string $fname, string $lname, string $facultyNumber)
    {
        parent::__construct($fname, $lname);
        $this->setFacultyNumber($facultyNumber);
    }

    private function setFacultyNumber($facultyNumber)
    {
        if (strlen($facultyNumber) < 5 or strlen($facultyNumber) > 10) {
            throw new \Exception("Invalid faculty number!");
        }
        $this->facultyNumber=$facultyNumber;
    }

    public function __toString()
    {
        $result= parent::__toString();
        $result.="Faculty number: $this->facultyNumber\n";
        return $result.PHP_EOL;
    }
}