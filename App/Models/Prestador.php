<?php 

namespace App\Models;
use MF\Model\Model;

class Prestador extends Model{
  private $id;
  private $nome;
  private $razao_social;
  private $tipo;
  private $cpf;
  private $cnpj;
  private $insc_estadual;
  private $rg;
  private $endereco;
  private $numero;
  private $complemento;
  private $cep;
  private $bairro;
  private $cidade;
  private $estado;
  private $telefone;
  private $celular;
  private $email; 
  private $status;
  private $data_cadastro;
  private $id_convenio;
  private $id_especialidade;
  private $id_clinica;
  private $id_plano;
  private $crm;
  
  public function __get($atributo){
    return $this->$atributo;
  }

  public function __set($atributo, $valor){
    $this->$atributo = $valor;
  }

  public function localizar(){
    $query = "SELECT id, nome, concat(endereco, ' ' , numero) endereco, telefone 
                FROM prestadores 
               WHERE nome LIKE ? ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(1, "%". $this->__get('nome') ."%");
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function localizarID(){
    $query = "   SELECT *
                   FROM prestadores 
                  WHERE id = :id ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();
 
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function salvar(){
    
    $query = "INSERT INTO prestadores 
                          (nome, razao_social, tipo, cpf, cnpj, insc_estadual, rg, endereco, numero, complemento, cep, bairro, cidade, estado, telefone, celular, email, status, id_convenio, id_especialidade, id_clinica, id_plano, crm, data_cadastro) 
             VALUES 
                          (:nome, :razao_social, :tipo, :cpf, :cnpj, :insc_estadual, :rg, :endereco, :numero, :complemento, :cep, :bairro, :cidade, :estado, :telefone, :celular, :email, :status, :id_convenio, :id_especialidade, :id_clinica, :id_plano, :crm, :data_cadastro) ";

    $sql  = $this->db->prepare($query);  
    
    $sql->bindValue(':nome'              , $this->__get('nome'));
    $sql->bindValue(':razao_social'      , $this->__get('razao_social'));
    $sql->bindValue(':tipo'              , $this->__get('tipo'));
    $sql->bindValue(':cpf'               , $this->__get('cpf'));
    $sql->bindValue(':cnpj'              , $this->__get('cnpj'));
    $sql->bindValue(':insc_estadual'     , $this->__get('insc_estadual'));
    $sql->bindValue(':rg'                , $this->__get('rg'));
    $sql->bindValue(':endereco'          , $this->__get('endereco'));
    $sql->bindValue(':numero'            , $this->__get('numero'));
    $sql->bindValue(':complemento'       , $this->__get('complemento'));
    $sql->bindValue(':cep'               , $this->__get('cep'));
    $sql->bindValue(':bairro'            , $this->__get('bairro'));
    $sql->bindValue(':cidade'            , $this->__get('cidade'));
    $sql->bindValue(':estado'            , $this->__get('estado'));
    $sql->bindValue(':telefone'          , $this->__get('telefone'));
    $sql->bindValue(':celular'           , $this->__get('celular'));
    $sql->bindValue(':email'             , $this->__get('email'));
    $sql->bindValue(':status'            , $this->__get('status'));
    $sql->bindValue(':id_convenio'       , $this->__get('id_convenio'));
    $sql->bindValue(':id_especialidade'  , $this->__get('id_especialidade'));
    $sql->bindValue(':id_clinica'        , $this->__get('id_clinica'));
    $sql->bindValue(':id_plano'          , $this->__get('id_plano'));
    $sql->bindValue(':crm'               , $this->__get('crm'));
    $sql->bindValue(':data_cadastro'     , date('dd/mm/YYYY'));
    
    try{
      $sql->execute();
      return $this;
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }
    
  }

  public function alterarPrestador(){
    $query = " UPDATE prestadores 
                  SET nome = :nome, 
                      razao_social = :razao_social, 
                      tipo = :tipo, 
                      cpf = :cpf, 
                      cnpj = :cnpj, 
                      insc_estadual = :insc_estadual, 
                      rg = :rg, 
                      endereco = :endereco, 
                      numero = :numero, 
                      complemento = :complemento, 
                      cep = :cep, 
                      bairro = :bairro, 
                      cidade = :cidade, 
                      estado = :estado, 
                      telefone = :telefone, 
                      celular = :celular, 
                      email = :email, 
                      status = :status,
                      id_convenio = :id_convenio, 
                      id_especialidade = :id_especialidade, 
                      id_clinica = :id_clinica, 
                      id_plano = :id_plano, 
                      crm = :crm
                WHERE id = :id
                  ";

    $sql  = $this->db->prepare($query);  
    
    $sql->bindValue(':id'                , $this->__get('id'));
    $sql->bindValue(':nome'              , $this->__get('nome'));
    $sql->bindValue(':razao_social'      , $this->__get('razao_social'));
    $sql->bindValue(':tipo'              , $this->__get('tipo'));
    $sql->bindValue(':cpf'               , $this->__get('cpf'));
    $sql->bindValue(':cnpj'              , $this->__get('cnpj'));
    $sql->bindValue(':insc_estadual'     , $this->__get('insc_estadual'));
    $sql->bindValue(':rg'                , $this->__get('rg'));
    $sql->bindValue(':endereco'          , $this->__get('endereco'));
    $sql->bindValue(':numero'            , $this->__get('numero'));
    $sql->bindValue(':complemento'       , $this->__get('complemento'));
    $sql->bindValue(':cep'               , $this->__get('cep'));
    $sql->bindValue(':bairro'            , $this->__get('bairro'));
    $sql->bindValue(':cidade'            , $this->__get('cidade'));
    $sql->bindValue(':estado'            , $this->__get('estado'));
    $sql->bindValue(':telefone'          , $this->__get('telefone'));
    $sql->bindValue(':celular'           , $this->__get('celular'));
    $sql->bindValue(':email'             , $this->__get('email'));
    $sql->bindValue(':status'            , $this->__get('status'));
    $sql->bindValue(':id_convenio'       , $this->__get('id_convenio'));
    $sql->bindValue(':id_especialidade'  , $this->__get('id_especialidade'));
    $sql->bindValue(':id_clinica'        , $this->__get('id_clinica'));
    $sql->bindValue(':id_plano'          , $this->__get('id_plano'));
    $sql->bindValue(':crm'               , $this->__get('crm'));
    $sql->execute();

    $sql->execute();

    return $this;
  }

  public function excluirPrestador(){
    $query = "   DELETE 
                   FROM prestadores 
                  WHERE id = :id";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();

    return $this;
  }
  
}

?>