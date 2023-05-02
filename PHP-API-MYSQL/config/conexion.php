<?php

class Conectar{

    protected $dbh;

    protected function Conexion(){

        try { // Declaramos la variable con los datos de nuestra BD

            $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=php-api", "root" , "");
            return $conectar;

        }catch(Exception $e){ //CATCH Validacion de error

            print "Fallo conexion:" .$e->getMessage()."<br>"; //Validamos print con mensaje y llamamos a la variable $e llamando al mensaje de error asociado con salto de linea "<br>"

            die();

        }

    }

    public function set_name(){

        return $this->dbh->query("SET NAMES 'utf8'");

    }

}

?>