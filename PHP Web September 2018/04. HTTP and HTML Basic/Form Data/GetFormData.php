<?php


class User
{
    private $name;
    private $age;
    private $gender;

    public function __construct($name, $age, $gender)
    {
        $this->name=$name;
        $this->age=$age;
        $this->gender=$gender;
    }

    public function __toString()
    {
        return "My name is $this->name. I am $this->age years old. I am $this->gender.";
    }
}

if (isset($_GET['name']) and isset($_GET['age']) and isset($_GET['gender'])) {
    $name=$_GET['name'];
    $age=$_GET['age'];
    $gender=$_GET['gender'];
    var_dump($_GET);
    $user=new User($name,$age,$gender);
    echo $user;
}
?>

<form>
    Name:<input type="text" name="name"><br>
    Age:<input type="text" name="age"><br>
    <input type="radio" name="gender" value="male">Male<br>
    <input type="radio" name="gender" value="female">Female<br>
    <input type="submit" name="Generate">
</form>
