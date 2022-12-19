<?php

namespace models;

use db\MySQL;

class MateriaCurso
{

  public function __construct(
    private int $idCurso,
    private int $idMateria
  ) {
  }

  #region idCurso
  public function setIdCurso(int $idCurso): void
  {
    $this->idCurso = $idCurso;
  }

  public function getIdUsuario(): int
  {
    return $this->idUsuario;
  }
  #endregion

  #region idMateria
  public function setIdMateria(int $idMateria): void
  {
    $this->idMateria = $idMateria;
  }

  public function getIdMateria(): int
  {
    return $this->idMateria;
  }
  #endregion


  public function save(): bool
  {
    $conexao = new MySQL();
    $sql = "INSERT INTO materia_curso (idCurso,idMateria) 
    VALUES (
      '{$this->idCurso}',
      '{$this->idMateria}')";
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

  public static function findAllByCourse($idCourse): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM materia_curso WHERE idCurso = {$idCourse}";
    $resultados = $conexao->consulta($sql);
    $materias = array();
    foreach ($resultados as $resultado) {
      $m = new MateriaCurso(
        $resultado['idCurso'],
        $resultado['idMateria']
      );
      $materias[] = $m;
    }
    return $materias;
  }
}
