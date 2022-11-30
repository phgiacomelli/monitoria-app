<?php

namespace models;

use DateTime;
use db\ActiveRecord;
use db\MySQL;

class PresencaMonitoria implements ActiveRecord
{


  public function __construct(
    private int $idUsuario,
    private int $idMonitoria
  ) {
  }
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

  #region idMonitoria
  public function setIdMonitoria(int $idMonitoria): void
  {
    $this->idMonitoria = $idMonitoria;
  }

  public function getIdMonitoria(): int
  {
    return $this->idMonitoria;
  }
  #endregion




  public function save(): bool
  {
    $conexao = new MySQL();
    $sql = "INSERT INTO presenca_monitoria (idUsuario,idMonitoria) 
      VALUES (
        '{$this->idUsuario}' ,
        '{$this->idMonitoria}')";

    return $conexao->executa($sql);
  }

  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM presenca_monitoria WHERE idMonitoria = {$this->idMonitoria}";
    return $conexao->executa($sql);
  }

  public static function find($id): PresencaMonitoria
  {
    $m = new PresencaMonitoria(1,2);
    return $m;
  }

  public static function findAll(): array{
    return array();
  }

  public function findAllByMonitoria(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM presenca_monitoria WHERE idMonitoria = {$this->idMonitoria}";
    $resultados = $conexao->consulta($sql);
    $monitorias = array();
    foreach ($resultados as $resultado) {
      $m = new PresencaMonitoria(
        $resultado['idUsuario'],
        $resultado['idMonitoria']
      );
      $monitorias[] = $m;
    }
    return $monitorias;
  }
}
