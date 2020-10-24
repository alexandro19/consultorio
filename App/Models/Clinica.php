<?php 

namespace App\Models;
use MF\Model\Model;

class Clinica extends Model{
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
                FROM clinicas 
               WHERE descricao LIKE ? ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(1, "%". $this->__get('descricao') ."%");
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function localizarID(){
    $query = "   SELECT *
                   FROM clinicas 
                  WHERE id = :id ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();
 
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function salvar(){

    $query = "INSERT INTO clinicas (descricao, status) 
                   VALUES (:descricao, :status)";

    $sql  = $this->db->prepare($query);  
    
    $sql->bindValue(':descricao'          , $this->__get('descricao')); 
    $sql->bindValue(':status'             , $this->__get('status'));
    
    $sql->execute();
 
    return $this;
  }

  public function alterarClinica(){
    $query = "  UPDATE clinicas 
                   SET descricao=:descricao,
                       status=:status
                 WHERE id = :id ";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id'                , $this->__get('id'));
    $sql->bindValue(':descricao'         , $this->__get('descricao')); 
    $sql->bindValue(':status'            , $this->__get('status'));
    
    $sql->execute();

    return $this;
  }

  public function excluirClinica(){
    $query = "   DELETE 
                   FROM clinicas 
                  WHERE id = :id";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();

    return $this;
  }

  public function listaClinica(){
    $query = "SELECT id, descricao, status 
                FROM clinicas 
               WHERE status = 'A' ";
    $sql = $this->db->prepare($query);
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }
  
}

?>