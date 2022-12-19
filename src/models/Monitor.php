<?php
namespace models;

use db\ActiveRecord;
use db\MySQL;

class Monitor implements ActiveRecord
{

  private int $id;
  public function __construct(
    private int $idUsuario,
    private int $idMateria,
    private string $correnteAno
  ) {
  }
  #region id
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }
  #endregion

  #region idUsuario
  public function setIdUsuario(int $idUsuario): void
  {
    $this->idUsuario = $idUsuario;
  }

  public function getIdUsuario(): int
  {
    return $this->idUsuario;
  }
  #endregion

  #region idMateria 
  public function setIdMateria(string $idMateria): void
  {
    $this->idMateria = $idMateria;
  }

  public function getIdMateria(): string
  {
    return $this->idMateria;
  }
  #endregion

  #region correnteAno
  public function setCorrenteAno(string $correnteAno): void
  {
    $this->correnteAno = $correnteAno;
  }

  public function getCorrenteAno(): string
  {
    return $this->correnteAno;
  }
  #endregion



  public function save(): bool
  {
    $conexao = new MySQL();

    if (isset($this->id)) {
      $sql = "UPDATE monitor SET 
        idUsuario = '{$this->idUsuario}' ,
        idMateria = '{$this->idMateria}',
        correnteAno = '{$this->correnteAno}' WHERE id = {$this->id}";
    } else {
      $sql = "INSERT INTO monitor (idUsuario,idMateria,correnteAno) 
      VALUES (
          '{$this->idUsuario}',
          '{$this->idMateria}',
          '{$this->correnteAno}'";
    }
    return $conexao->executa($sql);
  }

  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM monitor WHERE id = {$this->id}";
    return $conexao->executa($sql);
  }

  public static function find($id): Monitor
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM monitor WHERE id = {$id}";
    $resultado = $conexao->consulta($sql);
    $m = new Monitor(
      $resultado[0]['idUsuario'],
      $resultado[0]['idMateria'],
      $resultado[0]['correnteAno']
    );
    $m->setId($resultado[0]['id']);
    return $m;
  }
  public static function findall(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM monitor";
    $resultados = $conexao->consulta($sql);
    $monitores = array();
    foreach ($resultados as $resultado) {
      $m = new Monitor(
        $resultado['idUsuario'],
        $resultado['idMateria'],
        $resultado['correnteAno']
      );
      $m->setId($resultado['id']);
      $monitores[] = $m;
    }
    return $monitores;
  }

  public static function findBySubject($idSubject): Monitor | string
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM monitor WHERE idMateria = {$idSubject}";
    $resultado = $conexao->consulta($sql);
    if (count($resultado)>0) {
      $m = new Monitor(
        $resultado[0]['idUsuario'],
        $resultado[0]['idMateria'],
        $resultado[0]['correnteAno']
      );
      $m->setId($resultado[0]['id']);
      return $m;
    } else{
      return 'Não encontrado!';
    }
    var_dump($resultado);
  }

}
