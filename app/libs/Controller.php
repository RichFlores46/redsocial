<?php 

class Controller{
    public function model($modelo){

        require_once '../app/models/' . $modelo . '.php';
        return new $modelo;
    }

    public function view($view, $datos = []){
        $rutaVista = '../app/views/' . $view . '.php';
        if (file_exists($rutaVista)) {
            require_once $rutaVista;
    }else{
        echo "la vista ni la has creado nmms: " . $rutaVista;
    }
  }
}