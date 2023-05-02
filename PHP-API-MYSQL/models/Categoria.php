<?php

class Categoria extends Conectar{

    public function get_categoria(){ //metodo consulta por estatus ("est")

        $conectar=parent::conexion();

        parent::set_name();
    
        $sql = "SELECT * FROM tm_categoria WHERE est=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
    
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_categoria_x_id($cat_id){ //metodo Consulta por ID

        $conectar=parent::conexion();

        parent::set_name();
    
        $sql = "SELECT * FROM tm_categoria WHERE est=1 AND cat_id=?";

        $sql = $conectar->prepare($sql); //permite ejecutar la misma (o similar) sentencia SQL provocando una mejora en la seguridad y en el rendimiento de la aplicación

        $sql->bindValue(1,$cat_id); //vincula la variable al parámetro y en el momento de hacer el execute es cuando se asigna realmente el valor de la variable a ese parámetro

        $sql->execute(); // ejectutamos la funcion php
    
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert_categoria($cat_nom, $cat_obs){ //metodo INSERT

        $conectar=parent::conexion();

        parent::set_name();
    
        $sql = "INSERT INTO tm_categoria(cat_id, cat_nom, cat_obs, est) VALUES(NULL, ?, ?, '1')";

        $sql = $conectar->prepare($sql); //permite ejecutar la misma (o similar) sentencia SQL provocando una mejora en la seguridad y en el rendimiento de la aplicación

        $sql->bindValue(1,$cat_nom); //vincula la variable al parámetro y en el momento de hacer el execute es cuando se asigna realmente el valor de la variable a ese parámetro

        $sql->bindValue(2,$cat_obs); 

        $sql->execute(); // ejectutamos la funcion php
    
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update_categoria($cat_id, $cat_nom, $cat_obs){ //metodo update, actualizacion de datos

        $conectar=parent::conexion();

        parent::set_name();
    
        $sql = "UPDATE tm_categoria set cat_nom=? , cat_obs=? WHERE cat_id=?";

        $sql = $conectar->prepare($sql); //permite ejecutar la misma (o similar) sentencia SQL provocando una mejora en la seguridad y en el rendimiento de la aplicación

        $sql->bindValue(1,$cat_nom); //vincula la variable al parámetro y en el momento de hacer el execute es cuando se asigna realmente el valor de la variable a ese parámetro

        $sql->bindValue(2,$cat_obs); 

        $sql->bindValue(3,$cat_id); 

        $sql->execute(); // ejectutamos la funcion php
    
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_categoria($cat_id){ //metodo delete, borrado de datos

        $conectar=parent::conexion();

        parent::set_name();
    
        $sql = "UPDATE tm_categoria set est='0' WHERE cat_id=?";

        $sql = $conectar->prepare($sql); //permite ejecutar la misma (o similar) sentencia SQL provocando una mejora en la seguridad y en el rendimiento de la aplicación

        $sql->bindValue(1,$cat_id); //vincula la variable al parámetro y en el momento de hacer el execute es cuando se asigna realmente el valor de la variable a ese parámetro

        $sql->execute(); // ejectutamos la funcion php
    
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    

}
