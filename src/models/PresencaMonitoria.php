<?php

namespace models;

use db\MySQL;

class PresencaMonitoria 
{

  private ?string $compareceu = null;

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

  #region compareceu
  public function setCompareceu(?string $compareceu): void
  {
    $this->compareceu = $compareceu;
  }

  public function getCompareceu(): string
  {
    return $this->compareceu;
  }
  #endregion

  public function save(): bool
  {
    $conexao = new MySQL();
    if (!isset($this->idMonitoria)) {
      $sql = "INSERT INTO presenca_monitoria (idUsuario,idMonitoria, compareceu) 
      VALUES (
        '{$this->idUsuario}' ,
        '{$this->idMonitoria}',
        null)";  
    } else{
      $sql = "INSERT INTO presenca_monitoria (idUsuario,idMonitoria, compareceu) 
      VALUES (
        '{$this->idUsuario}' ,
        '{$this->idMonitoria}',
        '{$this->compareceu}')";  
    }
    return $conexao->executa($sql);
  }

  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM presenca_monitoria WHERE idMonitoria = {$this->idMonitoria}";
    return $conexao->executa($sql);
  }

  public static function find($idMonitoria): PresencaMonitoria
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
      $m->setCompareceu($resultado['compareceu']);
      $monitorias[] = $m;
    }
    return $monitorias;
  }

  public static function findAllByUsuario($idUsuario): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM presenca_monitoria WHERE idUsuario = {$idUsuario}";
    $resultados = $conexao->consulta($sql);
    $monitorias = array();
    foreach ($resultados as $resultado) {
      $m = new PresencaMonitoria(
        $resultado['idUsuario'],
        $resultado['idMonitoria']
      );
      $m->setCompareceu($resultado['compareceu']);
      $monitorias[] = $m;
    }
    return $monitorias;
  }
}
