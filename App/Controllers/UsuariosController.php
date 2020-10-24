<?php 

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;
session_start();

class UsuariosController extends Action
{
  public function autenticar(){

    $usuario = Container::getModel('Usuario');

    $usuario->__set('login', $_POST['login']);
    $usuario->__set('senha', $_POST['senha']);

    $usuario->autenticar();

    if ($usuario->__get('id') <> '') {
      $_SESSION['id']    = $usuario->__get('id');
      $_SESSION['nome']  = $usuario->__get('nome');
      $_SESSION['login'] = $usuario->__get('login');

      header('Location: /home');
    }
    else{
      header('Location: /?login=erro');
    }
  } 

  public function CadastroFuncionario(){
    $this->render('funcionarios');
  }

  public function LocalizarFuncionario(){
    $localizar = isset($_POST['localizar']) ? $_POST['localizar'] : '' ;
    $usuario = Container::getModel('Usuario');

    $usuario->__set('nome', $localizar);
    $usuarios = $usuario->localizar();
    $this->view->listaUsuarios = $usuarios;
    $this->render('funcionarios');    
  }

  public function DadosFuncionario(){
    $usuarios = Container::getModel('Usuario');
    $this->view->usuarios = $usuarios->listaPerfilUsuarios();
    
    if (isset($_GET['id']) and $_GET['id'] > 0) {
      $usuarios->__set('id', $_GET['id']);
      $this->view->dadosFuncionario = $usuarios->localizarID();
      $this->view->operacao = '/AlterarFuncionario';  
    }
    else{
      $this->view->operacao = '/inserirFuncionario';
    }

    $this->render('dadosFuncionario');
  }

  public function inserirFuncionario(){
    
    $usuario = Container::getModel('Usuario');
    
    $usuario->__set('nome', $_POST['nome']);
    $usuario->__set('login', $_POST['login']);
    $usuario->__set('senha', $_POST['senha']);
    $usuario->__set('id_perfil', $_POST['perfil']);
    $usuario->__set('status', $_POST['status']);
    $usuario->__set('cpf', $_POST['cpf']);
    $usuario->__set('rg', $_POST['rg']);
    $usuario->__set('carteira_trabalho', $_POST['carteira_trabalho']);
    $usuario->__set('pis', $_POST['pis']);
    $usuario->__set('cnh', $_POST['cnh']);
    $usuario->__set('cep', $_POST['cep']);
    $usuario->__set('endereco', $_POST['endereco']);
    $usuario->__set('complemento', $_POST['complemento']);
    $usuario->__set('cidade', $_POST['cidade']);
    $usuario->__set('uf', $_POST['uf']);
    $usuario->__set('telefone', $_POST['telefone']);
    $usuario->__set('celular', $_POST['celular']);
    $usuario->__set('whatsApp', $_POST['whats']);
    $usuario->__set('email', 'teste@hotmail.com');
    $usuario->__set('data_admissao', $_POST['dataAdmissao']);
    $usuario->__set('data_demissao', $_POST['dataDemissao']);
    $usuario->__set('salario', $_POST['salario']);

    $usuario->salvar();

    header('Location: /MensagemInserido');

  }

  public function AlterarFuncionario(){
    
    $usuario = Container::getModel('Usuario');
    
    $usuario->__set('id', $_POST['id']);
    $usuario->__set('nome', $_POST['nome']);
    $usuario->__set('login', $_POST['login']);
    $usuario->__set('senha', $_POST['senha']);
    $usuario->__set('id_perfil', $_POST['perfil']);
    $usuario->__set('status', $_POST['status']);
    $usuario->__set('cpf', $_POST['cpf']);
    $usuario->__set('rg', $_POST['rg']);
    $usuario->__set('carteira_trabalho', $_POST['carteira_trabalho']);
    $usuario->__set('pis', $_POST['pis']);
    $usuario->__set('cnh', $_POST['cnh']);
    $usuario->__set('cep', $_POST['cep']);
    $usuario->__set('endereco', $_POST['endereco']);
    $usuario->__set('complemento', $_POST['complemento']);
    $usuario->__set('cidade', $_POST['cidade']);
    $usuario->__set('uf', $_POST['uf']);
    $usuario->__set('telefone', $_POST['telefone']);
    $usuario->__set('celular', $_POST['celular']);
    $usuario->__set('whatsApp', $_POST['whats']);
    $usuario->__set('email', 'teste@hotmail.com');
    $usuario->__set('data_admissao', $_POST['dataAdmissao']);
    $usuario->__set('data_demissao', $_POST['dataDemissao']);
    $usuario->__set('salario', $_POST['salario']);
    
    $usuario->alterarUsuario();

    header('Location: /MensagemAlterado');

  }

  public function excluirFuncionario(){
    $id = $_GET['id'];
    $usuario = Container::getModel('Usuario');
    $usuario->__set('id', $id);
    $usuario->excluirUsuario();

    header('Location: /MensagemExcluido');
  }
}

?>