<?php

namespace models;

use db\ActiveRecord;
use db\MySQL;

class Usuario implements ActiveRecord
{

  private int $id;
  private int $idCurso;
  private string $nome;
  private string $contato;
  private string $tipo;

  public function __construct(
    private string $email,
    private string $senha
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

  #region idCurso
  public function setIdCurso(int $idCurso): void
  {
    $this->idCurso = $idCurso;
  }

  public function getIdCurso(): int
  {
    return $this->idCurso;
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

  #region email
  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function getEmail(): string
  {
    return $this->email;
  }
  #endregion

  #region senha
  public function setSenha(string $senha): void
  {
    $this->senha = $senha;
  }

  public function getSenha(): string
  {
    return $this->senha;
  }
  #endregion

  #region contato
  public function setContato(string $contato): void
  {
    $this->contato = $contato;
  }

  public function getContato(): string
  {
    return $this->contato;
  }
  #endregion

  #region tipo
  public function setTipo(string $tipo): void
  {
    $this->tipo = $tipo;
  }

  public function getTipo(): string
  {
    return $this->tipo;
  }
  #endregion

  public function save(): bool
  {
    $conexao = new MySQL();

    $this->senha = password_hash($this->senha, PASSWORD_BCRYPT);
    if (isset($this->id)) {
      $sql = "UPDATE usuario SET 
        nome = '{$this->nome}' ,
        email = '{$this->email}',
        senha = '{$this->senha}' ,
        contato = '{$this->contato}' ,
        tipo = '{$this->tipo}' ,
        idCurso = '{$this->idCurso}' ,
        fotoPerfil = 'noimage.png' WHERE id = {$this->id}";
    } else {
      $sql = "INSERT INTO usuario (nome,email,senha,contato,tipo,idCurso,fotoPerfil) 
      VALUES (
          '{$this->nome}',
          '{$this->email}',
          '{$this->senha}' ,
          '{$this->contato}' ,
          '{$this->tipo}' ,
          '{$this->idCurso}' ,
          'noimage.png')";
    }
    return $conexao->executa($sql);
  }

  public function delete(): bool
  {
    $conexao = new MySQL();
    $sql = "DELETE FROM usuario WHERE id = {$this->id}";
    return $conexao->executa($sql);
  }

  public static function find($id): Usuario
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM usuario WHERE id = {$id}";
    $resultado = $conexao->consulta($sql);
    $u = new Usuario(
      $resultado[0]['nome'],
      $resultado[0]['email'],
      $resultado[0]['senha'],
      $resultado[0]['contato'],
      $resultado[0]['tipo']
    );
    $u->setId($resultado[0]['id']);
    $u->setIdCurso($resultado[0]['idCurso']);
    return $u;
  }
  public static function findall(): array
  {
    $conexao = new MySQL();
    $sql = "SELECT * FROM usuario";
    $resultados = $conexao->consulta($sql);
    $usuarios = array();
    foreach ($resultados as $resultado) {
      $p = new Usuario(
        $resultado[0]['nome'],
        $resultado[0]['email'],
        $resultado[0]['senha'],
        $resultado[0]['contato'],
        $resultado[0]['tipo']
      );
      $p->setId($resultado['id']);
      $p->setIdCurso($resultado['idCurso']);
      $usuarios[] = $p;
    }
    return $usuarios;
  }

  public function authenticate(): bool
  {
    $conexao = new MySQL();
    $sql = "SELECT id,nome,email,senha FROM usuario WHERE email = '{$this->email}'";
    $resultados = $conexao->consulta($sql);
    if (password_verify($this->senha, $resultados[0]['senha'])) {
      session_start();
      $_SESSION['idUsuario'] = $resultados[0]['id'];
      $_SESSION['email'] = $resultados[0]['email'];
      $_SESSION['nome'] = $resultados[0]['nome'];
      return true;
    } else {
      return false;
    }
  }
}
