<?php
include_once 'model/zapato.php';

class Control{
    public $MODEL;

    public function __construct(){
        $this->MODEL = new Zapato();
    }
    public function index(){
       include_once 'view/home.php';

    }

    public function nuevo(){
        $alm = new Zapato();
        if(isset($_REQUEST['id'])){
            $alm = $this->MODEL->cargarID($_REQUEST['id']);
        }
       

        include_once 'view/save.php';
    }

        public function guardar(){
        $alm = new Zapato();
        $alm->id_zapato = $_POST['txtID'];
        $alm->precio = $_POST['txtprecio'];
        $alm->color = $_POST['txtcolor'];
        $alm->id_estilo = $_POST['cmbEstilo'];
        $alm->id_talla = $_POST['cmbTalla'];
        $alm->id_genero = $_POST['cmbGenero'];
        $alm->cantidad = $_POST['txtcantidad'];
        $alm->id_zapato > 0
            ? $this->MODEL->actualizar($alm):
            $this->MODEL->registrar($alm);
        header('Location: index.php');
        
            
        
       
        

           
       
    }

    public function eliminar(){
        $this->MODEL->eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

    public function editar(){
        $alm = new Zapato();
        if(isset($_REQUEST['id'])){
            $alm = $this->MODEL->listar($_REQUEST['id']);
        }
        include_once 'view/editar.php';
    }

    public function volver(){
        header('Location: index.php');
    }




}

?>
