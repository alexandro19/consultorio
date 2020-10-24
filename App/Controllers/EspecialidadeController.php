<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class EspecialidadeController extends Action
{
  public function CadastroEspecialidade(){
    $this->render('especialidades');
  }

  public function LocalizarEspecialidade(){
    $localizar = isset($_POST['localizar']) ? $_POST['localizar'] : '' ;
    $Especialidade = Container::getModel('Especialidade');

    $Especialidade->__set('descricao', $localizar);
    $Especialidades = $Especialidade->localizar();
    $this->view->listaEspecialidades = $Especialidades;
    $this->render('Especialidades');    
  }

  public function DadosEspecialidade(){
    $Especialidades = Container::getModel('Especialidade');
    
    if (isset($_GET['id']) and $_GET['id'] > 0) {
      $Especialidades->__set('id', $_GET['id']);
      $this->view->dadosEspecialidade = $Especialidades->localizarID();
      $this->view->operacao = '/AlterarEspecialidade';  
    }
    else{
      $this->view->operacao = '/inserirEspecialidade';
    }

    $this->render('dadosEspecialidade');
  }

  public function inserirEspecialidade(){
    
    $Especialidade = Container::getModel('Especialidade');
    
    $Especialidade->__set('id', $_POST['id']);
    $Especialidade->__set('descricao', $_POST['descricao']);
    $Especialidade->__set('status', $_POST['status']);
    
    $Especialidade->salvar();

    header('Location: /MensagemInserido');

  }

  public function AlterarEspecialidade(){
    
    $Especialidade = Container::getModel('Especialidade');
    
    $Especialidade->__set('id'          , $_POST['id']);
    $Especialidade->__set('descricao'   , $_POST['descricao']);
    $Especialidade->__set('status'      , $_POST['status']);
    
    
    $Especialidade->alterarEspecialidade();

    header('Location: /MensagemAlterado');

  }

  public function excluirEspecialidade(){
    $id = $_GET['id'];
    $Especialidade = Container::getModel('Especialidade');
    $Especialidade->__set('id', $id);
    $Especialidade->excluirEspecialidade();

    header('Location: /MensagemExcluido');
  }
}

?>