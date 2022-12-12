<?php
namespace models;

use db\ActiveRecord;
use db\MySQL;

class Curso implements ActiveRecord
{

  private int $id;
  
  
  public function __construct(
    public string $nome,
    public string $correnteAno,
    public string $materias,
    public string $sala,
    public string $turno
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

  #region name 
  public function setNome(string $nome): void
  {
    $this->nome = $nome;
  }

  public function getNome(): string
  {
    return $this->nome;
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

  #region materias
  public function setMaterias(string $materias): void
  {
    $this->materias = $materias;
  }

  public function getMaterias(): string
  {
    return $this->materias;
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

  #region turno 
  public function setTurno(string $turno): void
  {
    $this->turno = $turno;
  }

  public function getTurno(): string
  {
    return $this->turno;
  }
  #endregion

  public function save(): bool
  {
    $conexao = new MySQL();

    if (isset($this->id)) {
      $sql = "UPDATE curso SET 
        nome = '{$this->nome}' ,
        correnteAno = '{$this->correnteAno}',
        materias = '{$this->materias}',
        sala = '{$this->sala}',
        turno = '{$this->turno}'
        WHERE id = {$this->id}";
    } else {
      $sql = "INSERT INTO curso (nome,correnteAno,materias,sala, turno) 
      VALUES (
          '{$this->nome}',
          '{$this->correnteAno}',
          '{$this->materias}',
          '{$this->sala}',
          '{$this->turno}')";
    }
    return $conexao->executa($sql);
  }

  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM usuario WHERE id = {$this->id}";
    return $conexao->executa($sql);
  }

  public static function find($id): Curso
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM curso WHERE id = {$id}";
    $resultado = $conexao->consulta($sql);
    $c = new Curso(
      $resultado[0]['nome'],
      $resultado[0]['correnteAno'],
      $resultado[0]['materias'],
      $resultado[0]['sala'],
      $resultado[0]['turno'],
    );
    $c->setId($resultado[0]['id']);
    return $c;
  }

  public static function findall(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM curso";
    $resultados = $conexao->consulta($sql);
    $cursos = array();
    foreach ($resultados as $resultado) {
      $c = new Curso(
        $resultado['nome'],
        $resultado['correnteAno'],
        $resultado['materias'],
        $resultado['sala'],
        $resultado['turno']
      );
      $c->setId($resultado['id']);
      $cursos[] = $c;
    }
    return $cursos;
  }
}
