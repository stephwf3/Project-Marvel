<?php

    class Controlleur{

        protected static function validateEmail(string $email): bool{

            return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false; // filter_var() permet de filtrer des variables. Forme ternaire au lieu de "if"

        }



    }



?>