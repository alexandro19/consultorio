<?php 

namespace App\Models;
use MF\Model\Model;

class Usuario extends Model{
  private $id;
  private $nome;
  private $login;
  private $senha;
  private $id_perfil;
  private $id_empresa;
  private $status;
  private $cpf;
  private $rg;
  private $carteira_trabalho;
  private $pis;
  private $cnh;
  private $cep;
  private $endereco;
  private $numero;
  private $complemento;
  private $bairro;
  private $cidade;
  private $uf;
  private $telefone;
  private $celular;
  private $whatsApp;
  private $email;
  private $data_cadastro;
  private $data_admissao;
  private $data_demissao;
  private $id_cargo;
  private $salario;
  
  public function __get($atributo){
    return $this->$atributo;
  }

  public function __set($atributo, $valor){
    $this->$atributo = $valor;
  }

  public function salvar(){

    $query = "INSERT INTO usuarios (nome, login, senha, id_perfil, id_empresa, status, cpf, rg, carteira_trabalho, pis, cnh, cep, endereco, complemento, bairro, cidade, uf, telefone, celular, whatsApp, email, data_cadastro, data_admissao, data_demissao, id_cargo, salario ) 
                   VALUES (:nome, :login, :senha, :id_perfil, :id_empresa, :status, :cpf, :rg, :carteira_trabalho, :pis, :cnh, :cep, :endereco, :complemento, :bairro, :cidade, :uf, :telefone, :celular, :whatsApp, :email, :data_cadastro, :data_admissao, :data_demissao, :id_cargo, :salario)";

    $sql  = $this->db->prepare($query);  
    
    $sql->bindValue(':nome'              , $this->__get('nome')); 
    $sql->bindValue(':login'             , $this->__get('login'));
    $sql->bindValue(':senha'             , $this->__get('senha'));
    $sql->bindValue(':id_perfil'         , $this->__get('id_perfil'));
    $sql->bindValue(':id_empresa'        , 1);
    $sql->bindValue(':status'            , $this->__get('status'));
    $sql->bindValue(':cpf'               , $this->__get('cpf'));
    $sql->bindValue(':rg'                , $this->__get('rg'));
    $sql->bindValue(':carteira_trabalho' , $this->__get('carteira_trabalho'));
    $sql->bindValue(':pis'               , $this->__get('pis'));
    $sql->bindValue(':cnh'               , $this->__get('cnh'));
    $sql->bindValue(':cep'               , $this->__get('cep'));
    $sql->bindValue(':endereco'          , $this->__get('endereco'));
    $sql->bindValue(':complemento'       , $this->__get('complemento'));
    $sql->bindValue(':bairro'            , $this->__get('bairro'));
    $sql->bindValue(':cidade'            , $this->__get('cidade'));
    $sql->bindValue(':uf'                , $this->__get('uf'));
    $sql->bindValue(':telefone'          , $this->__get('telefone'));
    $sql->bindValue(':celular'           , $this->__get('celular'));
    $sql->bindValue(':whatsApp'          , $this->__get('whatsApp'));
    $sql->bindValue(':email'             , $this->__get('email'));
    $sql->bindValue(':data_cadastro'     , date('dd/mm/yyyy'));
    $sql->bindValue(':data_admissao'     , $this->__get('data_admissao'));
    $sql->bindValue(':data_demissao'     , $this->__get('data_demissao'));
    $sql->bindValue(':id_cargo'          , 1);
    $sql->bindValue(':salario'           , $this->__get('salario'));
    
    $sql->execute();
 
    return $this;
  }

  
  public function alterarUsuario(){
    $query = "  UPDATE usuarios 
                   SET nome=:nome,
                       login=:login,
                       senha=:senha,
                       id_perfil=:id_perfil,
                       id_empresa=:id_empresa,
                       status=:status,
                       cpf=:cpf,
                       rg=:rg,
                       carteira_trabalho=:carteira_trabalho,
                       pis=:pis,
                       cnh=:cnh,
                       cep=:cep,
                       endereco=:endereco,
                       numero=:numero,
                       complemento=:complemento,
                       bairro=:bairro,
                       cidade=:cidade,
                       uf=:uf,
                       telefone=:telefone,
                       celular=:celular,
                       whatsApp=:whatsApp,
                       email=:email,
                       data_admissao=:data_admissao,
                       data_demissao=:data_demissao,
                       id_cargo=:id_cargo,
                       salario=:salario 
                 WHERE id = :id ";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id'                , $this->__get('id'));
    $sql->bindValue(':nome'              , $this->__get('nome')); 
    $sql->bindValue(':login'             , $this->__get('login'));
    $sql->bindValue(':senha'             , $this->__get('senha'));
    $sql->bindValue(':id_perfil'         , $this->__get('id_perfil'));
    $sql->bindValue(':id_empresa'        , 1);
    $sql->bindValue(':status'            , $this->__get('status'));
    $sql->bindValue(':cpf'               , $this->__get('cpf'));
    $sql->bindValue(':rg'                , $this->__get('rg'));
    $sql->bindValue(':carteira_trabalho' , $this->__get('carteira_trabalho'));
    $sql->bindValue(':pis'               , $this->__get('pis'));
    $sql->bindValue(':cnh'               , $this->__get('cnh'));
    $sql->bindValue(':cep'               , $this->__get('cep'));
    $sql->bindValue(':endereco'          , $this->__get('endereco'));
    $sql->bindValue(':complemento'       , $this->__get('complemento'));
    $sql->bindValue(':bairro'            , $this->__get('bairro'));
    $sql->bindValue(':cidade'            , $this->__get('cidade'));
    $sql->bindValue(':uf'                , $this->__get('uf'));
    $sql->bindValue(':telefone'          , $this->__get('telefone'));
    $sql->bindValue(':celular'           , $this->__get('celular'));
    $sql->bindValue(':whatsApp'          , $this->__get('whatsApp'));
    $sql->bindValue(':email'             , $this->__get('email'));
    $sql->bindValue(':data_admissao'     , $this->__get('data_admissao'));
    $sql->bindValue(':data_demissao'     , $this->__get('data_demissao'));
    $sql->bindValue(':id_cargo'          , 1);
    $sql->bindValue(':salario'           , $this->__get('salario'));

    $sql->execute();

    return $this;
  }


  public function autenticar(){
    $query = "SELECT id, nome, login, senha 
                FROM usuarios 
               WHERE login = :login
                 AND senha = :senha ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(':login', $this->__get('login'));
    $sql->bindValue(':senha', $this->__get('senha'));
    $sql->execute();

    $usuario = $sql->fetch(\PDO::FETCH_ASSOC);

    if ($usuario['id'] <> '') {
      $this->__set('id'    , $usuario['id']);
      $this->__set('nome'  , $usuario['nome']);
      $this->__set('login' , $usuario['login']);
      $this->__set('senha' , $usuario['senha']);
    }
  }

  public function localizar(){
    $query = "SELECT id, nome, telefone, celular 
                FROM usuarios 
               WHERE nome LIKE ? ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(1, "%". $this->__get('nome') ."%");
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function listaPerfilUsuarios(){
    $query = "SELECT id, descricao
                FROM perfil
               WHERE status = 'A' ";

    $sql = $this->db->prepare($query);
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }


  public function localizarID(){
    $query = "   SELECT *
                   FROM usuarios 
                  WHERE id = :id ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();
 
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function excluirUsuario(){
    $query = "   DELETE 
                   FROM usuarios 
                  WHERE id = :id";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();

    return $this;
  }

}

 ?>