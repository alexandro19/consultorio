<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class ConvenioController extends Action
{
  public function CadastroConvenio(){
    $this->render('convenios');
  }

  public function LocalizarConvenio(){
    $localizar = isset($_POST['localizar']) ? $_POST['localizar'] : '' ;
    $Convenio = Container::getModel('Convenio');

    $Convenio->__set('descricao', $localizar);
    $Convenios = $Convenio->localizar();
    $this->view->listaConvenios = $Convenios;
    $this->render('Convenios');    
  }

  public function DadosConvenio(){
    $Convenios = Container::getModel('Convenio');
    
    if (isset($_GET['id']) and $_GET['id'] > 0) {
      $Convenios->__set('id', $_GET['id']);
      $this->view->dadosConvenio = $Convenios->localizarID();
      $this->view->operacao = '/AlterarConvenio';  
    }
    else{
      $this->view->operacao = '/inserirConvenio';
    }

    $this->render('dadosConvenio');
  }

  public function inserirConvenio(){
    
    $Convenio = Container::getModel('Convenio');
    
    $Convenio->__set('id', $_POST['id']);
    $Convenio->__set('descricao', $_POST['descricao']);
    $Convenio->__set('status', $_POST['status']);
    
    $Convenio->salvar();

    header('Location: /MensagemInserido');

  }

  public function AlterarConvenio(){
    
    $Convenio = Container::getModel('Convenio');
    
    $Convenio->__set('id'          , $_POST['id']);
    $Convenio->__set('descricao'   , $_POST['descricao']);
    $Convenio->__set('status'      , $_POST['status']);
    
    
    $Convenio->alterarConvenio();

    header('Location: /MensagemAlterado');

  }

  public function excluirConvenio(){
    $id = $_GET['id'];
    $Convenio = Container::getModel('Convenio');
    $Convenio->__set('id', $id);
    $Convenio->excluirConvenio();

    header('Location: /MensagemExcluido');
  }
}

?>