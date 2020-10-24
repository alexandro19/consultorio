<?php 

namespace App\Models;
use MF\Model\Model;

class Especialidade extends Model{
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
    $query = "SELECT id, descricao, STATUS 
                FROM especialidades 
               WHERE descricao LIKE ? ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(1, "%". $this->__get('descricao') ."%");
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function localizarID(){
    $query = "   SELECT *
                   FROM especialidades 
                  WHERE id = :id ";
    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();
 
    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function salvar(){

    $query = "INSERT INTO especialidades (descricao, STATUS) 
                   VALUES (:descricao, :status)";

    $sql  = $this->db->prepare($query);  
    
    $sql->bindValue(':descricao'          , $this->__get('descricao')); 
    $sql->bindValue(':status'             , $this->__get('status'));
    
    $sql->execute();
 
    return $this;
  }

  public function alterarEspecialidade(){
    $query = "  UPDATE especialidades 
                   SET descricao=:descricao,
                       STATUS=:status
                 WHERE id = :id ";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id'                , $this->__get('id'));
    $sql->bindValue(':descricao'         , $this->__get('descricao')); 
    $sql->bindValue(':status'            , $this->__get('status'));
    
    $sql->execute();

    return $this;
  }

  public function excluirEspecialidade(){
    $query = "   DELETE 
                   FROM especialidades 
                  WHERE id = :id";

    $sql = $this->db->prepare($query);
    $sql->bindValue(':id', $this->__get('id'));
    $sql->execute();

    return $this;
  }

  public function listaEspecialidade(){
    $query = " SELECT * 
                 FROM especialidades 
                WHERE STATUS = 'A' ";

    $sql = $this->db->prepare($query);
    $sql->execute();

    return $sql->fetchAll(\PDO::FETCH_ASSOC);
  } 
  
}

?>