<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class MatMedController extends Action
{
  public function CadastroMatMed(){
    $this->render('matMed');
  }

  public function LocalizarMatMed(){
    $localizar = isset($_POST['localizar']) ? $_POST['localizar'] : '' ;
    $MatMed = Container::getModel('MatMed');

    $MatMed->__set('descricao', $localizar);
    $MatMeds = $MatMed->localizar();
    $this->view->listaMatMeds = $MatMeds;
    $this->render('matMed');    
  }

  public function DadosMatMed(){
    $MatMeds = Container::getModel('MatMed');
    
    if (isset($_GET['id']) and $_GET['id'] > 0) {
      $MatMeds->__set('id', $_GET['id']);
      $this->view->dadosMatMed = $MatMeds->localizarID();
      $this->view->operacao = '/AlterarMatMed';  
    }
    else{
      $this->view->operacao = '/inserirMatMed';
    }

    $this->render('dadosMatMed');
  }

  public function inserirMatMed(){
    
    $MatMed = Container::getModel('MatMed');
    
    $MatMed->__set('id', $_POST['id']);
    $MatMed->__set('descricao', $_POST['descricao']);
    $MatMed->__set('status', $_POST['status']);
    
    $MatMed->salvar();

    header('Location: /MensagemInserido');

  }

  public function AlterarMatMed(){
    
    $MatMed = Container::getModel('MatMed');
    
    $MatMed->__set('id'          , $_POST['id']);
    $MatMed->__set('descricao'   , $_POST['descricao']);
    $MatMed->__set('status'      , $_POST['status']);
    
    
    $MatMed->alterarMatMed();

    header('Location: /MensagemAlterado');

  }

  public function excluirMatMed(){
    $id = $_GET['id'];
    $MatMed = Container::getModel('MatMed');
    $MatMed->__set('id', $id);
    $MatMed->excluirMatMed();

    header('Location: /MensagemExcluido');
  }
}

?>