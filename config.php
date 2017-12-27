<?php

    define("HOSTURL", "http://localhost/phpoo/MVC/"); // on peut aussi faire const HOSTURL = "http....", c'est pareil.
    define("HOSTURLASSET", HOSTURL."asset/");

    define("BDDHOST", "localhost");
    define("BDDUSER", "root");
    define("BDDPASS", "");
    define("BDDDATABASE", "marveldb");

    const PAGE_SITE = array(
        "login" => "view/no-connect/login.php",
        "register" => "view/no-connect/register.php",
        "index" => "view/connect/index.php"
    );

    