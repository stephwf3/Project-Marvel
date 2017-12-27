<?php
// phpinfo();
// phpversion();

    require "config.php";

    $view = "view/no-connect/login.php";

    if($_GET){
        if(isset($_GET['page'])) // on devrait aussi vérifier que get n'est pas vide mais on zappe cette partie
            foreach(PAGE_SITE as $key => $val){ // on parcourt l'array qui recense toutes nos pages
                if($key == $_GET["page"]){ // si la page demandée est dans l'array
                    $view = $val; // on donne à $view l'url de la page
                    break; // pour arrêter la boucle quand on a trouvé la correspondance au lieu de la laisser tourner pour rien
                }
            } 
        }

    if($_POST){
        require "controlleur/loginControlleur.php";
        $controlleurLogin = new LoginControlleur();
        $view = $controlleurLogin->login($_POST);
    }

    require $view;

?>