<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class PacienteController extends Action
{
  public function CadastroPaciente(){
    $this->render('pacientes');
  }

  public function LocalizarPaciente(){
    $localizar = isset($_POST['localizar']) ? $_POST['localizar'] : '' ;
    $Paciente = Container::getModel('Paciente');

    $Paciente->__set('nome', $localizar);
    $Pacientes = $Paciente->localizar();
    $this->view->listaPacientes = $Pacientes;
    $this->render('pacientes');    
  }

  public function DadosPaciente(){
    $Pacientes = Container::getModel('Paciente');
    $convenios = Container::getModel('Convenio');
    $planos    = Container::getModel('Plano');

    $this->view->convenios = $convenios->listaConvenio();
    $this->view->planos    = $planos->listaPlano();

    if (isset($_GET['id']) and $_GET['id'] > 0) {
      $Pacientes->__set('id', $_GET['id']);
      $this->view->dadosPaciente = $Pacientes->localizarID();
      $this->view->operacao = '/AlterarPaciente';  
    }
    else{
      $this->view->operacao = '/inserirPaciente';
    }

    $this->render('dadosPaciente');
  }

  public function inserirPaciente(){
    
    $Paciente = Container::getModel('Paciente');
    
    $Paciente->__set('nome'               , $_POST['nome']);
    $Paciente->__set('cpf'                , $_POST['cpf']);
    $Paciente->__set('rg'                 , $_POST['rg']);
    $Paciente->__set('endereco'           , $_POST['endereco']);
    $Paciente->__set('numero'             , $_POST['numero']);
    $Paciente->__set('complemento'        , $_POST['complemento']);
    $Paciente->__set('cep'                , $_POST['cep']);
    $Paciente->__set('bairro'             , $_POST['bairro']);
    $Paciente->__set('cidade'             , $_POST['cidade']);
    $Paciente->__set('uf'                 , $_POST['uf']);
    $Paciente->__set('cns'                , $_POST['cns']);
    $Paciente->__set('numero_carteirinha' , $_POST['numero_carteirinha']);
    $Paciente->__set('telefone'           , $_POST['telefone']);
    $Paciente->__set('celular'            , $_POST['celular']);
    $Paciente->__set('whatszapp'          , $_POST['whatszapp']);
    $Paciente->__set('email'              , $_POST['email']);
    $Paciente->__set('status'             , $_POST['status']);
    $Paciente->__set('data_cadastro'      , $_POST['data_cadastro']);
    $Paciente->__set('data_nascimento'    , $_POST['data_nascimento']);
    $Paciente->__set('data_obito'         , $_POST['data_obito']);
    $Paciente->__set('id_converio'        , $_POST['id_converio']);
    $Paciente->__set('id_plano'           , $_POST['id_plano']);
    $Paciente->__set('nome_mae'           , $_POST['nome_mae']);
    $Paciente->__set('nome_pai'           , $_POST['nome_pai']);
    $Paciente->__set('profissao'          , $_POST['profissao']);
    $Paciente->__set('profissao_pai'      , $_POST['profissao_pai']);
    $Paciente->__set('profissao_mae'      , $_POST['profissao_mae']);
    $Paciente->__set('estado_civil'       , $_POST['estado_civil']);
    $Paciente->__set('naturalidade'       , $_POST['naturalidade']);
    $Paciente->__set('sexo'               , $_POST['sexo']);
    $Paciente->__set('cor'                , $_POST['cor']);
    
    $Paciente->salvar();

    header('Location: /MensagemInserido');

  }

  public function AlterarPaciente(){
    
    $Paciente = Container::getModel('Paciente');
    
    $Paciente->__set('id'                 , $_POST['id']);
    $Paciente->__set('nome'               , $_POST['nome']);
    $Paciente->__set('cpf'                , $_POST['cpf']);
    $Paciente->__set('rg'                 , $_POST['rg']);
    $Paciente->__set('endereco'           , $_POST['endereco']);
    $Paciente->__set('numero'             , $_POST['numero']);
    $Paciente->__set('complemento'        , $_POST['complemento']);
    $Paciente->__set('cep'                , $_POST['cep']);
    $Paciente->__set('bairro'             , $_POST['bairro']);
    $Paciente->__set('cidade'             , $_POST['cidade']);
    $Paciente->__set('uf'                 , $_POST['uf']);
    $Paciente->__set('cns'                , $_POST['cns']);
    $Paciente->__set('numero_carteirinha' , $_POST['numero_carteirinha']);
    $Paciente->__set('telefone'           , $_POST['telefone']);
    $Paciente->__set('celular'            , $_POST['celular']);
    $Paciente->__set('whatsapp'           , $_POST['whatsapp']);
    $Paciente->__set('email'              , $_POST['email']);
    $Paciente->__set('status'             , $_POST['status']);
    $Paciente->__set('data_nascimento'    , $_POST['data_nascimento']);
    $Paciente->__set('id_convenio'        , $_POST['id_convenio']);
    $Paciente->__set('id_plano'           , $_POST['id_plano']);
    $Paciente->__set('nome_mae'           , $_POST['nome_mae']);
    $Paciente->__set('nome_pai'           , $_POST['nome_pai']);
    $Paciente->__set('profissao'          , $_POST['profissao']);
    $Paciente->__set('profissao_pai'      , $_POST['profissao_pai']);
    $Paciente->__set('profissao_mae'      , $_POST['profissao_mae']);
    $Paciente->__set('estado_civil'       , $_POST['estado_civil']);
    $Paciente->__set('naturalidade'       , $_POST['naturalidade']);
    $Paciente->__set('sexo'               , $_POST['sexo']);
    $Paciente->__set('cor'                , $_POST['cor']);
        
    $Paciente->alterarPaciente();

    header('Location: /MensagemAlterado');

  }

  public function excluirPaciente(){
    $id = $_GET['id'];
    $Paciente = Container::getModel('Paciente');
    $Paciente->__set('id', $id);
    $Paciente->excluirPaciente();

    header('Location: /MensagemExcluido');
  }
}

?>