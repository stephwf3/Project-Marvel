<?php

class Model{

    private $database;  // nous permet d'assigner une database avec un setter
    private $pdo; // variable qui va nous permettre d'utiliser les méthodes PDO
    private $table; // comme la database, permet de stocker les tables

    function __construct(){
        $pdo = new PDO("mysql:dbname=".BDDDATABASE.";host=".BDDHOST, BDDUSER, BDDPASS);
        $this->database = BDDDATABASE;
        $this->pdo = $pdo;
    }

    public function create(array $champs, array $valeur){

        $sql = "INSERT INTO `$this->table`(".implode(',', $champs).") VALUES ( ' ".implode("','", $valeur)." ' )";
        // echo $sql;
        $this->pdo->exec($sql);
        
    }

    public function read($champs, $where ){
        
        $sql = "SELECT ".implode(',', $champs)." FROM `$this->table` WHERE ".$this->arrayToString( $where );
        // echo $sql;
        $request = $this->pdo->prepare($sql);
        $request->execute();
        $data = $request->fetchAll();
        var_dump($data);
    }

    public function update(){
        
    }

    public function delete($where){
       
        $sql = "DELETE FROM `$this->table` WHERE ".$this->arrayToString( $where );
        $this->pdo->exec($sql);

        // echo $sql;

    }

    private function arrayToString( $array ){

        if( !is_array($array) ) // Verification variable is array
            return false;

        $stringRetour = "";

        foreach($array as $key => $val){ // Array("name" => "Toto")
            $stringRetour .= $key." = '".$val."' AND "; //$stringRetour = (name = 'Toto' AND )
        }

        $stringRetour = substr($stringRetour, 0, -4); // Suppression des 4 dernier parametre

        return $stringRetour;

    }


    /***********************  GETTER / SEETER ************************/

    public function setTable($table){
        $this->table = $table;
    }

    public function getTable(){
        return $this->table;
    }

}
