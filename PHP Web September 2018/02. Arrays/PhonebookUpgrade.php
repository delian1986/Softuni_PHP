<?php
$phonebook = [];

while (1) {
    $line = readline();
    if ($line == "END") {
        break;
    }
    $args = explode(" ", $line);

    switch ($args[0]) {
        case "A":
            $phonebook = addContact($args, $phonebook);
            break;
        case "S":
            searchContact($args, $phonebook);
            break;
        case "ListAll":
            printContacts($phonebook);
            break;
    }
}

function printContacts($contacts){
    ksort($contacts);
    foreach ($contacts as $name => $number) {
        echo "$name -> $number".PHP_EOL;
    }
}

function addContact($args, $phonebook): array
{
    $name = $args[1];
    $phone = $args[2];
    $phonebook[$name] = $phone;
    return $phonebook;
}

function searchContact($args, $phonebook)
{
    $name=$args[1];

    if (isset($phonebook[$name])){
        echo "$name -> $phonebook[$name]".PHP_EOL;
    }else{
        echo "Contact $name does not exist.".PHP_EOL;
    }
}


