<?php

class Zapato{
    
    public $CNX;
    public $id_zapato;
    public $precio;
    public $color;
    public $id_estilo;
    public $id_talla;
    public $id_genero;
    public $cantidad;
    
    public function __construct(){
        try{
            $this->pdo = Conexion::conectar();
            }catch(Exception $e){
                die($e->getMessage());
            }



    }
    public function listar(){
        try{
            $query = "SELECT z.id_zapato,z.precio,z.color,e.estilo,t.talla,g.genero,z.cantidad FROM dbozapato z INNER JOIN dboestilo e ON z.id_estilo = e.id_estilo INNER JOIN dbotalla t ON z.id_talla = t.id_talla INNER JOIN dbogenero g ON z.id_genero = g.id_genero;";
            $stm = $this->pdo->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function cargarEstilo(){
        try{
            $query =  "SELECT * FROM dboestilo";
            $stm = $this->pdo->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function cargarTalla(){
        try{
            $query =  "SELECT * FROM dbotalla";
            $stm = $this->pdo->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function cargarGenero(){
        try{
            $query =  "SELECT * FROM dbogenero";
            $stm = $this->pdo->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function delete($id){
        try{
            $query="DELETE FROM dbozapato WHERE id_zapato = ?";
            $stm = $this->pdo->prepare($query);
            $stm->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function registrar(Zapato $data){
        try{
            $query = "INSERT INTO dbozapato (precio,color,id_estilo,id_talla,id_genero,cantidad) VALUES (?,?,?,?,?,?)";
            $stm = $this->pdo->prepare($query);
            $stm->execute(array(
                $data->precio,
                $data->color,
                $data->id_estilo,
                $data->id_talla,
                $data->id_genero,
                $data->cantidad
            ));

           
        }catch(Exception $e){
            die($e->getMessage());

        }

    }
    public function eliminar(){
       $this->delete($_REQUEST['id']);
         header('Location: index.php');
    }
    public function cargarID($id){
        try{
            $query="SELECT * FROM dbozapato WHERE id_zapato=?";
            $stm = $this->pdo->prepare($query);
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
       


    }
    public function actualizar($data){
        try{
            $sql = "UPDATE dbozapato SET precio = ?,color = ?,id_estilo = ?,id_talla = ?,id_genero = ?,cantidad = ? WHERE id_zapato = ?";
            $this->pdo->prepare($sql)->execute(array(
                $data->precio,
                $data->color,
                $data->id_estilo,
                $data->id_talla,
                $data->id_genero,
                $data->cantidad,
                $data->id_zapato
            ));
        }catch(Exception $e){
            die($e->getMessage());
        }
      

    }
    

    
    
}
    ?>