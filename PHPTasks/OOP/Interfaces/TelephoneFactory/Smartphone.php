<?php


namespace Phone;
require "iBrowse.php";
require "iCall.php";

class Smartphone implements iBrowse, iCall
{

    public function Browse(string $sites)
    {
        $pages = explode(" ", $sites);

        foreach ($pages as $page) {
            if (preg_match('/\\d/', $page) == 0) {
                echo "Browsing: $page!\n";
            }else{
                echo "Invalid URL!\n";
            }
        }
    }

    public function Call(string $numbers)
    {
        $nums = explode(" ", $numbers);
        foreach ($nums as $num) {
            if (ctype_digit($num)) {
                echo "Calling... $num\n";
            } else {
                echo "Invalid number!\n";
            }
        }
    }
}