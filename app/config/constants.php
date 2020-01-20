<?php
//projekti nimi
define('PROJECT_NAME','pvk');
//url juur, et tekiks 6iged veebiaadressid kasutajale n@htavalt veebis?
define('URLROOT', 'http://'.$_SERVER['HTTP_HOST'].'/'.PROJECT_NAME);
//rakenduse juurkataloog
//dirname kysib mis kaustas...
//defineerime konstandi
define('APPROOT', dirname(dirname(__FILE__)));