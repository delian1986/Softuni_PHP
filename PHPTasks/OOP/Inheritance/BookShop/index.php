<?php

namespace BookShop;
require "Book.php";
require "GoldenEditionBook.php";

$name = readline();
$title = readline();
$price = readline();
$type = readline();
$err = false;

switch ($type) {
    case "STANDARD":
        try {
            $book = new Book($name, $title, $price, $type);
        } catch (\Exception $e) {
            $err = true;
            echo $e->getMessage();
        }
        break;
    case "GOLD":
        try {
            $book = new GoldenEditionBook($name, $title, $price, $type);
        } catch (\Exception $e) {
            $err = true;
            echo $e->getMessage();
        }
        break;
    default:
        $err = true;
        echo "Type is not valid!\n";
}

if (!$err) {
    echo $book;
}

