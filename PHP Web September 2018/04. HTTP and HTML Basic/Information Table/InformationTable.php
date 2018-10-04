<?php

class Person
{
    private $name;
    private $phone;
    private $age;
    private $address;

    public function __construct($name, $phone,$age, $address)
    {
        $this->name=$name;
        $this->age=$age;
        $this->phone=$phone;
        $this->address=$address;
    }

    public function generateTable()
    {
       $html="";
       $html.="<table border='2'>";
       $html.="<tr><td style='background-color: orange'>Name</td><td>$this->name</td> </tr>";
       $html.="<tr><td style='background-color: orange'>Phone number</td><td>$this->phone</td> </tr>";
       $html.="<tr><td style='background-color: orange'>Age</td><td>$this->age</td> </tr>";
       $html.="<tr><td style='background-color: orange'>Address</td><td>$this->address</td> </tr>";

       $html.="</table>";
           return $html;
    }
}

if (isset($_GET['name']) and isset($_GET['phone']) and isset($_GET['age']) and isset($_GET['address'])) {
    $name=$_GET['name'];
    $phone=$_GET['phone'];
    $age=$_GET['age'];
    $address=$_GET['address'];
    $person=new Person($name,$phone,$age,$address);
    echo $person->generateTable();
}
?>

<form>
    Name:<input type="text" name="name"><br>
    Phone:<input type="text" name="phone"><br>
    Age:<input type="text" name="age"><br>
    Address:<input type="text" name="address"><br>
    <input type="submit" name="Generate"><br>
</form>
