<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class PlanosController extends Action
{
  public function CadastroPlanos(){
    $this->render('planos');
  }

  public function LocalizarPlanos(){
    $localizar = isset($_POST['localizar']) ? $_POST['localizar'] : '' ;
    $plano = Container::getModel('Plano');

    $plano->__set('descricao', $localizar);
    $planos = $plano->localizar();
    $this->view->listaPlanos = $planos;
    $this->render('planos');    
  }

  public function DadosPlanos(){
    $planos = Container::getModel('Plano');
    
    if (isset($_GET['id']) and $_GET['id'] > 0) {
      $planos->__set('id', $_GET['id']);
      $this->view->dadosPlano = $planos->localizarID();
      $this->view->operacao = '/AlterarPlanos';  
    }
    else{
      $this->view->operacao = '/inserirPlanos';
    }

    $this->render('dadosPlano');
  }

  public function inserirPlanos(){
    
    $plano = Container::getModel('Plano');
    
    $plano->__set('id', $_POST['id']);
    $plano->__set('descricao', $_POST['descricao']);
    $plano->__set('status', $_POST['status']);
    
    $plano->salvar();

    header('Location: /MensagemInserido');

  }

  public function AlterarPlanos(){
    
    $plano = Container::getModel('plano');
    
    $plano->__set('id'          , $_POST['id']);
    $plano->__set('descricao'   , $_POST['descricao']);
    $plano->__set('status'      , $_POST['status']);
    
    
    $plano->alterarPlano();

    header('Location: /MensagemAlterado');

  }

  public function excluirPlanos(){
    $id = $_GET['id'];
    $plano = Container::getModel('plano');
    $plano->__set('id', $id);
    $plano->excluirPlano();

    header('Location: /MensagemExcluido');
  }
}

?>