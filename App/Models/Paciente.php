<?php 

namespace App\Models;
use MF\Model\Model;

class Paciente extends Model{
  private $id;
  private $nome;
  private $cpf;
  private $rg;
  private $endereco;
  private $numero;
  private $complemento;
  private $cep;
  private $bairro;
  private $cidade;
  private $uf;
  private $cns;
  private $numero_carteirinha;
  private $telefone;
  private $celular;
  private $whatsapp;
  private $email; 
  private $status;
  private $data_cadastro;
  private $data_nascimento;
  private $data_obito;
  private $id_convenio;
  private $id_plano;
  private $nome_mae;
  private $nome_pai;
  private $profissao;
  private $profissao_pai;
  private $profissao_mae;
  private $estado_civil;
  private $naturalidade;
  private $sexo;
  private $cor;


  public function __get($atributo){
    return $this->$atributo;
  }

  public function __set($atributo, $valor){
    $this->$atributo = $valor;
  }

  public function localizar(){
    $query = "SELECT id, nome, concat(endereco, ' ' , numero) endereco, telefone 
                FROM pacientes 
               WHERE nome LIKE ? ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(1, "%". $this->__get('nome') ."%");
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function localizarID(){
    $query = "   SELECT *
                   FROM pacientes 
                  WHERE id = :id ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();
 
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function salvar(){

    $query = "INSERT INTO pacientes 
                          (nome, cpf, rg, endereco, numero, complemento, cep, bairro, cidade, uf, cns, numero_carteirinha, telefone, celular, whatsapp, email, status, data_cadastro, data_nascimento, data_obito, id_convenio, id_plano, nome_mae, nome_pai, profissao, profissao_pai, profissao_mae, estado_civil, naturalidade, sexo, cor) 
             VALUES 
                          (:nome, :cpf, :rg, :endereco, :numero, :complemento, :cep, :bairro, :cidade, :uf, :cns, :numero_carteirinha, :telefone, :celular, :whatsapp, :email, :status, :data_cadastro, :data_nascimento, :data_obito, :id_convenio, :id_plano, :nome_mae, :nome_pai, :profissao, :profissao_pai, :profissao_mae, :estado_civil, :naturalidade, :sexo, :cor)";

    $sql  = $this->db->prepare($query);  
    
    $sql->bindValue(':nome'                , $this->__get('nome'));
    $sql->bindValue(':cpf'                 , $this->__get('cpf'));
    $sql->bindValue(':rg'                  , $this->__get('rg'));
    $sql->bindValue(':endereco'            , $this->__get('endereco'));
    $sql->bindValue(':numero'              , $this->__get('numero'));
    $sql->bindValue(':complemento'         , $this->__get('complemento'));
    $sql->bindValue(':cep'                 , $this->__get('cep'));
    $sql->bindValue(':bairro'              , $this->__get('bairro'));
    $sql->bindValue(':cidade'              , $this->__get('cidade'));
    $sql->bindValue(':uf'                  , $this->__get('uf'));
    $sql->bindValue(':cns'                 , $this->__get('cns'));
    $sql->bindValue(':numero_carteirinha'  , $this->__get('numero_carteirinha'));
    $sql->bindValue(':telefone'            , $this->__get('telefone'));
    $sql->bindValue(':celular'             , $this->__get('celular'));
    $sql->bindValue(':whatsapp'            , $this->__get('whatsapp'));
    $sql->bindValue(':email'               , $this->__get('email'));
    $sql->bindValue(':status'              , $this->__get('status'));
    $sql->bindValue(':data_cadastro'       , $this->__get('data_cadastro'));
    $sql->bindValue(':data_nascimento'     , $this->__get('data_nascimento'));
    $sql->bindValue(':data_obito'          , $this->__get('data_obito'));
    $sql->bindValue(':id_convenio'         , $this->__get('id_convenio'));
    $sql->bindValue(':id_plano'            , $this->__get('id_plano'));
    $sql->bindValue(':nome_mae'            , $this->__get('nome_mae'));
    $sql->bindValue(':nome_pai'            , $this->__get('nome_pai'));
    $sql->bindValue(':profissao'           , $this->__get('profissao'));
    $sql->bindValue(':profissao_pai'       , $this->__get('profissao_pai'));
    $sql->bindValue(':profissao_mae'       , $this->__get('profissao_mae'));
    $sql->bindValue(':estado_civil'        , $this->__get('estado_civil'));
    $sql->bindValue(':naturalidade'        , $this->__get('naturalidade'));
    $sql->bindValue(':sexo'                , $this->__get('sexo'));
    $sql->bindValue(':cor'                 , $this->__get('cor'));

    $sql->execute();
 
    return $this;
  }

  public function alterarPaciente(){
    $query = "  UPDATE pacientes 
                   SET nome = :nome, 
                       cpf = :cpf, 
                       rg = :rg, 
                       endereco = :endereco, 
                       numero = :numero, 
                       complemento = :complemento, 
                       cep = :cep, 
                       bairro = :bairro, 
                       cidade = :cidade,
                       uf = :uf, 
                       cns = :cns, 
                       numero_carteirinha = :numero_carteirinha, 
                       telefone = :telefone, 
                       celular = :celular, 
                       whatsapp = :whatsapp, 
                       email = :email, 
                       status = :status, 
                       data_nascimento = :data_nascimento, 
                       id_convenio = :id_convenio, 
                       id_plano = :id_plano, 
                       nome_mae = :nome_mae, 
                       nome_pai = :nome_pai, 
                       profissao = :profissao, 
                       profissao_pai = :profissao_pai, 
                       profissao_mae = :profissao_mae, 
                       estado_civil = :estado_civil, 
                       naturalidade = :naturalidade, 
                       sexo = :sexo, 
                       cor = :cor
                 WHERE id = :id";

    $sql  = $this->db->prepare($query);  
    
    $sql->bindValue(':id'                  , $this->__get('id'));
    $sql->bindValue(':nome'                , $this->__get('nome'));
    $sql->bindValue(':cpf'                 , $this->__get('cpf'));
    $sql->bindValue(':rg'                  , $this->__get('rg'));
    $sql->bindValue(':endereco'            , $this->__get('endereco'));
    $sql->bindValue(':numero'              , $this->__get('numero'));
    $sql->bindValue(':complemento'         , $this->__get('complemento'));
    $sql->bindValue(':cep'                 , $this->__get('cep'));
    $sql->bindValue(':bairro'              , $this->__get('bairro'));
    $sql->bindValue(':cidade'              , $this->__get('cidade'));
    $sql->bindValue(':uf'                  , $this->__get('uf'));
    $sql->bindValue(':cns'                 , $this->__get('cns'));
    $sql->bindValue(':numero_carteirinha'  , $this->__get('numero_carteirinha'));
    $sql->bindValue(':telefone'            , $this->__get('telefone'));
    $sql->bindValue(':celular'             , $this->__get('celular'));
    $sql->bindValue(':whatsapp'            , $this->__get('whatsapp'));
    $sql->bindValue(':email'               , $this->__get('email'));
    $sql->bindValue(':status'              , $this->__get('status'));
    $sql->bindValue(':data_nascimento'     , $this->__get('data_nascimento'));
    $sql->bindValue(':id_convenio'         , $this->__get('id_convenio'));
    $sql->bindValue(':id_plano'            , $this->__get('id_plano'));
    $sql->bindValue(':nome_mae'            , $this->__get('nome_mae'));
    $sql->bindValue(':nome_pai'            , $this->__get('nome_pai'));
    $sql->bindValue(':profissao'           , $this->__get('profissao'));
    $sql->bindValue(':profissao_pai'       , $this->__get('profissao_pai'));
    $sql->bindValue(':profissao_mae'       , $this->__get('profissao_mae'));
    $sql->bindValue(':estado_civil'        , $this->__get('estado_civil'));
    $sql->bindValue(':naturalidade'        , $this->__get('naturalidade'));
    $sql->bindValue(':sexo'                , $this->__get('sexo'));
    $sql->bindValue(':cor'                 , $this->__get('cor'));
    try{
      $sql->execute();
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

    return $this;
  }

  public function excluirPaciente(){
    $query = "   DELETE 
                   FROM pacientes 
                  WHERE id = :id";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();

    return $this;
  }
  
}

?>