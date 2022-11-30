<?php

namespace models;

use db\ActiveRecord;
use db\MySQL;

class Materia implements ActiveRecord
{

  private int $id;

  public function __construct(
    public string $nome,
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

  #region nome
  public function setNome(int $nome): void
  {
    $this->nome = $nome;
  }

  public function getNome(): string
  {
    return $this->nome;
  }
  #endregion

  public function save(): bool
  {
    $conexao = new MySQL();

    if (isset($this->id)) {
      $sql = "UPDATE materia SET 
        nome = '{$this->nome}'
        WHERE id = {$this->id}";
    } else {
      $sql = "INSERT INTO materia (nome) 
      VALUES (
        '{$this->nome}')";
    }
    return $conexao->executa($sql);
  }

  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM materia WHERE id = {$this->id}";
    return $conexao->executa($sql);
  }

  public static function find($id): Materia
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM materia WHERE id = {$id}";
    $resultado = $conexao->consulta($sql);
    $m = new Materia(
      $resultado[0]['nome']
    );
    $m->setId($resultado[0]['id']);
    return $m;
  }

  public static function findAll(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM materia";
    $resultados = $conexao->consulta($sql);
    $materias = array();
    foreach ($resultados as $resultado) {
      $m = new Materia(
        $resultado['nome']
      );
      $m->setId($resultado['id']);
      $materias[] = $m;
    }
    return $materias;
  }
}
