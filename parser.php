#!php
<?php

include 'vendor/autoload.php';

use Parser\Terminal;

echo "\033[36mWelcome to PHP Parser.\033[0m \n";

$terminal = new Terminal();
$terminal->input();
