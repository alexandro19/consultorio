<?php 

namespace App\Models;
use MF\Model\Model;

class MatMed extends Model{
  private $id;
  private $descricao;
  private $status;

  public function __get($atributo){
    return $this->$atributo;
  }

  public function __set($atributo, $valor){
    $this->$atributo = $valor;
  }

  public function localizar(){
    $query = "SELECT id, descricao, status 
                FROM matmed 
               WHERE descricao LIKE ? ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(1, "%". $this->__get('descricao') ."%");
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function localizarID(){
    $query = "   SELECT *
                   FROM matmed 
                  WHERE id = :id ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();
 
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function salvar(){

    $query = "INSERT INTO matmed ( codigo,  descricao,  status,  tipo,  codigoTuss,  unidadeMedida,  quantidadeEmbalagem,  observacao,  dataCadastro) 
                          VALUES (:codigo, :descricao, :status, :tipo, :codigoTuss, :unidadeMedida, :quantidadeEmbalagem, :observacao, :dataCadastro)";

    $sql  = $this->db->prepare($query);  
    
    $sql->bindValue(':codigo'               , $this->__get('codigo'));
    $sql->bindValue(':descricao'            , $this->__get('descricao'));
    $sql->bindValue(':status'               , $this->__get('status'));
    $sql->bindValue(':tipo'                 , $this->__get('tipo'));
    $sql->bindValue(':codigoTuss'           , $this->__get('codigoTuss'));
    $sql->bindValue(':unidadeMedida'        , $this->__get('unidadeMedida'));
    $sql->bindValue(':quantidadeEmbalagem'  , $this->__get('quantidadeEmbalagem'));
    $sql->bindValue(':observacao'           , $this->__get('observacao'));
    $sql->bindValue(':dataCadastro'         , $this->__get('dataCadastro'));

    $sql->execute();
 
    return $this;
  }

  public function alterarMatMed(){
    $query = "  UPDATE matmed 
                   SET codigo=:codigo,  
                       descricao=:descricao,  
                       status=:status,  
                       tipo=:tipo,  
                       codigoTuss=:codigoTuss,  
                       unidadeMedida=:unidadeMedida,  
                       quantidadeEmbalagem=:quantidadeEmbalagem,  
                       observacao=:observacao,  
                       dataCadastro=:dataCadastro
                 WHERE id = :id ";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':codigo'               , $this->__get('codigo'));
    $sql->bindValue(':descricao'            , $this->__get('descricao'));
    $sql->bindValue(':status'               , $this->__get('status'));
    $sql->bindValue(':tipo'                 , $this->__get('tipo'));
    $sql->bindValue(':codigoTuss'           , $this->__get('codigoTuss'));
    $sql->bindValue(':unidadeMedida'        , $this->__get('unidadeMedida'));
    $sql->bindValue(':quantidadeEmbalagem'  , $this->__get('quantidadeEmbalagem'));
    $sql->bindValue(':observacao'           , $this->__get('observacao'));
    $sql->bindValue(':dataCadastro'         , $this->__get('dataCadastro'));

    $sql->execute();

    return $this;
  }

  public function excluirMatMed(){
    $query = "   DELETE 
                   FROM matmed 
                  WHERE id = :id";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();

    return $this;
  }

  public function listaMatMed(){
    $query = "SELECT id, descricao, status 
                FROM matmed 
               WHERE status = 'A' ";
    $sql = $this->db->prepare($query);
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
  
}

?>