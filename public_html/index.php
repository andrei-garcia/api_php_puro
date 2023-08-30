<?php
    require   "../vendor/autoload.php";

   // use Api\Controlers\CampanhaControler;

    $c = new Api\Controlers\CampanhaControler();
    var_dump($c->get());