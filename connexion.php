<?php

define("SERVEUR", "db.3wa.io");
define("USER", "lucasallard");
define("MDP", "25f57d89c63d66d4c5f1cbb5771b9683");
define("BDDNAME", "lucasallard_blog_live73");

try {
    $connexion = new PDO("mysql:host=" . SERVEUR . ";dbname=".BDDNAME,USER,MDP);
    $connexion -> exec("SET CHARACTER SET utf8");
}
catch(Exception $message) {
    echo "erreur au chargement de la BDD :" . $message -> getMessage();
}
