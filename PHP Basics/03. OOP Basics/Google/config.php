<?php
namespace Google;

foreach (glob("classes/*.php") as $file){
    include_once $file;
}

