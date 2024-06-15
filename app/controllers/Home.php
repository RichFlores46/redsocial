<?php

class Home extends Controller{
  private $usuario; 

    public function __construct(){ 
       $this->usuario = $this->model('usuario');
    }

    public function index() {
      if(isset($_SESSION['logueado'])){
        $this->view('pages/home');
      }else{
        redirection('home/login');
      }
    }

    public function login() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
          $datosLogin = [
            'usuario' => trim($_POST['usuario']),
            'contrasena' => trim($_POST['contrasena'])
          ];

          $datosUsuario = $this->usuario->getUsuario($datosLogin['usuario']);
          var_dump($datosUsuario);

          if($this->usuario->verificarContrasena($datosUsuario, $datosLogin['contrasena'])){
            $_SESSION['logueado'] = $datosUsuario->idPrivilegio;
            redirection('home');
          }else{
            $_SESSION['errorLogin'] = 'El usuario o la contraseña son incorrectillas';
            redirection('home');
          }

      }else{
        if(isset($_SESSION['logueado'])){
          redirection('home');
        }else{
          $this->view('pages/login');
        }
      }
    }

    public function register(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $datosRegistro= [
          'privilegio' => '2', 
          'email' => trim($_POST['email']),
          'usuario' => trim($_POST['usuario']),
          'contrasena' => password_hash(trim($_POST['contrasena']), PASSWORD_DEFAULT)
        ];

        if($this->usuario->verificarUsuario($datosRegistro)){
            if ($this->usuario->register($datosRegistro)){
              $_SESSION['loginComplete'] = 'Ya quedo maistro, nomás no sea gacho y llene el registro con los mismos datos porfa';
              redirection('home');
            }else{}
        }else{
          $_SESSION['usuarioError'] = 'El usuario no esta disponible, se fue a mimir JAJAJA';
          $this->view('pages/register');
        }


      }else{
        if(isset($_SESSION['logueado'])){
          redirection('home');
        }else{
          $this->view('pages/register');
        }
      }
    }

    public function logout(){
      session_start();
      $_SESSION = [];
      session_destroy();
      redirection('home/login');
    }
}