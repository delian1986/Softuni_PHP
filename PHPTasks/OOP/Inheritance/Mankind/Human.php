<?php


namespace Mankind;


class Human
{
    protected $fname;
    protected $lname;

    public function __construct(string $fname,string $lname)
    {
        $this->setFName($fname);
        $this->setLName($lname);
    }

    protected function setFName($fname)
    {
        $firstChar = $fname[0];
        if ($firstChar !== strtoupper($firstChar)) {
            throw new \Exception("Expected upper case letter!Argument: firstName\n");
        } else if (strlen($fname) < 4) {
            throw new \Exception("\"Expected length at least 4 symbols!Argument: firstName\n");
        }
        $this->fname = $fname;
    }

    protected function setLName($lname)
    {
        $firstChar = $lname[0];
        if ($firstChar !== strtoupper($firstChar)) {
            throw new \Exception("Expected upper case letter!Argument: lastName\n");
        } else if (strlen($lname) < 3) {
            throw new \Exception("Expected length at least 3 symbols!Argument: lastName\n");
        }
        $this->lname = $lname;
    }

    protected function getFname(){
        return $this->fname;
    }

    protected function getLname(){
        return $this->lname;
    }

    public function __toString()
    {
        $result="First Name: $this->fname\n";
        $result.="Last Name: $this->lname\n";
        return $result;
    }
}