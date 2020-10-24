<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class MensagemController extends Action
{

	
	public function inserido(){
	  $this->view->mensagem = 'Registro inserido com sucesso!';
    $this->view->classe   = 'alert alert-success';
    $this->render('mensagens');
	}

	public function alterado(){
	  $this->view->mensagem = 'Registro alterado com sucesso!';
    $this->view->classe   = 'alert alert-success';
    $this->render('mensagens');
	}
  
  public function excluido(){
  	$this->view->mensagem = 'Registro excluido com sucesso!';
    $this->view->classe   = 'alert alert-success';
    $this->render('mensagens');
  }
}

 ?>