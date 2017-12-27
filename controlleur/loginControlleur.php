<?php

    class LoginControlleur{
        
        public function login(array $user): ?string{ // typage -> array indique le type de variable qu'on attend en paramètre, : string indique que la fonction doit attendre un string en retour (fonctionnel sous php 7), sinon php affichera un fatal error. : ?string indiquerait que la fonction attend un string ou NULL. Par défaut une fonction est de type public

            if(!isset($user["email"]) || !isset($user["password"])) // si les variables existent...
                return "view/no-connect/login.php";        
            if(empty(trim($user["email"])) || empty(trim($user["password"]))) // trim supprime tous les espaces avant le 1er "vrai" caractère. Si les variables ne sont pas vides...
                return "view/no-connect/login.php";   
            $email = htmlspecialchars(trim($user["email"])); //htmlspecialchars réencode la string en annulant le code eventuel, on créé la variable en modifiant les balises html
            $password = strip_tags(trim($user["password"])); // le strip tags supprime les balises html php, on créé la variable

            if($this->validateEmail($email)) // vérification de l'email avec la fonction de la classe
                return "view/no-connect/login.php";

            if($email == "toto@toto.toto" && $password = "toto"){ // création d'une connexion valide
                $_SESSION["user"] = $user;
                return "view/connect/index.php";
            } else
                return "view/no-connect/login.php"; // une seule instruction, accolades pas obligatoires
        }

        public function validateEmail(string $email): bool{

            return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false; // filter_var() permet de filtrer des variables. Forme ternaire au lieu de "if"

        }

    }