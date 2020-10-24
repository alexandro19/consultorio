<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class ClinicaController extends Action
{
  public function CadastroClinica(){
    $this->render('clinicas');
  }

  public function LocalizarClinica(){
    $localizar = isset($_POST['localizar']) ? $_POST['localizar'] : '' ;
    $Clinica = Container::getModel('Clinica');

    $Clinica->__set('descricao', $localizar);
    $Clinicas = $Clinica->localizar();
    $this->view->listaClinicas = $Clinicas;
    $this->render('Clinicas');    
  }

  public function DadosClinica(){
    $Clinicas = Container::getModel('Clinica');
    
    if (isset($_GET['id']) and $_GET['id'] > 0) {
      $Clinicas->__set('id', $_GET['id']);
      $this->view->dadosClinica = $Clinicas->localizarID();
      $this->view->operacao = '/AlterarClinica';  
    }
    else{
      $this->view->operacao = '/inserirClinica';
    }

    $this->render('dadosClinica');
  }

  public function inserirClinica(){
    
    $Clinica = Container::getModel('Clinica');
    
    $Clinica->__set('id', $_POST['id']);
    $Clinica->__set('descricao', $_POST['descricao']);
    $Clinica->__set('status', $_POST['status']);
    
    $Clinica->salvar();

    header('Location: /MensagemInserido');

  }

  public function AlterarClinica(){
    
    $Clinica = Container::getModel('Clinica');
    
    $Clinica->__set('id'          , $_POST['id']);
    $Clinica->__set('descricao'   , $_POST['descricao']);
    $Clinica->__set('status'      , $_POST['status']);
    
    
    $Clinica->alterarClinica();

    header('Location: /MensagemAlterado');

  }

  public function excluirClinica(){
    $id = $_GET['id'];
    $Clinica = Container::getModel('Clinica');
    $Clinica->__set('id', $id);
    $Clinica->excluirClinica();

    header('Location: /MensagemExcluido');
  }
}

?>