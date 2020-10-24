<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class PrestadorController extends Action
{
  public function CadastroPrestador(){
    $this->render('prestadores');
  }

  public function LocalizarPrestador(){
    $localizar = isset($_POST['localizar']) ? $_POST['localizar'] : '' ;
    $Prestador = Container::getModel('Prestador');

    $Prestador->__set('nome', $localizar);
    $Prestadores = $Prestador->localizar();
    $this->view->listaPrestadores = $Prestadores;
    $this->render('prestadores');    
  }

  public function DadosPrestador(){
    $Prestadores     = Container::getModel('Prestador');
    $convenios       = Container::getModel('Convenio');
    $planos          = Container::getModel('Plano');
    $especialidades  = Container::getModel('Especialidade');
    $clinicas        = Container::getModel('Clinica');

    $this->view->convenios       = $convenios->listaConvenio();
    $this->view->planos          = $planos->listaPlano();
    $this->view->especialidades  = $especialidades->listaEspecialidade();
    $this->view->clinicas        = $clinicas->listaClinica();

    if (isset($_GET['id']) and $_GET['id'] > 0) {
      $Prestadores->__set('id', $_GET['id']);
      $this->view->dadosPrestador = $Prestadores->localizarID();
      $this->view->operacao = '/AlterarPrestador';  
    }
    else{
      $this->view->operacao = '/inserirPrestador';
    }

    $this->render('dadosPrestador');
  }

  public function inserirPrestador(){
    
    $Prestador = Container::getModel('Prestador');

    $Prestador->__set('nome'               , $_POST['nome']);
    $Prestador->__set('razao_social'       , $_POST['razao_social']);
    $Prestador->__set('tipo'               , $_POST['tipo']);
    $Prestador->__set('status'             , $_POST['status']);
    $Prestador->__set('cpf'                , $_POST['cpf']);
    $Prestador->__set('cnpj'               , $_POST['cnpj']); 
    $Prestador->__set('rg'                 , $_POST['rg']);
    $Prestador->__set('insc_estadual'      , $_POST['insc_estadual']);
    $Prestador->__set('telefone'           , $_POST['telefone']);
    $Prestador->__set('celular'            , $_POST['celular']);
    $Prestador->__set('id_convenio'        , $_POST['id_convenio']);
    $Prestador->__set('id_especialidade'   , $_POST['id_especialidade']);
    $Prestador->__set('id_clinica'         , $_POST['id_clinica']);
    $Prestador->__set('id_plano'           , $_POST['id_plano']);
    $Prestador->__set('cep'                , $_POST['cep']);
    $Prestador->__set('endereco'           , $_POST['endereco']);
    $Prestador->__set('numero'             , $_POST['numero']);
    $Prestador->__set('complemento'        , $_POST['complemento']);
    $Prestador->__set('cidade'             , $_POST['cidade']);
    $Prestador->__set('bairro'             , $_POST['bairro']);
    $Prestador->__set('estado'             , $_POST['uf']);
    $Prestador->__set('email'              , $_POST['email']);
    $Prestador->__set('crm'                , $_POST['crm']);
    
    $Prestador->salvar();
    
    header('Location: /MensagemInserido');

  }

  public function AlterarPrestador(){
    
    $Prestador = Container::getModel('Prestador');
    
    $Prestador->__set('id'                 , $_POST['id']);
    $Prestador->__set('nome'               , $_POST['nome']);
    $Prestador->__set('razao_social'       , $_POST['razao_social']);
    $Prestador->__set('tipo'               , $_POST['tipo']);
    $Prestador->__set('status'             , $_POST['status']);
    $Prestador->__set('cpf'                , $_POST['cpf']);
    $Prestador->__set('cnpj'               , $_POST['cnpj']); 
    $Prestador->__set('rg'                 , $_POST['rg']);
    $Prestador->__set('insc_estadual'      , $_POST['insc_estadual']);
    $Prestador->__set('telefone'           , $_POST['telefone']);
    $Prestador->__set('celular'            , $_POST['celular']);
    $Prestador->__set('id_convenio'        , $_POST['id_convenio']);
    $Prestador->__set('id_especialidade'   , $_POST['id_especialidade']);
    $Prestador->__set('id_clinica'         , $_POST['id_clinica']);
    $Prestador->__set('id_plano'           , $_POST['id_plano']);
    $Prestador->__set('cep'                , $_POST['cep']);
    $Prestador->__set('endereco'           , $_POST['endereco']);
    $Prestador->__set('numero'             , $_POST['numero']);
    $Prestador->__set('complemento'        , $_POST['complemento']);
    $Prestador->__set('cidade'             , $_POST['cidade']);
    $Prestador->__set('bairro'             , $_POST['bairro']);
    $Prestador->__set('estado'             , $_POST['estado']);
    $Prestador->__set('email'              , $_POST['email']);
    $Prestador->__set('crm'                , $_POST['crm']);
        
    $Prestador->alterarPrestador();

    header('Location: /MensagemAlterado');

  }

  public function excluirPrestador(){
    $id = $_GET['id'];
    $Prestador = Container::getModel('Prestador');
    $Prestador->__set('id', $id);
    $Prestador->excluirPrestador();

    header('Location: /MensagemExcluido');
  }
}

?>