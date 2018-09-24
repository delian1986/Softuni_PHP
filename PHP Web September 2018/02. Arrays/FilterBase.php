<?php
//90/100
class Employee
{
    private $position;
    private $salary;


    private $age;
    private $name;

    public function __construct($name, $prop)
    {
        $this->name = $name;
        $this->defineProperty($prop);
    }

    private function defineProperty($prop)
    {
        if (ctype_digit($prop)) {
            $this->age = $prop;
        } else if (is_numeric($prop) and (float)$prop==$prop) {
            $formatted = sprintf("%01.2f", $prop);
            $this->salary = $formatted;
        } else {
            $this->position = $prop;
        }
    }

    public function getName(){
        return $this->name;
    }

    public function __get($name)
    {
        if ($this->{$name}) {
            return $this->{$name};
        }else{
            return "none";
        }
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }
}

$people = [];
while (1) {
    $line = readline();
    if ($line == "filter base") {
        break;
    }
    list($name, $prop) = explode(" -> ", $line);
    $person = new Employee($name, $prop);
    $people[] = $person;
}

$filter = readline();


foreach ($people as $person ) {
    $result=$person->__get(strtolower($filter));
    if ($result=="none"){
        continue;
    }
    echo  "Name: ".$person->getName(). PHP_EOL;
    echo "$filter: ".$result.PHP_EOL;
    echo "====================".PHP_EOL;
}