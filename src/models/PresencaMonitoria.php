<?php

namespace models;

use db\MySQL;

class PresencaMonitoria
{

  private int $uniqid;
  private string $compareceu = 'Não';

  public function __construct(
    private int $idUsuario,
    private int $idMonitoria
  ) {
  }

  #region uniqid
  public function setUniqId(int $uniqid): void
  {
    $this->uniqid = $uniqid;
  }

  public function getUniqId(): int
  {
    return $this->uniqid;
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
  public function setCompareceu(string $compareceu): void
  {
    $this->compareceu = $compareceu;
  }

  public function getCompareceu(): string
  {
    if ($this->compareceu == null) {
      return 'Não';
    }
    return $this->compareceu;
  }
  #endregion

  public function save(): bool
  {
    $conexao = new MySQL();
    if (isset($this->uniqid)) {
      $sql = "UPDATE presenca_monitoria SET  
      idUsuario = '{$this->idUsuario}',
      idMonitoria = '{$this->idMonitoria}', 
      compareceu = '{$this->compareceu}' 
      WHERE uniqID = {$this->uniqid} ";
    } else {
      $sql = "INSERT INTO presenca_monitoria (idUsuario,idMonitoria, compareceu) 
    VALUES (
      '{$this->idUsuario}',
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

  public static function find($uniqId): PresencaMonitoria
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM presenca_monitoria WHERE uniqID = {$uniqId}";
    $resultado = $conexao->consulta($sql);
    $m = new PresencaMonitoria(
      $resultado[0]['idUsuario'],
      $resultado[0]['idMonitoria']
    );
    $m->setUniqId($resultado[0]['uniqID']);
    $m->setCompareceu($resultado[0]['compareceu']);
    return $m;
  }

  public static function findAll(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM presenca_monitoria";
    $resultados = $conexao->consulta($sql);
    $monitorias = array();
    foreach ($resultados as $resultado) {
      $m = new PresencaMonitoria(
        $resultado['idUsuario'],
        $resultado['idMonitoria']
      );
      $m->setUniqId($resultado['uniqID']);
      $m->setCompareceu($resultado['compareceu']);
      $monitorias[] = $m;
    }
    return $monitorias;
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
      $m->setUniqId($resultado['uniqID']);
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
      $m->setUniqId($resultado['uniqID']);
      $m->setCompareceu($resultado['compareceu']);
      $monitorias[] = $m;
    }
    return $monitorias;
  }
}
