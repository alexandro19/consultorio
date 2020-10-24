<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

  public function index() {

    $this->view->login = isset($_GET['login']) ? $_GET['login'] : ''; 
    $this->render('index');
  }

  public function home() {
    session_start();
    if (isset($_SESSION['id']) and ($_SESSION['id'] <> '') ) 
      $this->render('home');  
    else
      header('Location: /?login=erro');
  }

  public function logar(){
    $usuario = Container::getModel('Usuario');
    $usuario->__set('nome', $_POST['nome']); 
  }

}


?>