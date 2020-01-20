<?php
//see bootstrap on meie konfiguratsioonifail, abifail
//laadime vajalikud raamatukogud (libraries)
//spl a r (), selle asemel et yhekaupa, v6tame kohe kasutusele k6ik libraries?
spl_autoload_register(function ($className) {
    require_once 'libraries/'.$className.'.php';
});
//require_once 'libraries/Core.php';
//require_once 'libraries/Controller.php';
// model ja view meetodid saavad sellega k@ttesaadavaks
