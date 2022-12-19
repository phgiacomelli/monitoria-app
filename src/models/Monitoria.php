<?php

namespace models;

use db\ActiveRecord;
use db\MySQL;

class Monitoria implements ActiveRecord
{

  private int $id;
  public string $correnteAno;
  
  public function __construct(
    private int $idMonitor,
    private int $idMateria,
    public string $horarioInicio,
    public string $data,
    public string $horarioFim,
    public string $sala
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

  #region idMonitor
  public function setIdMonitor(int $idMonitor): void
  {
    $this->idMonitor = $idMonitor;
  }

  public function getIdMonitor(): int
  {
    return $this->idMonitor;
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

  #region horarioInicio 
  public function setHorarioInicio(string $horarioInicio): void
  {
    $this->horarioInicio = $horarioInicio;
  }

  public function getHorarioInicio(): string
  {
    return $this->horarioInicio;
  }
  #endregion 

  #region data 
  public function setData(string $data): void
  {
    $this->data = $data;
  }

  public function getData(): string
  {
    return $this->data;
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

  #region horarioFim 
  public function setHorarioFim(string $horarioFim): void
  {
    $this->horarioFim = $horarioFim;
  }

  public function getHorarioFim(): string
  {
    return $this->horarioFim;
  }
  #endregion

  #region sala 
  public function setSala(string $sala): void
  {
    $this->sala = $sala;
  }

  public function getSala(): string
  {
    return $this->sala;
  }
  #endregion

  public function save(): bool
  {
    $conexao = new MySQL();

    if (isset($this->id)) {
      $sql = "UPDATE monitoria SET 
        idMonitor = '{$this->idMonitor}' ,
        idMateria = '{$this->idMateria}' ,
        horarioInicio = '{$this->horarioInicio}' ,
        data = '{$this->data}' ,
        correnteAno = '{$this->correnteAno}',
        horarioFim = '{$this->horarioFim}',
        sala = '{$this->sala}'
        WHERE id = {$this->id}";
    } else {
      $sql = "INSERT INTO monitoria (idMonitor,idMateria,horarioInicio,data,correnteAno,horarioFim,sala) 
      VALUES (
        '{$this->idMonitor}' ,
        '{$this->idMateria}' ,
        '{$this->horarioInicio}' ,
        '{$this->data}' ,
        year(CURRENT_DATE()),
        '{$this->horarioFim}',
        '{$this->sala}')";
    }
    return $conexao->executa($sql);
  }

  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM monitoria WHERE id = {$this->id}";
    return $conexao->executa($sql);
  }

  public static function find($id): Monitoria
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM monitoria WHERE id = {$id}";
    $resultado = $conexao->consulta($sql);
    $m = new Monitoria(
      $resultado[0]['idMonitor'],
      $resultado[0]['idMateria'],
      $resultado[0]['horarioInicio'],
      $resultado[0]['data'],
      $resultado[0]['horarioFim'],
      $resultado[0]['sala']
    );
    $m->setId($resultado[0]['id']);
    $m->setCorrenteAno($resultado[0]['idMonitor']);
    return $m;
  }

  public static function findAll(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM monitoria";
    $resultados = $conexao->consulta($sql);
    $monitorias = array();
    foreach ($resultados as $resultado) {
      $m = new Monitoria(
        $resultado['idMonitor'],
        $resultado['idMateria'],
        $resultado['horarioInicio'],
        $resultado['data'],
        $resultado['horarioFim'],
        $resultado['sala']

      );
      $m->setId($resultado['id']);
      $m->setCorrenteAno($resultado['correnteAno']);
      $monitorias[] = $m;
    }
    return $monitorias;
  }
}
